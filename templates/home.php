<?php $pageTitle = 'Home'; ?>

<!-- Hero Section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/@studio-freight/lenis@1.0.35/dist/lenis.min.js"></script>

<style>
    /* Lenis Smooth Scroll Setup */
    html.lenis { height: auto; }
    .lenis.lenis-smooth { scroll-behavior: auto; }
    .lenis.lenis-smooth [data-lenis-prevent] { overscroll-behavior: contain; }
    .lenis.lenis-stopped { overflow: hidden; }

    .hero-swiper { width: 100%; min-height: calc(100vh - 80px); background-color: #0f172a; }
    .swiper-slide { height: auto; overflow: visible; }
    /* Hide text initially for GSAP to handle */
    .hero-anim-elem, .hero-img-anim, .hero-img-badge { opacity: 0; }
    
    .swiper-pagination-bullet { background: rgba(255,255,255,0.5); }
    .swiper-pagination-bullet-active { background: #fff; }

    /* Hover Lift for cards */
    .hover-lift {
        transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.4s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.08), 0 0 20px rgba(28, 63, 148, 0.08);
        border-color: rgba(28, 63, 148, 0.3);
    }

    /* Marquee styling for seamless smooth scroll */
    .marquee-container {
        overflow: hidden;
        position: relative;
        background: #e1f0ff;
        padding: 1.5rem 0;
    }
</style>

<section class="text-white relative overflow-hidden" id="hero-section">
    <div class="swiper hero-swiper z-10 relative">
        <div class="swiper-wrapper">
            <!-- Slide 1: Audit, Tax & Advisory -->
            <div class="swiper-slide relative flex items-center">
                <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?auto=format&fit=crop&q=80');">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-slate-900/40"></div>
                </div>
                
                <div class="container mx-auto px-4 md:px-10 pt-24 pb-36 md:pt-32 md:pb-48 relative z-10 w-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                        <div class="lg:w-1/2 text-left">
                            <div class="hero-anim-elem inline-block px-5 py-2 border border-blue-400/30 rounded-[30px] bg-blue-900/30 backdrop-blur-md mb-6">
                                <p class="text-[14px] font-bold tracking-[4px] text-blue-300 uppercase m-0">Zahur Mostafiz & Co.</p>
                            </div>
                            <h1 class="hero-anim-elem text-[clamp(3rem,6vw,4.5rem)] font-bold leading-[1.1] tracking-[-0.03em] mb-8">
                                Excellence in <span class="text-blue-400">Audit, Tax</span><br>
                                & Advisory.
                            </h1>
                            <p class="hero-anim-elem text-slate-300 text-[clamp(1.1rem,2vw,1.3rem)] leading-relaxed font-light max-w-[600px] mb-10">
                                We deliver actionable financial insights, rigorous audit compliance, and strategic tax planning to empower your business to scale with confidence.
                            </p>
                            <div class="hero-anim-elem flex flex-wrap gap-4">
                                <a href="/services" class="bg-blue-600 hover:bg-blue-700 text-white shadow-[0_10px_20px_rgba(37,99,235,0.3)] px-8 py-4 font-bold rounded-lg transition-all duration-300 flex items-center hover:-translate-y-1">
                                    Explore Services
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                <a href="/about" class="bg-transparent border-2 border-white/20 hover:border-white hover:bg-white/10 text-white px-8 py-4 font-bold rounded-lg transition-all duration-300">
                                    Our Firm
                                </a>
                            </div>
                        </div>
                        <div class="lg:w-1/2 relative hidden lg:block">
                            <div class="hero-img-anim rounded-[2rem] overflow-hidden shadow-2xl relative z-10 border-4 border-white/10">
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Office Professional" class="w-full h-auto object-cover aspect-[4/3]">
                            </div>
                            
                            <!-- Badge Overlay with Pie Chart -->
                            <div class="hero-img-badge absolute -bottom-6 -left-12 bg-white text-slate-900 p-5 rounded-2xl shadow-2xl w-[320px] z-20 flex items-center gap-4">
                                <div class="relative w-16 h-16 shrink-0 pie-chart-container">
                                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                        <circle class="text-slate-100" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="15.9155" />
                                        <circle class="text-[#00e5ff] pie-chart-circle transition-all duration-1000 ease-out" stroke-dasharray="0, 100" stroke-dashoffset="0" data-target="100" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="15.9155" />
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="text-sm font-bold pie-val" data-target="100">0</span><span class="text-[10px] font-bold">%</span>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[15px] mb-0.5">Accredited Member</h4>
                                    <p class="text-[12px] text-slate-500 font-medium">of ICAB</p>
                                    <p class="text-[10px] text-[#1c3f94] font-bold uppercase mt-1 tracking-wider">Top Tier Status</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2: Strategic Advisory -->
            <div class="swiper-slide relative flex items-center">
                <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&q=80');">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-slate-900/40"></div>
                </div>
                
                <div class="container mx-auto px-4 md:px-10 pt-24 pb-36 md:pt-32 md:pb-48 relative z-10 w-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                        <div class="lg:w-1/2 text-left">
                            <div class="hero-anim-elem inline-block px-5 py-2 border border-emerald-400/30 rounded-[30px] bg-emerald-900/30 backdrop-blur-md mb-6">
                                <p class="text-[14px] font-bold tracking-[4px] text-emerald-300 uppercase m-0">Strategic Advisory</p>
                            </div>
                            <h1 class="hero-anim-elem text-[clamp(3rem,6vw,4.5rem)] font-bold leading-[1.1] tracking-[-0.03em] mb-8">
                                Ensuring Your <span class="text-emerald-400">Compliance</span><br>
                                & Security.
                            </h1>
                            <p class="hero-anim-elem text-slate-300 text-[clamp(1.1rem,2vw,1.3rem)] leading-relaxed font-light max-w-[600px] mb-10">
                                Stay ahead of regulatory changes with our comprehensive tax and statutory audit services designed for modern enterprises.
                            </p>
                            <div class="hero-anim-elem flex flex-wrap gap-4">
                                <a href="/services" class="bg-emerald-600 hover:bg-emerald-700 text-white shadow-[0_10px_20px_rgba(16,185,129,0.3)] px-8 py-4 font-bold rounded-lg transition-all duration-300 flex items-center hover:-translate-y-1">
                                    Our Solutions
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                                <a href="/contact" class="bg-transparent border-2 border-white/20 hover:border-white hover:bg-white/10 text-white px-8 py-4 font-bold rounded-lg transition-all duration-300">
                                    Contact Us Today
                                </a>
                            </div>
                        </div>
                        <div class="lg:w-1/2 relative hidden lg:block">
                            <div class="hero-img-anim rounded-[2rem] overflow-hidden shadow-2xl relative z-10 border-4 border-white/10">
                                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Consulting Team" class="w-full h-auto object-cover aspect-[4/3]">
                            </div>
                            
                            <!-- Badge Overlay with Pie Chart -->
                            <div class="hero-img-badge absolute -bottom-6 -right-6 bg-white text-slate-900 p-5 rounded-2xl shadow-2xl w-[320px] z-20 flex items-center gap-4">
                                <div class="relative w-16 h-16 shrink-0 pie-chart-container">
                                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                        <circle class="text-slate-100" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="15.9155" />
                                        <circle class="text-[#00e5ff] pie-chart-circle transition-all duration-1000 ease-out" stroke-dasharray="0, 100" stroke-dashoffset="0" data-target="95" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="15.9155" />
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="text-sm font-bold pie-val" data-target="95">0</span><span class="text-[10px] font-bold">%</span>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[15px] mb-0.5">Trusted Advisors</h4>
                                    <p class="text-[12px] text-slate-500 font-medium">Since 1995</p>
                                    <p class="text-[10px] text-[#1c3f94] font-bold uppercase mt-1 tracking-wider">Extensive Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Growth -->
            <div class="swiper-slide relative flex items-center">
                <div class="absolute inset-0 bg-cover bg-center z-0" style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1920&q=80');">
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-slate-900/40"></div>
                </div>
                
                <div class="container mx-auto px-4 md:px-10 pt-24 pb-36 md:pt-32 md:pb-48 relative z-10 w-full">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-12">
                        <div class="lg:w-1/2 text-left">
                            <div class="hero-anim-elem inline-block px-5 py-2 border border-purple-400/30 rounded-[30px] bg-purple-900/30 backdrop-blur-md mb-6">
                                <p class="text-[14px] font-bold tracking-[4px] text-purple-300 uppercase m-0">Corporate Growth</p>
                            </div>
                            <h1 class="hero-anim-elem text-[clamp(3rem,6vw,4.5rem)] font-bold leading-[1.1] tracking-[-0.03em] mb-8">
                                Accelerating <span class="text-purple-400">Value</span><br>
                                & Efficiency.
                            </h1>
                            <p class="hero-anim-elem text-slate-300 text-[clamp(1.1rem,2vw,1.3rem)] leading-relaxed font-light max-w-[600px] mb-10">
                                Unlocking business potential through advanced financial technologies, insightful analytics, and tailored growth strategies.
                            </p>
                            <div class="hero-anim-elem flex flex-wrap gap-4">
                                <a href="/services" class="bg-purple-600 hover:bg-purple-700 text-white shadow-[0_10px_20px_rgba(147,51,234,0.3)] px-8 py-4 font-bold rounded-lg transition-all duration-300 flex items-center hover:-translate-y-1">
                                    See Capabilities
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="lg:w-1/2 relative hidden lg:block">
                            <div class="hero-img-anim rounded-[2rem] overflow-hidden shadow-2xl relative z-10 border-4 border-white/10 aspect-[4/3] bg-[#0f172a]">
                                <!-- Animated Bar Chart -->
                                <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:32px_32px]"></div>
                                
                                <div class="relative z-10 w-full h-full flex flex-col p-6 md:p-8">
                                    <!-- Chart Header -->
                                    <div class="flex justify-between items-end mb-6">
                                        <div>
                                            <h3 class="text-white text-xl font-bold mb-1">Service Growth</h3>
                                            <p class="text-slate-400 text-xs">Annual comparison (%)</p>
                                        </div>
                                        <div class="flex gap-4">
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2.5 h-2.5 rounded-full bg-[#1c3f94]"></span>
                                                <span class="text-slate-300 text-[10px] font-medium uppercase tracking-wider">Audit</span>
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <span class="w-2.5 h-2.5 rounded-full bg-[#00e5ff]"></span>
                                                <span class="text-slate-300 text-[10px] font-medium uppercase tracking-wider">Tax</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Chart Body -->
                                    <div class="flex-grow relative mt-2">
                                        <!-- Y-Axis labels -->
                                        <div class="absolute left-0 top-0 bottom-8 w-6 flex flex-col justify-between text-[10px] text-slate-500 font-mono">
                                            <span class="leading-none transform -translate-y-1/2">100</span>
                                            <span class="leading-none transform -translate-y-1/2">75</span>
                                            <span class="leading-none transform -translate-y-1/2">50</span>
                                            <span class="leading-none transform -translate-y-1/2">25</span>
                                            <span class="leading-none transform translate-y-1/2">0</span>
                                        </div>
                                        
                                        <!-- Horizontal Grid Lines -->
                                        <div class="absolute left-8 right-0 top-0 bottom-8 flex flex-col justify-between">
                                            <div class="w-full border-t border-slate-700/30"></div>
                                            <div class="w-full border-t border-slate-700/30"></div>
                                            <div class="w-full border-t border-slate-700/30"></div>
                                            <div class="w-full border-t border-slate-700/30"></div>
                                            <div class="w-full border-t border-slate-700/30"></div>
                                        </div>
                                        
                                        <!-- Bars Container -->
                                        <div class="absolute left-8 right-0 top-0 bottom-8 flex items-end justify-around px-2">
                                            <!-- Group 1 -->
                                            <div class="flex items-end gap-1 w-10 md:w-14 h-full relative">
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#153474] to-[#1c3f94] rounded-t-sm absolute bottom-0 left-0" data-height="45%"></div>
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#00b8cc] to-[#00e5ff] rounded-t-sm absolute bottom-0 right-0" data-height="30%"></div>
                                            </div>
                                            <!-- Group 2 -->
                                            <div class="flex items-end gap-1 w-10 md:w-14 h-full relative">
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#153474] to-[#1c3f94] rounded-t-sm absolute bottom-0 left-0" data-height="55%"></div>
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#00b8cc] to-[#00e5ff] rounded-t-sm absolute bottom-0 right-0" data-height="45%"></div>
                                            </div>
                                            <!-- Group 3 -->
                                            <div class="flex items-end gap-1 w-10 md:w-14 h-full relative">
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#153474] to-[#1c3f94] rounded-t-sm absolute bottom-0 left-0" data-height="70%"></div>
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#00b8cc] to-[#00e5ff] rounded-t-sm absolute bottom-0 right-0" data-height="60%"></div>
                                            </div>
                                            <!-- Group 4 -->
                                            <div class="flex items-end gap-1 w-10 md:w-14 h-full relative">
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#153474] to-[#1c3f94] rounded-t-sm absolute bottom-0 left-0" data-height="85%"></div>
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#00b8cc] to-[#00e5ff] rounded-t-sm absolute bottom-0 right-0" data-height="75%"></div>
                                            </div>
                                            <!-- Group 5 -->
                                            <div class="flex items-end gap-1 w-10 md:w-14 h-full relative">
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#153474] to-[#1c3f94] rounded-t-sm absolute bottom-0 left-0" data-height="95%"></div>
                                                <div class="custom-chart-bar w-1/2 bg-gradient-to-t from-[#00b8cc] to-[#00e5ff] rounded-t-sm absolute bottom-0 right-0" data-height="88%"></div>
                                            </div>
                                        </div>
                                        
                                        <!-- X-Axis Labels -->
                                        <div class="absolute left-8 right-0 bottom-0 h-8 flex items-end justify-around px-2 text-[10px] text-slate-500 font-mono">
                                            <span class="w-10 md:w-14 text-center">2019</span>
                                            <span class="w-10 md:w-14 text-center">2020</span>
                                            <span class="w-10 md:w-14 text-center">2021</span>
                                            <span class="w-10 md:w-14 text-center">2022</span>
                                            <span class="w-10 md:w-14 text-center">2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Badge Overlay with Pie Chart -->
                            <div class="hero-img-badge absolute -top-6 -left-6 bg-white text-slate-900 p-5 rounded-2xl shadow-2xl w-[320px] z-20 flex items-center gap-4">
                                <div class="relative w-16 h-16 shrink-0 pie-chart-container">
                                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                                        <circle class="text-slate-100" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="15.9155" />
                                        <circle class="text-[#00e5ff] pie-chart-circle transition-all duration-1000 ease-out" stroke-dasharray="0, 100" stroke-dashoffset="0" data-target="88" stroke="currentColor" stroke-width="4" fill="none" cx="18" cy="18" r="15.9155" />
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <span class="text-sm font-bold pie-val" data-target="88">0</span><span class="text-[10px] font-bold">%</span>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="font-bold text-[15px] mb-0.5">Growth Trajectory</h4>
                                    <p class="text-[12px] text-slate-500 font-medium">Performance</p>
                                    <p class="text-[10px] text-[#1c3f94] font-bold uppercase mt-1 tracking-wider">High Efficacy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Trust Badge Section -->
    <div id="trust-badge-section" class="relative z-20 py-8 bg-gradient-to-r from-[#153474] to-[#1c3f94] border-t border-blue-800/50 backdrop-blur-md">
        <div class="container mx-auto px-4 md:px-10 flex flex-col md:flex-row items-center justify-center gap-6">
            <div class="flex items-center -space-x-4">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100&h=100&fit=crop" class="w-12 h-12 rounded-full border-[3px] border-[#153474] object-cover relative z-30" alt="Avatar">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop" class="w-12 h-12 rounded-full border-[3px] border-[#153474] object-cover relative z-20" alt="Avatar">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=100&h=100&fit=crop" class="w-12 h-12 rounded-full border-[3px] border-[#153474] object-cover relative z-10" alt="Avatar">
                <div class="w-12 h-12 rounded-full border-[3px] border-[#1c3f94] bg-[#00e5ff] text-[#1c3f94] flex items-center justify-center font-bold text-sm select-none z-0">
                    +
                </div>
            </div>
            <div class="text-white text-center md:text-left">
                <p class="font-bold text-lg tracking-wide">Trusted by 500+ Businesses</p>
                <p class="text-blue-200 text-sm font-light">Across Bangladesh, USA, and UK</p>
            </div>
        </div>
    </div>

    <!-- Clients Marquee GSAP -->
    <?php 
    $validClients = [];
    if (!empty($clients)) {
        foreach ($clients as $c) {
            if (!empty($c['name']) || !empty($c['logo'])) {
                $validClients[] = $c;
            }
        }
    }
    if(empty($validClients)): 
        $validClients = [
            ['name' => 'TechCorp', 'logo' => ''],
            ['name' => 'Global Finance', 'logo' => ''],
            ['name' => 'Innovate Inc', 'logo' => ''],
            ['name' => 'Alpha Group', 'logo' => ''],
            ['name' => 'Nexus Ventures', 'logo' => ''],
        ];
    endif; ?>
    <?php if(!empty($validClients)): ?>
    <div class="marquee-container border-t border-slate-200 z-20 relative bg-[#e1f0ff]">
        <div class="whitespace-nowrap flex overflow-hidden w-full relative">
            <div class="client-marquee flex items-center space-x-16 px-8 w-max">
                <!-- Original set -->
                <?php foreach($validClients as $client): ?>
                    <div class="inline-block flex-shrink-0 opacity-70 hover:opacity-100 transition-opacity filter grayscale hover:grayscale-0 duration-300">
                        <?php if(!empty($client['hyperlink'])): ?>
                        <a href="<?= htmlspecialchars($client['hyperlink']) ?>" target="_blank" rel="noopener noreferrer" class="block">
                        <?php endif; ?>
                        
                        <?php if(!empty($client['logo'])): ?>
                        <img src="<?= htmlspecialchars($client['logo']) ?>" alt="<?= htmlspecialchars($client['name'] ?? 'Client') ?>" class="h-16 w-auto object-contain" title="<?= htmlspecialchars($client['name'] ?? 'Client') ?>">
                        <?php else: ?>
                        <span class="text-[#84b8ff] font-bold text-xl uppercase tracking-widest px-4 py-2 border border-blue-800/30 rounded"><?= htmlspecialchars($client['name'] ?? 'Client') ?></span>
                        <?php endif; ?>

                        <?php if(!empty($client['hyperlink'])): ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                
                <!-- Duplicated set for seamless loop -->
                <?php foreach($validClients as $client): ?>
                    <div class="inline-block flex-shrink-0 opacity-70 hover:opacity-100 transition-opacity filter grayscale hover:grayscale-0 duration-300">
                        <?php if(!empty($client['hyperlink'])): ?>
                        <a href="<?= htmlspecialchars($client['hyperlink']) ?>" target="_blank" rel="noopener noreferrer" class="block">
                        <?php endif; ?>

                        <?php if(!empty($client['logo'])): ?>
                        <img src="<?= htmlspecialchars($client['logo']) ?>" alt="<?= htmlspecialchars($client['name'] ?? 'Client') ?>" class="h-16 w-auto object-contain" title="<?= htmlspecialchars($client['name'] ?? 'Client') ?>">
                        <?php else: ?>
                        <span class="text-[#84b8ff] font-bold text-xl uppercase tracking-widest px-4 py-2 border border-blue-800/30 rounded"><?= htmlspecialchars($client['name'] ?? 'Client') ?></span>
                        <?php endif; ?>

                        <?php if(!empty($client['hyperlink'])): ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                 <!-- Third set just to ensure extra padding for large screens -->
                 <?php foreach($validClients as $client): ?>
                    <div class="inline-block flex-shrink-0 opacity-70 hover:opacity-100 transition-opacity filter grayscale hover:grayscale-0 duration-300">
                        <?php if(!empty($client['hyperlink'])): ?>
                        <a href="<?= htmlspecialchars($client['hyperlink']) ?>" target="_blank" rel="noopener noreferrer" class="block">
                        <?php endif; ?>

                         <?php if(!empty($client['logo'])): ?>
                        <img src="<?= htmlspecialchars($client['logo']) ?>" alt="<?= htmlspecialchars($client['name'] ?? 'Client') ?>" class="h-16 w-auto object-contain" title="<?= htmlspecialchars($client['name'] ?? 'Client') ?>">
                        <?php else: ?>
                        <span class="text-[#84b8ff] font-bold text-xl uppercase tracking-widest px-4 py-2 border border-blue-800/30 rounded"><?= htmlspecialchars($client['name'] ?? 'Client') ?></span>
                        <?php endif; ?>

                        <?php if(!empty($client['hyperlink'])): ?>
                        </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

<!-- Stats Bar -->
<section class="bg-[#fafafa] relative z-20 shadow-xl border-y border-slate-200">
    <div class="container mx-auto px-4 md:px-10">
        <div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-y lg:divide-y-0 divide-slate-200">
            <div class="p-8 flex items-center space-x-5 justify-center lg:justify-start stat-item">
                <div class="stat-icon w-14 h-14 bg-white rounded-xl shadow-sm border border-slate-100 text-[#1c3f94] flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                </div>
                <div>
                    <p class="text-[28px] font-extrabold text-[#111827] leading-none mb-1"><span class="counter" data-target="30">0</span>+</p>
                    <p class="text-[10px] uppercase tracking-widest font-bold text-slate-500">FIRM EXPERIENCE</p>
                </div>
            </div>
            <div class="p-8 flex items-center space-x-5 justify-center lg:justify-start stat-item">
                <div class="stat-icon w-14 h-14 bg-white rounded-xl shadow-sm border border-slate-100 text-[#1c3f94] flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div>
                    <p class="text-[28px] font-extrabold text-[#111827] leading-none mb-1"><span class="counter" data-target="100">0</span>+</p>
                    <p class="text-[10px] uppercase tracking-widest font-bold text-slate-500">PROFESSIONAL STAFF</p>
                </div>
            </div>
            <div class="p-8 flex items-center space-x-5 justify-center lg:justify-start stat-item">
                <div class="stat-icon w-14 h-14 bg-white rounded-xl shadow-sm border border-slate-100 text-[#1c3f94] flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
                </div>
                <div>
                    <p class="text-[28px] font-extrabold text-[#111827] leading-none mb-1"><span class="counter" data-target="500">0</span>+</p>
                    <p class="text-[10px] uppercase tracking-widest font-bold text-slate-500">CLIENTS SERVED</p>
                </div>
            </div>
            <div class="p-8 flex items-center space-x-5 justify-center lg:justify-start stat-item">
                <div class="stat-icon w-14 h-14 bg-white rounded-xl shadow-sm border border-slate-100 text-[#1c3f94] flex items-center justify-center shrink-0">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <div>
                    <p class="text-[28px] font-extrabold text-[#111827] leading-none mb-1"><span class="counter" data-target="15">0</span>+</p>
                    <p class="text-[10px] uppercase tracking-widest font-bold text-slate-500">CORE SERVICES</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid Section bg-[#fafafa]-->
<section class="bg-[#fafafa] py-32" id="services-section">
    <div class="container mx-auto px-4 md:px-10">
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-4 service-header">
            <p class="text-[11px] font-bold uppercase tracking-widest text-[#1c3f94] inline-block px-4 py-1 bg-blue-100 rounded-full mb-2">OUR EXPERTISE</p>
            <h2 class="text-3xl md:text-[42px] font-extrabold text-[#111827] tracking-tight leading-tight">Comprehensive Financial Solutions</h2>
            <p class="text-slate-600 text-lg leading-relaxed pt-2 font-light">
                We offer a wide range of services designed to meet the evolving needs of our clients in an increasingly complex regulatory environment.
            </p>
        </div>

        <!-- Bento Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:grid-rows-2 gap-6 w-full max-w-7xl mx-auto">
            
            <!-- Bento Box 1: Audit & Assurance (Large, overlaps 2 cols on Desktop) -->
            <div class="service-card float-card lg:col-span-2 group relative overflow-hidden rounded-[2rem] bg-white/60 backdrop-blur-xl border border-slate-200 hover:border-[#1c3f94]/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 p-10 flex flex-col justify-between hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1c3f94]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="relative z-10">
                    <div class="w-14 h-14 bg-[#1c3f94]/10 rounded-2xl flex items-center justify-center text-[#1c3f94] mb-8 group-hover:scale-110 group-hover:bg-[#1c3f94] group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><path d="M16 13H8"/><path d="M16 17H8"/><path d="M10 9H8"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-[#111827] mb-4">Audit & Assurance</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed text-[16px] font-light max-w-lg">
                        Delivering high-quality audits that provide confidence and clear insights into your financial health, ensuring absolute transparency.
                    </p>
                </div>
                <div class="relative z-10 w-full flex justify-end mt-4">
                    <a href="<?= SITE_URL ?>/services/audit-assurance" class="inline-flex items-center justify-center w-12 h-12 rounded-full border border-slate-200 group-hover:border-[#1c3f94] group-hover:bg-[#1c3f94] group-hover:text-white text-slate-400 transition-all duration-300">
                        <svg class="w-5 h-5 -rotate-45 group-hover:rotate-0 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Bento Box 2: Taxation Compliance -->
            <div class="service-card float-card group relative overflow-hidden rounded-[2rem] bg-white/60 backdrop-blur-xl border border-slate-200 hover:border-[#1c3f94]/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 p-10 flex flex-col hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1c3f94]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="relative z-10 flex-grow">
                    <div class="w-14 h-14 bg-[#1c3f94]/10 rounded-2xl flex items-center justify-center text-[#1c3f94] mb-8 group-hover:scale-110 group-hover:bg-[#1c3f94] group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2v20"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4">Taxation</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed text-[15px] font-light">
                        Expert guidance on tax planning, compliance, and dispute resolution globally.
                    </p>
                </div>
                <div class="relative z-10 w-full mt-4">
                    <a href="<?= SITE_URL ?>/services/corporate-taxation" class="inline-flex items-center text-[12px] font-bold uppercase tracking-wider text-[#1c3f94] group-hover:text-blue-700 transition-colors">
                        LEARN MORE <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Bento Box 3: Financial Advisory -->
            <div class="service-card float-card group relative overflow-hidden rounded-[2rem] bg-white/60 backdrop-blur-xl border border-slate-200 hover:border-[#1c3f94]/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 p-10 flex flex-col hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1c3f94]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="relative z-10 flex-grow">
                    <div class="w-14 h-14 bg-[#1c3f94]/10 rounded-2xl flex items-center justify-center text-[#1c3f94] mb-8 group-hover:scale-110 group-hover:bg-[#1c3f94] group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4">Advisory</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed text-[15px] font-light">
                        Strategic advice on corporate finance, M&A risk management, and valuation.
                    </p>
                </div>
                <div class="relative z-10 w-full mt-4">
                    <a href="<?= SITE_URL ?>/services/financial-advisory" class="inline-flex items-center text-[12px] font-bold uppercase tracking-wider text-[#1c3f94] group-hover:text-blue-700 transition-colors">
                        LEARN MORE <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Bento Box 4: Foreign Investment -->
            <div class="service-card float-card group relative overflow-hidden rounded-[2rem] bg-white/60 backdrop-blur-xl border border-slate-200 hover:border-[#1c3f94]/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 p-10 flex flex-col hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1c3f94]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="relative z-10 flex-grow">
                    <div class="w-14 h-14 bg-[#1c3f94]/10 rounded-2xl flex items-center justify-center text-[#1c3f94] mb-8 group-hover:scale-110 group-hover:bg-[#1c3f94] group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/><path d="M2 12h20"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4">Foreign Investment</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed text-[15px] font-light">
                        Ensuring seamless compliance with statutory and regulatory requirements.
                    </p>
                </div>
                <div class="relative z-10 w-full mt-4">
                    <a href="<?= SITE_URL ?>/services/foreign-investment" class="inline-flex items-center text-[12px] font-bold uppercase tracking-wider text-[#1c3f94] group-hover:text-blue-700 transition-colors">
                        LEARN MORE <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <!-- Bento Box 5: BPO & Outsourcing -->
            <div class="service-card float-card group relative overflow-hidden rounded-[2rem] bg-white/60 backdrop-blur-xl border border-slate-200 hover:border-[#1c3f94]/30 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_40px_rgb(0,0,0,0.08)] transition-all duration-500 p-10 flex flex-col hover:-translate-y-2">
                <div class="absolute inset-0 bg-gradient-to-br from-[#1c3f94]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-0"></div>
                <div class="relative z-10 flex-grow">
                    <div class="w-14 h-14 bg-[#1c3f94]/10 rounded-2xl flex items-center justify-center text-[#1c3f94] mb-8 group-hover:scale-110 group-hover:bg-[#1c3f94] group-hover:text-white transition-all duration-300">
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#111827] mb-4">BPO & HR</h3>
                    <p class="text-slate-600 mb-8 leading-relaxed text-[15px] font-light">
                        Streamlined services including payroll, bookkeeping, and HR management.
                    </p>
                </div>
                <div class="relative z-10 w-full mt-4">
                    <a href="<?= SITE_URL ?>/services/bpo-hr-outsourcing" class="inline-flex items-center text-[12px] font-bold uppercase tracking-wider text-[#1c3f94] group-hover:text-blue-700 transition-colors">
                        LEARN MORE <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Accordion Section -->
<section class="bg-white py-32 border-t border-slate-200" id="faq-section">
    <div class="container mx-auto px-4 md:px-10 max-w-4xl">
        <div class="text-center mb-16 space-y-4">
            <p class="text-[11px] font-bold uppercase tracking-widest text-[#1c3f94] inline-block px-4 py-1 bg-blue-50 rounded-full border border-blue-100">KNOWLEDGE BASE</p>
            <h2 class="text-3xl md:text-[42px] font-extrabold text-[#111827] tracking-tight leading-tight">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4 faq-container">
            <!-- FAQ 1 -->
            <div class="faq-item group border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-300 hover:shadow-md bg-white">
                <button class="faq-button w-full text-left px-8 py-6 flex items-center justify-between focus:outline-none">
                    <span class="text-lg font-semibold text-slate-800 group-hover:text-[#1c3f94] transition-colors pr-6">What industries do your financial services cover?</span>
                    <span class="faq-icon w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-[#1c3f94] group-hover:text-white group-hover:border-[#1c3f94] transition-all flex-shrink-0 relative">
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-plus" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/></svg>
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-minus opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                    </span>
                </button>
                <div class="faq-content overflow-hidden" style="max-height: 0px; opacity: 0; background: #fafafa;">
                    <div class="px-8 pb-6 pt-2 text-slate-600 font-light leading-relaxed">
                        We work with a wide range of industries including technology, manufacturing, healthcare, non-profits, and fast-moving consumer goods (FMCG). Our experts tailor solutions to the unique regulatory landscape of each sector.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="faq-item group border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-300 hover:shadow-md bg-white">
                <button class="faq-button w-full text-left px-8 py-6 flex items-center justify-between focus:outline-none">
                    <span class="text-lg font-semibold text-slate-800 group-hover:text-[#1c3f94] transition-colors pr-6">How do you ensure audit transparency?</span>
                    <span class="faq-icon w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-[#1c3f94] group-hover:text-white group-hover:border-[#1c3f94] transition-all flex-shrink-0 relative">
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-plus" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/></svg>
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-minus opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                    </span>
                </button>
                <div class="faq-content overflow-hidden" style="max-height: 0px; opacity: 0; background: #fafafa;">
                    <div class="px-8 pb-6 pt-2 text-slate-600 font-light leading-relaxed">
                        We adhere strictly to international auditing standards (ISA) and the guidelines set forth by the ICAB. Our multi-stage review process involves independent partners to ensure absolute objectivity and transparency.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="faq-item group border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-300 hover:shadow-md bg-white">
                <button class="faq-button w-full text-left px-8 py-6 flex items-center justify-between focus:outline-none">
                    <span class="text-lg font-semibold text-slate-800 group-hover:text-[#1c3f94] transition-colors pr-6">Do you offer multi-national taxation compliance?</span>
                    <span class="faq-icon w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-[#1c3f94] group-hover:text-white group-hover:border-[#1c3f94] transition-all flex-shrink-0 relative">
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-plus" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/></svg>
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-minus opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                    </span>
                </button>
                <div class="faq-content overflow-hidden" style="max-height: 0px; opacity: 0; background: #fafafa;">
                    <div class="px-8 pb-6 pt-2 text-slate-600 font-light leading-relaxed">
                        Yes, our reach extends across Bangladesh, the USA, and the UK. We offer specialized guidance on cross-border transactions, transfer pricing, and dual-taxation avoidance agreements.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="faq-item group border border-slate-200 rounded-2xl overflow-hidden transition-all duration-300 hover:border-blue-300 hover:shadow-md bg-white">
                <button class="faq-button w-full text-left px-8 py-6 flex items-center justify-between focus:outline-none">
                    <span class="text-lg font-semibold text-slate-800 group-hover:text-[#1c3f94] transition-colors pr-6">How quickly can you set up HR and Payroll BPO services?</span>
                    <span class="faq-icon w-8 h-8 rounded-full border border-slate-200 flex items-center justify-center text-slate-400 group-hover:bg-[#1c3f94] group-hover:text-white group-hover:border-[#1c3f94] transition-all flex-shrink-0 relative">
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-plus" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/></svg>
                        <svg class="w-4 h-4 absolute transition-transform duration-300 faq-minus opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
                    </span>
                </button>
                <div class="faq-content overflow-hidden" style="max-height: 0px; opacity: 0; background: #fafafa;">
                    <div class="px-8 pb-6 pt-2 text-slate-600 font-light leading-relaxed">
                        We can generally transition your HR and Payroll systems to our BPO framework within 2 to 4 weeks, depending on the complexity and scale of your workforce.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Leadership Section -->
<section class="py-32 bg-white relative overflow-hidden" id="leadership-section">
    <div class="container mx-auto px-4 md:px-10">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-16 max-w-6xl mx-auto">
            <div class="lg:w-5/12 relative bg-[#e2e8f0]/40 rounded-[32px] p-2 border border-slate-200 lg:bg-transparent lg:border-none story-image transition-transform duration-700 hover:rotate-2">
                 <!-- background shape for desktop -->
                 <div class="hidden lg:block absolute inset-0 bg-[#eef2f6] rounded-[32px] transform translate-y-12 translate-x-12 -z-10 w-full h-[90%]"></div>
                 <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Leadership" class="rounded-[24px] shadow-2xl w-full h-[600px] object-cover z-10 relative">
            </div>
            
            <div class="lg:w-7/12 space-y-8 lg:pl-10 story-text">
                <p class="text-[11px] font-bold uppercase tracking-widest text-[#1c3f94] inline-block px-4 py-1 bg-blue-50 rounded-full border border-blue-100">LEADERSHIP VOICE</p>
                <h2 class="text-3xl md:text-[40px] font-extrabold text-[#111827] tracking-tight leading-tight">
                    "Nurturing Trust Through Professional Excellence and Integrity."
                </h2>
                <div class="space-y-6 text-slate-600 text-[17px] leading-relaxed pt-2 font-light">
                    <p>At Zahur Mostafiz & Co., our philosophy is built on a foundation of trust. In the world of accounting and audit, integrity isn't just a requirement—it's our defining characteristic.</p>
                    <p>As we navigate the complexities of the modern economy, we remain committed to providing our clients with the clarity and precision they need to thrive. Our team of professionals is dedicated to your success.</p>
                </div>
                <div class="pt-8 pl-6 border-l-4 border-[#1c3f94]">
                    <p class="font-serif italic font-bold text-[24px] text-[#111827]">MOHAMMAD FCA</p>
                    <p class="text-[11px] font-bold uppercase tracking-widest text-slate-500 mt-1">FOUNDING PARTNER</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<?php if (!empty($settings['google_review_json_url'])): ?>
<section class="py-32 bg-[#fafafa] relative overflow-hidden border-t border-slate-200" id="reviews-section">
    <div class="container mx-auto px-4 md:px-10">
        <div class="text-center mb-16 space-y-4">
            <p class="text-[11px] font-bold uppercase tracking-widest text-[#1c3f94] inline-block px-4 py-1 bg-blue-50 rounded-full border border-blue-100">TESTIMONIALS</p>
            <h2 class="text-3xl md:text-[42px] font-extrabold text-[#111827] tracking-tight leading-tight">What Our Clients Say</h2>
        </div>
        
        <div class="swiper reviews-swiper max-w-6xl mx-auto pb-16">
            <div class="swiper-wrapper" id="reviews-container">
                <!-- Reviews will be injected here via JS -->
            </div>
            <div class="swiper-pagination !bottom-0"></div>
        </div>
        
        <?php if (!empty($settings['write_a_review_url'])): ?>
        <div class="text-center mt-12">
            <a href="<?= htmlspecialchars($settings['write_a_review_url']) ?>" target="_blank" class="magnetic-btn inline-flex items-center space-x-3 bg-white text-[#1c3f94] font-bold py-4 px-8 rounded-full border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-300 transition-all z-10 relative">
                <span class="magnetic-btn-text flex items-center gap-2">
                    <svg class="w-5 h-5 text-[#fbbc05]" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    Write a Review
                </span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Construct the correct API URL regardless of subfolder (like /ca-firm/public)
        const basePath = window.location.pathname.replace(/\/(clients|home|)$/, '');
        const jsonUrl = basePath + '/api/reviews?t=' + new Date().getTime();
        
        fetch(jsonUrl)
            .then(res => res.json())
            .then(data => {
                if (data.error) {
                    console.error("API Error fetching reviews:", data.error, data.details);
                    return;
                }
                console.log("Fetched reviews data:", data);
                const container = document.getElementById('reviews-container');
                let reviews = [];
                // Handle both object with reviews array or just array
                if (data.reviews && Array.isArray(data.reviews)) {
                    reviews = data.reviews;
                } else if (Array.isArray(data)) {
                    reviews = data;
                } else if (data.result && data.result.reviews) {
                    reviews = data.result.reviews;
                }

                if (reviews.length > 0) {
                    reviews.forEach(review => {
                        const name = review.author_name || review.name || review.author_title || review.author || 'Anonymous';
                        const photoUrl = review.reviewerImage || review.profile_photo_url || review.thumbnail || review.author_image || review.profile_picture || `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=random`;
                        const text = review.text || review.snippet || review.review_text || review.content || '';
                        const time = review.relative_time_description || review.date || review.review_datetime_utc || review.time || '';
                        const rating = Math.round(review.rating || review.review_rating || 5);
                        const stars = '★'.repeat(rating) + '☆'.repeat(5 - rating);
                        const mapUrl = <?= json_encode($settings['google_map_location_url'] ?? '#') ?>;
                        
                        const slide = document.createElement('div');
                        slide.className = 'swiper-slide h-auto mt-10'; // added h-auto for equal height cards and mt-10 for avatar overlap
                        slide.innerHTML = `
                            <a href="${mapUrl}" target="_blank" class="block h-full group">
                                <div class="bg-white pt-14 pb-8 px-8 rounded-3xl border border-slate-200 shadow-sm h-full flex flex-col items-center text-center group-hover:shadow-xl group-hover:-translate-y-2 transition-all duration-300 relative">
                                    
                                    <div class="absolute -top-10 left-1/2 -translate-x-1/2">
                                        <div class="relative">
                                            <img src="${photoUrl}" class="w-20 h-20 rounded-full object-cover border-[3px] border-white shadow-md bg-white" alt="${name}" referrerpolicy="no-referrer" />
                                            <div class="absolute bottom-1 right-1 w-7 h-7 bg-gradient-to-br from-[#5ecef8] to-[#1483d6] rounded-full border-[2.5px] border-white flex items-center justify-center text-white">
                                                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex space-x-1 text-[#fbbc04] text-xl mb-3">
                                        ${stars}
                                    </div>
                                    
                                    <h4 class="font-bold text-lg text-[#0f172a] mb-4 group-hover:text-blue-600 transition-colors">${name}</h4>
                                    
                                    <p class="text-slate-500 text-[15px] leading-relaxed font-light mb-8 w-full flex-grow">
                                        "${text}"
                                    </p>
                                    
                                    <div class="w-full flex justify-between items-end text-sm text-slate-400 mt-auto">
                                        <span>${time}</span>
                                        <svg class="w-8 h-8 text-slate-300" viewBox="0 0 24 24" fill="currentColor"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"/></svg>
                                    </div>
                                </div>
                            </a>
                        `;
                        container.appendChild(slide);
                    });

                    // Initialize Swiper
                    new Swiper('.reviews-swiper', {
                        slidesPerView: 1,
                        spaceBetween: 24,
                        loop: true,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: '.reviews-swiper .swiper-pagination',
                            clickable: true,
                        },
                        breakpoints: {
                            768: { slidesPerView: 2 },
                            1024: { slidesPerView: 3 }
                        }
                    });
                } else {
                    container.innerHTML = '<div class="text-center w-full text-slate-500 py-10">No reviews found.</div>';
                }
            })
            .catch(err => {
                console.error("Error fetching reviews:", err);
                const container = document.getElementById('reviews-container');
                if (container) container.innerHTML = '<div class="text-center w-full text-slate-500 py-10">Could not load reviews at this time.</div>';
            });
    });
</script>
<?php endif; ?>

<!-- Pre-footer CTA -->
<section class="bg-[#1c3f94] text-white py-32 relative overflow-hidden" id="cta-section">
    <div class="container mx-auto px-4 md:px-10 text-center max-w-4xl space-y-8 relative z-10">
        <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight cta-elem">Ready to secure your <br/><span class="text-blue-300">financial future?</span></h2>
        <p class="text-[19px] text-[#b3c7f0] max-w-2xl mx-auto leading-relaxed font-light cta-elem">
            Consult with our expert team today and discover how we can help your business achieve professional excellence.
        </p>
        <div class="pt-8 cta-elem">
            <a href="<?= SITE_URL ?>/contact" class="magnetic-btn inline-flex items-center justify-center bg-white text-[#1c3f94] hover:bg-slate-100 px-10 py-5 font-bold rounded-full shadow-[0_0_40px_rgba(255,255,255,0.2)] transition-colors text-[16px] group">
                <span class="magnetic-btn-text flex items-center">
                    <svg class="w-5 h-5 mr-3 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Contact Our Firm
                </span>
            </a>
        </div>
    </div>
</section>

<!-- Script Logic -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    try {
        if (typeof gsap === 'undefined') {
            console.warn("GSAP not loaded. Fast fallback.");
            return;
        }

        gsap.registerPlugin(ScrollTrigger);

        // FAQ Accordion Interaction (GSAP)
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const button = item.querySelector('.faq-button');
            const content = item.querySelector('.faq-content');
            const plusIcon = item.querySelector('.faq-plus');
            const minusIcon = item.querySelector('.faq-minus');
            let isOpen = false;

            button.addEventListener('click', () => {
                isOpen = !isOpen;
                
                // Close others
                faqItems.forEach(otherItem => {
                    if (otherItem !== item) {
                        const otherContent = otherItem.querySelector('.faq-content');
                        const otherPlus = otherItem.querySelector('.faq-plus');
                        const otherMinus = otherItem.querySelector('.faq-minus');
                        gsap.to(otherContent, { maxHeight: 0, opacity: 0, duration: 0.4, ease: "power2.inOut" });
                        gsap.to(otherPlus, { rotation: 0, opacity: 1, duration: 0.3 });
                        gsap.to(otherMinus, { rotation: -180, opacity: 0, duration: 0.3 });
                        otherItem.classList.remove('border-blue-400');
                        otherItem.isOpen = false;
                    }
                });

                item.isOpen = isOpen;
                if (isOpen) {
                    item.classList.add('border-blue-400');
                    gsap.to(content, { maxHeight: 500, opacity: 1, duration: 0.5, ease: "power2.inOut" });
                    gsap.to(plusIcon, { rotation: 180, opacity: 0, duration: 0.3 });
                    gsap.to(minusIcon, { rotation: 0, opacity: 1, duration: 0.3 });
                } else {
                    item.classList.remove('border-blue-400');
                    gsap.to(content, { maxHeight: 0, opacity: 0, duration: 0.4, ease: "power2.inOut" });
                    gsap.to(plusIcon, { rotation: 0, opacity: 1, duration: 0.3 });
                    gsap.to(minusIcon, { rotation: -180, opacity: 0, duration: 0.3 });
                }
            });
        });

        // Initialize minus icons
        gsap.set('.faq-minus', { rotation: -180, opacity: 0 });

        // Lenis Smooth Scroll Setup
        if (typeof Lenis !== 'undefined') {
            const lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                direction: 'vertical',
                gestureDirection: 'vertical',
                smooth: true,
                mouseMultiplier: 1,
                smoothTouch: false,
                touchMultiplier: 2,
            });

            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }
            requestAnimationFrame(raf);

            lenis.on('scroll', ScrollTrigger.update);
            gsap.ticker.add((time)=>{
              lenis.raf(time * 1000);
            });
            gsap.ticker.lagSmoothing(0);
        }

        // 1. Hero Swiper Integration with GSAP
        const swiper = new Swiper('.hero-swiper', {
            loop: true,
            autoHeight: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            on: {
                init: function () {
                    // Slight delay for first load
                    setTimeout(() => {
                        animateSlide(this.slides[this.activeIndex]);
                    }, 100);
                },
                slideChangeTransitionStart: function () {
                    // Reset other slides
                    this.slides.forEach(slide => {
                        if (slide !== this.slides[this.activeIndex]) {
                            const animElems = slide.querySelectorAll('.hero-anim-elem');
                            if (animElems.length) gsap.set(Array.from(animElems), { y: 30, opacity: 0 });
                            
                            const imgAnims = slide.querySelectorAll('.hero-img-anim');
                            if (imgAnims.length) gsap.set(Array.from(imgAnims), { x: 30, opacity: 0, scale: 0.95 });
                            
                            const badges = slide.querySelectorAll('.hero-img-badge');
                            if (badges.length) gsap.set(Array.from(badges), { y: 20, opacity: 0 });
                            
                            const pieCircle = slide.querySelector('.pie-chart-circle');
                            if(pieCircle) pieCircle.style.strokeDasharray = '0, 100';
                            
                            const pieVal = slide.querySelector('.pie-val');
                            if(pieVal) pieVal.innerText = '0';
                            
                            const customBars = slide.querySelectorAll('.custom-chart-bar');
                            if(customBars.length) gsap.set(Array.from(customBars), { height: '0%' });
                        }
                    });

                    // Animate active slide
                    animateSlide(this.slides[this.activeIndex]);
                }
            }
        });

        function animateSlide(slide) {
            const animElems = slide.querySelectorAll('.hero-anim-elem');
            if (animElems.length) {
                gsap.fromTo(Array.from(animElems),
                    { y: 40, opacity: 0 },
                    { y: 0, opacity: 1, duration: 1, stagger: 0.15, ease: "power3.out" }
                );
            }
            
            const imgAnims = slide.querySelectorAll('.hero-img-anim');
            if (imgAnims.length) {
                gsap.fromTo(Array.from(imgAnims),
                    { x: 40, opacity: 0, scale: 0.95 },
                    { x: 0, opacity: 1, scale: 1, duration: 1.2, delay: 0.2, ease: "power3.out" }
                );
            }
            
            const badge = slide.querySelector('.hero-img-badge');
            if (badge) {
                gsap.fromTo(badge,
                    { y: 30, opacity: 0 },
                    { y: 0, opacity: 1, duration: 1, delay: 0.8, ease: "back.out(1.5)" }
                );
                
                const pieCircle = badge.querySelector('.pie-chart-circle');
                const pieVal = badge.querySelector('.pie-val');
                if (pieCircle && pieVal) {
                    const targetVal = parseInt(pieCircle.getAttribute('data-target')) || 0;
                    
                    // Animate pie circle dash array
                    setTimeout(() => {
                        pieCircle.style.strokeDasharray = `${targetVal}, 100`;
                    }, 1200);
                    
                    // Animate number
                    let obj = { val: 0 };
                    gsap.to(obj, {
                        val: targetVal,
                        duration: 1.5,
                        delay: 1.2,
                        ease: "power2.out",
                        onUpdate: function() {
                            pieVal.innerText = Math.round(obj.val);
                        }
                    });
                }
            }
            
            const customBars = slide.querySelectorAll('.custom-chart-bar');
            if (customBars.length) {
                gsap.set(Array.from(customBars), { height: '0%' });
                customBars.forEach((bar, index) => {
                    const targetHeight = bar.getAttribute('data-height') || '0%';
                    gsap.to(bar, {
                        height: targetHeight,
                        duration: 1.5,
                        delay: 0.8 + (Math.floor(index/2) * 0.1),
                        ease: "power3.out"
                    });
                });
            }
        }

        // 2. Marquee Infinite Scroll (Linked to velocity if needed, but smooth base speed)
        const marqueeContainer = document.querySelector('.marquee-container');
        const marqueeContent = document.querySelector('.client-marquee');
        
        if (marqueeContainer) {
            gsap.fromTo(marqueeContainer,
                { opacity: 0 },
                { scrollTrigger: { trigger: marqueeContainer, start: 'top 95%' },
                  opacity: 1, duration: 1, ease: "power2.out" }
            );
        }

        if(marqueeContent) {
            gsap.to(marqueeContent, {
                xPercent: -50,
                ease: "none",
                repeat: -1,
                duration: 25
            });
        }

        // 3. Stats Counter
        gsap.utils.toArray('.stat-item').forEach(item => {
            const counter = item.querySelector('.counter');
            if (!counter) return;
            const target = parseInt(counter.getAttribute('data-target')) || 0;
            
            ScrollTrigger.create({
                trigger: item,
                start: "top 85%",
                onEnter: () => {
                    let obj = { val: 0 };
                    gsap.to(obj, {
                        val: target,
                        duration: 2.5,
                        ease: "power2.out",
                        onUpdate: function() {
                            counter.innerHTML = Math.ceil(obj.val);
                        }
                    });
                    
                    gsap.fromTo(item,
                        { y: 30, opacity: 0 },
                        { y: 0, opacity: 1, duration: 0.8, ease: "power3.out" }
                    );
                    
                    gsap.fromTo(item.querySelector('.stat-icon'), 
                        { scale: 0, rotation: -90, opacity: 0 },
                        { scale: 1, rotation: 0, opacity: 1, duration: 0.8, ease: "back.out(1.5)"}
                    );
                },
                once: true
            });
        });

        // 4. Services Grid (Bento style stagger)
        gsap.fromTo('.service-header > *', 
            { y: 40, opacity: 0 },
            { scrollTrigger: { trigger: '#services-section', start: 'top 80%' },
              y: 0, opacity: 1, duration: 1.2, stagger: 0.15, ease: "power3.out" }
        );

        gsap.fromTo('.service-card', 
            { y: 60, opacity: 0 },
            { scrollTrigger: { trigger: '#services-section', start: 'top 70%' },
              y: 0, opacity: 1, duration: 0.8, stagger: 0.1, ease: "power3.out" }
        );

        // 5. Leadership Parallax & Reveal
        gsap.fromTo('.story-image', 
            { scale: 0.9, opacity: 0, y: 50 },
            { scrollTrigger: { trigger: '#leadership-section', start: 'top 75%' },
              scale: 1, opacity: 1, y: 0, duration: 1.5, ease: "power3.out" }
        );

        gsap.fromTo('.story-text > *', 
            { x: 40, opacity: 0 },
            { scrollTrigger: { trigger: '#leadership-section', start: 'top 75%' },
              x: 0, opacity: 1, duration: 1.2, stagger: 0.15, ease: "power3.out" }
        );

        // 6. Pre-Footer CTA
        gsap.fromTo('.cta-elem', 
            { y: 40, opacity: 0 },
            { scrollTrigger: { trigger: '#cta-section', start: 'top 80%' },
              y: 0, opacity: 1, duration: 1, stagger: 0.2, ease: "power3.out" }
        );

        // 7. FAQ Animations
        gsap.fromTo('#faq-section .text-center > *',
            { y: 30, opacity: 0 },
            { scrollTrigger: { trigger: '#faq-section', start: 'top 80%' },
              y: 0, opacity: 1, duration: 1, stagger: 0.15, ease: "power3.out" }
        );

        gsap.fromTo('.faq-item',
            { y: 30, opacity: 0 },
            { scrollTrigger: { trigger: '#faq-section', start: 'top 75%' },
              y: 0, opacity: 1, duration: 0.8, stagger: 0.1, ease: "power3.out" }
        );

        // 8. Trust Badge
        gsap.fromTo('#trust-badge-section > div > *',
            { y: 20, opacity: 0 },
            { scrollTrigger: { trigger: '#trust-badge-section', start: 'top 90%' },
              y: 0, opacity: 1, duration: 0.8, stagger: 0.1, ease: "power3.out" }
        );

        // Magnetic Button Effect
        const magneticBtns = document.querySelectorAll('.magnetic-btn');
        magneticBtns.forEach(btn => {
            btn.addEventListener('mousemove', (e) => {
                const rect = btn.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                
                gsap.to(btn, {
                    x: x * 0.3,
                    y: y * 0.3,
                    duration: 0.4,
                    ease: "power2.out"
                });
                
                const btnText = btn.querySelector('.magnetic-btn-text');
                if(btnText) {
                     gsap.to(btnText, {
                        x: x * 0.1,
                        y: y * 0.1,
                        duration: 0.4,
                        ease: "power2.out"
                    });
                }
            });
            
            btn.addEventListener('mouseleave', () => {
                gsap.to(btn, {
                    x: 0,
                    y: 0,
                    duration: 0.7,
                    ease: "elastic.out(1, 0.3)"
                });
                
                const btnText = btn.querySelector('.magnetic-btn-text');
                if(btnText) {
                     gsap.to(btnText, {
                        x: 0,
                        y: 0,
                        duration: 0.7,
                        ease: "elastic.out(1, 0.3)"
                    });
                }
            });
        });

    } catch (error) {
        console.error("Animation GSAP Error:", error);
    }
});
</script>
