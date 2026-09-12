<?php
// Path: /shore-excursions.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "Shore Excursions | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_shore'] ?? '', 'placeholder') ?>" alt="Shore Excursions">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Shore Excursions</span></div>
            <h1 class="page-hero-title">Shore <span>Excursions</span></h1>
        </div>
    </div>
</section>

<section class="intro-section reveal">
    <div class="container">
        <div class="intro-text-wrapper">
            <h2 class="intro-title">Port to Pyramids Tours</h2>
            <p class="intro-text">
                <span class="brand-highlight" style="font-weight:bold; color:var(--navy);">Egypt Travel Square</span> arrange Private shore Excursions and overnight trips to Cairo from Alexandria Port or Port Said.
            </p>
            <p class="intro-text">Our day trips to Cairo from Alexandria are always Private and escorted by the best well-educated tour guides in Egypt. Visit Giza Pyramids, Sphinx, Egyptian Museum, and Khan Khalili Bazaar.</p>
        </div>
    </div>
</section>

<section class="destinations reveal" id="destinations" style="padding-bottom: 120px;">
    <div class="container">
        <div class="dest-grid" style="grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); max-width: 900px; margin: 0 auto; gap: 40px;">
            
            <div class="dest-card reveal" onclick="window.location.href='tours.php?type=shore'">
                <div class="dest-card-bg"><img src="https://egypttravelsquare.com/3abar-data/uploads/2019/12/alexandria_shore_excursion.jpg" alt="Alexandria Port"></div>
                <div class="dest-card-overlay"></div>
                <div class="dest-card-content" style="text-align: center;">
                    <h3 class="dest-name">Alexandria Port</h3>
                    <span class="dest-cta" style="margin: 16px auto 0; opacity: 1; transform: none; background: var(--gold); color: var(--navy);">View Tours <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>
            
            <div class="dest-card reveal" onclick="window.location.href='tours.php?type=shore'">
                <div class="dest-card-bg"><img src="https://egypttravelsquare.com/3abar-data/uploads/2019/12/Port-Said-Shore-Excursions.jpg" alt="Port Said"></div>
                <div class="dest-card-overlay"></div>
                <div class="dest-card-content" style="text-align: center;">
                    <h3 class="dest-name">Port Said</h3>
                    <span class="dest-cta" style="margin: 16px auto 0; opacity: 1; transform: none; background: var(--gold); color: var(--navy);">View Tours <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>
            
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>