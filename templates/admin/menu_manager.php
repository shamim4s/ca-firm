<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
        <div>
            <h1 class="text-xl font-bold text-[#111827]">Menu Manager</h1>
            <p class="text-sm text-slate-500">Add, edit, reorder, and remove public navigation links.</p>
        </div>
        <button onclick="saveMenu()" class="bg-[#1c3f94] hover:bg-blue-800 text-white font-medium py-2 px-6 rounded-[8px] transition-colors text-[13px] tracking-wide uppercase flex items-center shadow-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
            Save Menu
        </button>
    </div>
    
    <div class="p-8">
        <p class="text-[11px] text-[#1c3f94] mb-6 font-bold uppercase tracking-widest bg-blue-50 py-2 px-4 rounded inline-block">Drag to Reorder Links</p>
        
        <div id="menu-list" class="space-y-3 mb-8">
            <!-- Render list here -->
        </div>

        <button onclick="addLink()" class="flex items-center text-sm font-bold text-[#1c3f94] hover:text-blue-800 border-2 border-dashed border-blue-200 hover:border-[#1c3f94] rounded-[12px] px-4 py-4 w-full justify-center bg-transparent transition-colors uppercase tracking-wide">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Link
        </button>
    </div>
</div>

<script>
let menuLinks = <?= json_encode($menuLinks ?? []) ?>;

function renderList() {
    const container = document.getElementById('menu-list');
    container.innerHTML = '';
    
    menuLinks.forEach((link, index) => {
        const item = document.createElement('div');
        item.className = 'flex items-center gap-4 bg-white border border-slate-200 p-4 rounded-[12px] shadow-sm group hover:border-[#1c3f94] transition-colors';
        item.draggable = true;
        
        // Drag functionality
        item.addEventListener('dragstart', (e) => {
            e.dataTransfer.setData('text/plain', index);
            setTimeout(() => item.classList.add('opacity-50', 'bg-blue-50'), 0);
        });
        item.addEventListener('dragend', () => item.classList.remove('opacity-50', 'bg-blue-50'));
        item.addEventListener('dragover', (e) => e.preventDefault());
        item.addEventListener('drop', (e) => {
            e.preventDefault();
            const fromIndex = parseInt(e.dataTransfer.getData('text/plain'));
            const toIndex = index;
            if (fromIndex !== toIndex) {
                const moved = menuLinks.splice(fromIndex, 1)[0];
                menuLinks.splice(toIndex, 0, moved);
                renderList();
            }
        });

        item.innerHTML = `
            <div class="cursor-move text-slate-300 group-hover:text-[#1c3f94] px-1 hover:bg-slate-50 p-2 rounded transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path></svg>
            </div>
            <div class="flex-1 grid grid-cols-2 gap-4">
                <input type="text" value="${escapeHtml(link.title)}" onchange="updateLink(${index}, 'title', this.value)" class="w-full px-4 py-2 border border-slate-200 rounded-[8px] text-sm focus:border-[#1c3f94] focus:ring-1 focus:ring-[#1c3f94] outline-none transition-shadow" placeholder="Link Title">
                <input type="text" value="${escapeHtml(link.url)}" onchange="updateLink(${index}, 'url', this.value)" class="w-full px-4 py-2 border border-slate-200 rounded-[8px] text-sm focus:border-[#1c3f94] focus:ring-1 focus:ring-[#1c3f94] outline-none transition-shadow text-slate-500" placeholder="Link URL (e.g. /about)">
            </div>
            <button onclick="removeLink(${index})" class="text-red-400 hover:text-red-600 p-2 rounded-full hover:bg-red-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </button>
        `;
        container.appendChild(item);
    });
}

function updateLink(index, field, value) {
    if (menuLinks[index]) {
        menuLinks[index][field] = value;
    }
}

function addLink() {
    menuLinks.push({ title: 'New Link', url: '/', activePath: '/' });
    renderList();
}

function removeLink(index) {
    if(confirm('Are you sure you want to remove this link?')) {
        menuLinks.splice(index, 1);
        renderList();
    }
}

function escapeHtml(str) {
    if(!str) return '';
    return String(str)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function saveMenu() {
    fetch('<?= SITE_URL ?>/admin/menu', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(menuLinks)
    })
    .then(r => r.json())
    .then(data => {
        if(data.success) {
            alert('Menu saved successfully!');
        } else {
            alert('Failed to save menu.');
        }
    })
    .catch(err => {
        alert('An error occurred while saving.');
    });
}

document.addEventListener('DOMContentLoaded', renderList);
</script>
