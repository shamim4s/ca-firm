<?php 
// Mocking service data based on slug. Normally fetched from DB.
$service = [
    'title' => isset($pageTitle) ? $pageTitle : 'Service Details',
    'slug' => $slug ?? 'audit-assurance',
    'cover_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=1200&auto=format&fit=crop',
    'icon' => '<svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>',
    'description' => 'Comprehensive financial examination and verification serving to establish the credibility of your financial statements.',
    'content' => '
        <h2 class="text-[24px] font-bold text-[#111827] mb-4">Our Methodology</h2>
        <p class="text-slate-600 mb-6 leading-relaxed font-light text-[15px]">Our approach goes beyond compliance. We aim to understand your business inside out, identifying risks, inefficiencies, and opportunities for growth. Our rigorous methodology ensures that your financial statements provide a true and fair view of your organization\'s financial performance.</p>
        <h3 class="text-[20px] font-bold text-[#111827] mb-3 mt-8">Key Benefits</h3>
        <ul class="list-disc pl-5 text-slate-600 mb-6 space-y-2 font-light text-[15px]">
            <li>Enhanced credibility of financial information</li>
            <li>Identification of internal control weaknesses</li>
            <li>Regulatory compliance and risk mitigation</li>
            <li>Valuable insights for strategic decision-making</li>
        </ul>
        <p class="text-slate-600 mb-6 leading-relaxed font-light text-[15px]">We utilize advanced analytics and digital tools to provide a deeper level of insight, ensuring efficiency and minimizing disruption to your daily operations.</p>
    ',
    'faqs' => [
        ['q' => 'How long does an average engagement take?', 'a' => 'The duration varies significantly based on the size and complexity of the organization. A typical engagement may take 3 to 6 weeks from planning to completion.'],
        ['q' => 'What documents do we need to prepare?', 'a' => 'We will provide a comprehensive "Prepared by Client" (PBC) list prior. This typically includes trial balances, bank reconciliations, schedules of accounts, and major contracts.'],
        ['q' => 'Are your services compliant with IFRS?', 'a' => 'Yes, our partners and senior staff are extensively trained in International Financial Reporting Standards (IFRS) as well as local GAAP requirements.']
    ]
];
?>

<section class="bg-[#1c3f94] pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <img src="<?= $service['cover_image'] ?>" class="w-full h-full object-cover">
    </div>
    
    <div class="container mx-auto px-4 md:px-10 relative z-10 flex flex-col pt-12">
        <a href="<?= SITE_URL ?>/services" class="inline-flex items-center text-blue-200 hover:text-white font-medium text-[13px] tracking-wide mb-8 transition-colors self-start uppercase">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            BACK TO ALL SERVICES
        </a>
        <div class="flex flex-col md:flex-row md:items-center gap-6 mb-6">
            <div class="w-16 h-16 shrink-0 rounded-[12px] bg-white/10 backdrop-blur text-white flex items-center justify-center border border-white/20">
                <?= $service['icon'] ?>
            </div>
            <h1 class="text-4xl md:text-[52px] font-bold text-white tracking-tight leading-tight"><?= htmlspecialchars($service['title']) ?></h1>
        </div>
        <p class="text-lg md:text-xl text-blue-100 max-w-3xl leading-relaxed font-light"><?= htmlspecialchars($service['description']) ?></p>
    </div>
</section>

<section class="py-24 bg-[#fafafa]">
    <div class="container mx-auto px-4 md:px-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            <div class="lg:col-span-2 space-y-10">
                <!-- Content Area -->
                <div class="bg-white p-10 border border-slate-200 rounded-[20px] shadow-sm text-slate-700">
                    <?= $service['content'] ?>
                </div>

                <!-- FAQs -->
                <div>
                    <h3 class="text-[28px] font-bold text-[#111827] mb-8">Frequently Asked Questions</h3>
                    <div class="space-y-4">
                        <?php foreach($service['faqs'] as $index => $faq): ?>
                        <details class="group bg-white border border-slate-200 rounded-[12px] shadow-sm overflow-hidden" <?= $index === 0 ? 'open' : '' ?>>
                            <summary class="flex justify-between items-center font-bold cursor-pointer list-none py-5 px-6 text-[#111827] hover:text-[#1c3f94] transition-colors text-[16px]">
                                <?= htmlspecialchars($faq['q']) ?>
                                <span class="transition group-open:rotate-180 text-slate-400">
                                    <svg fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                                </span>
                            </summary>
                            <p class="text-slate-600 px-6 pb-5 leading-relaxed font-light text-[15px]">
                                <?= htmlspecialchars($faq['a']) ?>
                            </p>
                        </details>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Consultation CTA -->
                <div class="bg-[#f0f4f8] text-[#111827] p-8 rounded-[20px] shadow-sm relative overflow-hidden border border-blue-100">
                    <h3 class="text-xl font-bold mb-3 relative z-10 text-[#1c3f94]">Need Consultation?</h3>
                    <p class="text-slate-600 mb-8 text-[14px] leading-relaxed relative z-10 font-light">Speak directly with one of our partners to discuss how this service can be tailored for your organization.</p>
                    <a href="<?= SITE_URL ?>/contact" class="inline-block w-full text-center bg-[#1c3f94] hover:bg-blue-800 text-white font-bold tracking-wide uppercase py-4 rounded-[12px] transition-colors text-[13px] shadow-sm relative z-10">
                        Contact Us Today
                    </a>
                </div>

                <!-- PDF Download -->
                <div class="bg-white p-8 rounded-[20px] border border-slate-200 shadow-sm group hover:border-[#1c3f94] transition-colors cursor-pointer text-center relative overflow-hidden">
                    <a href="<?= SITE_URL ?>/public/assets/brochure.pdf" download class="absolute inset-0 outline-none z-20"></a>
                    <div class="w-14 h-14 mx-auto rounded-[12px] bg-red-50 text-red-500 flex items-center justify-center mb-6 group-hover:bg-red-500 group-hover:text-white transition-colors relative z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h4 class="font-bold text-[#111827] mb-2 relative z-10 text-[18px]">Service Brochure</h4>
                    <p class="text-[13px] font-bold uppercase tracking-wider text-slate-500 flex items-center justify-center relative z-10 group-hover:text-[#1c3f94]">Download PDF <span class="text-[10px] ml-2 bg-slate-100 px-2 py-0.5 rounded text-slate-500">(2.4 MB)</span></p>
                </div>
            </div>

        </div>
    </div>
</section>
