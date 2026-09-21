<?php
// Path: /about.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "About Us | Egypt Travel Square";
include 'includes/header.php';

$about_title = $settings['about_page_title'] ?? 'Welcome to <span>Egypt Travel Square</span>';
$about_content = $settings['about_page_content'] ?? '<p>We are a premier travel agency based in Egypt...</p>';
$stat1_num = $settings['about_stat1_num'] ?? '10+';
$stat1_label = $settings['about_stat1_label'] ?? 'Years Experience';
$stat2_num = $settings['about_stat2_num'] ?? '5K+';
$stat2_label = $settings['about_stat2_label'] ?? 'Happy Travelers';
$badge_title = $settings['about_badge_title'] ?? 'Top Rated';
$badge_text = $settings['about_badge_text'] ?? '5.0 on TripAdvisor';

$about_image = get_image_url($settings['about_page_image'] ?? $settings['hero_about'] ?? '', 'placeholder');
?>

<style>
    .about-grid { display: grid; grid-template-columns: 1.1fr 0.9fr; gap: 60px; align-items: center; }
    .about-text h2 { font-family: var(--font-display); font-size: clamp(38px, 4vw, 50px); color: var(--logo-navy); margin-bottom: 25px; line-height: 1.2; font-weight: 700;}
    .about-text h2 span { color: var(--logo-gold); font-style: italic; font-weight: 400; }
    .about-text .rich-content { font-size: 16px; color: var(--text-gray); line-height: 2; margin-bottom: 30px; border-left: 3px solid var(--logo-gold); padding-left: 20px;}
    
    .stats-container { display: flex; gap: 20px; align-items: center; margin-top: 30px; }
    .stat-box { text-align: center; padding: 20px 30px; background: var(--pure-white); border-radius: 8px; box-shadow: var(--shadow-elegant); border-bottom: 3px solid var(--logo-gold); flex: 1;}
    .stat-box h4 { font-family: var(--font-display); font-size: 36px; color: var(--logo-navy); margin: 0 0 5px 0; line-height: 1;}
    .stat-box span { font-size: 13px; color: var(--text-gray); font-weight: 500; text-transform: uppercase; letter-spacing: 1px;}
    
    .about-image { position: relative; padding-right: 20px; padding-bottom: 20px;}
    .about-image::before { content: ''; position: absolute; top: 20px; left: 20px; right: -20px; bottom: -20px; border: 2px solid var(--logo-gold); border-radius: 8px; z-index: 0; }
    .about-image img { width: 100%; border-radius: 8px; box-shadow: var(--shadow-elegant); position: relative; z-index: 1; object-fit: cover; aspect-ratio: 4/5;}
    
    .about-badge { position: absolute; bottom: 30px; left: -30px; background: var(--logo-navy); padding: 25px; border-radius: 8px; box-shadow: var(--shadow-elegant); color: var(--pure-white); z-index: 2; border-left: 4px solid var(--logo-gold);}
    .about-badge h4 { font-weight: 700; margin-bottom: 5px; font-size: 18px; letter-spacing: 1px;}
    .about-badge p { font-size: 14px; margin: 0; color: rgba(255,255,255,0.8); display: flex; align-items: center; gap: 8px;}
    .about-badge p i { color: var(--logo-gold); }

    @media (max-width: 991px) {
        .about-grid { grid-template-columns: 1fr; gap: 60px; }
        .about-image::before { display: none; }
        .about-image { padding: 0; }
        .about-badge { left: 20px; bottom: -20px; }
    }
</style>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_about'] ?? '', 'placeholder') ?>" alt="About Us">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>About Us</span></div>
            <h1 class="page-hero-title">About <span>Us</span></h1>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <div class="about-grid reveal">
            
            <div class="about-text">
                <h2><?= html_entity_decode($about_title) ?></h2>
                <div class="rich-content">
                    <?= html_entity_decode($about_content) ?>
                </div>
                
                <div class="stats-container">
                    <div class="stat-box">
                        <h4><?= htmlspecialchars($stat1_num) ?></h4>
                        <span><?= htmlspecialchars($stat1_label) ?></span>
                    </div>
                    <div class="stat-box">
                        <h4><?= htmlspecialchars($stat2_num) ?></h4>
                        <span><?= htmlspecialchars($stat2_label) ?></span>
                    </div>
                </div>
            </div>
            
            <div class="about-image">
                <img src="<?= $about_image ?>" alt="Egypt Travel Square Team">
                <div class="about-badge">
                    <h4><?= htmlspecialchars($badge_title) ?></h4>
                    <p><i class="fa-solid fa-star"></i> <?= htmlspecialchars($badge_text) ?></p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>