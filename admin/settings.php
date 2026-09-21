<?php
// Path: /admin/settings.php
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // --- 1. تحديث بيانات الأدمن (Username & Password) ---
    if (isset($_POST['update_admin'])) {
        $new_user = trim($_POST['admin_username']);
        $new_pass = $_POST['admin_password'];
        $old_user = $_SESSION['admin_username'];

        if (!empty($new_user)) {
            if (!empty($new_pass)) {
                $hashed = password_hash($new_pass, PASSWORD_DEFAULT);
                $pdo->prepare("UPDATE users SET username=?, password=? WHERE username=?")->execute([$new_user, $hashed, $old_user]);
            } else {
                $pdo->prepare("UPDATE users SET username=? WHERE username=?")->execute([$new_user, $old_user]);
            }
            $_SESSION['admin_username'] = $new_user; // تحديث الجلسة
            $_SESSION['toast'] = ['title' => 'Security Updated', 'message' => 'Admin credentials have been updated successfully.', 'type' => 'success'];
        }
        header("Location: settings.php");
        exit;
    }

    // --- 2. تحديث إعدادات الموقع والصفحة الرئيسية ---
    $fields = [
        'phone', 'email', 'address', 'facebook', 'instagram', 'youtube', 'tiktok', 'tripadvisor',
        'home_hero_title', 'home_hero_subtitle', 'home_hero_btn1_text', 'home_hero_btn1_link',
        'home_hero_btn2_text', 'home_hero_btn2_link', 'home_video_title', 'home_video_subtitle'
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
    if (!is_dir($upload_dir)) { @mkdir($upload_dir, 0755, true); }

    $media_fields = [
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
                    $stmtOld = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
                    $stmtOld->execute([$img_field]);
                    $old_file = $stmtOld->fetchColumn();
                    if ($old_file && strpos($old_file, 'http') !== 0 && file_exists($upload_dir . $old_file)) {
                        @unlink($upload_dir . $old_file);
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

    $_SESSION['toast'] = ['title' => 'Settings Updated', 'message' => 'Global configurations saved successfully.', 'type' => 'success'];
    header("Location: settings.php");
    exit;
}

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
?>

<div class="page-header">
    <div class="page-title">
        <h1>Global Website Settings & Security</h1>
        <p>Control texts, branding, video promo, and your admin login credentials.</p>
    </div>
</div>

<!-- 1. Admin Security Panel -->
<div class="card" style="border-top: 4px solid #E74C3C;">
    <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
        <i class="fa-solid fa-user-shield" style="color:#E74C3C;"></i> Admin Login Security
    </h3>
    <form method="POST" action="settings.php">
        <input type="hidden" name="update_admin" value="1">
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Admin Username *</label>
                <input type="text" name="admin_username" class="form-control" value="<?= htmlspecialchars($_SESSION['admin_username']) ?>" required autocomplete="off">
            </div>
            <div class="form-group">
                <label class="form-label">New Password <span style="color:var(--text-muted); font-weight:normal;">(Leave empty if you don't want to change it)</span></label>
                <!-- إضافة autocomplete="new-password" لمنع المتصفح من كتابة الباسورد القديم بالخطأ -->
                <input type="password" name="admin_password" class="form-control" placeholder="Enter new password..." autocomplete="new-password">
            </div>
        </div>
        <button type="submit" class="btn" style="background:#E74C3C; color:#fff; padding:12px 30px;"><i class="fa-solid fa-lock"></i> Update Credentials</button>
    </form>
</div>

<!-- 2. Main Website Settings -->
<div class="card">
    <form method="POST" enctype="multipart/form-data" action="settings.php">
        
        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-heading" style="color:var(--gold);"></i> Home Page Hero Text
        </h3>
        <p style="font-size:13px; color:var(--text-muted); margin-bottom:15px;"><i class="fa-solid fa-circle-info"></i> Note: Hero background images are now managed in the "Home Sliders" tab.</p>
        
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

        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-image" style="color:var(--gold);"></i> Branding & Fallbacks
        </h3>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:25px; margin-bottom:30px;">
            <div class="form-group">
                <label class="form-label">Website Logo</label>
                <input type="file" name="default_logo" class="form-control" accept="image/*">
                <div style="margin-top:10px;"><img src="<?= get_image_url($settings['default_logo'] ?? '', 'logo') ?>" style="height:45px; background:#0A1628; padding:6px; border-radius:6px;"></div>
            </div>
            <div class="form-group">
                <label class="form-label">Default Fallback Tour Image</label>
                <input type="file" name="default_tour_img" class="form-control" accept="image/*">
                <div style="margin-top:10px;"><img src="<?= get_image_url($settings['default_tour_img'] ?? '', 'tour') ?>" style="height:50px; width:90px; object-fit:cover; border-radius:6px;"></div>
            </div>
        </div>

        <h3 style="color:var(--navy); margin-bottom:20px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-address-book" style="color:var(--gold);"></i> Contact & Social Links
        </h3>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group"><label class="form-label">Phone / WhatsApp</label><input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($settings['phone'] ?? '') ?>"></div>
            <div class="form-group"><label class="form-label">Primary Email</label><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($settings['email'] ?? '') ?>"></div>
        </div>
        <div class="form-group" style="margin-bottom:20px;">
            <label class="form-label">Office Address</label>
            <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($settings['address'] ?? '') ?>">
        </div>
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group"><label class="form-label">Facebook URL</label><input type="url" name="facebook" class="form-control" value="<?= htmlspecialchars($settings['facebook'] ?? '') ?>"></div>
            <div class="form-group"><label class="form-label">Instagram URL</label><input type="url" name="instagram" class="form-control" value="<?= htmlspecialchars($settings['instagram'] ?? '') ?>"></div>
            <div class="form-group"><label class="form-label">YouTube URL</label><input type="url" name="youtube" class="form-control" value="<?= htmlspecialchars($settings['youtube'] ?? '') ?>"></div>
            <div class="form-group"><label class="form-label">TikTok URL</label><input type="url" name="tiktok" class="form-control" value="<?= htmlspecialchars($settings['tiktok'] ?? '') ?>"></div>
            <div class="form-group" style="grid-column: 1 / -1;"><label class="form-label">TripAdvisor Link</label><input type="url" name="tripadvisor" class="form-control" value="<?= htmlspecialchars($settings['tripadvisor'] ?? '') ?>"></div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:20px; padding:16px 40px; font-size:16px;">
            <i class="fa-solid fa-floppy-disk"></i> Save All Settings
        </button>

    </form>
</div>
</main>
</body>
</html>