<?php $pageTitle = 'Our Services'; ?>

<!-- Hero Section -->
<section class="bg-[#1c3f94] py-24 relative overflow-hidden">
    <div class="container mx-auto px-4 md:px-10 text-center relative z-10">
        <div class="inline-block px-4 py-1.5 bg-blue-800/50 rounded-full text-[10px] font-bold tracking-widest uppercase border border-blue-700/50 text-white mb-6">
            PRACTICE AREAS
        </div>
        <h1 class="text-4xl md:text-[56px] font-bold text-white mb-6 tracking-tight leading-tight">Our Services</h1>
        <p class="text-blue-100 max-w-2xl mx-auto text-lg leading-relaxed font-light">Comprehensive audit, tax, and advisory solutions tailored for sustainable corporate growth and meticulous regulatory compliance.</p>
    </div>
</section>

<!-- Services Grid Section bg-[#fafafa]-->
<section class="bg-[#fafafa] py-24">
    <div class="container mx-auto px-4 md:px-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Service Items -->
            <?php 
                $services = [
                    ['title' => 'Audit & Assurance', 'slug' => 'audit-assurance', 'desc' => 'Statutory audit, internal audit, and performance audits designed to enhance transparency and stakeholder confidence.', 'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z'],
                    ['title' => 'Corporate Taxation', 'slug' => 'corporate-taxation', 'desc' => 'Strategic tax planning, corporate tax compliance, dispute resolution, and international tax advisory.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                    ['title' => 'VAT & Regulatory', 'slug' => 'vat-regulatory', 'desc' => 'Comprehensive VAT compliance, advisory, and representation before customs and revenue authorities.', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                    ['title' => 'Financial Advisory', 'slug' => 'financial-advisory', 'desc' => 'Mergers & Acquisitions, business valuations, financial due diligence, and capital restructuring.', 'icon' => 'M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z'],
                    ['title' => 'Foreign Investment & Liaison', 'slug' => 'foreign-investment', 'desc' => 'Assistance with liaison branch office setup in Bangladesh, work permits, and investment advisory.', 'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4'],
                    ['title' => 'BPO & HR Outsourcing', 'slug' => 'bpo-hr-outsourcing', 'desc' => 'End-to-end accounting outsourcing, payroll processing, and HR compliance solutions for modern firms.', 'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z']
                ];

                foreach($services as $svc): 
            ?>
            <div class="group bg-white p-10 rounded-2xl border border-slate-200 hover:border-[#1c3f94]/30 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col text-left relative overflow-hidden h-full">
                <!-- Spanning link for the entire card -->
                <a href="<?= SITE_URL ?>/services/<?= $svc['slug'] ?>" class="absolute inset-0 z-10"></a>

                <div class="absolute top-0 right-0 p-8 opacity-5 group-hover:opacity-10 group-hover:scale-125 transition-all duration-500 z-0 pointer-events-none transform translate-x-4 -translate-y-4 text-[#1c3f94]">
                    <svg class="w-32 h-32" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="<?= $svc['icon'] ?>"/></svg>
                </div>

                <div class="w-12 h-12 bg-[#f0f4f8] rounded-[10px] flex items-center justify-center text-[#1c3f94] mb-8 relative z-20 group-hover:bg-[#1c3f94] group-hover:text-white transition-colors duration-300 pointer-events-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="<?= $svc['icon'] ?>"/></svg>
                </div>
                <h3 class="text-[20px] font-bold text-[#111827] mb-4 relative z-20 pointer-events-none"><?= $svc['title'] ?></h3>
                <p class="text-slate-600 mb-8 leading-relaxed text-[15px] font-light relative z-20 flex-grow pointer-events-none">
                    <?= $svc['desc'] ?>
                </p>
                <div class="flex items-center justify-between relative z-20 w-full mt-auto">
                    <div class="inline-flex items-center text-[11px] font-bold uppercase tracking-wider text-[#1c3f94] group-hover:text-blue-700 transition-colors pointer-events-none">
                        LEARN MORE
                        <svg class="w-3.5 h-3.5 ml-1 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                    <a href="<?= SITE_URL ?>/public/assets/brochure.pdf" download class="inline-flex items-center text-[11px] font-bold uppercase tracking-wider text-rose-600 hover:text-rose-800 transition-colors pointer-events-auto relative z-30">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                        PDF
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
