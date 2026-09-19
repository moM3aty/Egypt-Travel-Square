<?php
// Path: /search.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$tours = [];
$destinations = [];

if (!empty($q)) {
    // البحث في الرحلات
    $stmtTours = $pdo->prepare("SELECT * FROM tours WHERE title LIKE ? OR location LIKE ? OR overview LIKE ? ORDER BY id DESC");
    $searchTerm = "%$q%";
    $stmtTours->execute([$searchTerm, $searchTerm, $searchTerm]);
    $tours = $stmtTours->fetchAll();

    // البحث في الوجهات
    $stmtDest = $pdo->prepare("SELECT * FROM destinations WHERE name LIKE ? OR intro_title LIKE ? OR intro_text LIKE ?");
    $stmtDest->execute([$searchTerm, $searchTerm, $searchTerm]);
    $destinations = $stmtDest->fetchAll();
}

$pageTitle = "Search Results for '$q' | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    .inner-hero { position: relative; height: 45vh; min-height: 350px; display: flex; align-items: center; justify-content: center; text-align: center; margin:0; }
    .hero-bg { position: absolute; inset: 0; background: var(--logo-navy); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.9), rgba(201, 162, 39, 0.2)); }
    .inner-hero-content { position: relative; z-index: 2; color: var(--pure-white); margin-top: 60px;}
    .hero-title { font-family: var(--font-display); font-size: clamp(36px, 5vw, 60px); font-weight: 700; color: var(--pure-white); margin-bottom: 16px;}
    .hero-title span { color: var(--logo-gold); font-style: italic; }
    .search-meta { font-size: 16px; color: rgba(255,255,255,0.7); letter-spacing: 1px; text-transform: uppercase;}
    
    .section-padding { padding: 80px 0; }
    .section-header { margin-bottom: 40px; }
    .section-header h2 { font-family: var(--font-display); font-size: 36px; color: var(--logo-navy); font-weight: 700; display:flex; align-items:center; gap: 15px;}
    .section-header h2::after { content: ''; flex-grow: 1; height: 1px; background: var(--border); }
    
    /* Tour Cards Grid */
    .tours-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 35px; }
    .tour-card { background: var(--pure-white); border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: var(--transition); display: flex; flex-direction: column; border: 1px solid #EEEEEE; border-bottom: 3px solid transparent;}
    .tour-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-elegant); border-bottom-color: var(--logo-gold); }
    .tour-image { position: relative; height: 260px; overflow: hidden; display: block; }
    .tour-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
    .tour-card:hover .tour-image img { transform: scale(1.08); }
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
    
    /* Destinations Grid */
    .dest-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; }
    .dest-card { position: relative; overflow: hidden; cursor: pointer; height: 350px; border-radius: 8px; transition: var(--transition); }
    .dest-card-bg { position: absolute; inset: 0; transition: transform 0.8s ease; }
    .dest-card-bg img { width: 100%; height: 100%; object-fit: cover; }
    .dest-card:hover .dest-card-bg { transform: scale(1.1); }
    .dest-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,22,40,0.9) 0%, transparent 100%); transition: var(--transition); }
    .dest-card:hover .dest-card-overlay { background: linear-gradient(to top, rgba(10,22,40,0.95) 0%, rgba(10,22,40,0.4) 100%); }
    .dest-card-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 25px; color: var(--pure-white); transition: var(--transition); text-align: center; }
    .dest-card:hover .dest-card-content { transform: translateY(-10px); }
    .dest-name { font-family: var(--font-display); font-size: 28px; font-weight: 700; margin-bottom: 10px; }
    .dest-cta { font-size: 12px; font-weight: 700; color: var(--logo-gold); text-transform: uppercase; letter-spacing: 2px; opacity: 0; transition: var(--transition); display: inline-block;}
    .dest-card:hover .dest-cta { opacity: 1; }
    
    .no-results { text-align: center; padding: 80px 20px; background: var(--pure-white); border-radius: 8px; border: 1px dashed var(--border); margin-top: 40px;}
    .no-results i { font-size: 50px; color: var(--border); margin-bottom: 20px; }
    .no-results h3 { font-family: var(--font-display); font-size: 28px; color: var(--logo-navy); margin-bottom: 10px; }
</style>

<section class="inner-hero">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <div class="inner-hero-content reveal">
      <div class="search-meta">Search Results</div>
      <h1 class="hero-title">"<span><?= htmlspecialchars($q) ?></span>"</h1>
      <p style="color: rgba(255,255,255,0.7);"><?= count($tours) + count($destinations) ?> items found</p>
    </div>
  </div>
</section>

<section class="section-padding">
    <div class="container">
        
        <?php if(empty($q)): ?>
            <div class="no-results reveal">
                <i class="fa-solid fa-magnifying-glass"></i>
                <h3>Please enter a search term</h3>
                <p style="color: var(--text-gray);">Use the search icon in the menu to find tours and destinations.</p>
            </div>
        <?php elseif(empty($tours) && empty($destinations)): ?>
            <div class="no-results reveal">
                <i class="fa-solid fa-face-frown-open"></i>
                <h3>No results found for "<?= htmlspecialchars($q) ?>"</h3>
                <p style="color: var(--text-gray);">Try using different keywords or check your spelling.</p>
                <a href="index.php" class="btn-gold" style="margin-top: 20px;">Back to Home</a>
            </div>
        <?php else: ?>
            
            <?php if(!empty($tours)): ?>
            <div class="section-header reveal">
                <h2>Tours & Packages</h2>
            </div>
            <div class="tours-grid reveal" style="margin-bottom: 80px;">
                <?php foreach($tours as $tour): ?>
                <div class="tour-card">
                    <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image">
                        <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
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
            <?php endif; ?>

            <?php if(!empty($destinations)): ?>
            <div class="section-header reveal">
                <h2>Destinations</h2>
            </div>
            <div class="dest-grid reveal">
                <?php foreach($destinations as $dest): ?>
                <div class="dest-card" onclick="window.location.href='destination.php?slug=<?= htmlspecialchars($dest['slug']) ?>'">
                    <div class="dest-card-bg">
                        <img src="<?= get_image_url($dest['hero_image'], 'destination') ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
                    </div>
                    <div class="dest-card-overlay"></div>
                    <div class="dest-card-content">
                        <h3 class="dest-name"><?= htmlspecialchars($dest['name']) ?></h3>
                        <span class="dest-cta">Discover <i class="fa-solid fa-arrow-right" style="margin-left:5px;"></i></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>