<?php
// Path: /admin/sliders.php
require_once 'header.php';

// ==========================================
// 1. تنظيف قاعدة البيانات من الصفوف المكررة الفارغة
// ==========================================
try {
    // هذا الكود سيمسح أي صفوف فارغة تسببت في إخفاء الصور سابقاً
    $pdo->exec("DELETE FROM settings WHERE setting_value = '[]' AND setting_key IN ('home_hero_slider_images', 'home_about_slider_images')");
} catch(PDOException $e) {}

// ==========================================
// 2. نظام حذف صورة فردية
// ==========================================
if (isset($_GET['delete_img']) && isset($_GET['slider'])) {
    $img_to_delete = $_GET['delete_img'];
    $slider_key = ($_GET['slider'] == 'hero') ? 'home_hero_slider_images' : 'home_about_slider_images';

    $stmtOld = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ? LIMIT 1");
    $stmtOld->execute([$slider_key]);
    $json = $stmtOld->fetchColumn();

    if ($json) {
        $images = json_decode($json, true);
        if (is_array($images) && ($key = array_search($img_to_delete, $images)) !== false) {
            unset($images[$key]);
            $images = array_values($images); 
            $new_json = json_encode($images);
            
            // تحديث جميع الصفوف التي تحمل نفس المفتاح
            $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?")->execute([$new_json, $slider_key]);

            if (strpos($img_to_delete, 'http') !== 0 && file_exists(__DIR__ . '/uploads/' . $img_to_delete)) {
                @unlink(__DIR__ . '/uploads/' . $img_to_delete);
            }
            $_SESSION['toast'] = ['title' => 'Image Removed', 'message' => 'The image was removed from the slider.', 'type' => 'success'];
        }
    }
    header("Location: sliders.php");
    exit;
}

// ==========================================
// 3. نظام رفع وإضافة الصور الجديدة
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // فحص تجاوز حجم الرفع
    if (empty($_POST) && empty($_FILES) && isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > 0) {
        $_SESSION['toast'] = ['title' => 'Upload Error', 'message' => 'Files are too large! Please select fewer or smaller images.', 'type' => 'danger'];
        header("Location: sliders.php");
        exit;
    }

    $upload_dir = __DIR__ . '/uploads/';
    if (!is_dir($upload_dir)) { @mkdir($upload_dir, 0755, true); }
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    
    $slider_fields = [
        'hero_images' => 'home_hero_slider_images',
        'about_images' => 'home_about_slider_images'
    ];

    $total_uploaded = 0;

    foreach ($slider_fields as $input_name => $db_key) {
        if (isset($_FILES[$input_name]) && !empty($_FILES[$input_name]['name'][0])) {
            
            // جلب الصور القديمة
            $stmtOld = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ? LIMIT 1");
            $stmtOld->execute([$db_key]);
            $old_json = $stmtOld->fetchColumn();
            $existing_images = $old_json ? json_decode($old_json, true) : [];
            if (!is_array($existing_images)) $existing_images = [];

            $newly_uploaded = [];
            $total_files = count($_FILES[$input_name]['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                if ($_FILES[$input_name]['error'][$i] == 0) {
                    $ext = strtolower(pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION));
                    if (in_array($ext, $allowed)) {
                        $img_name = time() . '_' . rand(1000,9999) . '_' . $input_name . '.' . $ext;
                        if (move_uploaded_file($_FILES[$input_name]['tmp_name'][$i], $upload_dir . $img_name)) {
                            $newly_uploaded[] = $img_name;
                            $total_uploaded++;
                        }
                    }
                }
            }

            // دمج الصور وحفظها
            if (!empty($newly_uploaded)) {
                $final_images = array_merge($existing_images, $newly_uploaded);
                $new_json = json_encode($final_images);
                
                $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = ?");
                $stmtCheck->execute([$db_key]);
                if ($stmtCheck->fetchColumn() > 0) {
                    $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?")->execute([$new_json, $db_key]);
                } else {
                    $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)")->execute([$db_key, $new_json]);
                }
            }
        }
    }

    if ($total_uploaded > 0) {
        $_SESSION['toast'] = ['title' => 'Images Added', 'message' => "Successfully uploaded $total_uploaded image(s).", 'type' => 'success'];
    }
    header("Location: sliders.php");
    exit;
}

// جلب الإعدادات بأمان تام بعد التحديث
$stmt = $pdo->query("SELECT setting_key, setting_value FROM settings ORDER BY id DESC");
$settings_raw = $stmt->fetchAll(PDO::FETCH_ASSOC);
$settings = [];
foreach ($settings_raw as $row) {
    if (!isset($settings[$row['setting_key']])) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }
}
?>

<style>
    .slider-img-wrap { position: relative; width: 150px; height: 100px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border: 2px solid transparent; transition: 0.3s; }
    .slider-img-wrap:hover { border-color: var(--gold); transform: translateY(-3px); }
    .slider-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .remove-btn { position: absolute; top: 5px; right: 5px; width: 28px; height: 28px; background: rgba(231, 76, 60, 0.9); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 13px; cursor: pointer; text-decoration: none; transition: 0.3s; backdrop-filter: blur(4px); }
    .remove-btn:hover { background: #C0392B; transform: scale(1.1); color: white; }
    .upload-box { background: #FAFAFA; padding: 25px; border-radius: 16px; border: 2px dashed #D1D5DB; margin-bottom: 20px; }
</style>

<div class="page-header">
    <div class="page-title">
        <h1>Home Sliders Management</h1>
        <p>Seamlessly add new images or remove specific ones without losing your existing slider data.</p>
    </div>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="form_submitted" value="1">
        
        <!-- ================= HERO SLIDER ================= -->
        <h3 style="color:var(--navy); margin-bottom:15px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-images" style="color:var(--gold);"></i> 1. Main Hero Slider
        </h3>
        
        <div style="display:flex; gap:15px; flex-wrap:wrap; margin-bottom:20px;">
            <?php 
            $hero_json = $settings['home_hero_slider_images'] ?? '[]';
            $hero_imgs = json_decode($hero_json, true);
            if(is_array($hero_imgs) && !empty($hero_imgs)):
                foreach($hero_imgs as $s_img):
            ?>
                <div class="slider-img-wrap">
                    <img src="<?= get_image_url($s_img, 'placeholder') ?>" alt="Hero Image">
                    <a href="?delete_img=<?= urlencode($s_img) ?>&slider=hero" class="remove-btn" onclick="return confirm('Remove this image?');" title="Remove Image"><i class="fa-solid fa-xmark"></i></a>
                </div>
            <?php endforeach; else: echo '<p style="color:var(--text-muted); font-size:14px; width:100%;">No images in Hero Slider yet.</p>'; endif; ?>
        </div>

        <div class="upload-box form-group" style="margin-bottom:50px;">
            <label class="form-label" style="color:var(--gold-dark);"><i class="fa-solid fa-plus-circle"></i> Add New Images to Hero Slider</label>
            <input type="file" name="hero_images[]" class="form-control" accept="image/jpeg, image/png, image/webp" multiple>
        </div>

        <!-- ================= ABOUT SLIDER ================= -->
        <h3 style="color:var(--navy); margin-bottom:15px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-layer-group" style="color:var(--gold);"></i> 2. About Us Slider
        </h3>
        
        <div style="display:flex; gap:15px; flex-wrap:wrap; margin-bottom:20px;">
            <?php 
            $about_json = $settings['home_about_slider_images'] ?? '[]';
            $about_imgs = json_decode($about_json, true);
            if(is_array($about_imgs) && !empty($about_imgs)):
                foreach($about_imgs as $s_img):
            ?>
                <div class="slider-img-wrap" style="width: 120px; height: 120px;">
                    <img src="<?= get_image_url($s_img, 'placeholder') ?>" alt="About Image">
                    <a href="?delete_img=<?= urlencode($s_img) ?>&slider=about" class="remove-btn" onclick="return confirm('Remove this image?');" title="Remove Image"><i class="fa-solid fa-xmark"></i></a>
                </div>
            <?php endforeach; else: echo '<p style="color:var(--text-muted); font-size:14px; width:100%;">No images in About Slider yet.</p>'; endif; ?>
        </div>

        <div class="upload-box form-group" style="margin-bottom:30px;">
            <label class="form-label" style="color:var(--gold-dark);"><i class="fa-solid fa-plus-circle"></i> Add New Images to About Slider</label>
            <input type="file" name="about_images[]" class="form-control" accept="image/jpeg, image/png, image/webp" multiple>
        </div>

        <div style="border-top:1px solid var(--border); padding-top:20px; text-align:right;">
            <button type="submit" class="btn btn-primary" style="padding:16px 40px; font-size:16px;">
                <i class="fa-solid fa-upload"></i> Upload Added Images
            </button>
        </div>

    </form>
</div>
</main>
</body>
</html>