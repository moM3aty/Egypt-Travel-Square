<?php
// Path: /index.php
require_once 'config.php';

// 1. جلب كافة الإعدادات
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

// 2. جلب أفضل 4 وجهات (المدن)
$stmtDest = $pdo->query("SELECT * FROM destinations ORDER BY id ASC LIMIT 4");
$destinations = $stmtDest->fetchAll();

// 3. جلب أحدث 6 رحلات
$stmtTours = $pdo->query("SELECT * FROM tours ORDER BY id DESC LIMIT 6");
$latestTours = $stmtTours->fetchAll();

// 4. جلب أحدث 3 تقييمات للعملاء
$stmtReviews = $pdo->query("SELECT * FROM reviews WHERE status = 'approved' ORDER BY id DESC LIMIT 3");
$homeReviews = $stmtReviews->fetchAll();

$pageTitle = "Egypt Travel Square | Authentic Egyptian Adventures";
include 'includes/header.php';
?>

<style>
    /* ===================== HOME HERO ===================== */
    .home-hero { position: relative; height: 90vh; min-height: 600px; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden; margin: 0; }
    .home-hero-bg { position: absolute; inset: 0; z-index: 0; }
    .home-hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.4); }
    .home-hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.8) 0%, rgba(10, 22, 40, 0.2) 100%); }
    .home-hero-content { position: relative; z-index: 2; color: var(--white); max-width: 900px; padding: 0 20px; animation: fadeInUp 1s ease both; }
    .home-hero-title { font-family: var(--font-display); font-size: clamp(42px, 7vw, 85px); font-weight: 700; line-height: 1.1; margin-bottom: 24px; color: var(--white); }
    .home-hero-title span { color: var(--gold); font-style: italic; }
    .home-hero-subtitle { font-size: clamp(18px, 3vw, 22px); color: rgba(255, 255, 255, 0.85); margin-bottom: 40px; font-weight: 300; line-height: 1.6; }
    .home-hero-subtitle p { margin-bottom: 10px; } /* لضبط مسافات محرر النصوص */
    .home-cta-buttons { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
    .btn-outline { display: inline-flex; align-items: center; justify-content: center; height: 52px; padding: 0 35px; border: 2px solid var(--gold); color: var(--gold); border-radius: 50px; font-weight: 600; font-size: 16px; transition: all 0.3s ease; }
    .btn-outline:hover { background: var(--gold); color: var(--navy); }
    .btn-solid { display: inline-flex; align-items: center; justify-content: center; height: 52px; padding: 0 35px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--navy); border-radius: 50px; font-weight: 700; font-size: 16px; transition: all 0.3s ease; box-shadow: var(--shadow-gold); border: none; }
    .btn-solid:hover { transform: translateY(-3px); box-shadow: 0 12px 40px rgba(201, 162, 39, 0.5); }

    .section-padding { padding: 100px 0; }
    .section-header { text-align: center; max-width: 700px; margin: 0 auto 60px; }
    .section-header h2 { font-family: var(--font-display); font-size: clamp(32px, 5vw, 48px); color: var(--navy); margin-bottom: 16px; }
    .section-header h2 span { color: var(--gold); font-style: italic; }
    .section-header p { font-size: 16px; color: var(--text-muted); line-height: 1.8; }

    .features-banner { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 20px; background: var(--navy); color: var(--white); padding: 40px 50px; border-radius: 20px; margin: -50px auto 60px; position: relative; z-index: 10; box-shadow: var(--shadow-medium); max-width: 1200px; }
    .feature-item { display: flex; align-items: center; gap: 15px; font-weight: 500; font-size: 16px; }
    .feature-item i { color: var(--gold); font-size: 24px; }

    @media (max-width: 991px) { .features-banner { flex-direction: column; padding: 30px; margin-top: 0; border-radius: 0; } }
</style>

<!-- ===================== HOME HERO (DYNAMIC) ===================== -->
<section class="home-hero">
    <div class="home-hero-bg">
        <img src="<?= get_image_url($settings['home_hero_bg'] ?? '', 'placeholder') ?>" alt="Egypt Travel Square">
    </div>
    <div class="home-hero-overlay"></div>
    <div class="container">
        <div class="home-hero-content">
            <!-- استخدام html_entity_decode لترجمة أكواد الألوان والخطوط من لوحة التحكم -->
            <h1 class="home-hero-title"><?= html_entity_decode($settings['home_hero_title'] ?? 'Experience the Magic of <span>Egypt</span>') ?></h1>
            
            <!-- تم تغيير p إلى div لمنع تداخل وسوم p التي يولدها محرر النصوص تلقائياً -->
            <div class="home-hero-subtitle">
                <?= html_entity_decode($settings['home_hero_subtitle'] ?? '') ?>
            </div>
            
            <div class="home-cta-buttons">
                <?php if(!empty($settings['home_hero_btn1_text'])): ?>
                    <a href="<?= htmlspecialchars($settings['home_hero_btn1_link'] ?? '#') ?>" class="btn-solid"><?= htmlspecialchars($settings['home_hero_btn1_text']) ?></a>
                <?php endif; ?>
                <?php if(!empty($settings['home_hero_btn2_text'])): ?>
                    <a href="<?= htmlspecialchars($settings['home_hero_btn2_link'] ?? '#') ?>" class="btn-outline"><?= htmlspecialchars($settings['home_hero_btn2_text']) ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- ===================== FEATURES BANNER ===================== -->
<div class="container">
    <div class="features-banner reveal">
        <div class="feature-item"><i class="fa-solid fa-shield-heart"></i> No-hassle best price guarantee</div>
        <div class="feature-item"><i class="fa-solid fa-headset"></i> Customer care available 24/7</div>
        <div class="feature-item"><i class="fa-solid fa-star"></i> Hand-picked Tours & Activities</div>
        <div class="feature-item"><i class="fa-solid fa-plane-departure"></i> Tailored Itineraries</div>
    </div>
</div>

<!-- ===================== DESTINATIONS ===================== -->
<section class="section-padding" style="padding-top: 40px;">
    <div class="container">
        <div class="section-header reveal">
            <h2>Popular <span>Destinations</span></h2>
            <p>Explore the timeless beauty of Egypt's most iconic cities. From the great pyramids of Cairo to the serene beaches of the Red Sea.</p>
        </div>
        
        <div class="dest-grid">
            <?php foreach($destinations as $dest): ?>
            <div class="dest-card reveal" onclick="window.location.href='destination.php?slug=<?= htmlspecialchars($dest['slug']) ?>'">
                <div class="dest-card-bg">
                    <img src="<?= get_image_url($dest['hero_image'], 'destination') ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
                </div>
                <div class="dest-card-overlay"></div>
                <div class="dest-card-content">
                    <h3 class="dest-name"><?= htmlspecialchars($dest['name']) ?></h3>
                    <!-- استخدام strip_tags لمسح أكواد الـ HTML من محرر النصوص وعرض نبذة نظيفة -->
                    <p class="dest-excerpt" style="margin-bottom: 0;">
                        <?= htmlspecialchars(mb_strimwidth(strip_tags(html_entity_decode($dest['intro_text'])), 0, 110, '...')) ?>
                    </p>
                    <span class="dest-cta">Explore City <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== LATEST TOURS ===================== -->
<section class="section-padding" style="background: var(--sand-dark);">
    <div class="container">
        <div class="section-header reveal">
            <h2>Trending <span>Tours & Packages</span></h2>
            <p>Discover our hand-picked selection of the most popular tours and multi-day packages designed just for you.</p>
        </div>
        
        <div class="tours-grid">
            <?php foreach($latestTours as $tour): ?>
            <div class="tour-card reveal">
                <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image">
                    <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
                    <div class="tour-badge"><i class="fa-solid fa-star"></i> 5.0</div>
                    <div class="tour-wishlist"><i class="fa-regular fa-heart"></i></div>
                </a>
                <div class="tour-body">
                    <div class="tour-location"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($tour['location']) ?></div>
                    <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-name"><?= htmlspecialchars($tour['title']) ?></a>
                    <div class="tour-meta">
                        <div class="tour-meta-item"><i class="fa-regular fa-clock"></i> <?= htmlspecialchars($tour['duration']) ?></div>
                        <div class="tour-meta-item"><i class="fa-solid fa-van-shuttle"></i> <?= htmlspecialchars(ucfirst($tour['type'])) ?></div>
                    </div>
                    <div class="tour-footer">
                        <div class="tour-price">
                            <span class="tour-price-label">From</span>
                            <span class="tour-price-amount">$<?= htmlspecialchars($tour['price']) ?></span>
                        </div>
                        <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-book"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 60px;" class="reveal">
            <a href="tours.php?type=day" class="btn-outline" style="border-color: var(--navy); color: var(--navy);">View All Tours <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
        </div>
    </div>
</section>

<!-- ===================== GUEST REVIEWS SECTION ===================== -->
<section class="section-padding" style="background: var(--sand);">
    <div class="container">
        <div class="section-header reveal">
            <h2>What Our <span>Guests Say</span></h2>
            <p>Don't just take our word for it. Read real stories from travelers who explored Egypt with us.</p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            <?php if(empty($homeReviews)): ?>
                <p style="text-align:center; grid-column: 1 / -1; color: var(--text-muted);">No reviews yet. Be the first to share your experience!</p>
            <?php else: ?>
                <?php foreach($homeReviews as $rev): ?>
                <div class="review-card reveal" style="background: var(--white); border-radius: 16px; padding: 30px; box-shadow: var(--shadow-soft); border-top: 4px solid var(--gold);">
                    <div class="review-stars" style="color: var(--gold); margin-bottom: 15px; font-size: 14px;">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <i class="fa-<?= $i <= $rev['rating'] ? 'solid' : 'regular' ?> fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="review-text" style="font-size: 15px; color: var(--text-muted); line-height: 1.8; margin-bottom: 20px; font-style: italic;">"<?= htmlspecialchars($rev['review_text']) ?>"</p>
                    <div class="review-author" style="display: flex; align-items: center; gap: 15px;">
                        <div class="review-avatar" style="width: 50px; height: 50px; background: var(--navy); color: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-size: 24px; font-weight: bold;">
                            <?= strtoupper(substr($rev['name'], 0, 1)) ?>
                        </div>
                        <div class="author-info">
                            <h4 style="font-size: 16px; color: var(--navy); margin-bottom: 2px;"><?= htmlspecialchars($rev['name']) ?></h4>
                            <p style="font-size: 13px; color: var(--text-muted); margin:0;"><i class="fa-solid fa-earth-americas" style="color:var(--gold);"></i> <?= htmlspecialchars($rev['country']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div style="text-align: center; margin-top: 40px;" class="reveal">
            <a href="reviews.php" class="btn-outline" style="border-color: var(--navy); color: var(--navy);">Read All Reviews <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></a>
        </div>
    </div>
</section>

<!-- ===================== CTA BANNER ===================== -->
<section class="cta-banner reveal" style="position: relative; padding: 120px 0; text-align: center; overflow: hidden;">
    <div class="cta-bg" style="position: absolute; inset: 0;">
        <!-- هنا تم ربط الصورة بلوحة التحكم -->
        <img src="<?= get_image_url($settings['home_cta_bg'] ?? '', 'placeholder') ?>" alt="Luxor Scene" style="width: 100%; height: 100%; object-fit: cover; filter: brightness(0.35);">
    </div>
    <div class="cta-overlay" style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.8), rgba(201, 162, 39, 0.3));"></div>
    <div class="container">
        <div class="cta-content" style="position: relative; z-index: 2; color: var(--white);">
            <h2 style="font-size: clamp(32px, 5vw, 56px); margin-bottom: 24px; color: var(--white); font-family: var(--font-display); font-weight: 700;">Ready for an Unforgettable Journey?</h2>
            <p style="font-size: 18px; margin-bottom: 30px; color: rgba(255,255,255,0.8);">Let our travel experts craft the perfect customized itinerary for your Egyptian vacation.</p>
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['phone'] ?? '201006796511') ?>" target="_blank" class="btn-solid">
                <i class="fa-brands fa-whatsapp" style="margin-right: 8px; font-size: 20px;"></i> Chat With Us Now
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>