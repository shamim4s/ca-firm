<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Clients Management</h1>
        <p class="text-slate-500 text-sm mt-1">Manage client logos, names and hyperlinks.</p>
    </div>
    <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">Add New Client</button>
</div>

<div class="bg-white rounded shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 text-slate-600 text-sm border-b border-slate-200">
                <th class="p-4 font-semibold w-24">Logo</th>
                <th class="p-4 font-semibold">Client Name</th>
                <th class="p-4 font-semibold">Hyperlink</th>
                <th class="p-4 font-semibold w-20">Order</th>
                <th class="p-4 font-semibold text-right w-32">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            <?php if(empty($clients)): ?>
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-400">No clients found.</td>
            </tr>
            <?php else: ?>
                <?php foreach($clients as $c): ?>
                <tr class="hover:bg-slate-50">
                    <td class="p-4">
                        <?php if(!empty($c['logo'])): ?>
                            <img src="<?= htmlspecialchars($c['logo']) ?>" referrerpolicy="no-referrer" class="h-8 max-w-full object-contain" alt="Logo">
                        <?php else: ?>
                            <span class="text-slate-300 italic">None</span>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 font-medium text-slate-800"><?= htmlspecialchars($c['name']) ?></td>
                    <td class="p-4 text-blue-600 truncate max-w-xs">
                        <?php if(!empty($c['hyperlink'])): ?>
                            <a href="<?= htmlspecialchars($c['hyperlink']) ?>" target="_blank" class="hover:underline"><?= htmlspecialchars($c['hyperlink']) ?></a>
                        <?php endif; ?>
                    </td>
                    <td class="p-4 text-slate-500"><?= htmlspecialchars($c['sort_order']) ?></td>
                    <td class="p-4 text-right space-x-2">
                        <button onclick='editClient(<?= json_encode($c) ?>)' class="text-blue-600 hover:underline">Edit</button>
                        <a href="<?= SITE_URL ?>/admin/clients/delete/<?= $c['id'] ?>" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="clientModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-auto overflow-hidden flex flex-col" style="max-height: 550px;">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50 shrink-0">
            <h3 class="text-lg font-bold text-slate-800" id="modalTitle">Add Client</h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600">&times; Close</button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="<?= SITE_URL ?>/admin/clients" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="fc_id" value="">
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Company / Client Name</label>
                    <input type="text" name="name" id="fc_name" required class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                
                <div class="mb-4 p-4 border border-slate-200 rounded-lg bg-slate-50">
                    <label class="block text-sm font-semibold text-slate-800 mb-2">Logo Image</label>
                    <p class="text-xs text-slate-500 mb-3">Upload a new logo OR provide an image URL. Uploaded logo takes precedence.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Upload File</label>
                            <input type="file" name="logo_file" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Logo URL</label>
                            <input type="url" name="logo" id="fc_logo" placeholder="https://..." class="w-full border border-slate-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Hyperlink URL</label>
                    <input type="url" name="hyperlink" id="fc_hyperlink" placeholder="https://example.com" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="fc_sort_order" value="0" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded hover:bg-slate-50 transition">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">Save Client</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('clientModal').style.display = 'flex';
    document.getElementById('modalTitle').innerText = 'Add Client';
    document.getElementById('fc_id').value = '';
    document.getElementById('fc_name').value = '';
    document.getElementById('fc_logo').value = '';
    document.getElementById('fc_hyperlink').value = '';
    document.getElementById('fc_sort_order').value = '0';
}

function closeModal() {
    document.getElementById('clientModal').style.display = 'none';
}

function editClient(client) {
    document.getElementById('clientModal').style.display = 'flex';
    document.getElementById('modalTitle').innerText = 'Edit Client';
    
    document.getElementById('fc_id').value = client.id || '';
    document.getElementById('fc_name').value = client.name || '';
    document.getElementById('fc_logo').value = client.logo || '';
    document.getElementById('fc_hyperlink').value = client.hyperlink || '';
    document.getElementById('fc_sort_order').value = client.sort_order || '0';
}
</script>
