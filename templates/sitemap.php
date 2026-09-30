<section class="bg-gradient-to-b from-slate-900 to-[#151c2e] pt-32 pb-20 text-white relative overflow-hidden">
    <!-- Starfield/Grid Background (Reusing from layout) -->
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:32px_32px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#151c2e] via-transparent to-transparent"></div>
    </div>
    
    <div class="container mx-auto px-4 lg:px-8 relative z-10 text-center max-w-4xl">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 tracking-tight font-sans text-white">Sitemap</h1>
        <p class="text-lg md:text-xl text-slate-300 font-light mx-auto leading-relaxed">
            Navigate through Zahur Mostafiz & Co. Chartered Accountants.
        </p>
    </div>
</section>

<section class="py-24 bg-white relative">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            
            <!-- Main Navigation -->
            <div class="space-y-6">
                <div class="inline-flex items-center space-x-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1c3f94] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">Main Pages</h2>
                </div>
                <ul class="space-y-4">
                    <li><a href="<?= SITE_URL ?>/" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Home</a></li>
                    <li><a href="<?= SITE_URL ?>/about" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>About Us</a></li>
                    <li><a href="<?= SITE_URL ?>/services" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Our Services</a></li>
                    <li><a href="<?= SITE_URL ?>/clients" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Our Clients</a></li>
                    <li><a href="<?= SITE_URL ?>/contact" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Contact Us</a></li>
                </ul>
            </div>

            <!-- Team & Resources -->
            <div class="space-y-6">
                <div class="inline-flex items-center space-x-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1c3f94] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">People & Insights</h2>
                </div>
                <ul class="space-y-4">
                    <li><a href="<?= SITE_URL ?>/team" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Leadership Team</a></li>
                    <li><a href="<?= SITE_URL ?>/members" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>All Members</a></li>
                    <li><a href="<?= SITE_URL ?>/blog" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Latest News & Insights</a></li>
                </ul>
            </div>

            <!-- Legal & Utilities -->
            <div class="space-y-6">
                <div class="inline-flex items-center space-x-3 mb-2">
                    <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1c3f94] flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <h2 class="text-xl font-bold text-slate-900">Legal</h2>
                </div>
                <ul class="space-y-4">
                    <li><a href="<?= SITE_URL ?>/terms" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Terms of Services</a></li>
                    <li><a href="<?= SITE_URL ?>/privacy" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Privacy Policy</a></li>
                    <li><a href="<?= SITE_URL ?>/sitemap" class="text-slate-600 hover:text-[#1c3f94] font-medium transition-colors flex items-center"><span class="w-2 h-2 rounded-full bg-slate-300 mr-3"></span>Sitemap</a></li>
                </ul>
            </div>
            
        </div>
    </div>
</section>
