<?php
// Path: /packages.php
require_once 'config.php';

// جلب الباقات السياحية من قاعدة البيانات
$stmt = $pdo->query("SELECT * FROM tours WHERE type = 'package' ORDER BY id DESC");
$packages = $stmt->fetchAll();

$pageTitle = "Tour Packages | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    .page-hero { position: relative; height: 50vh; min-height: 400px; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden; margin:0;} 
    .page-hero-bg { position: absolute; inset: 0; z-index: 0; } 
    .page-hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.4); } 
    .page-hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.85) 0%, rgba(10, 22, 40, 0.4) 50%, rgba(201, 162, 39, 0.2) 100%); } 
    .page-hero-content { position: relative; z-index: 2; color: var(--white); margin-top: 60px; animation: fadeInUp 1s ease both;} 
    .breadcrumb { font-size: 14px; font-weight: 500; letter-spacing: 2px; text-transform: uppercase; color: var(--gold-light); margin-bottom: 16px; display: flex; align-items: center; justify-content: center; gap: 12px; } 
    .page-hero-title { font-size: clamp(40px, 6vw, 70px); font-weight: 700; color: var(--white); margin-bottom: 16px;}
    .page-hero-title span { color: var(--gold); font-style: italic; }

    .intro-section { padding: 100px 0 60px; background: var(--sand); text-align: center; } 
    .intro-title { font-size: clamp(32px, 4vw, 48px); color: var(--navy); margin-bottom: 24px; } 
    .intro-text-wrapper { max-width: 800px; margin: 0 auto; } 
    .intro-text { font-size: 18px; color: var(--text-muted); line-height: 1.9; } 

    .tours-section { padding: 0 0 120px 0; background: var(--sand); } 
    .tours-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; } 
    .tour-card { background: var(--white); border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-soft); transition: all 0.4s ease; display: flex; flex-direction: column; } 
    .tour-card:hover { transform: translateY(-12px); box-shadow: var(--shadow-medium); } 
    .tour-image { position: relative; height: 240px; overflow: hidden; display:block; } 
    .tour-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; } 
    .tour-card:hover .tour-image img { transform: scale(1.08); } 
    .tour-badge { position: absolute; top: 20px; left: 20px; background: var(--white); padding: 6px 14px; border-radius: 50px; font-size: 12px; font-weight: 600; display: flex; align-items: center; gap: 6px; box-shadow: var(--shadow-soft); } 
    .tour-badge i { color: var(--gold); } 
    .tour-wishlist { position: absolute; top: 20px; right: 20px; width: 40px; height: 40px; background: var(--white); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--text-muted); cursor: pointer; transition: all 0.3s ease; box-shadow: var(--shadow-soft); } 
    .tour-wishlist:hover { color: var(--terracotta); transform: scale(1.1); } 
    .tour-body { padding: 24px; flex-grow: 1; display: flex; flex-direction: column; } 
    .tour-location { font-size: 13px; color: var(--text-muted); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; } 
    .tour-location i { color: var(--gold); } 
    .tour-name { font-family: var(--font-display); font-size: 20px; font-weight: 700; color: var(--navy); margin-bottom: 20px; line-height: 1.4; transition: color 0.3s ease; } 
    .tour-card:hover .tour-name { color: var(--gold-dark); } 
    .tour-meta { display: flex; gap: 20px; padding-bottom: 20px; border-bottom: 1px solid rgba(0,0,0,0.08); margin-bottom: 20px; flex-wrap: wrap; } 
    .tour-meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-muted); } 
    .tour-meta-item i { color: var(--turquoise); } 
    .tour-footer { display: flex; justify-content: space-between; align-items: center; margin-top: auto; } 
    .tour-price { display: flex; flex-direction: column; } 
    .tour-price-label { font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; } 
    .tour-price-amount { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--navy); } 
    .tour-book { width: 48px; height: 48px; background: var(--navy); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--gold); font-size: 18px; transition: all 0.3s ease; } 
    .tour-book:hover { background: var(--gold); color: var(--navy); transform: rotate(-45deg); }
</style>

<section class="page-hero">
  <div class="page-hero-bg">
    <img src="admin/assets/images/packages-bg.jpg" alt="Tour Packages Scene">
  </div>
  <div class="page-hero-overlay"></div>
  <div class="container">
    <div class="page-hero-content">
      <div class="breadcrumb"><a href="/">Home</a> <i class="fa-solid fa-circle"></i> <span>Tour Packages</span></div>
      <h1 class="page-hero-title">Tour <span>Packages</span></h1>
    </div>
  </div>
</section>

<section class="intro-section reveal">
  <div class="container">
    <div class="intro-text-wrapper">
      <h2 class="intro-title">Tours Around Egypt</h2>
      <p class="intro-text">
        Discover our exclusive multi-day tour packages across Egypt. Hand-picked experiences tailored to let you explore the wonders of the Pharaohs with ultimate comfort and luxury.
      </p>
    </div>
  </div>
</section>

<section class="tours-section">
  <div class="container">
    <div class="tours-grid">
      
      <?php foreach($packages as $pkg): ?>
      <div class="tour-card reveal">
        <a href="tour.php?id=<?= $pkg['id'] ?>" class="tour-image">
          <img src="admin/uploads/<?= htmlspecialchars($pkg['hero_image']) ?>" alt="<?= htmlspecialchars($pkg['title']) ?>">
          <div class="tour-badge"><i class="fa-solid fa-star"></i> 5.0</div>
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
              <span class="tour-price-label">From</span>
              <span class="tour-price-amount">$<?= htmlspecialchars($pkg['price']) ?></span>
            </div>
            <a href="tour.php?id=<?= $pkg['id'] ?>" class="tour-book"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>