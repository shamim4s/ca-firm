<?php 
$pageTitle = htmlspecialchars($member['name']) . ' - Member Profile'; 
?>
<section class="bg-[#1c3f94] py-16">
    <div class="container mx-auto px-4 md:px-10">
        <a href="<?= SITE_URL ?>/members" class="text-blue-200 text-sm hover:underline inline-flex items-center mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Team
        </a>
    </div>
</section>

<section class="py-16 bg-slate-50 relative -mt-32 z-10">
    <div class="container mx-auto px-4 md:px-10 max-w-5xl">
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row">
            <div class="md:w-1/3 bg-slate-100 flex-shrink-0 flex items-center justify-center p-8 bg-cover bg-center" style="min-height: 400px; background-image: url('<?= !empty($member['profile_image']) ? htmlspecialchars($member['profile_image']) : '' ?>')">
                <?php if(empty($member['profile_image'])): ?>
                    <span class="text-slate-400 text-4xl font-bold uppercase"><?= htmlspecialchars(substr($member['name'], 0, 1)) ?></span>
                <?php endif; ?>
            </div>
            <div class="p-8 md:p-12 md:w-2/3 flex flex-col justify-center">
                <div class="mb-2">
                    <span class="inline-block px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold uppercase tracking-widest rounded mb-3">
                        <?= htmlspecialchars($member['designation']) ?>
                    </span>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-slate-900 mb-2"><?= htmlspecialchars($member['name']) ?></h1>
                
                <?php if(!empty($member['job_years'])): ?>
                <p class="text-lg text-slate-500 font-light mb-6"><?= htmlspecialchars($member['job_years']) ?></p>
                <?php endif; ?>
                
                <div class="prose max-w-none text-slate-600 font-light mb-8 pt-6 border-t border-slate-100">
                    <?= nl2br(htmlspecialchars($member['bio'] ?? 'Detailed biography not available at the moment. Our team members are dedicated professionals committed to delivering excellence.')) ?>
                </div>
                
                <?php if(!empty($member['linkedin_url'])): ?>
                <div class="mt-auto">
                    <a href="<?= htmlspecialchars($member['linkedin_url']) ?>" target="_blank" class="inline-flex items-center text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors group">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        Connect on LinkedIn
                        <svg class="w-4 h-4 ml-1 opacity-0 group-hover:opacity-100 -translate-x-2 group-hover:translate-x-0 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
