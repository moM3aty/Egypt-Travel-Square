<?php
// Path: /admin/about_settings.php
require_once 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fields = [
        'about_page_title', 'about_page_content', 'about_stat1_num', 
        'about_stat1_label', 'about_stat2_num', 'about_stat2_label', 
        'about_badge_title', 'about_badge_text'
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

    if (isset($_FILES['about_page_image']) && $_FILES['about_page_image']['error'] === UPLOAD_ERR_OK) {
        $ext = strtolower(pathinfo($_FILES['about_page_image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            $upload_dir = 'uploads/';
            $img_name = time() . '_about.' . $ext;
            if (move_uploaded_file($_FILES['about_page_image']['tmp_name'], $upload_dir . $img_name)) {
                $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = 'about_page_image'");
                $stmtCheck->execute();
                if ($stmtCheck->fetchColumn() > 0) {
                    $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = 'about_page_image'")->execute([$img_name]);
                } else {
                    $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES ('about_page_image', ?)")->execute([$img_name]);
                }
            }
        }
    }

    $_SESSION['toast'] = ['title' => 'Updated', 'message' => 'About Us settings saved successfully.', 'type' => 'success'];
    header("Location: about_settings.php");
    exit;
}

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
?>

<div class="page-header">
    <div class="page-title">
        <h1>About Us Settings</h1>
        <p>Manage the content, statistics, and images of the About Us page.</p>
    </div>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label class="form-label">Page Title (Use &lt;span&gt;Word&lt;/span&gt; for Gold Color)</label>
            <input type="text" name="about_page_title" class="form-control" value="<?= htmlspecialchars($settings['about_page_title'] ?? 'Welcome to <span>Egypt Travel Square</span>') ?>">
        </div>
        
        <div class="form-group">
            <label class="form-label">Main Content (Rich Text)</label>
            <textarea name="about_page_content" class="form-control rich-editor" rows="5"><?= htmlspecialchars($settings['about_page_content'] ?? '') ?></textarea>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Statistic 1 - Number</label>
                <input type="text" name="about_stat1_num" class="form-control" value="<?= htmlspecialchars($settings['about_stat1_num'] ?? '10+') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Statistic 1 - Label</label>
                <input type="text" name="about_stat1_label" class="form-control" value="<?= htmlspecialchars($settings['about_stat1_label'] ?? 'Years Experience') ?>">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Statistic 2 - Number</label>
                <input type="text" name="about_stat2_num" class="form-control" value="<?= htmlspecialchars($settings['about_stat2_num'] ?? '5K+') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Statistic 2 - Label</label>
                <input type="text" name="about_stat2_label" class="form-control" value="<?= htmlspecialchars($settings['about_stat2_label'] ?? 'Happy Travelers') ?>">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
            <div class="form-group">
                <label class="form-label">Floating Badge Title</label>
                <input type="text" name="about_badge_title" class="form-control" value="<?= htmlspecialchars($settings['about_badge_title'] ?? 'Top Rated') ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Floating Badge Text</label>
                <input type="text" name="about_badge_text" class="form-control" value="<?= htmlspecialchars($settings['about_badge_text'] ?? '5.0 on TripAdvisor') ?>">
            </div>
        </div>

        <div class="form-group" style="margin-bottom:30px;">
            <label class="form-label">Side Image (Upload File)</label>
            <input type="file" name="about_page_image" class="form-control" accept="image/*">
            <?php if(!empty($settings['about_page_image'])): ?>
                <img src="<?= get_image_url($settings['about_page_image'], 'placeholder') ?>" style="height:120px; border-radius:8px; margin-top:10px; object-fit:cover;" alt="">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary" style="padding:16px 40px; font-size:16px;">
            <i class="fa-solid fa-floppy-disk"></i> Save About Us
        </button>
    </form>
</div>
</main>
</body>
</html>