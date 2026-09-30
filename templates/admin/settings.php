<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
        <h2 class="text-lg font-bold text-slate-800">General Settings</h2>
    </div>
    
    <div class="p-6">
        <?php if (isset($_SESSION['flash_success'])): ?>
            <div class="bg-emerald-50 text-emerald-700 p-4 rounded-lg mb-6 text-sm font-medium border border-emerald-100">
                <?= htmlspecialchars($_SESSION['flash_success']) ?>
                <?php unset($_SESSION['flash_success']); ?>
            </div>
        <?php endif; ?>

        <form action="<?= SITE_URL ?>/admin/settings" method="POST" class="space-y-6 max-w-3xl">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Google Review JSON URL</label>
                <input type="text" name="google_review_json_url" value="<?= htmlspecialchars($settings['google_review_json_url'] ?? '') ?>" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-500">The URL to the raw JSON file containing your Google Reviews.</p>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Write a Review URL</label>
                <input type="text" name="write_a_review_url" value="<?= htmlspecialchars($settings['write_a_review_url'] ?? '') ?>" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-500">The Google Maps link where customers can leave a new review.</p>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Google Map Location URL</label>
                <input type="text" name="google_map_location_url" value="<?= htmlspecialchars($settings['google_map_location_url'] ?? '') ?>" class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <p class="mt-1 text-xs text-slate-500">The Google Maps link to your firm's location.</p>
            </div>
            
            <div class="pt-4 border-t border-slate-100">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition-colors">
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
