<?php
// Path: /terms.php
require_once 'config.php';
$pageTitle = "Terms & Conditions | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    .inner-hero { position: relative; height: 50vh; min-height: 400px; display: flex; align-items: center; justify-content: center; text-align: center; margin:0; }
    .hero-bg { position: absolute; inset: 0; }
    .hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.3); }
    .hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.9), rgba(10, 22, 40, 0.2)); }
    .inner-hero-content { position: relative; z-index: 2; color: var(--white); margin-top: 60px;}
    .hero-title { font-size: clamp(40px, 6vw, 70px); font-weight: 700; color: var(--white); margin-bottom: 16px;}
    .hero-title span { color: var(--gold); font-style: italic; }
    
    .policy-section { padding: 80px 0; }
    .policy-container { max-width: 900px; margin: 0 auto; background: var(--white); padding: 60px; border-radius: 24px; box-shadow: var(--shadow-soft); }
    .policy-container h2 { font-size: 28px; color: var(--navy); margin: 40px 0 20px; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 12px; }
    .policy-container h2:first-child { margin-top: 0; }
    .policy-container p { font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 20px; }
    @media (max-width: 991px) { .policy-container { padding: 40px 20px; } }
</style>

<section class="inner-hero">
  <div class="hero-bg"><img src="admin/assets/images/policy-bg.jpg" alt="Policy Background"></div>
  <div class="hero-overlay"></div>
  <div class="container">
    <div class="inner-hero-content">
      <h1 class="hero-title">Terms & <span>Conditions</span></h1>
    </div>
  </div>
</section>

<section class="policy-section reveal">
  <div class="container policy-container">
    
    <!-- محتوى الشروط والأحكام يُفضل أن يجلب أيضاً من لوحة التحكم (صفحة الإعدادات) ولكن هنا وضعناه بشكل مباشر حسب طلبك لتصميم الصفحة -->
    <h2>Our Booking Terms: Journey with Peace of Mind!</h2>
    <p>Welcome to Egypt Travel Square. These Terms and Conditions outline the rules and regulations for the use of our website and the booking of our travel services.</p>

    <h2>Personalized Itinerary for You</h2>
    <p>Once we receive your request, our friendly representative will get in touch with you. We'll discuss all the details and create a customized itinerary just for you. Once you love it, it's a go!</p>
    <p>Our commitment is to ensure that your travel experience matches your expectations completely, offering full flexibility during the planning stage.</p>

    <h2>Acceptance of Terms</h2>
    <p>By confirming a booking with Egypt Travel Square, you acknowledge that you have read, understood, and agreed to these Booking Terms & Conditions, including all payment, cancellation, and refund policies.</p>
    <p>If you disagree with any part of these terms, you may not access our services. Egypt Travel Square reserves the right to modify these terms at any time, and such modifications shall be effective immediately upon posting to our website.</p>

  </div>
</section>

<?php include 'includes/footer.php'; ?>