<?php
// Path: /about.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "About Us | Egypt Travel Square";
include 'includes/header.php';
?>

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

<section class="section-padding" style="padding: 100px 0;">
    <div class="container">
        <div class="about-grid reveal">
            <div class="about-text">
                <h2 style="font-family: var(--font-display); font-size: 38px; color: var(--navy); margin-bottom: 20px;">Welcome to <span style="color:var(--gold);">Egypt Travel Square</span></h2>
                <p style="font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 20px;">We are a premier travel agency based in Egypt, dedicated to crafting unforgettable experiences for travelers from around the globe. With years of expertise and a profound passion for our rich heritage, we guarantee a journey unlike any other.</p>
                <p style="font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 30px;">From the majestic Pyramids of Giza to the serene waters of the Nile, our hand-picked itineraries, expert Egyptologists, and top-tier services ensure your comfort and satisfaction at every step.</p>
                
                <div style="display:flex; gap: 20px; align-items:center;">
                    <div style="text-align:center; padding: 15px 25px; background:var(--sand-dark); border-radius:12px;">
                        <h4 style="font-family:var(--font-display); font-size:28px; color:var(--navy); margin:0;">10+</h4>
                        <span style="font-size:13px; color:var(--text-muted);">Years Experience</span>
                    </div>
                    <div style="text-align:center; padding: 15px 25px; background:var(--sand-dark); border-radius:12px;">
                        <h4 style="font-family:var(--font-display); font-size:28px; color:var(--navy); margin:0;">5K+</h4>
                        <span style="font-size:13px; color:var(--text-muted);">Happy Travelers</span>
                    </div>
                </div>
            </div>
            
            <div class="about-image" style="position:relative;">
                <img src="<?= get_image_url($settings['hero_about'] ?? '', 'placeholder') ?>" style="width:100%; border-radius: 24px; box-shadow: var(--shadow-medium);" alt="Egypt Travel Square Team">
                <div style="position:absolute; bottom:-20px; left:-20px; background:var(--gold); padding:20px; border-radius:16px; box-shadow:var(--shadow-medium); color:var(--navy);">
                    <h4 style="font-weight:700; margin-bottom:5px;">Top Rated</h4>
                    <p style="font-size:14px; margin:0;"><i class="fa-solid fa-star"></i> 5.0 on TripAdvisor</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>