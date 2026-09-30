<?php 
// Mocking post data
$post = [
    'title' => isset($pageTitle) && $pageTitle !== 'Insight Details' ? $pageTitle : 'Implications of the New VAT Framework on E-Commerce',
    'featured_image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1200&auto=format&fit=crop',
    'date' => 'March 15, 2024',
    'author' => [
        'name' => 'Robert Fox, FCCA',
        'role' => 'Tax Partner',
        'avatar' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=100&h=100&auto=format&fit=crop'
    ],
    'categories' => ['Tax Advisory', 'Regulatory Compliance'],
    'tags' => ['VAT', 'E-Commerce', 'Tax Strategy', 'Cross-Border'],
    'content' => '
        <p class="lead text-xl text-slate-600 mb-8 leading-relaxed">The recent regulatory overhaul places significant compliance burdens on cross-border transactions. Our experts break down the necessary operational adjustments required for multinational e-commerce retailers.</p>
        
        <h2 class="text-2xl font-bold text-slate-800 mt-10 mb-4">Understanding the Paradigm Shift</h2>
        <p class="text-slate-600 mb-6 leading-relaxed">For years, e-commerce entities enjoyed relatively lenient structures regarding cross-border Value Added Tax (VAT). However, the new framework shifts the burden of collection and remittance squarely onto the marketplaces and direct-to-consumer platforms themselves.</p>
        
        <p class="text-slate-600 mb-6 leading-relaxed">This means that instead of relying on the end-consumer to pay import VAT upon delivery, sellers must now register, calculate, and remit these taxes at the point of sale.</p>
        
        <blockquote class="border-l-4 border-blue-600 pl-6 my-8 italic text-slate-700 bg-slate-50 py-4 pr-4 rounded-r-lg">
            "Failing to integrate the new VAT calculation engines won\'t just lead to fines—it will result in blocked shipments and a total breakdown of the customer experience." <br><span class="block mt-2 font-bold not-italic text-sm text-slate-800">— Robert Fox, Tax Partner</span>
        </blockquote>
        
        <h2 class="text-2xl font-bold text-slate-800 mt-10 mb-4">Key Compliance Milestones</h2>
        <ul class="list-disc pl-5 text-slate-600 mb-6 space-y-2">
            <li><strong>Immediate Audit:</strong> Assess current transaction volumes per jurisdiction to see where thresholds are met.</li>
            <li><strong>Systems Update:</strong> Integrate dynamic tax calculation tools into the checkout flow.</li>
            <li><strong>Registration Actions:</strong> Apply for the specialized One-Stop Shop (OSS) schemes where applicable to simplify multi-country remittance.</li>
        </ul>
        
        <h2 class="text-2xl font-bold text-slate-800 mt-10 mb-4">How AQC & Co. Can Assist</h2>
        <p class="text-slate-600 mb-6 leading-relaxed">Our tax advisory team specializes in digital taxation mapping. We offer comprehensive diagnostic reviews of your current sales channels, identifying liability gaps and establishing robust compliance workflows. Contact our Tax department today for a preliminary consultation.</p>
    '
];
?>

<article class="bg-[#fafafa] pb-24">
    <!-- Hero / Header -->
    <header class="relative pt-32 pb-24 bg-[#1c3f94] overflow-hidden">
        <div class="absolute inset-0 opacity-10"><img src="<?= $post['featured_image'] ?>" class="w-full h-full object-cover"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#1c3f94] via-[#1c3f94]/80 to-transparent"></div>
        
        <div class="container mx-auto px-4 md:px-10 relative z-10 max-w-4xl text-center pt-8">
            <a href="<?= SITE_URL ?>/blog" class="inline-flex items-center text-blue-200 hover:text-white font-medium text-[13px] tracking-wide mb-8 transition-colors uppercase">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Blog
            </a>
            
            <div class="flex flex-wrap justify-center gap-2 mb-6">
                <?php foreach($post['categories'] as $cat): ?>
                <span class="px-4 py-1.5 bg-white/10 text-white text-[10px] font-bold uppercase tracking-widest rounded-full backdrop-blur-sm border border-white/20"><?= htmlspecialchars($cat) ?></span>
                <?php endforeach; ?>
            </div>
            
            <h1 class="text-4xl md:text-[52px] font-bold text-white mb-8 tracking-tight leading-tight"><?= htmlspecialchars($post['title']) ?></h1>
            
            <div class="flex items-center justify-center space-x-6 text-blue-100">
                <div class="flex items-center">
                    <img src="<?= $post['author']['avatar'] ?>" class="w-12 h-12 rounded-full border-2 border-white/20 mr-3 object-cover shadow-sm">
                    <div class="text-left">
                        <span class="block text-sm font-bold text-white"><?= htmlspecialchars($post['author']['name']) ?></span>
                        <span class="block text-xs font-light tracking-wide"><?= htmlspecialchars($post['author']['role']) ?></span>
                    </div>
                </div>
                <div class="h-8 w-px bg-white/20"></div>
                <div class="flex items-center text-sm font-light">
                    <svg class="w-5 h-5 mr-2 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <?= htmlspecialchars($post['date']) ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-4 md:px-10 max-w-4xl -mt-10 relative z-20">
        <div class="bg-white p-8 md:p-14 rounded-[20px] shadow-sm border border-slate-200">
            <!-- Article Body -->
            <div class="prose prose-lg prose-slate max-w-none prose-headings:font-bold prose-headings:text-[#111827] prose-a:text-[#1c3f94] font-light text-slate-600 leading-relaxed text-[16px]">
                <?= $post['content'] ?>
            </div>
            
            <!-- Tags & Share -->
            <div class="mt-14 pt-8 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-6">
                <div class="flex flex-wrap gap-2 items-center">
                    <span class="text-[14px] font-bold text-[#111827] mr-2">Tags:</span>
                    <?php foreach($post['tags'] as $tag): ?>
                    <a href="#" class="px-3 py-1.5 bg-slate-50 text-slate-600 border border-slate-100 text-[13px] font-medium rounded-lg hover:bg-slate-100 hover:text-[#1c3f94] transition-colors">#<?= htmlspecialchars($tag) ?></a>
                    <?php endforeach; ?>
                </div>
                
                <div class="flex items-center space-x-3">
                    <span class="text-[14px] font-bold text-[#111827]">Share:</span>
                    <button class="w-10 h-10 rounded-full bg-slate-50 border border-slate-100 text-slate-500 flex items-center justify-center hover:bg-blue-50 hover:border-blue-100 hover:text-[#1c3f94] transition-colors">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </button>
                    <button class="w-10 h-10 rounded-full bg-slate-50 border border-slate-100 text-slate-500 flex items-center justify-center hover:bg-blue-50 hover:border-blue-100 hover:text-[#1c3f94] transition-colors">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </button>
                </div>
            </div>
            
            <!-- Comments Section (Disabled) -->
            <div class="mt-14 pt-10 border-t border-slate-100">
                <h3 class="text-xl font-bold text-[#111827] mb-6">Comments</h3>
                <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 border-dashed text-center">
                    <svg class="w-8 h-8 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    <p class="text-[15px] font-medium text-slate-500">Comments are disabled for this post.</p>
                </div>
            </div>
        </div>
    </div>
</article>
