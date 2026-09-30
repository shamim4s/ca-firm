<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - CA Firm CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-sm border border-slate-200">
        <div class="text-center mb-8">
            <div class="w-12 h-12 bg-blue-900 mx-auto flex items-center justify-center rounded mb-3">
                <span class="text-white font-bold text-lg">AQC</span>
            </div>
            <h1 class="text-2xl font-bold text-slate-800">Admin Portal</h1>
            <p class="text-xs text-slate-500 mt-1">Sign in to manage your CMS</p>
        </div>

        <?php if(!empty($error)): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded text-sm mb-4"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= SITE_URL ?>/admin/login" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wide">Email</label>
                <input type="email" name="email" required class="w-full px-3 py-2 border border-slate-300 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none text-sm">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1 uppercase tracking-wide">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border border-slate-300 rounded focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none text-sm">
            </div>
            <button type="submit" class="w-full bg-blue-900 text-white font-bold py-2 rounded hover:bg-blue-800 transition-colors mt-2 text-sm">Sign In</button>
        </form>
        
        <div class="mt-6 text-center">
             <a href="<?= SITE_URL ?>/" class="text-xs text-blue-600 hover:underline">← Back to Website</a>
        </div>
    </div>
</body>
</html>
