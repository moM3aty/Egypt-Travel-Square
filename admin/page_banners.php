<?php
// Path: /admin/page_banners.php
require_once 'header.php';

// ==========================================
// 1. نظام الإصلاح التلقائي بدون الاعتماد على UNIQUE KEY
// ==========================================
$default_banners = [
    'hero_about'     => 'https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop',
    'hero_contact'   => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2000&auto=format&fit=crop',
    'hero_gallery'   => 'https://images.unsplash.com/photo-1600521605604-b3474afcbaca?q=80&w=2000&auto=format&fit=crop',
    'hero_videos'    => 'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?q=80&w=2000&auto=format&fit=crop',
    'hero_faq'       => 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop',
    'hero_transfers' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?q=80&w=2000&auto=format&fit=crop',
    'hero_shore'     => 'https://images.unsplash.com/photo-1599839619722-39751411ea63?q=80&w=2000&auto=format&fit=crop',
    'hero_policies'  => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?q=80&w=2000&auto=format&fit=crop',
    'hero_tours'     => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=2000&auto=format&fit=crop',
    'hero_packages'  => 'https://images.unsplash.com/photo-1566195992011-5f9b417e2968?q=80&w=2000&auto=format&fit=crop',
    'home_cta_bg'    => 'https://images.unsplash.com/photo-1503220317375-aaad61436b1b?q=80&w=2000&auto=format&fit=crop' // صورة افتراضية للبانر السفلي
];

// التأكد من وجود الحقول الافتراضية لمنع الشاشات البيضاء
foreach ($default_banners as $key => $val) {
    $check = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = ?");
    $check->execute([$key]);
    if ($check->fetchColumn() == 0) {
        $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)")->execute([$key, $val]);
    }
}

// مصفوفة الحقول اللي هتظهر في الفورم
$banners = [
    'hero_about'     => 'About Us Page Hero',
    'hero_contact'   => 'Contact Us Page Hero',
    'hero_tours'     => 'All Tours Page Hero',
    'hero_packages'  => 'Tour Packages Page Hero',
    'hero_shore'     => 'Shore Excursions Page Hero',
    'hero_transfers' => 'Transfers Page Hero',
    'hero_gallery'   => 'Gallery Page Hero',
    'hero_videos'    => 'Videos Page Hero',
    'hero_faq'       => 'FAQ & Tips Page Hero',
    'hero_policies'  => 'Policies (Terms, Privacy, etc.)',
    'home_cta_bg'    => 'Home CTA Banner (Ready for Journey)' // تم إضافة البانر هنا
];

// ==========================================
// 2. معالجة الحفظ الذكية (Smart Upsert)
// ==========================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploaded_count = 0;
    $error_msg = '';

    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    foreach ($banners as $key => $label) {
        if (isset($_FILES[$key]) && $_FILES[$key]['name'] != '') {
            
            if ($_FILES[$key]['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                
                if (in_array($ext, $allowed)) {
                    $img_name = time() . '_' . $key . '.' . $ext;
                    
                    if (move_uploaded_file($_FILES[$key]['tmp_name'], $upload_dir . $img_name)) {
                        
                        $stmtCheck = $pdo->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = ?");
                        $stmtCheck->execute([$key]);
                        
                        if ($stmtCheck->fetchColumn() > 0) {
                            $pdo->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?")->execute([$img_name, $key]);
                        } else {
                            $pdo->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)")->execute([$key, $img_name]);
                        }
                        
                        $uploaded_count++;
                    } else {
                        $error_msg .= "Failed to save file ($label) on server. ";
                    }
                } else {
                    $error_msg .= "Invalid image format for ($label). ";
                }
            } else {
                if ($_FILES[$key]['error'] == UPLOAD_ERR_INI_SIZE || $_FILES[$key]['error'] == UPLOAD_ERR_FORM_SIZE) {
                    $error_msg .= "Image for ($label) is TOO LARGE! Max allowed is 2MB. ";
                } else {
                    $error_msg .= "Unknown upload error for ($label). ";
                }
            }
        }
    }

    if ($uploaded_count > 0 && $error_msg == '') {
        $_SESSION['toast'] = ['title' => 'Success', 'message' => "$uploaded_count banner(s) updated successfully.", 'type' => 'success'];
    } elseif ($error_msg != '') {
        $_SESSION['toast'] = ['title' => 'Upload Failed', 'message' => $error_msg, 'type' => 'danger'];
    } else {
        $_SESSION['toast'] = ['title' => 'No Changes', 'message' => 'No new images were uploaded.', 'type' => 'warning'];
    }
    
    header("Location: page_banners.php");
    exit;
}

$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
?>

<div class="page-header">
    <div class="page-title">
        <h1>Page Banners (Hero Images)</h1>
        <p>Manage the top background images for all internal pages.</p>
    </div>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        
        <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap:25px;">
            <?php foreach ($banners as $key => $label): ?>
            <div style="border: 1px solid var(--border); border-radius: 16px; padding: 20px; background: #FAFAFA; transition: 0.3s;">
                <h4 style="color:var(--navy); margin-bottom:15px; font-size:15px; font-weight:700;">
                    <i class="fa-regular fa-image" style="color:var(--gold); margin-right:5px;"></i> <?= $label ?>
                </h4>
                
                <div style="margin-bottom: 15px; border-radius: 10px; overflow: hidden; border: 1px solid var(--border); background: #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
                    <img src="<?= get_image_url($settings[$key] ?? '', 'placeholder') ?>" style="width:100%; height:160px; object-fit:cover; display:block;" alt="<?= $label ?>">
                </div>

                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label" style="font-size:12px; color:var(--text-muted);">Upload New Image (Leave empty to keep current)</label>
                    <input type="file" name="<?= $key ?>" class="form-control" accept="image/*" style="padding:10px; font-size:13px;">
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div style="margin-top: 35px; border-top: 1px solid var(--border); padding-top: 25px; text-align: right;">
            <button type="submit" class="btn btn-primary" style="padding:16px 40px; font-size:16px;">
                <i class="fa-solid fa-floppy-disk"></i> Update All Banners
            </button>
        </div>

    </form>
</div>

</main>
</body>
</html>