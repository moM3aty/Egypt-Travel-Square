<?php
// Path: /where-to-go.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

// جلب جميع المدن
$stmtDest = $pdo->query("SELECT * FROM destinations ORDER BY id ASC");
$destinations = $stmtDest->fetchAll();

$pageTitle = "Where to Go in Egypt | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['home_hero_bg'] ?? '', 'placeholder') ?>" alt="Where to Go in Egypt">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Explore</span></div>
            <h1 class="page-hero-title">Where to <span>Go</span></h1>
        </div>
    </div>
</section>

<section class="section-padding" style="background: var(--sand);">
    <div class="container">
        <div class="section-header reveal" style="padding:20px 0">
            <h2>Discover Egypt's <span>Top Destinations</span></h2>
            <p>From the timeless Pyramids of Cairo to the serene waters of the Red Sea, explore the cities that hold the secrets of the pharaohs.</p>
        </div>
        
        <?php if(empty($destinations)): ?>
            <p style="text-align:center; color:var(--text-muted);">Destinations will be added soon.</p>
        <?php else: ?>
            <div class="dest-grid">
                <?php foreach($destinations as $dest): ?>
                <div class="dest-card reveal" onclick="window.location.href='destination.php?slug=<?= htmlspecialchars($dest['slug']) ?>'">
                    <div class="dest-card-bg">
                        <img src="<?= get_image_url($dest['hero_image'], 'destination') ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
                    </div>
                    <div class="dest-card-overlay"></div>
                    <div class="dest-card-content">
                        <h3 class="dest-name"><?= htmlspecialchars($dest['name']) ?></h3>
                        <p class="dest-excerpt" style="margin-bottom: 0;">
                            <?= htmlspecialchars(mb_strimwidth(strip_tags(html_entity_decode($dest['intro_text'])), 0, 110, '...')) ?>
                        </p>
                        <span class="dest-cta">Explore City <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>