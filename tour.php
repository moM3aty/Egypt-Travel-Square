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
    /* ===================== LUXURY TOUR DETAILS STYLE ===================== */
    .tour-layout { display: grid; grid-template-columns: 1fr 380px; gap: 40px; padding: 80px 0; align-items: start; }
    
    .content-box { background: var(--pure-white); padding: 40px; border-radius: 8px; box-shadow: var(--shadow-elegant); margin-bottom: 40px; border-top: 3px solid var(--logo-gold); }
    .section-title { font-family: var(--font-display); font-size: 32px; color: var(--logo-navy); margin-bottom: 24px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid var(--border); padding-bottom: 16px; font-weight: 700;} 
    .section-title i { color: var(--logo-gold); font-size: 24px; }
    .tour-text { font-size: 16px; color: var(--text-gray); line-height: 1.9; margin-bottom: 24px; }
    
    .price-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 16px; margin: 30px 0; }
    .price-card { background: var(--off-white); border: 1px solid rgba(201,162,39,0.3); border-radius: 8px; padding: 15px; text-align: center; transition: transform 0.3s ease; display:flex; flex-direction:column; justify-content:center;} 
    .price-card:hover { transform: translateY(-5px); border-color: var(--logo-gold); box-shadow: var(--shadow-elegant);} 
    .price-card h4 { font-size: 14px; color: var(--text-gray); text-transform: uppercase; margin-bottom: 8px; font-weight: 600;} 
    .price-card p { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--logo-navy); margin: 0; }
    
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; } 
    .info-item { display: flex; gap: 16px; align-items: flex-start; } 
    .info-item > i { font-size: 24px; color: var(--logo-gold); margin-top: 4px; } 
    .info-item h5 { font-family: var(--font-display); font-size: 22px; color: var(--logo-navy); margin-bottom: 4px; font-weight: 700;} 
    .info-item p { font-size: 14px; color: var(--text-gray); }
    
    .dual-lists { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; } 
    .styled-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 15px; color: var(--text-gray); margin-bottom: 12px; line-height: 1.6;} 
    .styled-list.include li i { color: #28a745; margin-top: 4px; }
    .styled-list.exclude li i { color: #E74C3C; margin-top: 4px;} 
    .styled-list.bring li i { color: #1ABC9C; margin-top: 4px;}
    
    .booking-widget { background: var(--logo-navy); border-radius: 8px; padding: 32px; box-shadow: var(--shadow-elegant); position: sticky; top: 100px; border-bottom: 4px solid var(--logo-gold); color: var(--pure-white);}
    .booking-header { margin-bottom: 24px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;} 
    .booking-header h3 { font-family: var(--font-display); font-size: 28px; color: var(--logo-gold); margin-bottom: 8px; font-weight: 700;} 
    .booking-header .price { font-size: 14px; color: rgba(255,255,255,0.7); text-transform: uppercase; } 
    .booking-header .price span { font-family: var(--font-display); font-size: 36px; font-weight: 700; color: var(--pure-white); display: block; text-transform: none; }
    
    .booking-form .form-group { margin-bottom: 16px; } 
    .booking-form input, .booking-form textarea { width: 100%; padding: 14px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 4px; font-family: var(--font-body); font-size: 14px; outline: none; transition: 0.3s; color: var(--pure-white);} 
    .booking-form input:focus, .booking-form textarea:focus { background: rgba(255,255,255,0.1); border-color: var(--logo-gold); }
    .booking-form input::placeholder, .booking-form textarea::placeholder { color: rgba(255,255,255,0.5); }
    
    .btn-book { width: 100%; padding: 16px; background: var(--logo-gold); color: var(--logo-navy); border: none; border-radius: 4px; font-weight: 700; font-size: 15px; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 10px; text-transform: uppercase; letter-spacing: 1px;} 
    .btn-book:hover { background: var(--pure-white); transform: translateY(-3px); } 
    
    @media (max-width: 991px) { .tour-layout { grid-template-columns: 1fr; } .dual-lists{grid-template-columns: 1fr;} }
</style>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
      <div class="page-hero-content">
        <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <a href="tours.php">Tours</a> <i class="fa-solid fa-circle"></i> <span>Details</span></div>
        <h1 class="page-hero-title"><?= htmlspecialchars($tour['title']) ?></h1>
      </div>
    </div>
</section>

<section style="background: var(--off-white);">
  <div class="container tour-layout">
    
    <div class="tour-main-content">
      
      <!-- Overview -->
      <div class="content-box">
        <h2 class="section-title"><i class="fa-solid fa-file-lines"></i> Tour Details</h2>
        <div class="tour-text">
          <?= html_entity_decode($tour['overview']) ?>
        </div>
        
        <h3 style="color: var(--logo-navy); margin-bottom: 16px; font-family: var(--font-display); font-weight: 700; font-size: 24px;">Price per Person</h3>
        <div class="price-cards">
          <div class="price-card"><h4>Single</h4><p>$<?= htmlspecialchars($tour['price_single']) ?></p></div>
          <div class="price-card"><h4>2-3 Persons</h4><p>$<?= htmlspecialchars($tour['price_group_small']) ?></p></div>
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

      <!-- Includes, Excludes & Brings -->
      <div class="content-box">
        <div class="dual-lists">
          <div>
            <h2 class="section-title"><i class="fa-solid fa-circle-check" style="color:#28a745;"></i> Included</h2>
            <ul class="styled-list include">
                <?= html_entity_decode($tour['includes_html'] ?? '<li style="color: var(--text-gray);"><i class="fa-solid fa-minus" style="color:#ccc;"></i> Details will be added soon.</li>') ?>
            </ul>
          </div>
          <div>
            <h2 class="section-title"><i class="fa-solid fa-circle-xmark" style="color:#E74C3C;"></i> Excluded</h2>
            <ul class="styled-list exclude">
                <?= html_entity_decode($tour['excludes_html']) ?>
            </ul>
          </div>
        </div>

        <div style="border-top: 1px solid var(--border); padding-top: 30px; margin-top: 20px;">
            <h2 class="section-title"><i class="fa-solid fa-suitcase" style="color:#1ABC9C;"></i> What to bring</h2>
            <ul class="styled-list bring" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 10px;">
                <?= html_entity_decode($tour['brings_html']) ?>
            </ul>
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
          <button type="submit" class="btn-book"><i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp</button>
        </form>
      </div>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>