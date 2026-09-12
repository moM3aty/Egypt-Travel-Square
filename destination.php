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
    /* ===================== PREMIUM DESTINATION STYLE ===================== */
    .city-hero { height: 75vh; min-height: 550px; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden;}
    .city-hero-bg { position: absolute; inset: 0; z-index: 0; }
    .city-hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5); transform: scale(1.05); }
    .city-hero-content { position: relative; z-index: 2; padding-top: 60px; animation: fadeInUp 1s ease both;}
    
    .city-subtitle { color: var(--gold); font-family: var(--font-display); font-size: 28px; font-style: italic; letter-spacing: 2px; display: block; margin-bottom: 10px; }
    .city-title { font-family: var(--font-display); font-size: clamp(50px, 8vw, 110px); color: var(--white); font-weight: 700; text-shadow: 0 4px 20px rgba(0,0,0,0.4); line-height: 1; margin: 0;}
    
    .city-overview-box { background: var(--white); border-radius: 24px; padding: 60px 80px; max-width: 1100px; margin: -100px auto 80px; position: relative; z-index: 10; box-shadow: var(--shadow-medium); text-align: center; border-top: 6px solid var(--gold); }
    .city-overview-title { font-size: 36px; color: var(--navy); margin-bottom: 25px; font-family: var(--font-display); }
    .city-overview-text { font-size: 17px; color: var(--text-muted); line-height: 2; text-align: left; }
    .city-overview-text p { margin-bottom: 15px; }
    
    @media(max-width: 991px) {
       .city-overview-box { margin: -60px 20px 60px; padding: 40px 25px; text-align: center; }
       .city-overview-text { text-align: center; }
    }
</style>

<section class="city-hero">
    <div class="city-hero-bg">
        <img src="<?= get_image_url($dest['hero_image'], 'destination') ?>" alt="<?= htmlspecialchars($dest['name']) ?>">
    </div>
    <div class="city-hero-content">
        <div class="breadcrumb" style="justify-content:center; color: var(--gold); margin-bottom: 10px; font-size: 12px;">
            <a href="index.php" style="color:rgba(255,255,255,0.7);">HOME</a> 
            <i class="fa-solid fa-circle" style="font-size:5px; margin:0 10px; color:rgba(255,255,255,0.3);"></i> 
            <span style="color:var(--white);">WHERE TO GO</span>
        </div>
        <span class="city-subtitle">Explore</span>
        <h1 class="city-title"><?= htmlspecialchars($dest['name']) ?></h1>
    </div>
</section>

<section style="background: var(--sand); padding-bottom: 100px;">
    <div class="container">
        
        <!-- Premium City Overview Box -->
        <div class="city-overview-box reveal" >
            <h2 class="city-overview-title"><?= htmlspecialchars($dest['intro_title']) ?></h2>
            <div class="city-overview-text">
                <?= html_entity_decode($dest['intro_text']) ?>
            </div>
        </div>

        <!-- Attractions Grid (Cards next to each other) -->
        <div class="section-header reveal" style="margin-top: 80px; margin-bottom: 60px;">
            <h2>Must-See <span>Attractions</span></h2>
            <p>Discover the magnificent historical sites and landmarks that make <?= htmlspecialchars($dest['name']) ?> a world-class destination.</p>
        </div>
        
        <?php if(empty($attractions)): ?>
            <p style="text-align:center; color:var(--text-muted);">Attractions will be added soon.</p>
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
<section class="section-padding" style="background: var(--navy); color: var(--white);">
    <div class="container">
        <div class="section-header reveal"style="padding:20px 0">
            <h2 style="color: var(--white);">Tours in <span style="color: var(--gold);"><?= htmlspecialchars($dest['name']) ?></span></h2>
            <p style="color: rgba(255,255,255,0.7);">Explore our best-selling tours and packages starting from this magnificent city.</p>
        </div>
        
        <div class="tours-grid">
            <?php foreach($cityTours as $tour): ?>
            <div class="tour-card reveal" style="box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
                <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image">
                    <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
                    <div class="tour-badge"><i class="fa-solid fa-star"></i> 5.0</div>
                    <div class="tour-wishlist"><i class="fa-regular fa-heart"></i></div>
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