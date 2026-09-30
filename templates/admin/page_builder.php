<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col h-[calc(100vh-8rem)]">
    <div class="px-6 py-4 border-b border-slate-200 flex justify-between items-center bg-slate-50">
        <div>
            <h1 class="text-xl font-bold text-slate-800">Page Builder</h1>
            <p class="text-sm text-slate-500">Drag and drop sections to construct your page. Click a section to configure.</p>
        </div>
        <div class="flex space-x-3 items-center">
            <select id="page-selector" class="border border-slate-300 rounded px-4 py-2 text-sm focus:ring-blue-500 focus:border-blue-500 bg-white" onchange="loadPage(this.value)">
                <?php if(!empty($pages)): foreach($pages as $p): ?>
                    <option value="<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?></option>
                <?php endforeach; else: ?>
                    <option value="home">Home Page</option>
                <?php endif; ?>
            </select>
            
            <button onclick="createNewPage()" class="text-slate-600 hover:text-blue-600 font-medium px-2 py-2 title='Create New Page'">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            </button>

            <button onclick="savePage()" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded transition-colors text-sm flex items-center shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                Publish Changes
            </button>
        </div>
    </div>

    <div class="flex flex-1 overflow-hidden">
        <!-- Sidebar: Available Components -->
        <div class="w-64 bg-slate-50 border-r border-slate-200 p-4 overflow-y-auto shrink-0 space-y-4" id="component-library">
            <h3 class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Available Sections</h3>
            
            <div draggable="true" ondragstart="dragStart(event)" data-type="hero" class="bg-white p-3 rounded border border-slate-200 cursor-move hover:border-blue-500 hover:shadow-sm transition-all flex items-center group">
                <div class="w-8 h-8 rounded bg-blue-50 text-blue-600 flex items-center justify-center mr-3 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <div class="text-sm font-medium text-slate-700">Hero Slideshow</div>
            </div>

            <div draggable="true" ondragstart="dragStart(event)" data-type="text_image" class="bg-white p-3 rounded border border-slate-200 cursor-move hover:border-blue-500 hover:shadow-sm transition-all flex items-center group">
                <div class="w-8 h-8 rounded bg-emerald-50 text-emerald-600 flex items-center justify-center mr-3 group-hover:bg-emerald-600 group-hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div class="text-sm font-medium text-slate-700">Text & Image</div>
            </div>

            <div draggable="true" ondragstart="dragStart(event)" data-type="features_grid" class="bg-white p-3 rounded border border-slate-200 cursor-move hover:border-blue-500 hover:shadow-sm transition-all flex items-center group">
                <div class="w-8 h-8 rounded bg-purple-50 text-purple-600 flex items-center justify-center mr-3 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                </div>
                <div class="text-sm font-medium text-slate-700">Features Grid</div>
            </div>
            
            <div draggable="true" ondragstart="dragStart(event)" data-type="stats_bar" class="bg-white p-3 rounded border border-slate-200 cursor-move hover:border-blue-500 hover:shadow-sm transition-all flex items-center group">
                <div class="w-8 h-8 rounded bg-amber-50 text-amber-600 flex items-center justify-center mr-3 group-hover:bg-amber-600 group-hover:text-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                </div>
                <div class="text-sm font-medium text-slate-700">Statistics Bar</div>
            </div>
        </div>

        <!-- Canvas Area -->
        <div class="flex-1 overflow-y-auto bg-slate-100 p-8 relative" id="builder-canvas">
            <div id="drop-zone" class="min-h-full max-w-4xl mx-auto space-y-4" ondragover="dragOver(event)" ondrop="drop(event)">
                <!-- Blocks will be dropped here -->
                <div class="border-2 border-dashed border-slate-300 rounded-xl p-12 text-center flex flex-col items-center justify-center text-slate-400" id="empty-state">
                    <svg class="w-12 h-12 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    <p class="font-medium text-lg text-slate-500">Drag sections here to start building</p>
                    <p class="text-sm mt-1">Reorder blocks by dragging them up or down.</p>
                </div>
            </div>
        </div>

        <!-- Configuration Sidebar -->
        <div class="w-80 bg-white border-l border-slate-200 p-6 overflow-y-auto shrink-0 flex flex-col shadow-[-4px_0_15px_-3px_rgba(0,0,0,0.05)]" id="config-panel" style="display:none;">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-slate-100">
                <h3 class="font-bold text-slate-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Settings
                </h3>
                <button onclick="closeConfig()" class="text-slate-400 hover:text-slate-700 bg-slate-100 hover:bg-slate-200 p-1.5 rounded-full transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div id="config-form" class="space-y-4 flex-1">
                <!-- Config fields will be injected here -->
            </div>
            <div class="mt-8 pt-4 border-t border-slate-100">
                <button onclick="removeSelectedBlock()" class="w-full py-2.5 px-4 bg-red-50 text-red-600 hover:bg-red-100 font-medium rounded-lg transition-colors flex items-center justify-center text-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    Remove Section
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// --- Lightweight Drag & Drop Page Builder Core ---

let draggedType = null;
let selectedBlock = null;

function dragStart(e) {
    draggedType = e.target.getAttribute('data-type');
    e.dataTransfer.setData('text/plain', draggedType);
    e.dataTransfer.effectAllowed = 'copy';
}

function dragOver(e) {
    e.preventDefault();
    e.dataTransfer.dropEffect = 'copy';
}

function drop(e) {
    e.preventDefault();
    const type = e.dataTransfer.getData('text/plain');
    if (!type) return;

    document.getElementById('empty-state').style.display = 'none';

    // Create the block container
    const block = document.createElement('div');
    block.className = 'group relative bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm hover:ring-2 hover:ring-blue-500 hover:border-blue-500 cursor-pointer transition-all';
    block.dataset.type = type;
    block.onclick = (event) => selectBlock(event, block);

    // Initial content based on type
    block.innerHTML = renderBlockPreview(type);
    
    // Default config data
    block.dataset.config = JSON.stringify(getDefaultConfig(type));

    // Append to canvas
    document.getElementById('drop-zone').appendChild(block);
}

function renderBlockPreview(type, config = null) {
    // Generate a visual representation of the block for the canvas
    const conf = config || getDefaultConfig(type);
    
    // Add overlay mask to prevent interacting with inner elements in builder mode
    const overlay = '<div class="absolute inset-0 z-10 pointer-events-none"></div>';
    // Add dragged handle
    const handle = '<div class="absolute top-2 right-2 bg-white rounded shadow-sm border border-slate-200 p-1 opacity-0 group-hover:opacity-100 transition-opacity z-20 text-slate-400 hover:text-slate-700"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9h8M8 15h8"></path></svg></div>';
    
    let html = '';
    
    switch(type) {
        case 'hero':
            html = `<div class="bg-[#1c3f94] text-white p-8 md:p-14 relative flex items-center min-h-[300px]">
                        <div class="max-w-xl relative z-10">
                            <span class="inline-block px-4 py-1.5 bg-white/10 rounded-full text-[10px] font-bold tracking-widest uppercase mb-6 border border-white/20">${conf.badge}</span>
                            <h2 class="text-4xl md:text-[52px] font-bold mb-6 leading-tight">${conf.title}</h2>
                            <p class="text-blue-100 text-lg mb-8 font-light">${conf.subtitle}</p>
                            <div class="flex flex-wrap gap-4">
                                <span class="bg-white text-[#1c3f94] px-6 py-3 rounded-[12px] font-bold uppercase tracking-wide text-[12px] shadow-sm">${conf.primaryButton}</span>
                                <span class="border border-white/30 text-white px-6 py-3 rounded-[12px] font-bold uppercase tracking-wide text-[12px] hover:bg-white/10">${conf.secondaryButton}</span>
                            </div>
                        </div>
                        <div class="absolute inset-y-0 right-0 w-1/2 bg-cover bg-center" style="background-image: url('${conf.image}'); clip-path: polygon(15% 0, 100% 0, 100% 100%, 0% 100%); opacity: 0.7"></div>
                    </div>`;
            break;
        case 'stats_bar':
            html = `<div class="bg-[#f0f4f8] py-12 px-6 flex flex-wrap justify-around gap-8 border-y border-blue-100">
                        ${conf.stats.map(s => `
                            <div class="text-center flex-1 min-w-[120px]">
                                <div class="text-[40px] font-bold text-[#1c3f94] mb-2 leading-none">${s.value}</div>
                                <div class="text-[11px] text-slate-500 uppercase tracking-widest font-bold">${s.label}</div>
                            </div>
                        `).join('')}
                    </div>`;
            break;
        case 'text_image':
            html = `<div class="p-8 md:p-16 flex flex-col md:flex-row ${conf.imagePosition === 'right' ? '' : 'md:flex-row-reverse'} items-center gap-12 bg-white">
                        <div class="flex-1 space-y-6">
                            <span class="text-[11px] font-bold text-[#1c3f94] uppercase tracking-widest border-b border-[#1c3f94] pb-1">${conf.subtitle}</span>
                            <h3 class="text-3xl md:text-[40px] font-bold text-[#111827] leading-tight">${conf.title}</h3>
                            <p class="text-slate-600 text-[16px] leading-relaxed font-light">${conf.content}</p>
                        </div>
                        <div class="flex-1 w-full">
                            <div class="bg-slate-200 aspect-square md:aspect-[4/3] rounded-[20px] bg-cover bg-center overflow-hidden border border-slate-100 shadow-sm" style="background-image: url('${conf.image}')"></div>
                        </div>
                    </div>`;
            break;
        case 'features_grid':
            html = `<div class="p-8 md:p-16 bg-[#fafafa] text-center border-y border-slate-100">
                        <h3 class="text-3xl md:text-[40px] font-bold mb-12 text-[#111827]">${conf.title}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                            ${conf.features.map(f => `
                                <div class="bg-white border border-slate-200 rounded-[24px] p-8 hover:shadow-sm transition-shadow">
                                    <div class="w-14 h-14 bg-[#f0f4f8] text-[#1c3f94] rounded-[16px] flex items-center justify-center mb-6">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    </div>
                                    <h4 class="font-bold text-[#111827] text-[18px] mb-3">${f.title}</h4>
                                    <p class="text-[15px] font-light text-slate-500 leading-relaxed">${f.desc}</p>
                                </div>
                            `).join('')}
                        </div>
                    </div>`;
            break;
    }
    
    return overlay + handle + html;
}

function getDefaultConfig(type) {
    switch(type) {
        case 'hero': return { title: 'Excellence in Audit, Tax & Advisory', subtitle: 'Zahur Mostafiz & Co. provides tailored professional services to help businesses navigate complex financial landscapes.', badge: 'ESTABLISHED EXPERTISE SINCE 1990', primaryButton: 'Explore Services', secondaryButton: 'Our Firm', image: 'https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&q=80&w=1000' };
        case 'stats_bar': return { stats: [{label: 'Firm Experience', value: '30+'}, {label: 'Professional Staff', value: '100+'}, {label: 'Clients Served', value: '500+'}] };
        case 'text_image': return { title: '"Nurturing Trust Through Professional Excellence."', subtitle: 'LEADERSHIP VOICE', content: 'Our philosophy is built on a foundation of trust. In the world of accounting and audit, integrity is not just a requirement. As we navigate complexities, we provide clarity.', imagePosition: 'left', image: 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=800' };
        case 'features_grid': return { title: 'Comprehensive Financial Solutions', features: [{title: 'Audit & Assurance', desc: 'Delivering high-quality audits'}, {title: 'Taxation Compliance', desc: 'Expert guidance on tax planning'}, {title: 'Financial Advisory', desc: 'Strategic advice on corporate finance'}] };
    }
}

function selectBlock(e, block) {
    if (selectedBlock) {
        selectedBlock.classList.remove('ring-2', 'ring-blue-500', 'border-blue-500');
    }
    selectedBlock = block;
    selectedBlock.classList.add('ring-2', 'ring-blue-500', 'border-blue-500');
    
    const config = JSON.parse(block.dataset.config);
    const type = block.dataset.type;
    
    renderConfigForm(type, config);
    document.getElementById('config-panel').style.display = 'flex';
}

function renderConfigForm(type, config) {
    const form = document.getElementById('config-form');
    let html = '';
    
    // Quick helper to generate inputs
    const input = (key, label, val, type='text') => `
        <div class="mb-4">
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">${label}</label>
            ${type==='textarea' ? 
              `<textarea class="w-full border border-slate-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow" rows="3" onchange="updateConfig('${key}', this.value)">${val}</textarea>` :
              `<input type="${type}" value="${val.replace(/"/g, '&quot;')}" class="w-full border border-slate-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-blue-500 focus:border-blue-500 outline-none transition-shadow" onchange="updateConfig('${key}', this.value)">`
            }
        </div>
    `;

    if (type === 'hero') {
        html += input('badge', 'Top Badge', config.badge);
        html += input('title', 'Headline', config.title);
        html += input('subtitle', 'Sub Headline', config.subtitle, 'textarea');
        html += input('primaryButton', 'Primary Button', config.primaryButton);
        html += input('secondaryButton', 'Secondary Button', config.secondaryButton);
        html += input('image', 'Image URL', config.image);
    } 
    else if (type === 'text_image') {
        html += input('subtitle', 'Small Subtitle', config.subtitle);
        html += input('title', 'Main Title', config.title);
        html += input('content', 'Body Content', config.content, 'textarea');
        html += `
        <div class="mb-4">
            <label class="block text-xs font-bold text-slate-700 uppercase tracking-wide mb-1.5">Image Position</label>
            <select class="w-full border border-slate-300 rounded px-3 py-2 text-sm focus:ring-1 focus:ring-blue-500 outline-none" onchange="updateConfig('imagePosition', this.value)">
                <option value="left" ${config.imagePosition === 'left' ? 'selected' : ''}>Left Side</option>
                <option value="right" ${config.imagePosition === 'right' ? 'selected' : ''}>Right Side</option>
            </select>
        </div>`;
        html += input('image', 'Image URL', config.image);
    }
    // Simple implementation for stats and features (could use a list editor in a real app)
    else if (type === 'features_grid') {
        html += input('title', 'Section Title', config.title);
        html += `<p class="text-xs text-slate-500 bg-slate-50 p-2 rounded border border-slate-200">(Advanced configuration of grid items is simplified for preview)</p>`;
    }
    else {
        html += `<p class="text-xs text-slate-500">Configuration specific to ${type}</p>`;
    }

    form.innerHTML = html;
}

window.updateConfig = function(key, value) {
    if (!selectedBlock) return;
    let config = JSON.parse(selectedBlock.dataset.config);
    config[key] = value;
    selectedBlock.dataset.config = JSON.stringify(config);
    // Re-render preview
    selectedBlock.innerHTML = renderBlockPreview(selectedBlock.dataset.type, config);
}

window.closeConfig = function() {
    document.getElementById('config-panel').style.display = 'none';
    if (selectedBlock) {
        selectedBlock.classList.remove('ring-2', 'ring-blue-500', 'border-blue-500');
        selectedBlock = null;
    }
}

window.removeSelectedBlock = function() {
    if(selectedBlock) {
        selectedBlock.remove();
        closeConfig();
        if(document.getElementById('drop-zone').children.length === 1) {
             document.getElementById('empty-state').style.display = 'flex';
        }
    }
}

let currentSlug = document.getElementById('page-selector').value;

window.loadPage = async function(slug) {
    currentSlug = slug;
    document.getElementById('drop-zone').innerHTML = `
        <div class="border-2 border-dashed border-slate-300 rounded-xl p-12 text-center flex flex-col items-center justify-center text-slate-400" id="empty-state">
            <svg class="w-12 h-12 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
            <p class="font-medium text-lg text-slate-500">Drag sections here to start building</p>
            <p class="text-sm mt-1">Reorder blocks by dragging them up or down.</p>
        </div>`;
    
    closeConfig();
    if(slug === 'home' || !slug) return;
    
    try {
        const res = await fetch('<?= SITE_URL ?>/admin/pages/api?slug=' + slug);
        const data = await res.json();
        if(data && data.blocks && data.blocks.length > 0) {
            document.getElementById('empty-state').style.display = 'none';
            data.blocks.forEach(b => {
                const block = document.createElement('div');
                block.className = 'group relative bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm hover:ring-2 hover:ring-blue-500 hover:border-blue-500 cursor-pointer transition-all';
                block.dataset.type = b.type;
                block.onclick = (event) => selectBlock(event, block);
                block.innerHTML = renderBlockPreview(b.type, b.config);
                block.dataset.config = JSON.stringify(b.config);
                document.getElementById('drop-zone').appendChild(block);
            });
        }
    } catch(e) { console.error(e); }
}

// Initial load
if(currentSlug && currentSlug !== 'home') setTimeout(() => window.loadPage(currentSlug), 100);

window.createNewPage = function() {
    let title = prompt("Enter new page title:");
    if (!title) return;
    let slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
    let sel = document.getElementById('page-selector');
    let opt = document.createElement('option');
    opt.value = slug;
    opt.text = title;
    opt.selected = true;
    sel.appendChild(opt);
    currentSlug = slug;
    window.loadPage(slug); // will reset the canvas
}

window.savePage = async function() {
    if(!currentSlug || currentSlug === 'home') {
        alert('Cannot overwrite hardcoded home page in this demo.');
        return;
    }
    const blocks = [];
    let title = document.getElementById('page-selector').options[document.getElementById('page-selector').selectedIndex].text;
    
    let htmlContent = '';
    const dropZone = document.getElementById('drop-zone');
    Array.from(dropZone.children).forEach(child => {
        if (child.id === 'empty-state') return;
        const type = child.dataset.type;
        const config = JSON.parse(child.dataset.config);
        blocks.push({type, config});
        
        // Strip out the builder overlays
        let previewHtml = renderBlockPreview(type, config);
        previewHtml = previewHtml.replace(/<div class="absolute inset-0 z-10 pointer-events-none"><\/div>/g, '');
        previewHtml = previewHtml.replace(/<div class="absolute top-2 right-2[^>]*>.*?<\/div>/g, '');
        htmlContent += previewHtml;
    });

    try {
        const res = await fetch('<?= SITE_URL ?>/admin/pages/save', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                title: title,
                slug: currentSlug,
                html: htmlContent,
                blocks: blocks
            })
        });
        const data = await res.json();
        if(data.success) {
            alert('Page successfully saved and published!');
        } else {
            alert('Failed to save page.');
        }
    } catch(e) {
        alert('Error saving page.');
    }
}

</script>
