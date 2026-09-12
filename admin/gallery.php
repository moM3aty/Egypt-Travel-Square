<?php
// Path: /admin/gallery.php
require_once 'header.php';

// عملية الحذف مع إزالة الصورة من السيرفر
if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $imgStmt = $pdo->prepare("SELECT image_path FROM gallery WHERE id = ?");
    $imgStmt->execute([$del_id]);
    $img = $imgStmt->fetchColumn();
    if ($img && file_exists('uploads/' . $img)) { unlink('uploads/' . $img); }

    $pdo->prepare("DELETE FROM gallery WHERE id = ?")->execute([$del_id]);
    $_SESSION['toast'] = ['title' => 'Deleted', 'message' => 'Image removed from gallery.', 'type' => 'danger'];
    header("Location: gallery.php");
    exit;
}

$photos = $pdo->query("SELECT * FROM gallery ORDER BY id DESC")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Photo Gallery</h1>
        <p>Manage high-resolution photos for the website gallery.</p>
    </div>
    <a href="gallery_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Photo</a>
</div>

<div class="card">
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap:20px;">
        <?php foreach ($photos as $p): ?>
        <div style="position:relative; border-radius:14px; overflow:hidden; border:1px solid var(--border); background:#fff;">
            <img src="<?= get_image_url($p['image_path'], 'placeholder') ?>" style="width:100%; height:160px; object-fit:cover;" alt="">
            <div style="padding:12px; display:flex; justify-content:space-between; align-items:center;">
                <span style="font-size:13px; font-weight:700; color:var(--navy);"><?= htmlspecialchars($p['caption'] ?: 'Untitled') ?></span>
                <div>
                    <a href="gallery_form.php?id=<?= $p['id'] ?>" class="btn btn-edit" style="padding:6px 10px; font-size:12px;"><i class="fa-solid fa-pen"></i></a>
                    <a href="gallery.php?delete=<?= $p['id'] ?>" class="btn btn-danger" style="padding:6px 10px; font-size:12px;" onclick="return confirm('Delete photo?');"><i class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</main>
</body>
</html>