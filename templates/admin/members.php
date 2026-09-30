<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Team Members Management</h1>
        <p class="text-slate-500 text-sm mt-1">Manage organization members and hierarchy.</p>
    </div>
    <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">Add New Member</button>
</div>

<div class="bg-white rounded shadow-sm border border-slate-200 overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-50 text-slate-600 text-sm border-b border-slate-200">
                <th class="p-4 font-semibold w-12">Order</th>
                <th class="p-4 font-semibold">Name</th>
                <th class="p-4 font-semibold">Designation</th>
                <th class="p-4 font-semibold">Reports To</th>
                <th class="p-4 font-semibold text-right w-32">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
            <?php if(empty($members)): ?>
            <tr>
                <td colspan="5" class="p-8 text-center text-slate-400">No members found.</td>
            </tr>
            <?php else: ?>
                <?php foreach($members as $m): ?>
                <tr class="hover:bg-slate-50">
                    <td class="p-4 text-slate-500"><?= htmlspecialchars($m['sort_order']) ?></td>
                    <td class="p-4 font-medium text-slate-800"><?= htmlspecialchars($m['name']) ?></td>
                    <td class="p-4 text-slate-600"><?= htmlspecialchars($m['designation']) ?></td>
                    <td class="p-4 text-slate-500">
                        <?= !empty($m['parent_name']) ? htmlspecialchars($m['parent_name']) : '<span class="text-slate-300 italic">None</span>' ?>
                    </td>
                    <td class="p-4 text-right space-x-2">
                        <button onclick='editMember(<?= json_encode($m) ?>)' class="text-blue-600 hover:underline">Edit</button>
                        <a href="<?= SITE_URL ?>/admin/members/delete/<?= $m['id'] ?>" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="memberModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-lg mx-auto overflow-hidden flex flex-col" style="max-height: 550px;">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50 shrink-0">
            <h3 class="text-lg font-bold text-slate-800" id="modalTitle">Add Member</h3>
            <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600">&times; Close</button>
        </div>
        <div class="p-6 overflow-y-auto">
            <form action="<?= SITE_URL ?>/admin/members" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="fm_id" value="">
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Name</label>
                    <input type="text" name="name" id="fm_name" required class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Designation</label>
                    <input type="text" name="designation" id="fm_designation" required class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-4 p-4 border border-slate-200 rounded-lg bg-slate-50">
                    <label class="block text-sm font-semibold text-slate-800 mb-2">Profile Image</label>
                    <p class="text-xs text-slate-500 mb-3">Upload a new image OR provide an image URL (e.g. from LinkedIn). Uploaded image takes precedence.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Upload File</label>
                            <input type="file" name="profile_image_file" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-700 mb-1">Image URL</label>
                            <input type="url" name="profile_image" id="fm_profile_image" placeholder="https://..." class="w-full border border-slate-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Job Years</label>
                        <input type="text" name="job_years" id="fm_job_years" placeholder="e.g. 2018 - Present" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Color Theme</label>
                        <select name="color_theme" id="fm_color_theme" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="blue">Blue</option>
                            <option value="pink">Pink</option>
                            <option value="red">Red</option>
                            <option value="green">Green</option>
                            <option value="amber">Amber</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Reports To (Parent / Leader)</label>
                    <select name="parent_id" id="fm_parent_id" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="">-- No Parent (Top Level) --</option>
                        <?php foreach($parents as $p): ?>
                            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-1">LinkedIn URL</label>
                    <input type="url" name="linkedin_url" id="fm_linkedin_url" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-slate-700 mb-1">Sort Order</label>
                    <input type="number" name="sort_order" id="fm_sort_order" value="0" class="w-full border border-slate-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 border border-slate-300 text-slate-600 rounded hover:bg-slate-50 transition">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">Save Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('memberModal').style.display = 'flex';
    document.getElementById('modalTitle').innerText = 'Add Member';
    document.getElementById('fm_id').value = '';
    document.getElementById('fm_name').value = '';
    document.getElementById('fm_designation').value = '';
    document.getElementById('fm_profile_image').value = '';
    document.getElementById('fm_job_years').value = '';
    document.getElementById('fm_color_theme').value = 'blue';
    document.getElementById('fm_parent_id').value = '';
    document.getElementById('fm_linkedin_url').value = '';
    document.getElementById('fm_sort_order').value = '0';
}

function closeModal() {
    document.getElementById('memberModal').style.display = 'none';
}

function editMember(member) {
    document.getElementById('memberModal').style.display = 'flex';
    document.getElementById('modalTitle').innerText = 'Edit Member';
    
    document.getElementById('fm_id').value = member.id || '';
    document.getElementById('fm_name').value = member.name || '';
    document.getElementById('fm_designation').value = member.designation || '';
    document.getElementById('fm_profile_image').value = member.profile_image || '';
    document.getElementById('fm_job_years').value = member.job_years || '';
    document.getElementById('fm_color_theme').value = member.color_theme || 'blue';
    document.getElementById('fm_parent_id').value = member.parent_id || '';
    document.getElementById('fm_linkedin_url').value = member.linkedin_url || '';
    document.getElementById('fm_sort_order').value = member.sort_order || '0';
}
</script>
