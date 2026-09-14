<?php
// Path: /admin/settings.php
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. الحقول النصية العادية
    $fields = [
        'phone', 'email', 'address', 'facebook', 'instagram', 'youtube', 'tiktok', 'tripadvisor',
        'home_hero_title', 'home_hero_subtitle', 'home_hero_btn1_text', 'home_hero_btn1_link',
        'home_hero_btn2_text', 'home_hero_btn2_link',
        // الحقول الجديدة لقسم النبذة والفيديو
        'home_about_title', 'home_about_text', 'home_about_btn_text', 'home_about_btn_link',
        'home_video_title', 'home_video_subtitle'
    ];
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = trim($_POST[$field]);
            $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = ?");
            $stmtCheck->execute([$field]);
            
            if ($stmtCheck->fetchColumn() > 0) {
                $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?")->execute([$value, $field]);
            } else {
                $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)")->execute([$field, $value]);
            }
        }
    }

    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) { mkdir($upload_dir, 0777, true); }

    // 2. معالجة الصور الفردية والفيديو
    $media_fields = [
        'home_hero_bg' => ['jpg', 'jpeg', 'png', 'webp'],
        'default_logo' => ['jpg', 'jpeg', 'png', 'webp', 'svg'],
        'default_tour_img' => ['jpg', 'jpeg', 'png', 'webp'],
        'home_video_cover' => ['jpg', 'jpeg', 'png', 'webp'],
        'home_video_upload' => ['mp4', 'webm', 'ogg']
    ];
    
    foreach ($media_fields as $img_field => $allowed_exts) {
        if (isset($_FILES[$img_field]) && $_FILES[$img_field]['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES[$img_field]['name'], PATHINFO_EXTENSION));
            
            if (in_array($ext, $allowed_exts)) {
                $img_name = time() . '_' . $img_field . '.' . $ext;
                if (move_uploaded_file($_FILES[$img_field]['tmp_name'], $upload_dir . $img_name)) {
                    
                    // جلب ومسح الملف القديم
                    $stmtOld = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
                    $stmtOld->execute([$img_field]);
                    $old_file = $stmtOld->fetchColumn();
                    if ($old_file && strpos($old_file, 'http') !== 0 && file_exists($upload_dir . $old_file)) {
                        unlink($upload_dir . $old_file);
                    }

                    $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = ?");
                    $stmtCheck->execute([$img_field]);
                    
                    if ($stmtCheck->fetchColumn() > 0) {
                        $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?")->execute([$img_name, $img_field]);
                    } else {
                        $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)")->execute([$img_field, $img_name]);
                    }
                }
            }
        }
    }

    // 3. معالجة رفع صور السلايدر المتعددة (Multiple Images)
    if (isset($_FILES['home_slider_images']) && !empty($_FILES['home_slider_images']['name'][0])) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $uploaded_images = [];
        $total_files = count($_FILES['home_slider_images']['name']);
        
        for ($i = 0; $i < $total_files; $i++) {
            if ($_FILES['home_slider_images']['error'][$i] == 0) {
                $ext = strtolower(pathinfo($_FILES['home_slider_images']['name'][$i], PATHINFO_EXTENSION));
                if (in_array($ext, $allowed)) {
                    $img_name = time() . '_' . $i . '_hero_slider.' . $ext;
                    if (move_uploaded_file($_FILES['home_slider_images']['tmp_name'][$i], $upload_dir . $img_name)) {
                        $uploaded_images[] = $img_name;
                    }
                }
            }
        }

        // إذا تم رفع صور جديدة بنجاح، قم بمسح الصور القديمة وتحديث الداتابيز
        if (!empty($uploaded_images)) {
            $stmtOld = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = 'home_slider_images'");
            $stmtOld->execute();
            $old_json = $stmtOld->fetchColumn();
            
            if ($old_json) {
                $old_images = json_decode($old_json, true);
                if (is_array($old_images)) {
                    foreach ($old_images as $old_img) {
                        if (strpos($old_img, 'http') !== 0 && file_exists($upload_dir . $old_img)) {
                            unlink($upload_dir . $old_img);
                        }
                    }
                }
            }

            $new_json = json_encode($uploaded_images);
            $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = 'home_slider_images'");
            $stmtCheck->execute();
            if ($stmtCheck->fetchColumn() > 0) {
                $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = 'home_slider_images'")->execute([$new_json]);
            } else {
                $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('home_slider_images', ?)")->execute([$new_json]);
            }
        }
    }

    $_SESSION['toast'] = ['title' => 'Settings Updated', 'message' => 'Global configurations saved successfully.', 'type' => 'success'];
    header("Location: settings.php");
    exit;
}

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
?>

<div class="page-header">
    <div class="page-title">
        <h1>Global Website & Home Hero Settings</h1>
        <p>Full control over Home Page Hero section, Layouts, Branding, and Social Links.</p>
    </div>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        
        <!-- قسم الهيرو -->
        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-house-laptop" style="color:var(--gold);"></i> Home Page Hero Section
        </h3>

        <div class="form-group">
            <label class="form-label">Hero Title (Use &lt;span&gt;Word&lt;/span&gt; for Gold Accent Color)</label>
            <input type="text" name="home_hero_title" class="form-control" value="<?= htmlspecialchars($settings['home_hero_title'] ?? '') ?>" placeholder="Experience the Magic of <span>Egypt</span>">
        </div>

        <div class="form-group">
            <label class="form-label">Hero Subtitle / Short Description (Rich Text)</label>
            <textarea name="home_hero_subtitle" class="form-control rich-editor" rows="3"><?= htmlspecialchars($settings['home_hero_subtitle'] ?? '') ?></textarea>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Hero Background Image (Upload File)</label>
                <input type="file" name="home_hero_bg" class="form-control" accept="image/*">
                <?php if(!empty($settings['home_hero_bg'])): ?>
                    <img src="<?= get_image_url($settings['home_hero_bg'], 'placeholder') ?>" style="height:70px; width:120px; object-fit:cover; border-radius:8px; margin-top:10px;" alt="">
                <?php endif; ?>
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Primary Button Text</label>
                <input type="text" name="home_hero_btn1_text" class="form-control" value="<?= htmlspecialchars($settings['home_hero_btn1_text'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Primary Button Link</label>
                <input type="text" name="home_hero_btn1_link" class="form-control" value="<?= htmlspecialchars($settings['home_hero_btn1_link'] ?? '') ?>">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:40px;">
            <div class="form-group">
                <label class="form-label">Secondary Button Text</label>
                <input type="text" name="home_hero_btn2_text" class="form-control" value="<?= htmlspecialchars($settings['home_hero_btn2_text'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Secondary Button Link</label>
                <input type="text" name="home_hero_btn2_link" class="form-control" value="<?= htmlspecialchars($settings['home_hero_btn2_link'] ?? '') ?>">
            </div>
        </div>

        <!-- القسم الجديد: النبذة والسلايدر -->
        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px; margin-top:40px;">
            <i class="fa-solid fa-address-card" style="color:var(--gold);"></i> Home Page: About Us & Slider Section
        </h3>
        
        <div class="form-group">
            <label class="form-label">About Section Title</label>
            <input type="text" name="home_about_title" class="form-control" value="<?= htmlspecialchars($settings['home_about_title'] ?? 'Discover The Real Egypt') ?>">
        </div>

        <div class="form-group">
            <label class="form-label">About Section Text</label>
            <textarea name="home_about_text" class="form-control rich-editor" rows="4"><?= htmlspecialchars($settings['home_about_text'] ?? '') ?></textarea>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Button Text</label>
                <input type="text" name="home_about_btn_text" class="form-control" value="<?= htmlspecialchars($settings['home_about_btn_text'] ?? 'Read More About Us') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Button Link</label>
                <input type="text" name="home_about_btn_link" class="form-control" value="<?= htmlspecialchars($settings['home_about_btn_link'] ?? 'about.php') ?>">
            </div>
        </div>

        <div class="form-group" style="margin-bottom:40px;">
            <label class="form-label">Slider Images (Upload Multiple Images at once)</label>
            <input type="file" name="home_slider_images[]" class="form-control" accept="image/jpeg, image/png, image/webp" multiple>
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-top:10px;">
                <?php 
                $slider_json = $settings['home_slider_images'] ?? '';
                if ($slider_json) {
                    $slider_imgs = json_decode($slider_json, true);
                    if(is_array($slider_imgs)) {
                        foreach($slider_imgs as $s_img) {
                            echo '<img src="'.get_image_url($s_img, 'placeholder').'" style="height:60px; width:60px; object-fit:cover; border-radius:8px; border:1px solid #ccc;">';
                        }
                    }
                }
                ?>
            </div>
        </div>

        <!-- القسم الجديد: الفيديو الترويجي -->
        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px; margin-top:40px;">
            <i class="fa-solid fa-play-circle" style="color:var(--gold);"></i> Home Page: Promotional Video Section
        </h3>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Video Section Title</label>
                <input type="text" name="home_video_title" class="form-control" value="<?= htmlspecialchars($settings['home_video_title'] ?? 'Experience The Journey') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Video Section Subtitle</label>
                <input type="text" name="home_video_subtitle" class="form-control" value="<?= htmlspecialchars($settings['home_video_subtitle'] ?? 'Watch our latest adventures') ?>">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:40px;">
            <div class="form-group">
                <label class="form-label">Video Cover Image (Thumbnail)</label>
                <input type="file" name="home_video_cover" class="form-control" accept="image/*">
                <?php if(!empty($settings['home_video_cover'])): ?>
                    <img src="<?= get_image_url($settings['home_video_cover'], 'placeholder') ?>" style="height:70px; width:120px; object-fit:cover; border-radius:8px; margin-top:10px;" alt="">
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="form-label">Upload Video (MP4, WebM)</label>
                <input type="file" name="home_video_upload" class="form-control" accept="video/mp4, video/webm, video/ogg">
                <?php if(!empty($settings['home_video_upload'])): ?>
                    <p style="font-size:13px; color:green; margin-top:10px;"><i class="fa-solid fa-check-circle"></i> Video Uploaded</p>
                <?php endif; ?>
            </div>
        </div>


        <!-- قسم البراند والتواصل (كما هو) -->
        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-image" style="color:var(--gold);"></i> Branding & Fallbacks
        </h3>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:25px; margin-bottom:30px;">
            <div class="form-group">
                <label class="form-label">Website Logo</label>
                <input type="file" name="default_logo" class="form-control" accept="image/*">
                <div style="margin-top:10px;">
                    <img src="<?= get_image_url($settings['default_logo'] ?? '', 'logo') ?>" style="height:45px; background:#0A1628; padding:6px; border-radius:6px;">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Default Fallback Tour Image</label>
                <input type="file" name="default_tour_img" class="form-control" accept="image/*">
                <div style="margin-top:10px;">
                    <img src="<?= get_image_url($settings['default_tour_img'] ?? '', 'tour') ?>" style="height:50px; width:90px; object-fit:cover; border-radius:6px;">
                </div>
            </div>
        </div>

        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-address-book" style="color:var(--gold);"></i> Contact & Social Links
        </h3>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Phone / WhatsApp Number</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($settings['phone'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Primary Email Address</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($settings['email'] ?? '') ?>">
            </div>
        </div>
        <div class="form-group" style="margin-bottom:20px;">
            <label class="form-label">Office Address</label>
            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($settings['address'] ?? '') ?>">
        </div>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label"><i class="fa-brands fa-facebook" style="color:#1877F2;"></i> Facebook URL</label>
                <input type="url" name="facebook" class="form-control" value="<?= htmlspecialchars($settings['facebook'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label"><i class="fa-brands fa-instagram" style="color:#E4405F;"></i> Instagram URL</label>
                <input type="url" name="instagram" class="form-control" value="<?= htmlspecialchars($settings['instagram'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label"><i class="fa-brands fa-youtube" style="color:#FF0000;"></i> YouTube URL</label>
                <input type="url" name="youtube" class="form-control" value="<?= htmlspecialchars($settings['youtube'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label"><i class="fa-brands fa-tiktok" style="color:#000;"></i> TikTok URL</label>
                <input type="url" name="tiktok" class="form-control" value="<?= htmlspecialchars($settings['tiktok'] ?? '') ?>">
            </div>
            <div class="form-group" style="grid-column: 1 / -1;">
                <label class="form-label"><i class="fa-solid fa-star" style="color:#00AA6C;"></i> TripAdvisor Link</label>
                <input type="url" name="tripadvisor" class="form-control" value="<?= htmlspecialchars($settings['tripadvisor'] ?? '') ?>">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:20px; padding:16px 40px; font-size:16px;">
            <i class="fa-solid fa-floppy-disk"></i> Save All Settings
        </button>

    </form>
</div>
</main>
</body>
</html>