<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= isset($metaDescription) ? htmlspecialchars($metaDescription) : 'Zahur Mostafiz & Co. - A leading firm of Chartered Accountants providing professional services in Audit, Tax, Advisory and Outsourcing.' ?>">
    <meta name="keywords" content="<?= isset($metaKeywords) ? htmlspecialchars($metaKeywords) : 'Chartered Accountants, Audit, Tax Advisory, Financial Services, Corporate Governance, Bangladesh' ?>">
    <?= isset($metaTags) ? $metaTags : '' ?>
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) . ' - Zahur & Mostafiz CA' : 'Professional CA Firm' ?></title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0f172a', // slate-900 
                        secondary: '#2563eb', // blue-600
                        accent: '#f59e0b', // amber-500
                        dark: '#020617', // slate-950
                        light: '#f8fafc' // slate-50
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏢</text></svg>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; cursor: default; }
        /* Hide default cursor on desktop when using custom cursor */
        @media (min-width: 768px) {
            body { cursor: none; }
            a, button, .cursor-pointer { cursor: none; }
        }
        /* Footer Reveal Specifics */
        main.flex-grow {
            position: relative;
            z-index: 10;
            background-color: #f8fafc; /* match slate-50 */
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased flex flex-col min-h-screen">

    <!-- Top Bar -->
    <div class="bg-[#1c3f94] text-white py-2 text-xs font-medium">
        <div class="container mx-auto px-4 md:px-10 flex flex-col md:flex-row justify-between items-center gap-2 md:gap-0">
            <div class="flex space-x-6">
                <a href="tel:+880222222222" class="flex items-center text-blue-100 hover:text-white transition-colors">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    +880 2 22222222
                </a>
                <a href="mailto:info@zahurmostafiz.com" class="flex items-center text-blue-100 hover:text-white transition-colors">
                    <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    info@zahurmostafiz.com
                </a>
            </div>
            <div class="flex space-x-4 items-center">
                <span class="text-blue-100">Chartered Accountants</span>
                <a href="<?= SITE_URL ?>/admin/dashboard" class="font-bold hover:text-blue-200 transition-colors underline">Admin Dashboard</a>
            </div>
        </div>
    </div>

    <!-- Header / Navbar -->
    <nav class="h-24 bg-white border-b border-slate-100 flex items-center justify-between px-4 md:px-10 shadow-[0_4px_20px_-10px_rgba(0,0,0,0.05)] z-50 relative">
        <div class="flex items-center space-x-3">
            <a href="<?= SITE_URL ?>/" class="flex items-center gap-3">
                <div class="w-12 h-12 bg-[#1c3f94] rounded-lg flex items-center justify-center text-white font-serif font-bold text-xl leading-none">ZM</div>
                <div class="flex flex-col">
                    <span class="font-extrabold text-[22px] tracking-tight text-[#111827] leading-none uppercase">Zahur Mostafiz & Co.</span>
                    <span class="text-[10px] text-slate-500 tracking-[0.25em] font-bold mt-1 uppercase">Chartered Accountants</span>
                </div>
            </a>
        </div>
        <div class="hidden md:flex items-center space-x-8 text-[13px] font-bold text-slate-600 tracking-wide uppercase">
            <?php
            $menuFile = __DIR__ . '/../data/menu.json';
            $menuLinks = [];
            if (file_exists($menuFile)) {
                $menuLinks = json_decode(file_get_contents($menuFile), true);
            }
            if (empty($menuLinks)) {
                $menuLinks = [
                    ['title' => 'Home', 'url' => '/', 'activePath' => '/'],
                    ['title' => 'About', 'url' => '/about', 'activePath' => '/about'],
                    ['title' => 'Services', 'url' => '/services', 'activePath' => '/services', 'dropdown' => [
                        ['title' => 'Audit & Assurance', 'url' => '/services/audit-assurance'],
                        ['title' => 'Corporate Taxation', 'url' => '/services/corporate-taxation'],
                        ['title' => 'VAT & Regulatory', 'url' => '/services/vat-regulatory'],
                        ['title' => 'Financial Advisory', 'url' => '/services/financial-advisory'],
                        ['title' => 'Foreign Investment & Liaison', 'url' => '/services/foreign-investment'],
                        ['title' => 'BPO & HR Outsourcing', 'url' => '/services/bpo-hr-outsourcing']
                    ]],
                    ['title' => 'Team', 'url' => '/team', 'activePath' => '/team'],
                    ['title' => 'Clients', 'url' => '/clients', 'activePath' => '/clients'],
                    ['title' => 'Blog', 'url' => '/blog', 'activePath' => '/blog'],
                    ['title' => 'Contact', 'url' => '/contact', 'activePath' => '/contact'],
                ];
            }
            $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            // Quick match
            foreach ($menuLinks as $link):
                // If the link URL doesn't start with http, prepend SITE_URL
                $href = (strpos($link['url'], 'http') === 0) ? $link['url'] : SITE_URL . $link['url'];
                $isActive = (rtrim($currentPath, '/') === rtrim(parse_url($href, PHP_URL_PATH), '/'));
                if ($link['url'] === '/' && $isActive === false) {
                    $isActive = ($currentPath === parse_url(SITE_URL . '/', PHP_URL_PATH));
                }
                $activeClass = $isActive ? 'text-[#1c3f94]' : 'hover:text-[#1c3f94] transition-colors';
                
                if (!empty($link['dropdown'])):
            ?>
                <div class="relative group">
                    <a href="<?= htmlspecialchars($href) ?>" class="<?= $activeClass ?> flex items-center gap-1">
                        <?= htmlspecialchars($link['title']) ?>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                    <div class="absolute left-0 top-full mt-2 w-64 bg-white border border-slate-100 shadow-xl rounded-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <?php foreach($link['dropdown'] as $drop): 
                            $dropHref = (strpos($drop['url'], 'http') === 0) ? $drop['url'] : SITE_URL . $drop['url'];
                        ?>
                            <a href="<?= htmlspecialchars($dropHref) ?>" class="block px-6 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-[#1c3f94]"><?= htmlspecialchars($drop['title']) ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?= htmlspecialchars($href) ?>" class="<?= $activeClass ?>"><?= htmlspecialchars($link['title']) ?></a>
            <?php 
                endif; 
            endforeach; 
            ?>
            <div class="flex items-center space-x-3 ml-4">
                <a href="<?= !empty($settings['write_a_review_url']) ? htmlspecialchars($settings['write_a_review_url']) : 'https://g.page/r/CVBdmtx45lW5EBM/review' ?>" target="_blank" rel="noopener noreferrer" class="flex items-center px-5 py-2.5 bg-[#1c3f94] text-white rounded-[6px] hover:bg-blue-800 transition-colors shadow-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                    Write a Review
                </a>
            </div>
        </div>
        
        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button id="mobileMenuBtn" class="text-slate-600 hover:text-[#1c3f94] focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Menu Overlay -->
    <div id="mobileMenu" class="hidden md:hidden bg-white border-b border-slate-100 shadow-lg absolute w-full z-40">
        <div class="flex flex-col px-4 py-6 space-y-4 text-[14px] font-bold text-slate-600 tracking-wide uppercase">
            <?php foreach ($menuLinks as $link): 
                $href = (strpos($link['url'], 'http') === 0) ? $link['url'] : SITE_URL . $link['url'];
            ?>
            <a href="<?= htmlspecialchars($href) ?>" class="block py-2 border-b border-slate-50 hover:text-[#1c3f94]"><?= htmlspecialchars($link['title']) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
    
    <script>
        const btn = document.getElementById('mobileMenuBtn');
        const menu = document.getElementById('mobileMenu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Main Content (Injecting View Content) -->
    <main class="flex-grow bg-slate-50 relative z-10 page-content-container">
        <?= $content ?? '' ?>
    </main>

    <!-- Footer -->
    <footer id="site-footer" class="bg-[#151c2e] text-slate-300 mt-auto">
        <div class="footer-content px-4 md:px-10 py-16 grid grid-cols-1 md:grid-cols-4 gap-12 max-w-7xl mx-auto">
            <div class="flex flex-col space-y-4">
                <a href="<?= SITE_URL ?>/" class="flex flex-col mb-2">
                    <span class="font-bold text-xl tracking-tight text-white leading-none">Zahur Mostafiz & Co.</span>
                </a>
                <p class="text-sm leading-relaxed text-slate-400">
                    A leading firm of Chartered Accountants providing professional services in Audit, Tax, Advisory and Outsourcing. Established with a commitment to excellence and integrity.
                </p>
                <div class="flex space-x-4 pt-4">
                    <a href="#" class="text-slate-400 hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a>
                    <a href="#" class="text-slate-400 hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a>
                    <a href="#" class="text-slate-400 hover:text-white"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                </div>
            </div>
            
            <div class="flex flex-col space-y-4">
                <span class="text-xs font-bold text-white tracking-widest uppercase mb-2">SERVICES</span>
                <a href="<?= SITE_URL ?>/services" class="text-sm text-slate-400 hover:text-white">Audit & Assurance</a>
                <a href="<?= SITE_URL ?>/services" class="text-sm text-slate-400 hover:text-white">Taxation Services</a>
                <a href="<?= SITE_URL ?>/services" class="text-sm text-slate-400 hover:text-white">Financial Advisory</a>
                <a href="<?= SITE_URL ?>/services" class="text-sm text-slate-400 hover:text-white">Corporate Governance</a>
                <a href="<?= SITE_URL ?>/services" class="text-sm text-slate-400 hover:text-white">BPO & Outsourcing</a>
            </div>

            <div class="flex flex-col space-y-4">
                <span class="text-xs font-bold text-white tracking-widest uppercase mb-2">INFORMATION</span>
                <a href="<?= SITE_URL ?>/about" class="text-sm text-slate-400 hover:text-white">About Us</a>
                <a href="<?= SITE_URL ?>/team" class="text-sm text-slate-400 hover:text-white">Our Partners</a>
                <a href="<?= SITE_URL ?>/blog" class="text-sm text-slate-400 hover:text-white">Publications</a>
                <a href="#" class="text-sm text-slate-400 hover:text-white">Careers</a>
                <a href="#" class="text-sm text-slate-400 hover:text-white">Privacy Policy</a>
            </div>

            <div class="flex flex-col space-y-4">
                <span class="text-xs font-bold text-white tracking-widest uppercase mb-2">CONTACT US</span>
                <div class="flex items-start space-x-3 text-sm text-slate-400">
                    <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>
                        <strong>Dhanmondi Branch</strong><br>
                        House # 14/A (Flat-2A), Road # 02,<br>Dhanmondi R/A, Dhaka-1205,<br>Bangladesh
                    </span>
                </div>
                <div class="flex items-start space-x-3 text-sm text-slate-400">
                    <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <span>
                        <strong>Mohakhali Branch</strong><br>
                        Green Trade Point, 8th floor,<br>7 Bir Uttam A.K Khandakar road,<br>Mohakhali, Dhaka-1212
                    </span>
                </div>
                <div class="flex items-center space-x-3 text-sm text-slate-400">
                    <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>+880 2 22222222 | +8801721158568</span>
                </div>
                <div class="flex items-center space-x-3 text-sm text-slate-400">
                    <svg class="w-5 h-5 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>info@zahurmostafiz.com</span>
                </div>
            </div>
        </div>
        <div class="bg-[#0f172a] text-slate-400 py-4 px-4 md:px-10 border-t border-slate-800">
            <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center text-xs">
                <p>&copy; <?= date('Y') ?> Zahur Mostafiz & Co. Chartered Accountants. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="<?= SITE_URL ?>/terms" class="hover:text-white transition-colors">Terms of Services</a>
                    <a href="<?= SITE_URL ?>/privacy" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="<?= SITE_URL ?>/sitemap" class="hover:text-white transition-colors">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Custom Cursor -->
    <div id="cursor-follower" class="fixed top-0 left-0 w-8 h-8 rounded-full border-2 border-[#1c3f94] pointer-events-none z-[9999] opacity-0 mix-blend-multiply hidden md:block transition-colors"></div>
    <div id="cursor-dot" class="fixed top-0 left-0 w-2 h-2 rounded-full bg-[#1c3f94] pointer-events-none z-[9999] opacity-0 mix-blend-multiply hidden md:block"></div>

    <!-- Circular Scroll Progress Indicator -->
    <div id="scroll-progress" class="fixed bottom-6 right-6 z-50 w-12 h-12 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 group">
        <div class="absolute inset-0 bg-white shadow-lg rounded-full transform scale-90 group-hover:scale-100 transition-transform -z-10"></div>
        <svg class="w-full h-full transform -rotate-90 z-10" viewBox="0 0 100 100">
            <circle class="text-slate-200" stroke-width="6" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50" />
            <circle id="progress-circle" class="text-[#1c3f94]" stroke-width="6" stroke-linecap="round" stroke="currentColor" fill="transparent" r="44" cx="50" cy="50" style="stroke-dasharray: 276.46; stroke-dashoffset: 276.46;" />
        </svg>
        <svg class="absolute w-5 h-5 text-[#1c3f94] z-20 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
    </div>

    <!-- Toast Component -->
    <div id="toast-container" class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-[9999] flex flex-col items-center pointer-events-none"></div>

    <!-- Global Layout Scripts -->
    <script>
        // Simple Toast Function
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            const bgColor = type === 'success' ? 'bg-[#1c3f94]' : 'bg-red-600';
            const icon = type === 'success' ? 
                '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>' : 
                '<svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';

            toast.className = `flex items-center px-6 py-3 rounded-full text-white font-medium shadow-[0_8px_30px_rgb(0,0,0,0.12)] pointer-events-auto transform transition-all duration-500 ease-out translate-y-12 opacity-0 mt-3 ${bgColor}`;
            toast.innerHTML = `${icon}<span>${message}</span>`;
            
            container.appendChild(toast);
            
            // Animate in
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-12', 'opacity-0');
            });
            
            // Wait and animate out
            setTimeout(() => {
                toast.classList.add('translate-y-12', 'opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 3500);
        }

        // Global check for URL params for generic alerts
        window.addEventListener('DOMContentLoaded', () => {
             const urlParams = new URLSearchParams(window.location.search);
             if (urlParams.has('success') || urlParams.has('success_mohakhali') || urlParams.has('success_dhanmondi')) {
                 showToast('Form submitted successfully!');
                 // Optionally clean up URL
                 const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                 window.history.replaceState({path:newUrl},'',newUrl);
             }
        });

        document.addEventListener('DOMContentLoaded', () => {
            if (typeof gsap !== 'undefined') {
                gsap.registerPlugin(ScrollTrigger);

                // 0. Page Load Entrance Stagger Animation
                const mainElements = document.querySelectorAll('.page-content-container > section, .page-content-container > div');
                if (mainElements.length > 0) {
                    gsap.from(mainElements, {
                        y: 40,
                        opacity: 0,
                        duration: 1,
                        ease: "power3.out",
                        stagger: 0.15,
                        clearProps: "all"
                    });
                }

                // 2. Circular Scroll Progress
                const progressCircle = document.getElementById('progress-circle');
                const scrollProgress = document.getElementById('scroll-progress');
                
                if (progressCircle && scrollProgress) {
                    const radius = progressCircle.r.baseVal.value;
                    const circumference = radius * 2 * Math.PI;
                    progressCircle.style.strokeDasharray = `${circumference} ${circumference}`;
                    progressCircle.style.strokeDashoffset = circumference;

                    gsap.to(progressCircle, {
                        strokeDashoffset: 0,
                        ease: "none",
                        scrollTrigger: {
                            trigger: document.body,
                            start: "top top",
                            end: "bottom bottom",
                            scrub: true
                        }
                    });

                    window.addEventListener('scroll', () => {
                        if (window.scrollY > 200) {
                            scrollProgress.classList.remove('opacity-0', 'pointer-events-none');
                            scrollProgress.classList.add('cursor-pointer', 'pointer-events-auto');
                        } else {
                            scrollProgress.classList.add('opacity-0', 'pointer-events-none');
                            scrollProgress.classList.remove('cursor-pointer', 'pointer-events-auto');
                        }
                    });

                    scrollProgress.addEventListener('click', () => {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    });
                }

                // 3. Custom Cursor Follower
                const cursorFollower = document.getElementById('cursor-follower');
                const cursorDot = document.getElementById('cursor-dot');
                
                if (cursorFollower && cursorDot && window.innerWidth >= 768) {
                    gsap.set(cursorFollower, {xPercent: -50, yPercent: -50});
                    gsap.set(cursorDot, {xPercent: -50, yPercent: -50});

                    let xTo = gsap.quickTo(cursorFollower, "x", {duration: 0.4, ease: "power3.out"}),
                        yTo = gsap.quickTo(cursorFollower, "y", {duration: 0.4, ease: "power3.out"}),
                        xDotTo = gsap.quickTo(cursorDot, "x", {duration: 0.1, ease: "power3.out"}),
                        yDotTo = gsap.quickTo(cursorDot, "y", {duration: 0.1, ease: "power3.out"});

                    window.addEventListener("mousemove", (e) => {
                        cursorFollower.style.opacity = 1;
                        cursorDot.style.opacity = 1;
                        xTo(e.clientX);
                        yTo(e.clientY);
                        xDotTo(e.clientX);
                        yDotTo(e.clientY);
                    });

                    // Update interactives periodically due to dynamic content or use delegation
                    const expandCursor = () => {
                        gsap.to(cursorFollower, {scale: 1.8, borderColor: 'rgba(37, 99, 235, 0.4)', backgroundColor: 'rgba(37, 99, 235, 0.1)', duration: 0.2});
                        gsap.to(cursorDot, {scale: 0, duration: 0.2});
                    };
                    const shrinkCursor = () => {
                        gsap.to(cursorFollower, {scale: 1, borderColor: '#1c3f94', backgroundColor: 'transparent', duration: 0.2});
                        gsap.to(cursorDot, {scale: 1, duration: 0.2});
                    };

                    document.addEventListener('mouseover', (e) => {
                        if (e.target.closest('a') || e.target.closest('button') || e.target.closest('.service-card') || e.target.closest('.cursor-pointer')) {
                            expandCursor();
                        }
                    });
                    document.addEventListener('mouseout', (e) => {
                        if (e.target.closest('a') || e.target.closest('button') || e.target.closest('.service-card') || e.target.closest('.cursor-pointer')) {
                            shrinkCursor();
                        }
                    });
                }
            }
        });
    </script>
</body>
</html>
