<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col">
    <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Contact Submissions</h1>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200">
                    <th class="py-3 px-6 font-semibold text-slate-600 text-sm">Date</th>
                    <th class="py-3 px-6 font-semibold text-slate-600 text-sm">Name</th>
                    <th class="py-3 px-6 font-semibold text-slate-600 text-sm">Email</th>
                    <th class="py-3 px-6 font-semibold text-slate-600 text-sm">Message</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <?php if(!empty($contacts)): foreach($contacts as $c): ?>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="py-3 px-6 text-sm text-slate-500 whitespace-nowrap"><?= htmlspecialchars(date('M d, Y h:ia', strtotime($c['created_at']))) ?></td>
                    <td class="py-3 px-6 text-sm font-medium text-slate-800"><?= htmlspecialchars($c['name']) ?></td>
                    <td class="py-3 px-6 text-sm text-slate-600"><?= htmlspecialchars($c['email']) ?></td>
                    <td class="py-3 px-6 text-sm text-slate-600 max-w-md truncate" title="<?= htmlspecialchars($c['message']) ?>"><?= nl2br(htmlspecialchars($c['message'])) ?></td>
                </tr>
                <?php endforeach; else: ?>
                <tr><td colspan="4" class="py-8 text-center text-slate-500">No contact submissions found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
