<?php
namespace App\Controllers;
require_once __DIR__ . '/../../core/Controller.php';

class PageController extends Controller {
    public function about() {
        $this->render('about', [
            'pageTitle' => 'About Us - Strategic Accounting'
        ]);
    }

    public function services() {
        $this->render('services', [
            'pageTitle' => 'Our Services - AQC & Co.'
        ]);
    }

    public function serviceDetail($slug) {
        $this->render('service_detail', [
            'pageTitle' => ucfirst(str_replace('-', ' ', $slug)),
            'slug' => $slug
        ]);
    }

    public function team() {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $members = $db->query("SELECT * FROM members WHERE status = 'active' ORDER BY sort_order ASC, name ASC")->fetchAll();
        
        $org_data = $this->buildMembersTree($members);

        $this->render('team', [
            'pageTitle' => 'Leadership & Team',
            'org_data' => $org_data ? $org_data[0] : null
        ]);
    }

    private function buildMembersTree(array &$elements, $parentId = null) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildMembersTree($elements, $element['id']);
                
                // Set modern corporate preset colors based on theme
                $colors = [
                    'blue' => ['from' => 'from-[#1c3f94]', 'to' => 'to-[#153073]', 'svg' => 'text-[#1c3f94]', 'year' => 'text-[#1c3f94]'],
                    'pink' => ['from' => 'from-[#6366f1]', 'to' => 'to-[#4338ca]', 'svg' => 'text-[#6366f1]', 'year' => 'text-[#4338ca]'], // mapped to indigo
                    'red' => ['from' => 'from-[#0f172a]', 'to' => 'to-[#000000]', 'svg' => 'text-[#0f172a]', 'year' => 'text-[#0f172a]'], // mapped to slate/black
                    'orange' => ['from' => 'from-[#b45309]', 'to' => 'to-[#78350f]', 'svg' => 'text-[#b45309]', 'year' => 'text-[#b45309]'], // mapped to rich amber
                    'green' => ['from' => 'from-[#0f766e]', 'to' => 'to-[#115e59]', 'svg' => 'text-[#0f766e]', 'year' => 'text-[#0f766e]'], // mapped to teal
                    'amber' => ['from' => 'from-[#d97706]', 'to' => 'to-[#92400e]', 'svg' => 'text-[#d97706]', 'year' => 'text-[#92400e]'], // gold
                ];
                $theme = $element['color_theme'] ?? 'blue';
                if (!isset($colors[$theme])) $theme = 'blue';

                $c = $colors[$theme];

                $node = [
                    'id' => $element['id'],
                    'name' => mb_strtoupper($element['name']),
                    'role' => mb_strtoupper($element['designation']),
                    'years' => $element['job_years'] ?: '',
                    'img' => $element['profile_image'] ?: 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=400&h=400&auto=format&fit=crop',
                    'linkedin_url' => $element['linkedin_url'] ?: '',
                    'color' => $c['from'] . ' ' . $c['to'],
                    'svgColor' => $c['svg'],
                    'yearColor' => $c['year'],
                    'children' => $children
                ];
                $branch[] = $node;
            }
        }
        return $branch;
    }

    public function members() {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $stmt = $db->query("SELECT * FROM members WHERE status = 'active' ORDER BY sort_order ASC, name ASC");
        $members = $stmt->fetchAll();

        $this->render('members', [
            'pageTitle' => 'Our Members',
            'members' => $members
        ]);
    }

    public function memberDetail($id) {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM members WHERE id = ?");
        $stmt->execute([$id]);
        $member = $stmt->fetch();
        
        if (!$member) {
            http_response_code(404);
            echo "Member not found.";
            exit;
        }

        $this->render('member_detail', [
            'pageTitle' => $member['name'] . ' - Member Profile',
            'member' => $member
        ]);
    }

    public function clients() {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $stmt = $db->query("SELECT * FROM clients WHERE status = 'active' ORDER BY sort_order ASC, name ASC");
        $clients = $stmt->fetchAll();
        
        $this->render('clients', [
            'pageTitle' => 'Our Clients',
            'clients' => $clients
        ]);
    }

    public function apiReviews() {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $settingsRaw = $db->query("SELECT setting_key, setting_value FROM settings")->fetchAll(\PDO::FETCH_ASSOC);
        $settings = [];
        foreach ($settingsRaw as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        $url = trim($settings['google_review_json_url'] ?? '');
        
        header('Content-Type: application/json');
        
        if (empty($url)) {
            echo json_encode([]);
            exit;
        }

        if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
            $url = "https://" . $url;
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $result = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        if ($result === false) {
            echo json_encode(['error' => 'Failed to fetch reviews', 'details' => $error]);
        } else {
            echo $result;
        }
        exit;
    }
    
    public function terms() {
        $this->render('terms', [
            'pageTitle' => 'Terms of Services'
        ]);
    }

    public function privacy() {
        $this->render('privacy', [
            'pageTitle' => 'Privacy Policy'
        ]);
    }

    public function sitemap() {
        $this->render('sitemap', [
            'pageTitle' => 'Sitemap'
        ]);
    }

    public function contact() {
        $this->render('contact', [
            'pageTitle' => 'Contact Us'
        ]);
    }

    public function submitContact() {
        // Handle contact form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // CSRF validation should occur here
            // Sanitize inputs
            $name = $this->sanitize($_POST['name'] ?? '');
            $email = $this->sanitize($_POST['email'] ?? '');
            $message = $this->sanitize($_POST['message'] ?? '');
            $branch = $_POST['branch'] ?? 'dhanmondi';
            
            // Insert into contact_submissions DB table using Database
            require_once __DIR__ . '/../../core/Database.php';
            $db = \Database::getConnection();
            $stmt = $db->prepare("INSERT INTO contact_submissions (name, email, message, ip_address) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $message . "\n[Branch: $branch]", $_SERVER['REMOTE_ADDR']]);
            
            // Redirect or show success
            if ($branch === 'mohakhali') {
                header('Location: ' . SITE_URL . '/contact?success_mohakhali=1');
            } else {
                header('Location: ' . SITE_URL . '/contact?success_dhanmondi=1');
            }
            exit;
        }
    }

    public function renderDynamic($page) {
        $this->render('dynamic', [
            'pageTitle' => $page['title'],
            'content' => $page['content']
        ]);
    }
}
