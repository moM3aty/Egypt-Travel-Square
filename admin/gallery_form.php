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
    $caption = $_POST['caption'];
    $image_path = $photo['image_path'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_path = time() . '_gallery.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image_path);
    }

    if ($is_edit) {
        $stmt = $pdo->prepare("UPDATE gallery SET caption=?, image_path=? WHERE id=?");
        $stmt->execute([$caption, $image_path, $id]);
        $_SESSION['toast'] = ['title' => 'Updated', 'message' => 'Gallery photo updated.', 'type' => 'success'];
    } else {
        $stmt = $pdo->prepare("INSERT INTO gallery (caption, image_path) VALUES (?, ?)");
        $stmt->execute([$caption, $image_path]);
        $_SESSION['toast'] = ['title' => 'Uploaded', 'message' => 'New photo added to gallery.', 'type' => 'success'];
    }
    header("Location: gallery.php");
    exit;
}
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit Photo' : 'Upload New Photo' ?></h1>
    </div>
    <a href="gallery.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to Gallery</a>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label">Caption / Location</label>
            <input type="text" name="caption" class="form-control" value="<?= htmlspecialchars($photo['caption']) ?>" placeholder="e.g. Pyramids Sunset">
        </div>
        <div class="form-group">
            <label class="form-label">Image File <?= $is_edit ? '(Leave empty to keep current)' : '*' ?></label>
            <input type="file" name="image" class="form-control" accept="image/*" <?= $is_edit ? '' : 'required' ?>>
            <?php if($photo['image_path']): ?>
                <img src="<?= get_image_url($photo['image_path'], 'placeholder') ?>" style="height:100px; border-radius:8px; margin-top:10px;" alt="">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary" style="padding:16px 40px;"><i class="fa-solid fa-floppy-disk"></i> Save Photo</button>
    </form>
</div>

</main>
</body>
</html>