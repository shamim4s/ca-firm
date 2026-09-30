<?php $pageTitle = 'Insights & News'; ?>

<section class="bg-slate-900 py-24 relative overflow-hidden">
    <!-- Background patterned overlay -->
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
            RESEARCH & ANALYSIS
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight">Firm Insights</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Expert perspectives on finance, regulatory changes, audit methodology, and firm updates from our global thought leaders.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4 md:px-10">
        <!-- Filter / Tabs Area (Visual Only) -->
        <div class="flex flex-wrap justify-center gap-4 mb-16">
            <button class="px-6 py-2 bg-blue-600 text-white font-medium rounded-full text-sm shadow-sm">All Insights</button>
            <button class="px-6 py-2 bg-white text-slate-600 hover:text-blue-600 border border-slate-200 hover:border-blue-300 font-medium rounded-full text-sm transition-all shadow-sm focus:outline-none">Tax Updates</button>
            <button class="px-6 py-2 bg-white text-slate-600 hover:text-blue-600 border border-slate-200 hover:border-blue-300 font-medium rounded-full text-sm transition-all shadow-sm focus:outline-none">Regulatory Compliance</button>
            <button class="px-6 py-2 bg-white text-slate-600 hover:text-blue-600 border border-slate-200 hover:border-blue-300 font-medium rounded-full text-sm transition-all shadow-sm focus:outline-none">Firm News</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10">
            <!-- Blog Card 1 -->
            <article class="bg-white rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-200 overflow-hidden hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full group">
                <div class="h-56 bg-slate-200 w-full relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out" alt="Article image">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded text-xs font-bold text-blue-800 shadow-sm">Tax Advisory</div>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center text-xs text-slate-500 mb-4 font-medium tracking-wide">
                        <span>March 15, 2024</span>
                        <span class="mx-2">•</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 leading-snug group-hover:text-blue-700 transition-colors">
                        <a href="<?= SITE_URL ?>/blog/implications-vat-ecommerce">Implications of the New Digital Services Tax on E-Commerce</a>
                    </h3>
                    <p class="text-slate-600 text-sm mb-8 leading-relaxed flex-1">The recent regulatory overhaul places significant compliance burdens on cross-border transactions. Our experts break down the necessary operational adjustments...</p>
                    <div class="flex items-center pt-6 border-t border-slate-100">
                        <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?q=80&w=100&h=100&auto=format&fit=crop" class="h-10 w-10 rounded-full object-cover mr-4 ring-2 ring-slate-100">
                        <div>
                            <span class="block text-sm font-bold text-slate-800">Robert Fox, FCCA</span>
                            <span class="block text-xs text-slate-500">Tax Partner</span>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Social Sync Card -->
            <article class="bg-gradient-to-br from-blue-900 to-slate-900 rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.1)] overflow-hidden hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.15)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-bl-full pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-blue-500/10 rounded-tr-full pointer-events-none"></div>
                
                <div class="absolute top-6 right-6 bg-white/10 backdrop-blur rounded-full p-2 text-white shadow-sm flex items-center justify-center border border-white/20">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </div>
                
                <div class="p-8 flex flex-col flex-1 mt-6">
                    <div class="flex items-center text-xs text-blue-200/70 mb-6 font-medium">
                        <span>March 14, 2024</span>
                    </div>
                    <p class="text-white text-base md:text-lg mb-8 leading-relaxed font-medium">"We are thrilled to announce that AQC & Co has been formally recognized as the top advisory firm in the region for our M&A services. Thank you to our incredible team and clients for your continued trust and partnership."</p>
                    
                    <div class="mt-auto border-t border-white/10 pt-6 flex justify-between items-center text-blue-200 text-sm">
                        <span class="font-semibold text-white">Firm Update</span>
                        <div class="flex space-x-4">
                            <span class="flex items-center hover:text-white transition-colors cursor-pointer"><svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg> 124</span>
                        </div>
                    </div>
                </div>
            </article>
            
            <!-- Blog Card 2 -->
            <article class="bg-white rounded-2xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.05)] border border-slate-200 overflow-hidden hover:shadow-[0_8px_30px_-4px_rgba(0,0,0,0.1)] hover:-translate-y-1 transition-all duration-300 flex flex-col h-full group">
                <div class="h-56 bg-slate-200 w-full relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-in-out" alt="Article image">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded text-xs font-bold text-blue-800 shadow-sm">Audit & Assurance</div>
                </div>
                <div class="p-8 flex flex-col flex-1">
                    <div class="flex items-center text-xs text-slate-500 mb-4 font-medium tracking-wide">
                        <span>March 10, 2024</span>
                        <span class="mx-2">•</span>
                        <span>8 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 leading-snug group-hover:text-blue-700 transition-colors">
                        <a href="#">Navigating ESG Reporting Requirements for Public Entities</a>
                    </h3>
                    <p class="text-slate-600 text-sm mb-8 leading-relaxed flex-1">Environmental, Social, and Governance (ESG) criteria are no longer optional. We explore the latest IFRS sustainability disclosure standards and how to prepare.</p>
                    <div class="flex items-center pt-6 border-t border-slate-100">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=100&h=100&auto=format&fit=crop" class="h-10 w-10 rounded-full object-cover mr-4 ring-2 ring-slate-100">
                        <div>
                            <span class="block text-sm font-bold text-slate-800">Jane Smith, CPA</span>
                            <span class="block text-xs text-slate-500">Head of Audit</span>
                        </div>
                    </div>
                </div>
            </article>

        </div>
    </div>
</section>
