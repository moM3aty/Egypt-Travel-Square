<?php
// Path: /admin/settings.php
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'phone', 'email', 'address', 'facebook', 'instagram', 'youtube', 'tiktok', 'tripadvisor',
        'home_hero_title', 'home_hero_subtitle', 'home_hero_btn1_text', 'home_hero_btn1_link',
        'home_hero_btn2_text', 'home_hero_btn2_link'
    ];
    
    $stmt = $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $stmt->execute([$field, trim($_POST[$field])]);
        }
    }

    if (isset($_FILES['home_hero_bg']) && $_FILES['home_hero_bg']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['home_hero_bg']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            $bg_name = time() . '_hero_bg.' . $ext;
            move_uploaded_file($_FILES['home_hero_bg']['tmp_name'], 'uploads/' . $bg_name);
            $stmt->execute(['home_hero_bg', $bg_name]);
        }
    }

    if (isset($_FILES['default_logo']) && $_FILES['default_logo']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['default_logo']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'svg'])) {
            $logo_name = time() . '_logo.' . $ext;
            move_uploaded_file($_FILES['default_logo']['tmp_name'], 'uploads/' . $logo_name);
            $stmt->execute(['default_logo', $logo_name]);
        }
    }

    if (isset($_FILES['default_tour_img']) && $_FILES['default_tour_img']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['default_tour_img']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            $img_name = time() . '_default_tour.' . $ext;
            move_uploaded_file($_FILES['default_tour_img']['tmp_name'], 'uploads/' . $img_name);
            $stmt->execute(['default_tour_img', $img_name]);
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
        <p>Full control over Home Page Hero section, Branding, and Social Media links.</p>
    </div>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        
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

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:30px;">
            <div class="form-group">
                <label class="form-label">Secondary Button Text</label>
                <input type="text" name="home_hero_btn2_text" class="form-control" value="<?= htmlspecialchars($settings['home_hero_btn2_text'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Secondary Button Link</label>
                <input type="text" name="home_hero_btn2_link" class="form-control" value="<?= htmlspecialchars($settings['home_hero_btn2_link'] ?? '') ?>">
            </div>
        </div>

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