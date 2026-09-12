<?php
// Path: /gallery.php
require_once 'config.php';

// جلب الإعدادات (بما فيها صورة الهيرو)
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

// جلب صور المعرض من قاعدة البيانات (إذا كان لديك جدول gallery)
// لو مفيش جدول لسه، الكود مش هيعمل مشكلة وهيعرض رسالة "قريباً"
$gallery_images = [];
try {
    $gallery_images = $pdo->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
} catch (Exception $e) {
    // تجاهل الخطأ لو الجدول مش موجود حالياً
}

$pageTitle = "Our Gallery | Egypt Travel Square";
include 'includes/header.php';
?>

<section class="page-hero">
    <div class="page-hero-bg">
        <!-- السحر هنا: سحب صورة الـ Gallery Hero من لوحة التحكم -->
        <img src="<?= get_image_url($settings['hero_gallery'] ?? '', 'placeholder') ?>" alt="Our Gallery">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Explore</span></div>
            <h1 class="page-hero-title">Our <span>Gallery</span></h1>
        </div>
    </div>
</section>

<section class="section-padding" style="padding: 100px 0; background: var(--sand);">
    <div class="container">
        <div class="section-header reveal" style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-family: var(--font-display); font-size: 36px; color: var(--navy);">Moments to <span>Remember</span></h2>
            <p style="color: var(--text-muted);">Take a glimpse into the beautiful experiences waiting for you in Egypt.</p>
        </div>

        <?php if(empty($gallery_images)): ?>
            <p style="text-align:center; color:var(--text-muted); font-size: 18px;">Stunning photos will be added here soon!</p>
        <?php else: ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;" class="reveal">
                <?php foreach($gallery_images as $img): ?>
                <div style="border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-soft); height: 280px; position: relative; cursor: pointer; transition: 0.4s;" onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="<?= get_image_url($img['image_path'] ?? $img['image'] ?? '', 'placeholder') ?>" style="width: 100%; height: 100%; object-fit: cover;" alt="Gallery Image">
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php include 'includes/footer.php'; ?>