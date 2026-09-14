<?php
// Path: /tours.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

// التحقق من الفلتر
$type_filter = isset($_GET['type']) ? strtolower($_GET['type']) : 'all';
$allowed_types = ['day', 'half', 'shore'];

if ($type_filter !== 'all' && in_array($type_filter, $allowed_types)) {
    $stmtTours = $pdo->prepare("SELECT * FROM tours WHERE type = ? ORDER BY id DESC");
    $stmtTours->execute([$type_filter]);
    $page_title_text = ucfirst($type_filter) . " Tours";
} else {
    // جلب كل الرحلات (ما عدا الباقات الطويلة لأن ليها صفحة لوحدها)
    $stmtTours = $pdo->query("SELECT * FROM tours WHERE type IN ('day', 'half', 'shore') ORDER BY id DESC");
    $page_title_text = "All Tours & Excursions";
}
$tours = $stmtTours->fetchAll();

$pageTitle = $page_title_text . " | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_tours'] ?? '', 'placeholder') ?>" alt="Our Tours">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Tours</span></div>
            <h1 class="page-hero-title"><?= htmlspecialchars($page_title_text) ?></h1>
        </div>
    </div>
</section>

<section class="section-padding" style="background: var(--sand-dark);">
    <div class="container">
        <div class="section-header reveal" style="padding:20px 0">
            <h2>Find Your Perfect <span>Adventure</span></h2>
            <p>Browse our hand-picked selection of day trips, shore excursions, and guided tours.</p>
        </div>
        
        <?php if(empty($tours)): ?>
            <p style="text-align:center; color:var(--text-muted);">No tours available in this category yet.</p>
        <?php else: ?>
            <div class="tours-grid">
                <?php foreach($tours as $tour): ?>
                <div class="tour-card reveal">
                    <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image">
                        <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
                        <div class="tour-badge"><i class="fa-solid fa-star"></i> 5.0</div>
                    </a>
                    <div class="tour-body" style="background: var(--white);">
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
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>