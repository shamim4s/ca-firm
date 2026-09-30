<?php
namespace App\Controllers;
require_once __DIR__ . '/../../core/Controller.php';

class HomeController extends Controller {
    public function index() {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $clients = $db->query("SELECT * FROM clients ORDER BY sort_order ASC")->fetchAll();

        $this->render('home', [
            'pageTitle' => 'Home - Strategic Accounting',
            'clients' => $clients
        ]);
    }

    public function newhome() {
        require_once __DIR__ . '/../../core/Database.php';
        $db = \Database::getConnection();
        $clients = $db->query("SELECT * FROM clients ORDER BY sort_order ASC")->fetchAll();

        $this->render('newhome', [
            'pageTitle' => 'New Premium Home',
            'clients' => $clients
        ]);
    }
}
