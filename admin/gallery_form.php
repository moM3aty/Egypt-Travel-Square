<?php
// Path: /admin/gallery_form.php
require_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $id > 0;
$photo = ['caption' => '', 'image_path' => ''];

if ($is_edit) {
    $stmt = $pdo->prepare("SELECT * FROM gallery WHERE id = ?");
    $stmt->execute([$id]);
    $fetched = $stmt->fetch();
    if ($fetched) { $photo = $fetched; }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $caption = trim($_POST['caption']);
    $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif']; // الصيغ المسموحة للحماية
    $upload_dir = 'uploads/';
    
    if ($is_edit) {
        // ==========================================
        // 1. حالة التعديل: تعديل صورة واحدة فقط
        // ==========================================
        $image_path = $photo['image_path'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, $allowed)) {
                $image_path = time() . '_gallery.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image_path);
                
                // مسح الصورة القديمة
                if (!empty($photo['image_path']) && strpos($photo['image_path'], 'http') !== 0 && file_exists($upload_dir . $photo['image_path'])) {
                    unlink($upload_dir . $photo['image_path']);
                }
            } else {
                $_SESSION['toast'] = ['title' => 'Security Error', 'message' => 'Invalid image format. Only JPG, PNG, WEBP, GIF are allowed.', 'type' => 'danger'];
                header("Location: gallery_form.php?id=$id");
                exit;
            }
        }
        $stmt = $pdo->prepare("UPDATE gallery SET caption=?, image_path=? WHERE id=?");
        $stmt->execute([$caption, $image_path, $id]);
        $_SESSION['toast'] = ['title' => 'Updated', 'message' => 'Gallery photo updated.', 'type' => 'success'];
        
    } else {
        // ==========================================
        // 2. حالة الإضافة: رفع متعدد للصور (Bulk Upload)
        // ==========================================
        if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
            $uploaded_count = 0;
            $error_msg = '';
            $total_files = count($_FILES['images']['name']);
            
            for ($i = 0; $i < $total_files; $i++) {
                if ($_FILES['images']['error'][$i] == 0) {
                    $ext = strtolower(pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION));
                    
                    if (in_array($ext, $allowed)) {
                        // إعطاء اسم فريد لكل صورة يتم رفعها في نفس الثانية
                        $image_path = time() . '_' . $i . '_gallery.' . $ext;
                        
                        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $upload_dir . $image_path)) {
                            // إدخال الصورة لقاعدة البيانات
                            $stmt = $pdo->prepare("INSERT INTO gallery (caption, image_path) VALUES (?, ?)");
                            $stmt->execute([$caption, $image_path]);
                            $uploaded_count++;
                        }
                    } else {
                        $error_msg .= "File (" . htmlspecialchars($_FILES['images']['name'][$i]) . ") has invalid format. ";
                    }
                }
            }
            
            if ($uploaded_count > 0) {
                $_SESSION['toast'] = ['title' => 'Success', 'message' => "$uploaded_count photo(s) uploaded successfully! " . $error_msg, 'type' => 'success'];
            } else {
                $_SESSION['toast'] = ['title' => 'Error', 'message' => 'No valid photos were uploaded. ' . $error_msg, 'type' => 'danger'];
            }
        } else {
            $_SESSION['toast'] = ['title' => 'Error', 'message' => 'Please select at least one photo.', 'type' => 'danger'];
            header("Location: gallery_form.php");
            exit;
        }
    }
    
    header("Location: gallery.php");
    exit;
}
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit Photo' : 'Upload Photos' ?></h1>
        <p><?= $is_edit ? 'Change the image or caption.' : 'You can select multiple photos at once to upload them in bulk.' ?></p>
    </div>
    <a href="gallery.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to Gallery</a>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label">Caption / Location</label>
            <input type="text" name="caption" class="form-control" value="<?= htmlspecialchars($photo['caption']) ?>" placeholder="e.g. Pyramids Sunset (Will apply to all uploaded photos)">
        </div>
        
        <div class="form-group">
            <?php if ($is_edit): ?>
                <!-- حقل رفع صورة واحدة (في حالة التعديل) -->
                <label class="form-label">Image File (Leave empty to keep current)</label>
                <input type="file" name="image" class="form-control" accept="image/jpeg, image/png, image/webp, image/gif">
                
                <?php if($photo['image_path']): ?>
                    <img src="<?= get_image_url($photo['image_path'], 'placeholder') ?>" style="height:150px; border-radius:12px; margin-top:15px; box-shadow: var(--shadow-soft);" alt="">
                <?php endif; ?>
                
            <?php else: ?>
                <!-- حقل الرفع المتعدد (في حالة الإضافة الجديدة) -->
                <label class="form-label">Select Image(s) * <span style="color:var(--text-muted); font-size:12px; font-weight:normal;">(You can select multiple files)</span></label>
                <input type="file" name="images[]" class="form-control" accept="image/jpeg, image/png, image/webp, image/gif" multiple required>
            <?php endif; ?>
        </div>
        
        <button type="submit" class="btn btn-primary" style="padding:16px 40px; margin-top:10px;">
            <i class="fa-solid <?= $is_edit ? 'fa-floppy-disk' : 'fa-upload' ?>"></i> 
            <?= $is_edit ? 'Save Changes' : 'Upload Photos' ?>
        </button>
    </form>
</div>

</main>
</body>
</html>