<?php $pageTitle = 'Our Members'; 

?>
<section class="bg-slate-900 py-24 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>
    
    <div class="container mx-auto px-4 md:px-10 text-center relative z-10">
        <div class="inline-block px-3 py-1 bg-blue-600/20 text-blue-300 text-xs font-bold tracking-widest uppercase rounded mb-4 border border-blue-500/30">
            Professional Network
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight">Executive Leadership</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">A highly qualified network of experts across multiple disciplines, ready to serve our clients' diverse needs globally.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4 md:px-10">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach($members as $member): ?>
            <!-- Executive Profile Card -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden group hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="h-64 overflow-hidden relative bg-slate-100 flex items-center justify-center">
                    <?php if(!empty($member['profile_image'])): ?>
                    <img src="<?= htmlspecialchars($member['profile_image']) ?>" class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-700" alt="<?= htmlspecialchars($member['name']) ?>" referrerpolicy="no-referrer">
                    <?php else: ?>
                    <span class="text-slate-400 font-semibold uppercase"><?= htmlspecialchars($member['name']) ?></span>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <div class="flex space-x-3 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                            <?php if(!empty($member['linkedin_url'])): ?>
                            <a href="<?= htmlspecialchars($member['linkedin_url']) ?>" target="_blank" class="w-8 h-8 rounded-full bg-white/20 hover:bg-blue-500 text-white flex items-center justify-center backdrop-blur-sm transition-colors">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="flex items-center text-xs font-bold text-blue-600 uppercase tracking-widest mb-2 border-b border-blue-100 pb-2 inline-block">
                        <?= htmlspecialchars($member['designation']) ?>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-1 leading-snug">
                        <a href="<?= SITE_URL ?>/members/<?= htmlspecialchars($member['id']) ?>" class="hover:text-blue-600 transition-colors"><?= htmlspecialchars($member['name']) ?></a>
                    </h3>
                    <p class="text-sm font-medium text-slate-500 mb-4"><?= htmlspecialchars($member['designation']) ?> <span class="mx-1 text-slate-300">|</span> <span class="text-slate-400"><?= htmlspecialchars($member['job_years'] ?? '1 Year') ?></span></p>
                    <p class="text-slate-600 text-sm leading-relaxed mb-6 line-clamp-3">
                        <?= nl2br(htmlspecialchars($member['bio'] ?? '')) ?>
                    </p>
                    
                    <a href="<?= SITE_URL ?>/members/<?= htmlspecialchars($member['id']) ?>" class="inline-flex items-center text-sm font-bold text-slate-800 hover:text-blue-600 transition-colors group/link mt-auto">
                        View Full Profile
                        <svg class="w-4 h-4 ml-1 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
</section>
