<?php
// Path: /destination.php
require_once 'config.php';
require_once 'includes/functions.php';

if (!isset($_GET['slug'])) { header("Location: index.php"); exit; }
$slug = $_GET['slug'];

$stmt = $pdo->prepare("SELECT * FROM destinations WHERE slug = ?");
$stmt->execute([$slug]);
$dest = $stmt->fetch();

if (!$dest) { header("Location: index.php"); exit; }

$stmtAttr = $pdo->prepare("SELECT * FROM attractions WHERE destination_id = ? ORDER BY id ASC");
$stmtAttr->execute([$dest['id']]);
$attractions = $stmtAttr->fetchAll();

$stmtTours = $pdo->prepare("SELECT * FROM tours WHERE location LIKE ? ORDER BY id DESC LIMIT 6");
$stmtTours->execute(['%' . $dest['name'] . '%']);
$cityTours = $stmtTours->fetchAll();

$pageTitle = $dest['name'] . " | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    /* ===================== LUXURY DESTINATION STYLE ===================== */
    .city-hero { height: 75vh; min-height: 550px; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden;}
    .city-hero-bg { position: absolute; inset: 0; z-index: 0; }
    .city-hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5); transform: scale(1.05); }
    .city-hero-content { position: relative; z-index: 2; padding-top: 60px; animation: fadeInUp 1s ease both;}
    
    .city-subtitle { color: var(--logo-gold); font-family: var(--font-display); font-size: 28px; font-style: italic; letter-spacing: 2px; display: block; margin-bottom: 10px; }
    .city-title { font-family: var(--font-display); font-size: clamp(50px, 8vw, 110px); color: var(--pure-white); font-weight: 700; text-shadow: 0 4px 20px rgba(0,0,0,0.4); line-height: 1; margin: 0;}
    
    .city-overview-box { background: var(--pure-white); border-radius: 8px; padding: 60px 80px; max-width: 1100px; margin: -100px auto 80px; position: relative; z-index: 10; box-shadow: var(--shadow-elegant); text-align: center; border-top: 4px solid var(--logo-gold); }
    .city-overview-title { font-size: 36px; color: var(--logo-navy); margin-bottom: 25px; font-family: var(--font-display); font-weight: 700;}
    .city-overview-text { font-size: 16px; color: var(--text-gray); line-height: 2; text-align: left; }
    .city-overview-text p { margin-bottom: 15px; }

    /* Destination Cards Grid */
    .dest-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; } 
    .dest-card { position: relative; overflow: hidden; cursor: pointer; height: 350px; border-radius: 8px; transition: var(--transition); } 
    .dest-card-bg { position: absolute; inset: 0; transition: transform 0.8s ease; } 
    .dest-card-bg img { width: 100%; height: 100%; object-fit: cover; } 
    .dest-card:hover .dest-card-bg { transform: scale(1.1); } 
    .dest-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,22,40,0.9) 0%, transparent 100%); transition: var(--transition); } 
    .dest-card:hover .dest-card-overlay { background: linear-gradient(to top, rgba(10,22,40,0.95) 0%, rgba(10,22,40,0.4) 100%); } 
    .dest-card-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 25px; color: var(--pure-white); transition: var(--transition); text-align: center;} 
    .dest-card:hover .dest-card-content { transform: translateY(-10px); } 
    .dest-name { font-family: var(--font-display); font-size: 28px; font-weight: 700; margin-bottom: 10px; } 
    .dest-excerpt { font-size: 14px; color: rgba(255, 255, 255, 0.7); line-height: 1.6; margin-bottom: 0; opacity: 0; height: 0; transition: var(--transition); overflow: hidden; } 
    .dest-card:hover .dest-excerpt { opacity: 1; height: auto; margin-bottom: 15px; margin-top: 10px;}
    .dest-cta { font-size: 12px; font-weight: 700; color: var(--logo-gold); text-transform: uppercase; letter-spacing: 2px; opacity: 0; transition: var(--transition); display: inline-block;}
    .dest-card:hover .dest-cta { opacity: 1; }

    /* Tours Cards Overlay Layout */
    .tours-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 35px; }
    .tour-card { background: var(--pure-white); border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: var(--transition); display: flex; flex-direction: column; border: 1px solid #EEEEEE; border-bottom: 3px solid transparent;}
    .tour-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-elegant); border-bottom-color: var(--logo-gold); }
    .tour-image { position: relative; height: 260px; overflow: hidden; display: block; }
    .tour-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
    .tour-card:hover .tour-image img { transform: scale(1.08); }
    .tour-wishlist { position: absolute; top: 15px; right: 15px; width: 40px; height: 40px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #ccc; cursor: pointer; transition: var(--transition); }
    .tour-wishlist:hover { color: #E74C3C; }
    .tour-body { padding: 30px; flex-grow: 1; display: flex; flex-direction: column; }
    .tour-location { font-size: 12px; color: var(--text-gray); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;}
    .tour-location i { color: var(--logo-gold); font-size: 14px;}
    .tour-name { font-family: var(--font-display); font-size: 24px; font-weight: 700; color: var(--logo-navy); margin-bottom: 20px; line-height: 1.3; transition: color 0.3s ease; text-decoration: none; display: block;}
    .tour-card:hover .tour-name { color: var(--logo-gold); }
    .tour-meta { display: flex; justify-content: space-between; padding-bottom: 20px; border-bottom: 1px solid #EEEEEE; margin-bottom: 20px; }
    .tour-meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-gray); font-weight: 500;}
    .tour-meta-item i { color: var(--logo-navy); }
    .tour-footer { display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto; }
    .tour-price-label { font-size: 11px; color: var(--text-gray); display: block; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 1px;}
    .tour-price-amount { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--logo-navy); line-height: 1;}
    .tour-book-btn { width: 45px; height: 45px; border: 1px solid var(--border); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--logo-navy); font-size: 16px; transition: var(--transition); background: transparent; }
    .tour-card:hover .tour-book-btn { background: var(--logo-navy); color: var(--logo-gold); border-color: var(--logo-navy); }

    /* Modals */
    .modal-overlay { position: fixed; inset: 0; background: rgba(10, 22, 40, 0.95); z-index: 2000; display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: 0.4s ease; padding: 20px; }
    .modal-overlay.active { opacity: 1; pointer-events: auto; }
    .modal-content { background: var(--pure-white); border-radius: 8px; max-width: 800px; width: 100%; max-height: 90vh; overflow-y: auto; transform: translateY(40px) scale(0.95); transition: 0.4s cubic-bezier(0.16, 1, 0.3, 1); position: relative;}
    .modal-overlay.active .modal-content { transform: translateY(0) scale(1); }
    .modal-close { position: absolute; top: 20px; right: 20px; background: rgba(10,22,40,0.5); border: none; width: 40px; height: 40px; border-radius: 50%; font-size: 20px; color: var(--pure-white); cursor: pointer; display: flex; align-items: center; justify-content: center; z-index: 10; transition: all 0.3s ease; }
    .modal-close:hover { background: #E74C3C; transform: rotate(90deg); }
    .modal-header-img { width: 100%; height: 350px; background-size: cover; background-position: center; border-radius: 8px 8px 0 0; position: relative; }
    .modal-header-img::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 100px; background: linear-gradient(to top, var(--pure-white), transparent); }
    .modal-body-content { padding: 40px; margin-top: -40px; position: relative; z-index: 2; }
    .modal-title { font-family: var(--font-display); font-size: 38px; color: var(--logo-navy); margin-bottom: 20px; line-height: 1.2; font-weight: 700; }
    .modal-description { font-size: 16px; color: var(--text-gray); line-height: 1.9; }
    
    @media(max-width: 991px) {
       .city-overview-box { margin: -60px 20px 60px; padding: 40px 25px; text-align: center; }
       .city-overview-text { text-align: center; }
       .dest-grid { grid-template-columns: 1fr; }
    }
</style>

<section class="city-hero">
    <div class="city-hero-bg">
        <img src="<?= get_image_url($dest['hero_image'], 'destination') ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
    </div>
    <div class="city-hero-content">
        <div class="breadcrumb" style="justify-content:center; color: var(--logo-gold); margin-bottom: 10px; font-size: 12px;">
            <a href="index.php" style="color:rgba(255,255,255,0.7);">HOME</a> 
            <i class="fa-solid fa-circle" style="font-size:5px; margin:0 10px; color:rgba(255,255,255,0.3);"></i> 
            <span style="color:var(--pure-white);">WHERE TO GO</span>
        </div>
        <span class="city-subtitle">Explore</span>
        <h1 class="city-title"><?= htmlspecialchars($dest['name']) ?></h1>
    </div>
</section>

<section style="background: var(--off-white); padding-bottom: 100px;">
    <div class="container">
        
        <!-- Premium City Overview Box -->
        <div class="city-overview-box reveal" >
            <h2 class="city-overview-title"><?= htmlspecialchars($dest['intro_title']) ?></h2>
            <div class="city-overview-text">
                <?= html_entity_decode($dest['intro_text']) ?>
            </div>
        </div>

        <!-- Attractions Grid -->
        <div class="section-header reveal" style="margin-top: 80px; margin-bottom: 60px;">
            <div class="gold-line"></div>
            <h2>Must-See <span>Attractions</span></h2>
            <p>Discover the magnificent historical sites and landmarks that make <?= htmlspecialchars($dest['name']) ?> a world-class destination.</p>
        </div>
        
        <?php if(empty($attractions)): ?>
            <p style="text-align:center; color:var(--text-gray);">Attractions will be added soon.</p>
        <?php else: ?>
            <div class="dest-grid">
                <?php foreach($attractions as $attr): ?>
                <div class="dest-card reveal" onclick="openModal(<?= $attr['id'] ?>)">
                    <div class="dest-card-bg">
                        <img src="<?= get_image_url($attr['image'], 'placeholder') ?>" alt="<?= htmlspecialchars($attr['title']) ?>">
                    </div>
                    <div class="dest-card-overlay"></div>
                    <div class="dest-card-content">
                        <h3 class="dest-name"><?= htmlspecialchars($attr['title']) ?></h3>
                        <p class="dest-excerpt"><?= htmlspecialchars($attr['excerpt']) ?></p>
                        <span class="dest-cta">Read More <i class="fa-solid fa-arrow-right"></i></span>
                    </div>
                </div>

                <!-- Modal for each attraction -->
                <div class="modal-overlay" id="modal-<?= $attr['id'] ?>">
                    <div class="modal-content">
                        <button class="modal-close" onclick="closeModal(<?= $attr['id'] ?>)"><i class="fa-solid fa-xmark"></i></button>
                        <div class="modal-header-img" style="background-image: url('<?= get_image_url($attr['image'], 'placeholder') ?>');"></div>
                        <div class="modal-body-content">
                            <h2 class="modal-title"><?= htmlspecialchars($attr['title']) ?></h2>
                            <div class="modal-description">
                                <?= html_entity_decode($attr['full_desc']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- ===================== TOURS IN THIS CITY ===================== -->
<?php if(!empty($cityTours)): ?>
<section class="section-padding" style="background: var(--logo-navy); color: var(--pure-white);">
    <div class="container">
        <div class="section-header reveal" style="padding:20px 0">
            <div class="gold-line" style="background: var(--pure-white);"></div>
            <h2 style="color: var(--pure-white);">Tours in <span style="color: var(--logo-gold);"><?= htmlspecialchars($dest['name']) ?></span></h2>
            <p style="color: rgba(255,255,255,0.7);">Explore our best-selling tours and packages starting from this magnificent city.</p>
        </div>
        
        <div class="tours-grid">
            <?php foreach($cityTours as $tour): ?>
            <div class="tour-card reveal">
                <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image">
                    <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
                    <div class="tour-wishlist"><i class="fa-regular fa-heart"></i></div>
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
    </div>
</section>
<?php endif; ?>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).classList.remove('active');
        document.body.style.overflow = '';
    }
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('modal-overlay')) {
            document.querySelectorAll('.modal-overlay.active').forEach(m => {
                m.classList.remove('active');
                document.body.style.overflow = '';
            });
        }
    });
</script>

<?php include 'includes/footer.php'; ?>