<?php
// Path: /contact.php
require_once 'config.php';

// جلب الإعدادات العامة (الصور وبيانات التواصل)
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "Contact Us | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_contact'] ?? '', 'placeholder') ?>" alt="Contact Us">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Contact Us</span></div>
            <h1 class="page-hero-title">Get In <span>Touch</span></h1>
        </div>
    </div>
</section>

<section class="section-padding" style="padding: 100px 0;">
    <div class="container">
        <div class="contact-grid">
            
            <!-- Contact Information (Dynamic) -->
            <div>
                <h2 style="font-family: var(--font-display); font-size: 36px; color: var(--navy); margin-bottom: 20px;">We're Here to Help</h2>
                <p style="color: var(--text-muted); font-size: 16px; line-height: 1.8; margin-bottom: 40px;">Have questions about our tours or need a customized itinerary? Reach out to us, and our travel experts will respond promptly.</p>
                
                <div class="contact-info-box">
                    <i class="fa-solid fa-phone"></i>
                    <div>
                        <h4>Call / WhatsApp</h4>
                        <p><?= htmlspecialchars($settings['phone'] ?? '+20 100 679 6511') ?></p>
                    </div>
                </div>

                <div class="contact-info-box">
                    <i class="fa-solid fa-envelope"></i>
                    <div>
                        <h4>Email Us</h4>
                        <p><?= htmlspecialchars($settings['email'] ?? 'info@egypttravelsquare.com') ?></p>
                    </div>
                </div>

                <div class="contact-info-box">
                    <i class="fa-solid fa-location-dot"></i>
                    <div>
                        <h4>Our Location</h4>
                        <p><?= htmlspecialchars($settings['address'] ?? 'Cairo, Egypt') ?></p>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form">
                <h3 style="font-family: var(--font-display); font-size: 28px; color: var(--gold); margin-bottom: 20px;">Send a Message</h3>
                <form action="send_mail.php" method="POST">
                    <div class="form-group" style="margin-bottom: 16px;">
                        <input type="text" name="name" class="form-control" placeholder="Your Full Name" required style="width:100%; padding:14px; border-radius:8px; border:none;">
                    </div>
                    <div class="form-group" style="margin-bottom: 16px;">
                        <input type="email" name="email" class="form-control" placeholder="Your Email Address" required style="width:100%; padding:14px; border-radius:8px; border:none;">
                    </div>
                    <div class="form-group" style="margin-bottom: 16px;">
                        <input type="text" name="subject" class="form-control" placeholder="Subject" required style="width:100%; padding:14px; border-radius:8px; border:none;">
                    </div>
                    <div class="form-group" style="margin-bottom: 24px;">
                        <textarea name="message" class="form-control" rows="5" placeholder="Your Message..." required style="width:100%; padding:14px; border-radius:8px; border:none; resize:vertical;"></textarea>
                    </div>
                    <button type="submit" class="btn-submit" style="width:100%; padding:16px; background:var(--gold); color:var(--navy); font-weight:bold; border:none; border-radius:8px; cursor:pointer;">Send Message <i class="fa-solid fa-paper-plane" style="margin-left:8px;"></i></button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>