<?php
// Path: /admin/destination_form.php
require_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $id > 0;

$dest = ['name' => '', 'slug' => '', 'hero_image' => '', 'intro_title' => '', 'intro_text' => ''];

if ($is_edit) {
    $stmt = $pdo->prepare("SELECT * FROM destinations WHERE id = ?");
    $stmt->execute([$id]);
    $fetched = $stmt->fetch();
    if ($fetched) { $dest = $fetched; }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['slug'] ?: $name)));
    $intro_title = $_POST['intro_title'];
    $intro_text = $_POST['intro_text'];

    $hero_image = $dest['hero_image'];
    if (isset($_FILES['hero_image']) && $_FILES['hero_image']['error'] == 0) {
        $ext = pathinfo($_FILES['hero_image']['name'], PATHINFO_EXTENSION);
        $hero_image = time() . '_dest.' . $ext;
        move_uploaded_file($_FILES['hero_image']['tmp_name'], 'uploads/' . $hero_image);
    }

    if ($is_edit) {
        $stmt = $pdo->prepare("UPDATE destinations SET name=?, slug=?, hero_image=?, intro_title=?, intro_text=? WHERE id=?");
        $stmt->execute([$name, $slug, $hero_image, $intro_title, $intro_text, $id]);
        $_SESSION['toast'] = ['title' => 'Updated', 'message' => 'Destination details updated.', 'type' => 'success'];
    } else {
        $stmt = $pdo->prepare("INSERT INTO destinations (name, slug, hero_image, intro_title, intro_text) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $slug, $hero_image, $intro_title, $intro_text]);
        $_SESSION['toast'] = ['title' => 'Created', 'message' => 'New destination added.', 'type' => 'success'];
    }

    header("Location: destinations.php");
    exit;
}
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit Destination' : 'Add New Destination' ?></h1>
    </div>
    <a href="destinations.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">City Name *</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($dest['name']) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">URL Slug</label>
                <input type="text" name="slug" class="form-control" value="<?= htmlspecialchars($dest['slug']) ?>" placeholder="e.g. cairo">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Intro Title *</label>
            <input type="text" name="intro_title" class="form-control" value="<?= htmlspecialchars($dest['intro_title']) ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Hero Banner Image</label>
            <input type="file" name="hero_image" class="form-control" accept="image/*" <?= $is_edit ? '' : 'required' ?>>
            <?php if($dest['hero_image']): ?>
                <img src="<?= get_image_url($dest['hero_image'], 'destination') ?>" style="height:80px; border-radius:8px; margin-top:10px;" alt="">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="form-label">Intro Description (Rich Text) *</label>
            <textarea name="intro_text" class="form-control rich-editor" rows="5"><?= htmlspecialchars($dest['intro_text']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="padding:16px 40px;"><i class="fa-solid fa-floppy-disk"></i> Save Destination</button>
    </form>
</div>

</main>
</body>
</html>