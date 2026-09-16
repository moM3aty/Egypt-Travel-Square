<?php
// Path: /admin/sliders.php
require_once 'header.php';

// إنشاء المفاتيح في الداتابيز إن لم تكن موجودة
try {
    $pdo->exec("INSERT IGNORE INTO settings (setting_key, setting_value) VALUES ('home_hero_slider_images', '[]')");
    $pdo->exec("INSERT IGNORE INTO settings (setting_key, setting_value) VALUES ('home_about_slider_images', '[]')");
} catch(PDOException $e) {}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) { mkdir($upload_dir, 0777, true); }
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    
    // مصفوفة لتحديد الحقول التي سيتم معالجتها
    $slider_fields = [
        'hero_images' => 'home_hero_slider_images',
        'about_images' => 'home_about_slider_images'
    ];

    foreach ($slider_fields as $input_name => $db_key) {
        if (isset($_FILES[$input_name]) && !empty($_FILES[$input_name]['name'][0])) {
            $uploaded_images = [];
            $total_files = count($_FILES[$input_name]['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                if ($_FILES[$input_name]['error'][$i] == 0) {
                    $ext = strtolower(pathinfo($_FILES[$input_name]['name'][$i], PATHINFO_EXTENSION));
                    if (in_array($ext, $allowed)) {
                        $img_name = time() . '_' . rand(1000,9999) . '_' . $input_name . '.' . $ext;
                        if (move_uploaded_file($_FILES[$input_name]['tmp_name'][$i], $upload_dir . $img_name)) {
                            $uploaded_images[] = $img_name;
                        }
                    }
                }
            }

            // إذا تم رفع صور جديدة، قم بحذف الصور القديمة من السيرفر وتحديث القاعدة
            if (!empty($uploaded_images)) {
                $stmtOld = $pdo->prepare("SELECT setting_value FROM settings WHERE setting_key = ?");
                $stmtOld->execute([$db_key]);
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
                $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?")->execute([$new_json, $db_key]);
            }
        }
    }

    $_SESSION['toast'] = ['title' => 'Sliders Updated', 'message' => 'New images have been published successfully.', 'type' => 'success'];
    header("Location: sliders.php");
    exit;
}

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
?>

<div class="page-header">
    <div class="page-title">
        <h1>Home Sliders Management</h1>
        <p>Upload multiple images at once to create beautiful sliders for your Hero and About sections.</p>
    </div>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        
        <!-- Hero Slider Section -->
        <h3 style="color:var(--navy); margin-bottom:15px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-images" style="color:var(--gold);"></i> 1. Main Hero Slider (Top of the page)
        </h3>
        <div class="form-group" style="margin-bottom:40px;">
            <label class="form-label">Upload Hero Images <span style="color:#e74c3c; font-weight:normal;">(Uploading new images will REPLACE the current ones)</span></label>
            <input type="file" name="hero_images[]" class="form-control" accept="image/jpeg, image/png, image/webp" multiple>
            
            <div style="display:flex; gap:15px; flex-wrap:wrap; margin-top:15px; background:#FAFAFA; padding:15px; border-radius:12px; border:1px dashed #ccc;">
                <?php 
                $hero_json = $settings['home_hero_slider_images'] ?? '[]';
                $hero_imgs = json_decode($hero_json, true);
                if(is_array($hero_imgs) && !empty($hero_imgs)) {
                    foreach($hero_imgs as $s_img) {
                        echo '<img src="'.get_image_url($s_img, 'placeholder').'" style="height:80px; width:120px; object-fit:cover; border-radius:8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">';
                    }
                } else {
                    echo '<p style="color:var(--text-muted); font-size:13px; margin:0;">No images uploaded yet.</p>';
                }
                ?>
            </div>
        </div>

        <!-- About Slider Section -->
        <h3 style="color:var(--navy); margin-bottom:15px; border-bottom:1px solid var(--border); padding-bottom:10px;">
            <i class="fa-solid fa-layer-group" style="color:var(--gold);"></i> 2. About Us Slider (Beside text)
        </h3>
        <div class="form-group" style="margin-bottom:40px;">
            <label class="form-label">Upload About Images <span style="color:#e74c3c; font-weight:normal;">(Uploading new images will REPLACE the current ones)</span></label>
            <input type="file" name="about_images[]" class="form-control" accept="image/jpeg, image/png, image/webp" multiple>
            
            <div style="display:flex; gap:15px; flex-wrap:wrap; margin-top:15px; background:#FAFAFA; padding:15px; border-radius:12px; border:1px dashed #ccc;">
                <?php 
                $about_json = $settings['home_about_slider_images'] ?? '[]';
                $about_imgs = json_decode($about_json, true);
                if(is_array($about_imgs) && !empty($about_imgs)) {
                    foreach($about_imgs as $s_img) {
                        echo '<img src="'.get_image_url($s_img, 'placeholder').'" style="height:80px; width:80px; object-fit:cover; border-radius:8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">';
                    }
                } else {
                    echo '<p style="color:var(--text-muted); font-size:13px; margin:0;">No images uploaded yet.</p>';
                }
                ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="padding:16px 40px; font-size:16px;">
            <i class="fa-solid fa-upload"></i> Upload & Apply Changes
        </button>

    </form>
</div>

</main>
</body>
</html>