<?php
// Path: /transfers.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$city_filter = isset($_GET['city']) ? trim($_GET['city']) : '';
$display_city = $city_filter ? ucfirst(htmlspecialchars($city_filter)) : 'Egypt';

if ($city_filter) {
    $stmt = $pdo->prepare("SELECT * FROM tours WHERE type = 'transfer' AND location LIKE ? ORDER BY id DESC");
    $stmt->execute(['%' . $city_filter . '%']);
} else {
    $stmt = $pdo->query("SELECT * FROM tours WHERE type = 'transfer' ORDER BY id DESC");
}
$transfers = $stmt->fetchAll();

$pageTitle = "Private Transfers in $display_city | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_transfers'] ?? '', 'placeholder') ?>" alt="Private Transfers">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Services</span></div>
            <h1 class="page-hero-title">Private <span>Transfers</span></h1>
            <p style="color: rgba(255,255,255,0.8); font-size: 18px; margin-top: 15px; font-weight: 300;">Safe, comfortable, and reliable transportation in <?= $display_city ?></p>
        </div>
    </div>
</section>

<section class="section-padding" style="background: var(--off-white);">
    <div class="container">
        <div class="section-header reveal">
            <div class="gold-line"></div>
            <h2>Available <span>Transfers</span></h2>
            <p>Book your private, hassle-free airport and city transfers directly with us.</p>
        </div>
        
        <?php if(empty($transfers)): ?>
            <div style="text-align:center; padding: 50px; background: var(--pure-white); border-radius: 8px; box-shadow: var(--shadow-elegant);" class="reveal">
                <i class="fa-solid fa-car" style="font-size: 50px; color: var(--logo-gold); margin-bottom: 20px;"></i>
                <h3 style="color: var(--logo-navy); font-size: 22px; margin-bottom: 10px; font-family: var(--font-display);">No transfers found</h3>
                <p style="color:var(--text-gray);">Currently, there are no transfer services listed for <?= $display_city ?>.</p>
                <a href="transfers.php" class="btn-gold" style="margin-top: 20px;">View All Transfers</a>
            </div>
        <?php else: ?>
            <div class="tours-grid">
                <?php foreach($transfers as $tour): ?>
                <div class="tour-card reveal">
                    <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-image" style="height: 220px;">
                        <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" alt="<?= htmlspecialchars($tour['title']) ?>">
                    </a>
                    <div class="tour-body">
                        <div class="tour-location"><i class="fa-solid fa-location-dot"></i> <?= htmlspecialchars($tour['location']) ?></div>
                        <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-name" style="font-size: 20px;"><?= htmlspecialchars($tour['title']) ?></a>
                        <div class="tour-meta">
                            <div class="tour-meta-item"><i class="fa-solid fa-car-side"></i> Private Vehicle</div>
                        </div>
                        <div class="tour-footer">
                            <div class="tour-price">
                                <span class="tour-price-label">Price</span>
                                <span class="tour-price-amount">$<?= htmlspecialchars($tour['price']) ?></span>
                            </div>
                            <a href="tour.php?id=<?= $tour['id'] ?>" class="tour-book-btn"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="section-padding" style="background: var(--logo-navy); color: var(--pure-white); text-align: center;">
    <div class="container">
        <div class="section-header reveal" style="max-width: 600px; margin: 0 auto 50px;">
            <div class="gold-line" style="background: var(--pure-white);"></div>
            <h2 style="color: var(--pure-white);">Seamless <span>Airport Meet & Greet</span></h2>
            <p style="color: rgba(255,255,255,0.7);">We take the stress out of your arrival. Here is how our premium transfer service works.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px;">
            <div class="reveal">
                <div style="width: 90px; height: 90px; margin: 0 auto 25px; border: 1px solid rgba(201,162,39,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--logo-gold);">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
                <h4 style="font-size: 24px; margin-bottom: 15px; font-family: var(--font-display); color: var(--logo-gold);">1. Easy Booking</h4>
                <p style="color: rgba(255,255,255,0.6); font-size: 15px;">Select your transfer route and book easily through our platform.</p>
            </div>
            
            <div class="reveal">
                <div style="width: 90px; height: 90px; margin: 0 auto 25px; border: 1px solid rgba(201,162,39,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--logo-gold);">
                    <i class="fa-solid fa-plane-arrival"></i>
                </div>
                <h4 style="font-size: 24px; margin-bottom: 15px; font-family: var(--font-display); color: var(--logo-gold);">2. Flight Tracking</h4>
                <p style="color: rgba(255,255,255,0.6); font-size: 15px;">Our team monitors your flight. Even if you're delayed, your driver will be waiting.</p>
            </div>
            
            <div class="reveal">
                <div style="width: 90px; height: 90px; margin: 0 auto 25px; border: 1px solid rgba(201,162,39,0.3); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 32px; color: var(--logo-gold);">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <h4 style="font-size: 24px; margin-bottom: 15px; font-family: var(--font-display); color: var(--logo-gold);">3. Meet Your Driver</h4>
                <p style="color: rgba(255,255,255,0.6); font-size: 15px;">Find your chauffeur holding a personalized sign, ready to assist with luggage.</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>