<?php
namespace App\Controllers;
require_once __DIR__ . '/../../core/Controller.php';

class AdminController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Hardcoded fallback for admin access during development
            if ($email === 'admin@cafirm.com' && $password === 'Admin@123!') {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_user'] = ['id' => 1, 'email' => $email, 'name' => 'Administrator'];
                header('Location: ' . SITE_URL . '/admin/dashboard');
                exit;
            }

            try {
                require_once __DIR__ . '/../../core/Database.php';
                $db = \Database::getConnection();
                $stmt = $db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
                $stmt->execute([$email]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password_hash'])) {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_user'] = $user;
                    header('Location: ' . SITE_URL . '/admin/dashboard');
                    exit;
                } else {
                    $error = "Invalid credentials.";
                    $this->renderAdminLogin($error);
                    return;
                }
            } catch (\Exception $e) {
                $error = "Invalid credentials or database not configured.";
                $this->renderAdminLogin($error);
                return;
            }
        }
        $this->renderAdminLogin();
    }

    private function renderAdminLogin($error = null) {
        // inline login view for simplicity
        require __DIR__ . '/../../templates/admin/login.php';
    }

    public function dashboard() {
        $this->checkAuth();
        $this->renderAdmin('dashboard');
    }

    public function pages() {
        $this->checkAuth();
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $pages = $db->query("SELECT * FROM pages ORDER BY title ASC")->fetchAll();
        $this->renderAdmin('page_builder', ['pages' => $pages]);
    }
    
    public function savePage() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (is_array($data)) {
                require_once __DIR__ . '/../../core/Database.php';
                $db = \Database::getConnection();
                
                $title = $data['title'] ?? 'Untitled';
                $slug = $data['slug'] ?? 'untitled';
                $html = $data['html'] ?? '';
                $blocks_json = json_encode($data['blocks'] ?? []);
                
                // insert or update
                $stmt = $db->prepare("SELECT id FROM pages WHERE slug = ?");
                $stmt->execute([$slug]);
                $existing = $stmt->fetch();
                
                if ($existing) {
                    $stmt = $db->prepare("UPDATE pages SET title = ?, content = ?, blocks_json = ? WHERE slug = ?");
                    $stmt->execute([$title, $html, $blocks_json, $slug]);
                } else {
                    $stmt = $db->prepare("INSERT INTO pages (title, slug, content, blocks_json) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$title, $slug, $html, $blocks_json]);
                }
                echo json_encode(['success' => true]);
                exit;
            }
        }
        echo json_encode(['success' => false]);
        exit;
    }
    
    public function apiGetPage() {
        $this->checkAuth();
        $slug = $_GET['slug'] ?? '';
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM pages WHERE slug = ?");
        $stmt->execute([$slug]);
        $page = $stmt->fetch();
        if ($page) {
            echo json_encode(array_merge($page, ['blocks' => json_decode($page['blocks_json'], true) ?: []]));
        } else {
            echo json_encode(['blocks' => []]);
        }
        exit;
    }

    public function menu() {
        $this->checkAuth();
        $menuFile = __DIR__ . '/../../data/menu.json';
        $menuLinks = [];
        if (file_exists($menuFile)) {
            $menuLinks = json_decode(file_get_contents($menuFile), true);
        } else {
            $menuLinks = [
                ['title' => 'Home', 'url' => '/', 'activePath' => '/'],
                ['title' => 'About', 'url' => '/about', 'activePath' => '/about'],
                ['title' => 'Services', 'url' => '/services', 'activePath' => '/services'],
                ['title' => 'Team', 'url' => '/team', 'activePath' => '/team'],
                ['title' => 'Clients', 'url' => '/clients', 'activePath' => '/clients'],
                ['title' => 'Insights', 'url' => '/blog', 'activePath' => '/blog'],
                ['title' => 'Contact', 'url' => '/contact', 'activePath' => '/contact'],
            ];
        }
        $this->renderAdmin('menu_manager', ['menuLinks' => $menuLinks]);
    }

    public function saveMenu() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            if (is_array($data)) {
                if (!is_dir(__DIR__ . '/../../data')) {
                    mkdir(__DIR__ . '/../../data', 0755, true);
                }
                file_put_contents(__DIR__ . '/../../data/menu.json', json_encode($data, JSON_PRETTY_PRINT));
                echo json_encode(['success' => true]);
                exit;
            }
        }
        echo json_encode(['success' => false]);
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: ' . SITE_URL . '/admin/login');
        exit;
    }

    public function members() {
        $this->checkAuth();
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $members = $db->query("SELECT m.*, p.name as parent_name FROM members m LEFT JOIN members p ON m.parent_id = p.id ORDER BY m.sort_order ASC, m.name ASC")->fetchAll();
        $parents = $db->query("SELECT id, name FROM members ORDER BY name ASC")->fetchAll();
        $this->renderAdmin('members', ['members' => $members, 'parents' => $parents]);
    }

    public function saveMember() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../../core/Database.php';
            $db = \Database::getConnection();

            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $designation = $_POST['designation'] ?? '';
            $job_years = $_POST['job_years'] ?? '';
            $parent_id = !empty($_POST['parent_id']) ? $_POST['parent_id'] : null;
            $sort_order = $_POST['sort_order'] ?? 0;
            $color_theme = $_POST['color_theme'] ?? 'blue';
            $linkedin_url = $_POST['linkedin_url'] ?? '';
            $profile_image = $_POST['profile_image'] ?? '';

            // Handle file upload overriding URL
            if (!empty($_FILES['profile_image_file']) && $_FILES['profile_image_file']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $ext = pathinfo($_FILES['profile_image_file']['name'], PATHINFO_EXTENSION);
                $filename = 'member_' . time() . '_' . rand(100,999) . '.' . $ext;
                if (move_uploaded_file($_FILES['profile_image_file']['tmp_name'], $uploadDir . $filename)) {
                    $profile_image = SITE_URL . '/uploads/' . $filename;
                }
            }

            if (empty($id)) {
                $stmt = $db->prepare("INSERT INTO members (name, designation, job_years, parent_id, sort_order, color_theme, linkedin_url, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$name, $designation, $job_years, $parent_id, $sort_order, $color_theme, $linkedin_url, $profile_image]);
            } else {
                // Only update profile_image if a new one was provided, else keep existing if both are empty
                if (!empty($profile_image)) {
                    $stmt = $db->prepare("UPDATE members SET name = ?, designation = ?, job_years = ?, parent_id = ?, sort_order = ?, color_theme = ?, linkedin_url = ?, profile_image = ? WHERE id = ?");
                    $stmt->execute([$name, $designation, $job_years, $parent_id, $sort_order, $color_theme, $linkedin_url, $profile_image, $id]);
                } else {
                    $stmt = $db->prepare("UPDATE members SET name = ?, designation = ?, job_years = ?, parent_id = ?, sort_order = ?, color_theme = ?, linkedin_url = ? WHERE id = ?");
                    $stmt->execute([$name, $designation, $job_years, $parent_id, $sort_order, $color_theme, $linkedin_url, $id]);
                }
            }
            header('Location: ' . SITE_URL . '/admin/members');
            exit;
        }
    }

    public function deleteMember($id) {
        $this->checkAuth();
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $stmt = $db->prepare("DELETE FROM members WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: ' . SITE_URL . '/admin/members');
        exit;
    }

    public function clients() {
        $this->checkAuth();
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $clients = $db->query("SELECT * FROM clients ORDER BY sort_order ASC, name ASC")->fetchAll();
        $this->renderAdmin('clients', ['clients' => $clients]);
    }

    public function saveClient() {
        $this->checkAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../../core/Database.php';
            $db = \Database::getConnection();

            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $logo = $_POST['logo'] ?? '';
            $hyperlink = $_POST['hyperlink'] ?? '';
            $sort_order = $_POST['sort_order'] ?? 0;

            // Handle file upload overriding URL
            if (!empty($_FILES['logo_file']) && $_FILES['logo_file']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $ext = pathinfo($_FILES['logo_file']['name'], PATHINFO_EXTENSION);
                $filename = 'client_' . time() . '_' . rand(100,999) . '.' . $ext;
                if (move_uploaded_file($_FILES['logo_file']['tmp_name'], $uploadDir . $filename)) {
                    $logo = SITE_URL . '/uploads/' . $filename;
                }
            }

            if (empty($id)) {
                $stmt = $db->prepare("INSERT INTO clients (name, logo, hyperlink, sort_order) VALUES (?, ?, ?, ?)");
                $stmt->execute([$name, $logo, $hyperlink, $sort_order]);
            } else {
                if (!empty($logo)) {
                    $stmt = $db->prepare("UPDATE clients SET name = ?, logo = ?, hyperlink = ?, sort_order = ? WHERE id = ?");
                    $stmt->execute([$name, $logo, $hyperlink, $sort_order, $id]);
                } else {
                    $stmt = $db->prepare("UPDATE clients SET name = ?, hyperlink = ?, sort_order = ? WHERE id = ?");
                    $stmt->execute([$name, $hyperlink, $sort_order, $id]);
                }
            }
            header('Location: ' . SITE_URL . '/admin/clients');
            exit;
        }
    }

    public function deleteClient($id) {
        $this->checkAuth();
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $stmt = $db->prepare("DELETE FROM clients WHERE id = ?");
        $stmt->execute([$id]);
        header('Location: ' . SITE_URL . '/admin/clients');
        exit;
    }

    public function services() {
        $this->checkAuth();
        $this->renderAdmin('wip', ['title' => 'Services']);
    }

    public function blog() {
        $this->checkAuth();
        $this->renderAdmin('wip', ['title' => 'Blog Insights']);
    }

    public function contacts() {
        $this->checkAuth();
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $q = $db->query("CREATE TABLE IF NOT EXISTS contact_submissions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255), email VARCHAR(255), message TEXT, ip_address VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
        $contacts = $db->query("SELECT * FROM contact_submissions ORDER BY id DESC")->fetchAll();
        $this->renderAdmin('contacts', ['contacts' => $contacts]);
    }

    public function settings() {
        $this->checkAuth();
        $db = \App\Core\Database::getInstance()->getConnection();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $keys = ['google_review_json_url', 'write_a_review_url', 'google_map_location_url'];
            foreach ($keys as $key) {
                if (isset($_POST[$key])) {
                    $val = $_POST[$key];
                    $stmt = $db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = ?");
                    $stmt->execute([$key, $val, $val]);
                }
            }
            $_SESSION['flash_success'] = 'Settings saved successfully.';
            header('Location: ' . SITE_URL . '/admin/settings');
            exit;
        }

        $settingsRaw = $db->query("SELECT setting_key, setting_value FROM settings")->fetchAll(\PDO::FETCH_ASSOC);
        $settings = [];
        foreach ($settingsRaw as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }

        $this->renderAdmin('settings', ['title' => 'Settings', 'settings' => $settings]);
    }

    private function checkAuth() {
        if (empty($_SESSION['admin_logged_in'])) {
            header('Location: ' . SITE_URL . '/admin/login');
            exit;
        }
    }

    private function renderAdmin($view, $data = []) {
        extract($data);
        $file = __DIR__ . '/../../templates/admin/' . $view . '.php';
        if (file_exists($file)) {
            require __DIR__ . '/../../templates/admin/layout.php';
        } else {
            die("Admin View $view not found.");
        }
    }
}
