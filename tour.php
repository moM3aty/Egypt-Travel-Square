<?php
// Path: /tour.php
require_once 'config.php';

// جلب بيانات الرحلة بناءً على الـ ID
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$stmt = $pdo->prepare("SELECT * FROM tours WHERE id = ?");
$stmt->execute([$id]);
$tour = $stmt->fetch();

if(!$tour) {
    die("Tour not found!");
}

$pageTitle = $tour['title'] . " | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    /* TOUR SPECIFIC CSS */
    .tour-layout { display: grid; grid-template-columns: 1fr 380px; gap: 40px; padding: 80px 0; align-items: start; }
    .content-box { background: var(--white); padding: 40px; border-radius: 24px; box-shadow: var(--shadow-soft); margin-bottom: 40px; }
    .section-title { font-size: 28px; color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 16px; } 
    .section-title i { color: var(--gold); font-size: 24px; }
    .tour-text { font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 24px; }
    
    .price-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 16px; margin: 30px 0; }
    .price-card { background: var(--sand); border: 1px solid var(--gold-light); border-radius: 16px; padding: 15px; text-align: center; } 
    .price-card h4 { font-size: 14px; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; } 
    .price-card p { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--navy); }
    
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; } 
    .info-item { display: flex; gap: 16px; align-items: flex-start; } 
    .info-item > i { font-size: 24px; color: var(--gold); margin-top: 4px; } 
    .info-item h5 { font-size: 16px; color: var(--navy); margin-bottom: 4px; } 
    .info-item p { font-size: 14px; color: var(--text-muted); }
    
    .dual-lists { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; } 
    .styled-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 15px; color: var(--text-muted); margin-bottom: 12px; } 
    .styled-list.exclude li i { color: var(--terracotta); } 
    .styled-list.bring li i { color: var(--turquoise); }
    
    .booking-widget { background: var(--white); border-radius: 24px; padding: 32px; box-shadow: var(--shadow-medium); position: sticky; top: 100px; border-top: 6px solid var(--gold); }
    .booking-form input, .booking-form textarea { width: 100%; padding: 14px; background: var(--sand); border: 1px solid transparent; border-radius: 12px; margin-bottom: 16px;}
    .btn-book { width: 100%; padding: 16px; background: #25D366; color: var(--white); border: none; border-radius: 50px; font-weight: 700; font-size: 16px; cursor: pointer; }
    
    @media (max-width: 991px) { .tour-layout { grid-template-columns: 1fr; } }
</style>

<section class="page-hero">
    <!-- الصورة من الداتا بيز -->
    <div class="page-hero-bg"><img src="admin/uploads/<?= htmlspecialchars($tour['hero_image']) ?>" alt="<?= htmlspecialchars($tour['title']) ?>"></div>
    <div class="page-hero-overlay"></div>
    <div class="container">
      <div class="page-hero-content">
        <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <a href="tours.php">Tours</a> <i class="fa-solid fa-circle"></i> <span>Details</span></div>
        <h1 class="page-hero-title"><?= htmlspecialchars($tour['title']) ?></h1>
        <div class="tour-hero-price">From <span>$<?= htmlspecialchars($tour['price']) ?></span></div>
      </div>
    </div>
</section>

<section class="tour-details-section">
  <div class="container tour-layout">
    
    <div class="tour-main-content">
      
      <!-- Overview -->
      <div class="content-box">
        <h2 class="section-title"><i class="fa-solid fa-file-lines"></i> Tour Details</h2>
        <div class="tour-text">
          <?= html_entity_decode($tour['overview']) ?>
        </div>
        
        <h3 style="color: var(--navy); margin-bottom: 16px;">Price per Person</h3>
        <div class="price-cards">
          <div class="price-card"><h4>Single</h4><p>$<?= htmlspecialchars($tour['price_single']) ?></p></div>
          <div class="price-card"><h4>2-3 Persons</h4><p>$<?= htmlspecialchars($tour['price_group_small']) ?></p></div>
          <div class="price-card"><h4>4-6 Persons</h4><p>$<?= htmlspecialchars($tour['price']) ?></p></div>
        </div>
      </div>

      <!-- Info -->
      <div class="content-box">
        <h2 class="section-title"><i class="fa-solid fa-circle-info"></i> Important Information</h2>
        <div class="info-grid">
          <div class="info-item"><i class="fa-solid fa-language"></i><div><h5>Languages</h5><p><?= htmlspecialchars($tour['languages']) ?></p></div></div>
          <div class="info-item"><i class="fa-solid fa-calendar-check"></i><div><h5>Availability</h5><p><?= htmlspecialchars($tour['availability']) ?></p></div></div>
          <div class="info-item"><i class="fa-solid fa-clock"></i><div><h5>Duration</h5><p><?= htmlspecialchars($tour['duration']) ?></p></div></div>
          <div class="info-item"><i class="fa-solid fa-car"></i><div><h5>Timing</h5><p><?= htmlspecialchars($tour['timing']) ?></p></div></div>
        </div>
      </div>

      <!-- Excludes & Brings -->
      <div class="content-box">
        <div class="dual-lists">
          <div>
            <h2 class="section-title"><i class="fa-solid fa-circle-xmark" style="color:var(--terracotta);"></i> Excludes</h2>
            <ul class="styled-list exclude">
                <?= html_entity_decode($tour['excludes_html']) ?>
            </ul>
          </div>
          <div>
            <h2 class="section-title"><i class="fa-solid fa-suitcase" style="color:var(--turquoise);"></i> What to bring</h2>
            <ul class="styled-list bring">
                <?= html_entity_decode($tour['brings_html']) ?>
            </ul>
          </div>
        </div>
      </div>

      <!-- Itinerary -->
      <div class="content-box">
        <h2 class="section-title"><i class="fa-solid fa-map-location-dot"></i> Itinerary</h2>
        <div class="tour-text">
            <?= html_entity_decode($tour['itinerary']) ?>
        </div>
      </div>

    </div>

    <!-- Sidebar Widget -->
    <div class="tour-sidebar">
      <div class="booking-widget">
        <div class="booking-header">
          <h3>Book This Tour</h3>
          <div class="price">From <span>$<?= htmlspecialchars($tour['price']) ?></span></div>
        </div>
        <form onsubmit="sendToWhatsApp(event, '<?= htmlspecialchars(addslashes($tour['title'])) ?>')" class="booking-form">
          <div class="form-group"><input type="text" name="name" required placeholder="Full Name"></div>
          <div class="form-group"><input type="email" name="email" required placeholder="Email Address"></div>
          <div class="form-group"><textarea name="msg" rows="4" required placeholder="Date and number of people..."></textarea></div>
          <button type="submit" class="btn-book"><i class="fa-brands fa-whatsapp"></i> Book via WhatsApp</button>
        </form>
      </div>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>