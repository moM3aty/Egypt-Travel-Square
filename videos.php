<?php
// Path: /videos.php
require_once 'config.php';

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
$videos = $pdo->query("SELECT * FROM videos ORDER BY id DESC")->fetchAll();

$pageTitle = "Videos | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    .video-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; }
    .video-card { position: relative; border-radius: 8px; overflow: hidden; box-shadow: var(--shadow-elegant); background: var(--pure-white); transition: var(--transition); border: 1px solid var(--border); }
    .video-card:hover { transform: translateY(-8px); border-color: var(--logo-gold); }
    .video-card video { width: 100%; display: block; aspect-ratio: 16/9; object-fit: cover; background: #000; }
    .video-info { padding: 25px; }
    .video-info h3 { font-size: 22px; color: var(--logo-navy); margin-bottom: 10px; font-family: var(--font-display); font-weight: 700; }
    .video-info p { font-size: 15px; color: var(--text-gray); line-height: 1.6; }
    @media (max-width: 767px) { .video-grid { grid-template-columns: 1fr; } }
</style>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_videos'] ?? '', 'placeholder') ?>" alt="Videos">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Videos</span></div>
            <h1 class="page-hero-title">Our <span>Videos</span></h1>
        </div>
    </div>
</section>

<section class="section-padding" style="background: var(--off-white);">
    <div class="container">
        <div class="section-header reveal">
            <div class="gold-line"></div>
            <h2>Experience <span>Egypt</span></h2>
            <p>Watch our latest tours and adventures in the heart of Egypt.</p>
        </div>

        <?php if(empty($videos)): ?>
            <p style="text-align:center; color:var(--text-gray);">More videos coming soon!</p>
        <?php else: ?>
            <div class="video-grid reveal">
                <?php foreach($videos as $vid): ?>
                <div class="video-card">
                    <video controls>
                        <source src="<?= get_image_url($vid['video_path'], 'placeholder') ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-info">
                        <h3><?= htmlspecialchars($vid['title']) ?></h3>
                        <p><?= htmlspecialchars($vid['description']) ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>