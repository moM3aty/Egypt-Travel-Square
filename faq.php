<?php
// Path: /faq.php
require_once 'config.php';

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
$faqs = $pdo->query("SELECT * FROM faqs ORDER BY id DESC")->fetchAll();

$pageTitle = "FAQs & Travel Tips | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    /* FAQ Accordion Styling */
    .faq-container { width: 100%; max-width: 900px; margin: 0 auto; }
    details { background: var(--pure-white); border-radius: 8px; margin-bottom: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.03); overflow: hidden; border: 1px solid var(--border); transition: var(--transition); }
    details[open] { border-color: var(--logo-gold); }
    summary { padding: 24px; font-weight: 700; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; color: var(--logo-navy); font-size: 18px; font-family: var(--font-body); }
    summary::-webkit-details-marker { display: none; }
    summary::after { content: '\f067'; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--logo-gold); transition: transform 0.3s; font-size: 16px;}
    details[open] summary::after { content: '\f068'; transform: rotate(180deg); color: var(--logo-navy); }
    .faq-content { padding: 0 24px 24px; color: var(--text-gray); line-height: 1.8; font-size: 15px; }
</style>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_faq'] ?? '', 'placeholder') ?>" alt="FAQs">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>FAQs</span></div>
            <h1 class="page-hero-title">Travel Tips & <span>FAQs</span></h1>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        
        <div class="section-header reveal">
            <div class="gold-line"></div>
            <h2>Frequently Asked <span>Questions</span></h2>
            <p>Everything you need to know before traveling to Egypt.</p>
        </div>

        <div class="faq-container reveal">
            <?php if(empty($faqs)): ?>
                <p style="text-align:center; color:var(--text-gray);">No FAQs added yet.</p>
            <?php else: ?>
                <?php foreach($faqs as $index => $faq): ?>
                <details <?= $index === 0 ? 'open' : '' ?>>
                    <summary><?= htmlspecialchars($faq['question']) ?></summary>
                    <div class="faq-content">
                        <?= html_entity_decode($faq['answer']) ?>
                    </div>
                </details>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>