<?php
// Path: /packages.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$stmt = $pdo->query("SELECT * FROM tours WHERE type = 'package' ORDER BY id DESC");
$packages = $stmt->fetchAll();

$pageTitle = "Tour Packages | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
  <div class="page-hero-bg">
    <img src="<?= get_image_url($settings['hero_packages'] ?? '', 'placeholder') ?>" alt="Tour Packages">
  </div>
  <div class="page-hero-overlay"></div>
  <div class="container">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Tour Packages</span></div>
      <h1 class="page-hero-title">Tour <span>Packages</span></h1>
    </div>
  </div>
</section>

<section class="section-padding" style="background: var(--off-white);">
  <div class="container">
    <div class="section-header reveal">
      <div class="gold-line"></div>
      <h2>Tours Around <span>Egypt</span></h2>
      <p>Discover our exclusive multi-day tour packages across Egypt. Hand-picked experiences tailored to let you explore the wonders of the Pharaohs with ultimate comfort and luxury.</p>
    </div>

    <div class="tours-grid">
      <?php foreach($packages as $pkg): ?>
      <div class="tour-card reveal">
        <a href="tour.php?id=<?= $pkg['id'] ?>" class="tour-image">
          <img src="<?= get_image_url($pkg['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($pkg['title']) ?>">
          <div class="tour-wishlist"><i class="fa-regular fa-heart"></i></div>
        </a>
        <div class="tour-body">
          <div class="tour-location"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($pkg['location']) ?></div>
          <a href="tour.php?id=<?= $pkg['id'] ?>" class="tour-name"><?= htmlspecialchars($pkg['title']) ?></a>
          <div class="tour-meta">
            <div class="tour-meta-item"><i class="fa-regular fa-clock"></i> <?= htmlspecialchars($pkg['duration']) ?></div>
          </div>
          <div class="tour-footer">
            <div class="tour-price">
              <span class="tour-price-label">Starting From</span>
              <span class="tour-price-amount">$<?= htmlspecialchars($pkg['price']) ?></span>
            </div>
            <a href="tour.php?id=<?= $pkg['id'] ?>" class="tour-book-btn"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>