<?php $pageTitle = 'Our Clients'; ?>

<section class="bg-[#1c3f94] py-24 relative overflow-hidden">
    <div class="container mx-auto px-4 md:px-10 text-center relative z-10">
        <h1 class="text-4xl md:text-[56px] font-bold text-white mb-6 tracking-tight leading-tight">Our Esteemed Clients</h1>
        <p class="text-blue-100 max-w-2xl mx-auto text-lg leading-relaxed font-light">We are proud to serve a diverse group of organizations, delivering strategic leadership and uncompromising excellence.</p>
    </div>
</section>

<section class="py-20 bg-slate-50">
    <div class="container mx-auto px-4 max-w-6xl">
        <?php if (!empty($clients)): ?>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 items-center">
                <?php foreach($clients as $c): ?>
                    <a href="<?= !empty($c['hyperlink']) ? htmlspecialchars($c['hyperlink']) : '#' ?>" <?= !empty($c['hyperlink']) ? 'target="_blank" rel="noopener noreferrer"' : '' ?> class="group block h-40 bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-slate-100 flex items-center justify-center relative overflow-hidden">
                        <?php if (!empty($c['logo'])): ?>
                            <img src="<?= htmlspecialchars($c['logo']) ?>" referrerpolicy="no-referrer" alt="<?= htmlspecialchars($c['name']) ?>" class="max-h-full max-w-full object-contain filter grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition duration-300">
                        <?php else: ?>
                            <span class="text-slate-500 font-semibold text-center uppercase tracking-wider group-hover:text-blue-600 transition"><?= htmlspecialchars($c['name']) ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-20">
                <p class="text-slate-500 text-lg">We are currently updating our client portfolio. Please check back later.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php 
// Fallback Static Reviews (Users can edit these if they do not have an API key)
$staticReviews = [
    [
        'name' => 'MD. Nafiul Islam',
        'photo' => 'https://ui-avatars.com/api/?name=MD+Nafiul+Islam&background=random',
        'rating' => 5,
        'time' => '1 month ago',
        'text' => 'Highly professional team with deep expertise in corporate tax and statutory audits. They have been an invaluable partner for our firm\'s compliance needs. Highly recommended!',
        'link' => 'https://www.google.com/search?q=zahur+mostafiz'
    ],
    [
        'name' => 'Sadia Rahman',
        'photo' => 'https://ui-avatars.com/api/?name=Sadia+Rahman&background=random',
        'rating' => 5,
        'time' => '3 months ago',
        'text' => 'Zahur Mostafiz & Co. has provided us with excellent advisory services. Their attention to detail and up-to-date knowledge of the regulatory framework is outstanding.',
        'link' => 'https://www.google.com/search?q=zahur+mostafiz'
    ],
    [
        'name' => 'Imran Khan',
        'photo' => 'https://ui-avatars.com/api/?name=Imran+Khan&background=random',
        'rating' => 5,
        'time' => '6 months ago',
        'text' => 'A very reliable accounting firm. They guided us through a complex financial restructuring smoothly. Their communication is clear, prompt, and highly effective.',
        'link' => 'https://www.google.com/search?q=zahur+mostafiz'
    ]
];
?>

<!-- Google Reviews Section -->
<section class="py-24 bg-white border-t border-slate-200" id="clients-reviews-section">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-10 space-y-4">
            <p class="text-[11px] font-bold uppercase tracking-widest text-[#1c3f94]">TESTIMONIALS</p>
            <h2 class="text-3xl md:text-[42px] font-extrabold text-[#111827] tracking-tight leading-tight">Client Experiences</h2>
            <p class="text-slate-600 text-lg leading-relaxed pt-2 font-light max-w-2xl mx-auto">
                Discover what our clients have to say about our professional excellence and commitment to service.
            </p>
        </div>

        <!-- Google Review Summary -->
        <div class="max-w-md mx-auto bg-white border border-slate-200 rounded-2xl p-6 shadow-sm mb-12 flex flex-col items-center justify-center text-center">
            <div class="flex items-center justify-center mb-1" id="review-summary-rating">
                <span class="text-4xl font-extrabold text-slate-800 mr-3">4.5</span>
                <div class="flex space-x-0.5">
                    <svg class="w-5 h-5 text-[#fbbc04]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-[#fbbc04]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-[#fbbc04]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg class="w-5 h-5 text-[#fbbc04]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <!-- Half star representation using full star but lighter color -->
                    <svg class="w-5 h-5 text-[#fbbc04]/50" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                </div>
            </div>
            <p class="text-slate-500 font-medium text-[15px] mb-4" id="review-summary-text">4.5 stars • 21,859 reviews</p>
            <a href="<?= !empty($settings['write_a_review_url']) ? htmlspecialchars($settings['write_a_review_url']) : 'https://g.page/r/CVBdmtx45lW5EBM/review' ?>" target="_blank" rel="noopener noreferrer" class="inline-flex flex-row items-center bg-[#1c3f94] text-white hover:bg-blue-800 px-6 py-2.5 rounded-lg text-sm font-bold transition-colors shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                Write a Review
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="clients-reviews-container">
            <?php foreach($staticReviews as $review): ?>
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow flex flex-col justify-between static-review">
                <div>
                    <div class="flex items-center space-x-4 mb-5">
                        <img src="<?= htmlspecialchars($review['photo']) ?>" class="w-12 h-12 rounded-full object-cover border border-slate-100" alt="<?= htmlspecialchars($review['name']) ?>" referrerpolicy="no-referrer" />
                        <div>
                            <h4 class="font-bold text-[#111827] text-sm"><?= htmlspecialchars($review['name']) ?></h4>
                            <div class="flex items-center space-x-2 mt-1">
                                <div class="flex space-x-0.5 text-[#fbbc04]">
                                    <?php for($i = 0; $i < $review['rating']; $i++) echo '★'; ?>
                                </div>
                                <span class="text-xs text-slate-400">&bull;</span>
                                <p class="text-xs text-slate-500"><?= htmlspecialchars($review['time']) ?></p>
                            </div>
                        </div>
                        <div class="ml-auto">
                            <!-- Google G icon -->
                            <svg class="w-6 h-6 text-[#1c3f94]/20" viewBox="0 0 24 24" fill="currentColor"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"/></svg>
                        </div>
                    </div>
                    <p class="text-slate-700 text-[15px] leading-relaxed font-light mb-6 line-clamp-4">
                        "<?= htmlspecialchars($review['text']) ?>"
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (!empty($settings['google_review_json_url'])): ?>
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
                let reviews = [];
                let rating = null;
                let userRatingsTotal = null;

                if (data.reviews && Array.isArray(data.reviews)) {
                    reviews = data.reviews;
                } else if (Array.isArray(data)) {
                    reviews = data;
                } else if (data.result) {
                    reviews = data.result.reviews || [];
                    rating = data.result.rating;
                    userRatingsTotal = data.result.user_ratings_total;
                }

                if (reviews.length > 0) {
                    const container = document.getElementById('clients-reviews-container');
                    container.innerHTML = ''; // Clear static reviews

                    reviews.forEach(review => {
                        const name = review.author_name || review.name || review.author_title || review.author || 'Anonymous';
                        const photoUrl = review.reviewerImage || review.profile_photo_url || review.thumbnail || review.author_image || review.profile_picture || `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&background=random`;
                        const text = review.text || review.snippet || review.review_text || review.content || '';
                        const time = review.relative_time_description || review.date || review.review_datetime_utc || review.time || '';
                        const rating = Math.round(review.rating || review.review_rating || 5);
                        const stars = '★'.repeat(rating) + '☆'.repeat(5 - rating);
                        const mapUrl = <?= json_encode($settings['google_map_location_url'] ?? '#') ?>;
                        
                        const reviewEl = document.createElement('div');
                        // Make parent relative and add top margin to account for absolute avatar
                        reviewEl.className = 'bg-white pt-14 pb-8 px-8 rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col items-center text-center mt-10 h-[calc(100%-2.5rem)] relative group';
                        reviewEl.innerHTML = `
                            <a href="${mapUrl}" target="_blank" class="block w-full h-full flex flex-col items-center justify-between">
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
                                
                                <p class="text-slate-500 text-[15px] leading-relaxed font-light mb-8 w-full">
                                    "${text}"
                                </p>
                                
                                <div class="w-full flex justify-between items-end text-sm text-slate-400 mt-auto">
                                    <span>${time}</span>
                                    <svg class="w-8 h-8 text-slate-300" viewBox="0 0 24 24" fill="currentColor"><path d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 01-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"/></svg>
                                </div>
                            </a>
                        `;
                        container.appendChild(reviewEl);
                    });

                    if (rating && userRatingsTotal) {
                        const summaryText = document.getElementById('review-summary-text');
                        if (summaryText) summaryText.innerText = `${rating} stars • ${userRatingsTotal} reviews`;
                        
                        const summaryRating = document.getElementById('review-summary-rating');
                        if (summaryRating) {
                            summaryRating.innerHTML = `
                                <span class="text-4xl font-extrabold text-slate-800 mr-3">${rating}</span>
                                <div class="flex space-x-0.5 text-[#fbbc04] text-xl">
                                    ${'★'.repeat(Math.round(rating)) + '☆'.repeat(5 - Math.round(rating))}
                                </div>
                            `;
                        }
                    }
                }
            })
            .catch(err => console.error("Error fetching reviews:", err));
    });
</script>
<?php endif; ?>
