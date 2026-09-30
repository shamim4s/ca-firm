<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Simple rich Text editor minimal CSS -->
</head>
<body class="bg-slate-100 text-slate-800 flex h-screen overflow-hidden text-sm">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#1c3f94] text-white flex flex-col h-full shrink-0">
        <div class="h-16 flex items-center px-6 border-b border-blue-800">
            <span class="font-bold text-lg tracking-wide uppercase">Zahur Mostafiz <span class="font-light">CMS</span></span>
        </div>
        <nav class="flex-1 py-6 overflow-y-auto space-y-1">
            <a href="<?= SITE_URL ?>/admin/dashboard" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Dashboard
            </a>
            <a href="<?= SITE_URL ?>/admin/pages" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Pages Builder
            </a>
            <a href="<?= SITE_URL ?>/admin/menu" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Menu Manager
            </a>
            <a href="<?= SITE_URL ?>/admin/services" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Services
            </a>
            <a href="<?= SITE_URL ?>/admin/members" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Team Members
            </a>
            <a href="<?= SITE_URL ?>/admin/clients" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Clients
            </a>
            <a href="<?= SITE_URL ?>/admin/blog" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Blog Insights
            </a>
            <a href="<?= SITE_URL ?>/admin/contacts" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Contact Submissions
            </a>
            <a href="<?= SITE_URL ?>/admin/settings" class="flex items-center px-6 py-2.5 text-blue-200 hover:text-white hover:bg-blue-800 transition-colors">
                Settings
            </a>
        </nav>
        <div class="p-6 border-t border-blue-800">
            <div class="text-xs text-blue-200 mb-2">Logged in as <?= htmlspecialchars($_SESSION['admin_user']['name'] ?? 'Admin') ?></div>
            <a href="<?= SITE_URL ?>/admin/logout" class="block w-full text-center bg-blue-800 text-white py-2 border border-blue-700/50 rounded hover:border-blue-600 transition-colors">Log Out</a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col h-full bg-slate-50 overflow-hidden">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shadow-sm flex-none">
            <h2 class="text-xl font-bold text-slate-800 flex items-center">
                Dashboard
            </h2>
            <div class="flex space-x-4 items-center">
                <span class="text-xs font-semibold px-2 py-1 bg-emerald-100 text-emerald-700 rounded-md">Live Platform</span>
                <a href="<?= SITE_URL ?>" target="_blank" class="text-blue-600 font-medium hover:underline flex items-center text-sm border border-slate-200 px-3 py-1.5 rounded bg-slate-50 hover:bg-slate-100 shadow-sm transition-colors">
                    View Live Site <svg class="w-4 h-4 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                </a>
            </div>
        </header>

        <div class="flex-1 overflow-auto bg-slate-50">
            <!-- Ensure inner container takes full height if flex -->
            <div class="p-8 h-full"> 
                <?php require $file; ?>
            </div>
        </div>
    </main>

</body>
</html>
