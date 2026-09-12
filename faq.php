<?php
// Path: /faq.php
require_once 'config.php';

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
$faqs = $pdo->query("SELECT * FROM faqs ORDER BY id DESC")->fetchAll();

$pageTitle = "FAQs & Travel Tips | Egypt Travel Square";
include 'includes/header.php';
?>

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

<section class="section-padding" style="padding: 100px 0;">
    <div class="container" style="max-width: 900px;">
        
        <div style="text-align: center; margin-bottom: 60px;" class="reveal">
            <h2 style="font-family: var(--font-display); font-size: 36px; color: var(--navy);">Frequently Asked Questions</h2>
            <p style="color: var(--text-muted);">Everything you need to know before traveling to Egypt.</p>
        </div>

        <div class="faq-container reveal">
            <?php if(empty($faqs)): ?>
                <p style="text-align:center; color:var(--text-muted);">No FAQs added yet.</p>
            <?php else: ?>
                <?php foreach($faqs as $index => $faq): ?>
                <details <?= $index === 0 ? 'open' : '' ?>>
                    <summary><?= htmlspecialchars($faq['question']) ?></summary>
                    <div class="faq-content">
                        <!-- نستخدم html_entity_decode لأن محتوى الإجابة يأتي من Rich Text Editor -->
                        <?= html_entity_decode($faq['answer']) ?>
                    </div>
                </details>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>