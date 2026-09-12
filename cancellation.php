<?php
// Path: /cancellation.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "Cancellation Policy | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_policies'] ?? '', 'placeholder') ?>" alt="Cancellation Policy">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Policies</span></div>
            <h1 class="page-hero-title">Cancellation <span>Policy</span></h1>
        </div>
    </div>
</section>

<section class="policy-section" style="padding: 100px 0; background: var(--sand);">
    <div class="container">
        <div class="policy-container" style="max-width: 900px; margin: 0 auto; background: var(--white); padding: 60px; border-radius: 24px; box-shadow: var(--shadow-soft);">
            
            <h2 style="font-family: var(--font-display); font-size: 32px; color: var(--navy); margin-top: 0; border-bottom: 2px solid rgba(201,162,39,0.2); padding-bottom: 15px; margin-bottom: 25px;">Standard Cancellation Policy</h2>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">At Egypt Travel Square, we understand that plans can change. We strive to be as flexible as possible while ensuring the quality of our services. Please read our cancellation policy carefully.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">1. Individual Tour Cancellations</h3>
            <ul style="color: var(--text-muted); font-size: 16px; line-height: 1.9; padding-left: 20px; margin-bottom: 20px;">
                <li style="margin-bottom: 10px;"><strong>More than 30 days before arrival:</strong> Full refund minus any non-refundable deposit (e.g., domestic flights).</li>
                <li style="margin-bottom: 10px;"><strong>15 to 29 days before arrival:</strong> 25% of the total tour cost will be charged.</li>
                <li style="margin-bottom: 10px;"><strong>7 to 14 days before arrival:</strong> 50% of the total tour cost will be charged.</li>
                <li style="margin-bottom: 10px;"><strong>Less than 7 days or No-Show:</strong> 100% of the total tour cost will be charged.</li>
            </ul>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">2. Flight & Train Tickets</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">Domestic flights and sleeper train tickets are generally non-refundable once issued, according to the policies of the respective airlines and railway authorities in Egypt. Any cancellation will incur a 100% fee for the ticket portion.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">3. Force Majeure</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">In case of unforeseeable circumstances such as extreme weather, natural disasters, or global travel restrictions, we will offer the option to reschedule your trip at no extra administrative cost, or provide a flexible travel voucher.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">Refund Process</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">Approved refunds will be processed within 14-21 business days and will be credited back to the original method of payment.</p>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>