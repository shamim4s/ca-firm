<?php $pageTitle = 'Contact Us'; ?>

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
            CONNECT WITH US
        </div>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight">Get in Touch</h1>
        <p class="text-slate-300 max-w-2xl mx-auto text-lg leading-relaxed">Reach out to our partners for exceptional financial advisory, audit, and strategic tax planning services tailored to your enterprise.</p>
    </div>
</section>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4 md:px-10 border-b border-slate-200 pb-20 mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm text-center hover:shadow-md transition-shadow">
                <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 mx-auto mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 text-lg mb-2">Dhanmondi Branch</h3>
                <p class="text-slate-500 text-sm">House # 14/A (Flat-2A), Road # 02,<br>Dhanmondi R/A, Dhaka-1205</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm text-center hover:shadow-md transition-shadow">
                <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 mx-auto mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 text-lg mb-2">Mohakhali Branch</h3>
                <p class="text-slate-500 text-sm">Green Trade Point, 8th floor<br>7 Bir Uttam A.K Khandakar road,<br>Mohakhali, Dhaka-1212</p>
            </div>
            
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm text-center hover:shadow-md transition-shadow">
                <div class="w-14 h-14 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600 mx-auto mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-slate-800 text-lg mb-2">Direct Contact</h3>
                <p class="text-slate-500 text-sm mb-1">info@zahurmostafiz.com</p>
                <p class="text-slate-500 text-sm">+880 1721-158568</p>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 md:px-10">
        <!-- Branch 1 Contact & Map -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-24">
            
            <!-- Contact Form -->
            <div class="bg-white p-10 rounded-2xl border border-slate-200 shadow-xl relative">
                <div class="absolute -top-4 -right-4 bg-blue-600 text-[10px] text-white font-bold px-3 py-1 uppercase rounded-full shadow-lg">Dhanmondi</div>
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Send Inquiry to Dhanmondi</h2>
                <p class="text-slate-500 mb-8 leading-relaxed">Reach out to our Dhanmondi branch directly.</p>
                
                <?php if(isset($_GET['success_dhanmondi'])): ?>
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-start">
                    <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Thank you! Your message to Dhanmondi has been sent.</span>
                </div>
                <?php endif; ?>

                <form action="<?= SITE_URL ?>/contact/submit" method="POST" class="space-y-4">
                    <input type="hidden" name="branch" value="dhanmondi">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="name" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:border-blue-500 outline-none  bg-slate-50" placeholder="Full Name">
                        </div>
                        <div>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:border-blue-500 outline-none bg-slate-50" placeholder="Email Address">
                        </div>
                    </div>
                    <div>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:border-blue-500 outline-none bg-slate-50 resize-none" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 transition">Send to Dhanmondi</button>
                </form>
            </div>

            <!-- Map Area -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-lg h-full min-h-[400px] flex flex-col">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800">Dhanmondi Location</h3>
                </div>
                <div class="flex-1 w-full relative">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14608.156828591873!2d90.366509!3d23.746001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b33cc5546d%3A0xe67ebfbc21fa58!2sDhanmondi%2C%20Dhaka%201205!5e0!3m2!1sen!2sbd!4v1714088902000!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0 h-full w-full"></iframe>
                </div>
            </div>
        </div>

        <div class="w-full h-px bg-slate-200 mb-24"></div>

        <!-- Branch 2 Contact & Map -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start mb-16">
            
            <!-- Contact Form -->
            <div class="bg-white p-10 rounded-2xl border border-slate-200 shadow-xl relative order-2 lg:order-1">
                <div class="absolute -top-4 -right-4 bg-indigo-600 text-[10px] text-white font-bold px-3 py-1 uppercase rounded-full shadow-lg">Mohakhali</div>
                <h2 class="text-3xl font-bold text-slate-800 mb-2">Send Inquiry to Mohakhali</h2>
                <p class="text-slate-500 mb-8 leading-relaxed">Reach out to our Mohakhali branch directly.</p>
                
                <?php if(isset($_GET['success_mohakhali'])): ?>
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg mb-6 flex items-start">
                    <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span>Thank you! Your message to Mohakhali has been sent.</span>
                </div>
                <?php endif; ?>

                <form action="<?= SITE_URL ?>/contact/submit" method="POST" class="space-y-4">
                    <input type="hidden" name="branch" value="mohakhali">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <input type="text" name="name" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:border-indigo-500 outline-none  bg-slate-50" placeholder="Full Name">
                        </div>
                        <div>
                            <input type="email" name="email" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:border-indigo-500 outline-none bg-slate-50" placeholder="Email Address">
                        </div>
                    </div>
                    <div>
                        <textarea name="message" rows="4" required class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:border-indigo-500 outline-none bg-slate-50 resize-none" placeholder="Message"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition">Send to Mohakhali</button>
                </form>
            </div>

            <!-- Map Area -->
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-lg h-full min-h-[400px] flex flex-col order-1 lg:order-2">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800">Mohakhali Location</h3>
                </div>
                <div class="flex-1 w-full relative">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14603.966779878!2d90.3957263!3d23.7828068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a0f3d6dbf3%3A0xc66c1b3f9dbb5683!2sMohakhali%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1714088998000!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="absolute inset-0 h-full w-full"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
