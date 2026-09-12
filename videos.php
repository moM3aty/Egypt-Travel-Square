<?php
// Path: /videos.php
require_once 'config.php';

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
$videos = $pdo->query("SELECT * FROM videos ORDER BY id DESC")->fetchAll();

$pageTitle = "Videos | Egypt Travel Square";
include 'includes/header.php';
?>

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

<section class="video-section reveal" style="padding: 100px 0;">
    <div class="container">
        <?php if(empty($videos)): ?>
            <h3 style="text-align:center; color:var(--navy);">More videos coming soon!</h3>
        <?php else: ?>
            <div class="video-grid">
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