<?php
// Path: /payment.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "Payment Methods | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_policies'] ?? '', 'placeholder') ?>" alt="Payment Methods">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Booking</span></div>
            <h1 class="page-hero-title">Payment <span>Methods</span></h1>
        </div>
    </div>
</section>

<section class="policy-section" style="padding: 100px 0; background: var(--sand);">
    <div class="container">
        <div class="policy-container" style="max-width: 900px; margin: 0 auto; background: var(--white); padding: 60px; border-radius: 24px; box-shadow: var(--shadow-soft);">
            
            <h2 style="font-family: var(--font-display); font-size: 32px; color: var(--navy); margin-top: 0; border-bottom: 2px solid rgba(201,162,39,0.2); padding-bottom: 15px; margin-bottom: 25px;">Secure and Flexible Payments</h2>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">To make your booking process as smooth as possible, Egypt Travel Square offers a variety of secure payment methods. We require a deposit to secure your reservations, with the balance payable later.</p>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin: 40px 0;">
                <div style="background: var(--sand-dark); padding: 30px; border-radius: 16px; text-align: center;">
                    <i class="fa-brands fa-cc-visa" style="font-size: 40px; color: var(--navy); margin-bottom: 15px;"></i>
                    <i class="fa-brands fa-cc-mastercard" style="font-size: 40px; color: var(--navy); margin-bottom: 15px; margin-left: 10px;"></i>
                    <h3 style="color: var(--navy); font-size: 20px; margin-bottom: 10px;">Online Credit Card</h3>
                    <p style="color: var(--text-muted); font-size: 14px;">Pay securely via our encrypted payment link. We accept Visa and MasterCard.</p>
                </div>
                
                <div style="background: var(--sand-dark); padding: 30px; border-radius: 16px; text-align: center;">
                    <i class="fa-solid fa-money-bill-transfer" style="font-size: 40px; color: var(--navy); margin-bottom: 15px;"></i>
                    <h3 style="color: var(--navy); font-size: 20px; margin-bottom: 10px;">Bank Transfer</h3>
                    <p style="color: var(--text-muted); font-size: 14px;">Direct wire transfer to our company bank account in Egypt (Swift code provided upon request).</p>
                </div>
            </div>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">Deposit Requirements</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">A deposit of 25% of the total tour price is required to confirm your booking. During peak seasons (Christmas, New Year, and Easter), the required deposit is 50%.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">Paying the Balance</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">The remaining balance can be paid in cash (USD, EUR, GBP, or EGP) upon your arrival in Egypt to your tour manager, or via credit card (subject to a local bank processing fee).</p>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>