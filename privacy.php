<?php
// Path: /privacy.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "Privacy Policy | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_policies'] ?? '', 'placeholder') ?>" alt="Privacy Policy">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Policies</span></div>
            <h1 class="page-hero-title">Privacy <span>Policy</span></h1>
        </div>
    </div>
</section>

<section class="policy-section" style="padding: 100px 0; background: var(--sand);">
    <div class="container">
        <div class="policy-container" style="max-width: 900px; margin: 0 auto; background: var(--white); padding: 60px; border-radius: 24px; box-shadow: var(--shadow-soft);">
            
            <h2 style="font-family: var(--font-display); font-size: 32px; color: var(--navy); margin-top: 0; border-bottom: 2px solid rgba(201,162,39,0.2); padding-bottom: 15px; margin-bottom: 25px;">Your Privacy is Important to Us</h2>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">At Egypt Travel Square, protecting your personal data is a top priority. This Privacy Policy explains how we collect, use, and safeguard your information when you visit our website or book our services.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">Information We Collect</h3>
            <ul style="color: var(--text-muted); font-size: 16px; line-height: 1.9; padding-left: 20px; margin-bottom: 20px;">
                <li style="margin-bottom: 10px;"><strong>Personal Details:</strong> Name, email address, phone number, and nationality when you make an inquiry or booking.</li>
                <li style="margin-bottom: 10px;"><strong>Travel Documents:</strong> Passport copies (only if required for booking domestic flights, trains, or certain permits).</li>
                <li style="margin-bottom: 10px;"><strong>Payment Data:</strong> Handled securely via encrypted third-party gateways. We do not store your credit card details on our servers.</li>
            </ul>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">How We Use Your Information</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">We use your data solely to process your bookings, communicate with you regarding your itinerary, and ensure your safety and comfort during your trip to Egypt. We do not sell or rent your personal information to third parties.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">Cookies and Analytics</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">Our website may use "cookies" to enhance your user experience and track website performance. You can choose to set your web browser to refuse cookies, or to alert you when cookies are being sent.</p>

            <h3 style="color: var(--gold-dark); font-size: 22px; margin: 30px 0 15px;">Data Security</h3>
            <p style="color: var(--text-muted); font-size: 16px; line-height: 1.9;">We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information.</p>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>