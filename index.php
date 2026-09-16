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

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* ===================== LUXURY ROYAL THEME ===================== */
    :root {
        --logo-navy: #0A1628;
        --logo-gold: #C9A227;
        --logo-gold-dark: #8B6914;
        --pure-white: #FFFFFF;
        --off-white: #F9FAFB;
        --text-dark: #1A1A1A;
        --text-gray: #666666;
        --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        --shadow-elegant: 0 15px 35px rgba(10, 22, 40, 0.08);
    }

    body { background-color: var(--off-white); color: var(--text-dark); }

    /* ===================== HERO SLIDER SECTION ===================== */
    .home-hero { position: relative; height: 100vh; min-height: 750px; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden; margin: 0; }
    
    .hero-slider-container { position: absolute; inset: 0; z-index: 0; }
    .hero-slider-container .swiper-slide img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5); transform: scale(1.05); transition: transform 6s linear; }
    .hero-slider-container .swiper-slide-active img { transform: scale(1); } /* Animation effect on active slide */

    .home-hero-overlay { position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10,22,40,0.8) 0%, rgba(10,22,40,0.3) 50%, rgba(10,22,40,0.9) 100%); z-index: 1; pointer-events: none;}
    
    .home-hero-content { position: relative; z-index: 2; max-width: 900px; padding: 0 20px; animation: fadeInUp 1s ease both; margin-top: -60px; pointer-events: auto;}
    
    .hero-badge { display: inline-block; font-size: 13px; font-weight: 600; letter-spacing: 4px; text-transform: uppercase; color: var(--logo-gold); margin-bottom: 25px; display: flex; align-items: center; justify-content: center; gap: 15px;}
    .hero-badge::before, .hero-badge::after { content: ''; width: 40px; height: 1px; background: var(--logo-gold); }
    
    .home-hero-title { font-family: var(--font-display); font-size: clamp(45px, 8vw, 85px); font-weight: 700; line-height: 1.1; margin-bottom: 25px; color: var(--pure-white); text-transform: capitalize;}
    .home-hero-title span { color: var(--logo-gold); font-style: italic; font-weight: 400; }
    
    .home-hero-subtitle { font-size: clamp(16px, 2vw, 18px); color: rgba(255, 255, 255, 0.9); margin-bottom: 50px; font-weight: 300; line-height: 1.9; }
    
    .home-cta-buttons { display: flex; gap: 20px; justify-content: center; flex-wrap: wrap; }
    .btn-gold { display: inline-flex; align-items: center; justify-content: center; height: 52px; padding: 0 35px; background: var(--logo-gold); color: var(--logo-navy); font-weight: 700; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; transition: var(--transition); border: 2px solid var(--logo-gold); border-radius: 4px; }
    .btn-gold:hover { background: transparent; color: var(--logo-gold); }
    
    .btn-outline { display: inline-flex; align-items: center; justify-content: center; height: 52px; padding: 0 35px; border: 2px solid rgba(255,255,255,0.4); color: var(--pure-white); font-weight: 600; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; transition: var(--transition); border-radius: 4px; }
    .btn-outline:hover { border-color: var(--logo-gold); color: var(--logo-gold); }

    .scroll-indicator { position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); z-index: 5; display: flex; flex-direction: column; align-items: center; gap: 15px; color: rgba(255,255,255,0.6); font-size: 11px; letter-spacing: 3px; text-transform: uppercase; }
    .scroll-line { width: 1px; height: 60px; background: rgba(255,255,255,0.2); position: relative; overflow: hidden; }
    .scroll-line::after { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 50%; background: var(--logo-gold); animation: scrollLine 2s infinite ease-in-out; }
    @keyframes scrollLine { 0% { transform: translateY(-100%); } 100% { transform: translateY(200%); } }

    /* ===================== FLOATING FEATURES ===================== */
    .features-wrapper { position: relative; margin-top: -60px; z-index: 10; padding: 0 20px; }
    .features-banner { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); background: var(--logo-navy); max-width: 1100px; margin: 0 auto; box-shadow: var(--shadow-elegant); border-radius: 8px; border-bottom: 3px solid var(--logo-gold); }
    .feature-item { padding: 35px 20px; text-align: center; color: var(--pure-white); border-right: 1px solid rgba(255,255,255,0.05); transition: var(--transition); }
    .feature-item:last-child { border-right: none; }
    .feature-item:hover { background: rgba(255,255,255,0.03); transform: translateY(-5px); }
    .feature-item i { color: var(--logo-gold); font-size: 30px; margin-bottom: 15px; }
    .feature-item span { display: block; font-weight: 500; font-size: 15px; letter-spacing: 1px; }

    /* ===================== SECTION HEADERS ===================== */
    .section-padding { padding: 120px 0; }
    .section-header { text-align: center; max-width: 650px; margin: 0 auto 60px; display: flex; flex-direction: column; align-items: center;}
    .gold-line { width: 30px; height: 3px; background: var(--logo-gold); margin-bottom: 20px; }
    .section-header h2 { font-family: var(--font-display); font-size: clamp(38px, 5vw, 50px); color: var(--logo-navy); margin-bottom: 20px; font-weight: 700; line-height: 1.2; }
    .section-header h2 span { color: var(--logo-gold); font-style: italic; font-weight: 400;}
    .section-header p { font-size: 16px; color: var(--text-gray); line-height: 1.8; }

    /* ===================== ABOUT & SLIDER ===================== */
    .split-section { padding: 120px 0; background: var(--pure-white); }
    .split-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
    .split-text h2 { font-family: var(--font-display); font-size: clamp(40px, 4vw, 55px); color: var(--logo-navy); margin-bottom: 25px; line-height: 1.1; font-weight: 700; }
    .split-text h2 span { color: var(--logo-gold); font-style: italic; font-weight: 400; }
    .split-text .rich-content { font-size: 16px; color: var(--text-gray); line-height: 2; margin-bottom: 40px; border-left: 2px solid var(--logo-gold); padding-left: 20px; }
    
    .split-slider-wrapper { position: relative; padding: 20px 20px 0 0; }
    .split-slider-wrapper::before { content: ''; position: absolute; top: 0; right: 0; width: 80%; height: 80%; border: 2px solid var(--logo-gold); border-radius: 8px; z-index: 0; }
    .aboutSwiper { width: 100%; height: 500px; border-radius: 8px; box-shadow: var(--shadow-elegant); z-index: 2; position: relative; overflow: hidden; }
    .aboutSwiper .swiper-slide img { width: 100%; height: 100%; object-fit: cover; }
    
    .slider-nav { display: flex; gap: 10px; position: absolute; bottom: 20px; right: 20px; z-index: 10; }
    .slider-btn { width: 45px; height: 45px; background: var(--logo-navy); color: var(--logo-gold); display: flex; align-items: center; justify-content: center; cursor: pointer; transition: var(--transition); border-radius: 4px; }
    .slider-btn:hover { background: var(--logo-gold); color: var(--logo-navy); }

    /* ===================== DESTINATIONS ===================== */
    .dest-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 24px; }
    .dest-card { position: relative; overflow: hidden; cursor: pointer; height: 450px; border-radius: 8px; transition: var(--transition); }
    .dest-card-bg { position: absolute; inset: 0; transition: transform 0.8s ease; }
    .dest-card-bg img { width: 100%; height: 100%; object-fit: cover; }
    .dest-card:hover .dest-card-bg { transform: scale(1.1); }
    .dest-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,22,40,0.9) 0%, rgba(10,22,40,0.1) 60%, transparent 100%); transition: var(--transition); }
    .dest-card:hover .dest-card-overlay { background: linear-gradient(to top, rgba(10,22,40,0.95) 0%, rgba(10,22,40,0.4) 60%, rgba(10,22,40,0.1) 100%); }
    .dest-card-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 30px; color: var(--pure-white); transition: var(--transition); text-align: center; }
    .dest-card:hover .dest-card-content { transform: translateY(-10px); }
    .dest-name { font-family: var(--font-display); font-size: 32px; font-weight: 700; margin-bottom: 10px; }
    .dest-excerpt { font-size: 14px; color: rgba(255, 255, 255, 0.7); line-height: 1.6; margin-bottom: 0; opacity: 0; height: 0; transition: var(--transition); overflow: hidden; }
    .dest-card:hover .dest-excerpt { opacity: 1; height: auto; margin-bottom: 15px; margin-top: 10px;}
    .dest-cta { font-size: 12px; font-weight: 700; color: var(--logo-gold); text-transform: uppercase; letter-spacing: 2px; opacity: 0; transition: var(--transition); display: inline-block;}
    .dest-card:hover .dest-cta { opacity: 1; }

    /* ===================== TOURS CARDS ===================== */
    .tours-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 35px; }
    .tour-card { background: var(--pure-white); border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: var(--transition); display: flex; flex-direction: column; border: 1px solid #EEEEEE; border-bottom: 3px solid transparent;}
    .tour-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-elegant); border-bottom-color: var(--logo-gold); }
    
    .tour-image { position: relative; height: 260px; overflow: hidden; display: block; }
    .tour-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
    .tour-card:hover .tour-image img { transform: scale(1.08); }
    
    .tour-wishlist { position: absolute; top: 15px; right: 15px; width: 40px; height: 40px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #ccc; cursor: pointer; transition: var(--transition); }
    .tour-wishlist:hover { color: #E74C3C; }
    
    .tour-body { padding: 30px; flex-grow: 1; display: flex; flex-direction: column; }
    .tour-location { font-size: 12px; color: var(--text-gray); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;}
    .tour-location i { color: var(--logo-gold); font-size: 14px;}
    
    .tour-name { font-family: var(--font-display); font-size: 24px; font-weight: 700; color: var(--logo-navy); margin-bottom: 20px; line-height: 1.3; transition: color 0.3s ease; text-decoration: none; }
    .tour-card:hover .tour-name { color: var(--logo-gold); }
    
    .tour-meta { display: flex; justify-content: space-between; padding-bottom: 20px; border-bottom: 1px solid #EEEEEE; margin-bottom: 20px; }
    .tour-meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-gray); font-weight: 500;}
    .tour-meta-item i { color: var(--logo-navy); }
    
    .tour-footer { display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto; }
    .tour-price-label { font-size: 11px; color: var(--text-gray); display: block; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 1px;}
    .tour-price-amount { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--logo-navy); line-height: 1;}
    
    .tour-book-btn { width: 45px; height: 45px; border: 1px solid var(--border); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--logo-navy); font-size: 16px; transition: var(--transition); background: transparent; }
    .tour-card:hover .tour-book-btn { background: var(--logo-navy); color: var(--logo-gold); border-color: var(--logo-navy); }

    /* ===================== VIDEO SECTION ===================== */
    .video-promo { position: relative; padding: 150px 0; background: var(--logo-navy); text-align: center; color: var(--pure-white); }
    .video-bg { position: absolute; inset: 0; z-index: 0; }
    .video-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.3) grayscale(20%); }
    .video-content { position: relative; z-index: 2; max-width: 800px; margin: 0 auto; }
    .video-content h2 { font-family: var(--font-display); font-size: clamp(38px, 5vw, 60px); margin-bottom: 20px; font-weight: 700;}
    .video-content p { font-size: 18px; color: rgba(255,255,255,0.8); margin-bottom: 50px; font-weight: 300;}
    .play-btn { width: 80px; height: 80px; background: rgba(201,162,39,0.2); border: 2px solid var(--logo-gold); color: var(--logo-gold); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-size: 24px; cursor: pointer; transition: var(--transition); padding-left: 5px; margin: 0 auto;}
    .play-btn:hover { background: var(--logo-gold); color: var(--logo-navy); transform: scale(1.1); }

    .vid-modal { position: fixed; inset: 0; background: rgba(10,22,40,0.95); z-index: 9999; display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: 0.4s ease; }
    .vid-modal.active { opacity: 1; pointer-events: auto; }
    .vid-modal video { max-width: 90%; max-height: 80vh; border: 2px solid var(--logo-gold); border-radius: 8px; outline: none; }
    .vid-close { position: absolute; top: 30px; right: 30px; color: var(--pure-white); font-size: 36px; cursor: pointer; transition: 0.3s; }
    .vid-close:hover { color: var(--logo-gold); }

    /* ===================== GUEST REVIEWS ===================== */
    .reviews-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; }
    .review-card { background: var(--pure-white); border-radius: 8px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.04); border-top: 3px solid var(--logo-gold); transition: var(--transition); }
    .review-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-elegant); }
    .review-stars { color: var(--logo-gold); font-size: 14px; margin-bottom: 20px; display: flex; gap: 3px;}
    .review-text { font-size: 15px; color: var(--text-gray); line-height: 1.8; margin-bottom: 30px; font-style: italic; }
    .review-author { display: flex; align-items: center; gap: 15px; }
    .review-avatar { width: 50px; height: 50px; background: var(--off-white); color: var(--logo-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-size: 22px; font-weight: 700; border: 1px solid #EAEAEA; }
    .author-info h4 { font-size: 15px; color: var(--logo-navy); margin-bottom: 4px; font-weight: 700; }
    .author-info p { font-size: 13px; color: var(--text-gray); margin:0; }

    /* ===================== CTA BANNER ===================== */
    .cta-banner { position: relative; padding: 120px 0; text-align: center; background: var(--logo-navy); overflow: hidden;}
    .cta-bg { position: absolute; inset: 0; }
    .cta-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.25); }
    .cta-content { position: relative; z-index: 2; color: var(--pure-white); }
    .cta-content h2 { font-size: clamp(32px, 5vw, 50px); margin-bottom: 20px; font-family: var(--font-display); font-weight: 700; }
    .cta-content p { font-size: 16px; margin-bottom: 40px; color: rgba(255,255,255,0.8); font-weight: 300; max-width: 600px; margin-inline: auto;}

    @media (max-width: 1200px) { .dest-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 991px) { 
        .features-banner { grid-template-columns: 1fr; } 
        .feature-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .feature-item:last-child { border-bottom: none; }
        .split-grid { grid-template-columns: 1fr; gap: 50px;}
        .split-slider-wrapper { padding: 0; }
        .split-slider-wrapper::before { display: none; }
        .swiper-container { height: 400px; }
    }
    @media (max-width: 767px) {
        .dest-grid { grid-template-columns: 1fr; }
        .tours-grid { grid-template-columns: 1fr; }
        .home-hero-content { margin-top: 0; }
        .section-padding { padding: 80px 0; }
    }
</style>

<!-- ===================== LUXURY HERO SLIDER ===================== -->
<section class="home-hero">
    <div class="hero-slider-container swiper-container heroSwiper">
        <div class="swiper-wrapper">
            <?php 
            $hero_json = $settings['home_hero_slider_images'] ?? '[]';
            $hero_imgs = json_decode($hero_json, true);
            if(is_array($hero_imgs) && !empty($hero_imgs)) {
                foreach($hero_imgs as $s_img) {
                    echo '<div class="swiper-slide"><img src="'.get_image_url($s_img, 'placeholder').'" alt="Egypt Background"></div>';
                }
            } else {
                echo '<div class="swiper-slide"><img src="https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop" alt="Fallback"></div>';
            }
            ?>
        </div>
    </div>
    <div class="home-hero-overlay"></div>
    
    <div class="container">
        <div class="home-hero-content">
            <span class="hero-badge">Welcome to Egypt</span>
            <h1 class="home-hero-title"><?= html_entity_decode($settings['home_hero_title'] ?? 'Experience the Magic of <span>Egypt</span>') ?></h1>
            
            <div class="home-hero-subtitle">
                <?= html_entity_decode(strip_tags($settings['home_hero_subtitle'] ?? 'Your trusted partner for extraordinary Egyptian adventures.')) ?>
            </div>
            
            <div class="home-cta-buttons">
                <?php if(!empty($settings['home_hero_btn1_text'])): ?>
                    <a href="<?= htmlspecialchars($settings['home_hero_btn1_link'] ?? '#') ?>" class="btn-gold"><?= htmlspecialchars($settings['home_hero_btn1_text']) ?></a>
                <?php endif; ?>
                <?php if(!empty($settings['home_hero_btn2_text'])): ?>
                    <a href="<?= htmlspecialchars($settings['home_hero_btn2_link'] ?? '#') ?>" class="btn-outline"><?= htmlspecialchars($settings['home_hero_btn2_text']) ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ===================== FIXED FLOATING FEATURES ===================== -->
<div class="features-wrapper">
    <div class="features-banner reveal">
        <div class="feature-item">
            <i class="fa-solid fa-certificate"></i>
            <span>Best Price Guarantee</span>
        </div>
        <div class="feature-item">
            <i class="fa-solid fa-headset"></i>
            <span>24/7 Dedicated Support</span>
        </div>
        <div class="feature-item">
            <i class="fa-solid fa-star"></i>
            <span>Hand-picked Tours</span>
        </div>
        <div class="feature-item">
            <i class="fa-regular fa-compass"></i>
            <span>Tailored Itineraries</span>
        </div>
    </div>
</div>

<!-- ===================== ABOUT & SLIDER SECTION ===================== -->
<section class="split-section">
    <div class="container">
        <div class="split-grid">
            
            <div class="split-text reveal">
                <div class="gold-line"></div>
                <?php
                    $about_title = $settings['home_about_title'] ?? 'Discover The Real Egypt';
                    if (strpos($about_title, '<span>') === false) {
                        $words = explode(' ', $about_title);
                        $last_word = array_pop($words);
                        $about_title = implode(' ', $words) . ' <span>' . $last_word . '</span>';
                    }
                ?>
                <h2><?= $about_title ?></h2>
                <div class="rich-content">
                    <?= html_entity_decode($settings['home_about_text'] ?? '<p>Welcome to Egypt Travel Square, where we turn your travel dreams into a golden reality. Let us guide you through the ancient wonders of the Pharaohs with luxury and authentic experiences.</p>') ?>
                </div>
                <?php if(!empty($settings['home_about_btn_text'])): ?>
                    <a href="<?= htmlspecialchars($settings['home_about_btn_link'] ?? 'about.php') ?>" class="btn-gold">
                        <?= htmlspecialchars($settings['home_about_btn_text']) ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="split-slider-wrapper reveal">
                <div class="swiper-container aboutSwiper">
                    <div class="swiper-wrapper">
                        <?php 
                        $about_json = $settings['home_about_slider_images'] ?? '[]';
                        $about_imgs = json_decode($about_json, true);
                        if(is_array($about_imgs) && !empty($about_imgs)) {
                            foreach($about_imgs as $s_img) {
                                echo '<div class="swiper-slide"><img src="'.get_image_url($s_img, 'placeholder').'" alt="Egypt Travel"></div>';
                            }
                        } else {
                            echo '<div class="swiper-slide"><img src="https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=1000&auto=format&fit=crop" alt="Placeholder"></div>';
                        }
                        ?>
                    </div>
                    <div class="slider-nav">
                        <div class="slider-btn swiper-prev-custom"><i class="fa-solid fa-chevron-left"></i></div>
                        <div class="slider-btn swiper-next-custom"><i class="fa-solid fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===================== DESTINATIONS ===================== -->
<section class="section-padding" style="background: var(--off-white);">
    <div class="container">
        <div class="section-header reveal">
            <div class="gold-line"></div>
            <h2>Timeless <span>Destinations</span></h2>
            <p>Journey through Egypt's most iconic cities, where ancient history seamlessly blends with modern life.</p>
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
                    <p class="dest-excerpt">
                        <?= htmlspecialchars(mb_strimwidth(strip_tags(html_entity_decode($dest['intro_text'])), 0, 110, '...')) ?>
                    </p>
                    <span class="dest-cta">Discover <i class="fa-solid fa-arrow-right" style="margin-left:5px;"></i></span>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== TOURS CARDS ===================== -->
<section class="section-padding" style="background: var(--pure-white);">
    <div class="container">
        <div class="section-header reveal">
            <div class="gold-line"></div>
            <h2>Curated <span>Journeys</span></h2>
            <p>Discover our hand-picked selection of the most exclusive tours and multi-day packages designed just for you.</p>
        </div>
        
        <div class="tours-grid">
            <?php foreach($latestTours as $tour): ?>
            <div class="tour-card reveal">
                <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image">
                    <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
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
                            <span class="tour-price-label">Starting From</span>
                            <span class="tour-price-amount">$<?= htmlspecialchars($tour['price']) ?></span>
                        </div>
                        <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-book-btn"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-top: 60px;" class="reveal">
            <a href="tours.php?type=day" class="btn-outline" style="color: var(--logo-navy); border-color: var(--logo-navy);">View All Experiences</a>
        </div>
    </div>
</section>

<!-- ===================== VIDEO PROMO SECTION ===================== -->
<?php if(!empty($settings['home_video_upload'])): ?>
<section class="video-promo reveal">
    <div class="video-bg">
        <img src="<?= get_image_url($settings['home_video_cover'] ?? '', 'placeholder') ?>" alt="Video Cover">
    </div>
    <div class="video-content">
        <h2><?= htmlspecialchars($settings['home_video_title'] ?? 'Experience The Journey') ?></h2>
        <p><?= htmlspecialchars($settings['home_video_subtitle'] ?? 'Watch our latest adventures in the heart of Egypt') ?></p>
        <div class="play-btn" onclick="openVideoModal()"><i class="fa-solid fa-play"></i></div>
    </div>
</section>

<!-- Video Modal -->
<div class="vid-modal" id="vidModal">
    <div class="vid-close" onclick="closeVideoModal()"><i class="fa-solid fa-xmark"></i></div>
    <video id="promoVideo" controls>
        <source src="<?= get_image_url($settings['home_video_upload'], 'placeholder') ?>" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
</div>
<?php endif; ?>

<!-- ===================== GUEST REVIEWS SECTION ===================== -->
<section class="section-padding" style="background: var(--off-white);">
    <div class="container">
        <div class="section-header reveal">
            <div class="gold-line"></div>
            <h2>What Our <span>Guests Say</span></h2>
            <p>Read genuine stories and experiences from travelers who chose to explore Egypt with us.</p>
        </div>
        
        <div class="reviews-grid">
            <?php if(empty($homeReviews)): ?>
                <p style="text-align:center; grid-column: 1 / -1; color: var(--text-muted);">No reviews yet. Be the first to share your experience!</p>
            <?php else: ?>
                <?php foreach($homeReviews as $rev): ?>
                <div class="review-card reveal">
                    <div class="review-stars">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <i class="fa-<?= $i <= $rev['rating'] ? 'solid' : 'regular' ?> fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <p class="review-text">"<?= htmlspecialchars($rev['review_text']) ?>"</p>
                    <div class="review-author">
                        <div class="review-avatar">
                            <?= strtoupper(substr($rev['name'], 0, 1)) ?>
                        </div>
                        <div class="author-info">
                            <h4><?= htmlspecialchars($rev['name']) ?></h4>
                            <p><?= htmlspecialchars($rev['country']) ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div style="text-align: center; margin-top: 50px;" class="reveal">
            <a href="reviews.php" class="btn-outline" style="color: var(--logo-navy); border-color: var(--logo-navy);">Read More Reviews</a>
        </div>
    </div>
</section>

<!-- ===================== CTA BANNER ===================== -->
<section class="cta-banner reveal">
    <div class="cta-bg">
        <img src="<?= get_image_url($settings['home_cta_bg'] ?? '', 'placeholder') ?>" alt="Luxor Scene">
    </div>
    <div class="home-hero-overlay"></div>
    <div class="container">
        <div class="cta-content">
            <h2>Ready for an Unforgettable Journey?</h2>
            <p>Let our travel experts craft the perfect customized itinerary for your Egyptian vacation.</p>
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['phone'] ?? '201006796511') ?>" target="_blank" class="btn-gold">
                <i class="fa-brands fa-whatsapp" style="margin-right: 10px; font-size: 18px;"></i> Contact Us Now
            </a>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // سلايدر الهيرو (تلاشي بطيء للصور في الخلفية)
    var heroSwiper = new Swiper(".heroSwiper", {
        loop: true,
        speed: 1500, // سرعة حركة التلاشي
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        effect: "fade",
        fadeEffect: { crossFade: true },
        allowTouchMove: false // منع سحب صور الخلفية باليد
    });

    // سلايدر النبذة (عن الشركة)
    var aboutSwiper = new Swiper(".aboutSwiper", {
        loop: true,
        speed: 800,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: ".swiper-next-custom",
            prevEl: ".swiper-prev-custom",
        },
        effect: "fade",
        fadeEffect: { crossFade: true }
    });

    function openVideoModal() {
        document.getElementById('vidModal').classList.add('active');
        document.getElementById('promoVideo').play();
    }
    
    function closeVideoModal() {
        document.getElementById('vidModal').classList.remove('active');
        document.getElementById('promoVideo').pause();
    }

    document.getElementById('vidModal')?.addEventListener('click', function(e) {
        if(e.target === this) { closeVideoModal(); }
    });
</script>

<?php include 'includes/footer.php'; ?>