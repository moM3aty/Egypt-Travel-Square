<?php
// Path: /contact.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$pageTitle = "Contact Us | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start; }
    .contact-info-box { background: var(--pure-white); padding: 30px; border-radius: 8px; box-shadow: var(--shadow-elegant); margin-bottom: 20px; display: flex; gap: 20px; align-items: center; border-left: 4px solid var(--logo-gold); transition: var(--transition);}
    .contact-info-box:hover { transform: translateX(5px); }
    .contact-info-box i { font-size: 32px; color: var(--logo-gold); width: 40px; text-align: center;}
    .contact-info-box h4 { font-size: 20px; color: var(--logo-navy); margin-bottom: 5px; font-family: var(--font-display); font-weight: 700;}
    .contact-info-box p { color: var(--text-gray); font-size: 15px;}
    
    .contact-form { background: var(--logo-navy); padding: 50px; border-radius: 8px; color: var(--pure-white); box-shadow: var(--shadow-elegant); border-bottom: 4px solid var(--logo-gold);}
    .form-control-dark { width: 100%; padding: 15px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 4px; color: var(--pure-white); margin-bottom: 20px; outline: none; transition: 0.3s; font-family: var(--font-body);}
    .form-control-dark:focus { border-color: var(--logo-gold); background: rgba(255,255,255,0.1);}
    .form-control-dark::placeholder { color: rgba(255,255,255,0.4); }
    
    @media (max-width: 991px) { .contact-grid { grid-template-columns: 1fr; } }
</style>

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

<section class="section-padding" style="background: var(--off-white);">
    <div class="container">
        <div class="contact-grid">
            
            <div class="reveal">
                <h2 style="font-family: var(--font-display); font-size: 42px; color: var(--logo-navy); margin-bottom: 20px; font-weight: 700;">We're Here to Help</h2>
                <p style="color: var(--text-gray); font-size: 16px; line-height: 1.8; margin-bottom: 40px;">Have questions about our tours or need a customized itinerary? Reach out to us, and our travel experts will respond promptly.</p>
                
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

            <div class="contact-form reveal">
                <h3 style="font-family: var(--font-display); font-size: 32px; color: var(--logo-gold); margin-bottom: 25px; font-weight: 700;">Send a Message</h3>
                <form action="send_mail.php" method="POST">
                    <input type="text" name="name" class="form-control-dark" placeholder="Your Full Name" required>
                    <input type="email" name="email" class="form-control-dark" placeholder="Your Email Address" required>
                    <input type="text" name="subject" class="form-control-dark" placeholder="Subject" required>
                    <textarea name="message" class="form-control-dark" rows="5" placeholder="Your Message..." required style="resize:vertical;"></textarea>
                    
                    <button type="submit" class="btn-gold" style="width: 100%;">Send Message <i class="fa-solid fa-paper-plane" style="margin-left:8px;"></i></button>
                </form>
            </div>
            
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>