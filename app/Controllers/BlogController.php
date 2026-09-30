<?php
namespace App\Controllers;
require_once __DIR__ . '/../../core/Controller.php';

class BlogController extends Controller {
    public function index() {
        $this->render('blog', [
            'pageTitle' => 'Insights & News'
        ]);
    }

    public function show($slug) {
        // Mock data
        $title = ucfirst(str_replace('-', ' ', $slug));
        $desc = "Read our comprehensive guide and expert insights on $title.";
        $metaTags = "
            <meta name=\"description\" content=\"$desc\">
            <meta property=\"og:title\" content=\"$title - Insights\">
            <meta property=\"og:description\" content=\"$desc\">
            <meta property=\"og:type\" content=\"article\">
        ";
        $this->render('blog_detail', [
            'pageTitle' => $title,
            'slug' => $slug,
            'metaTags' => $metaTags
        ]);
    }
}
