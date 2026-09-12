<?php
// Path: /admin/attraction_form.php
require_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $id > 0;

$attr = ['destination_id' => '', 'title' => '', 'excerpt' => '', 'full_desc' => '', 'image' => ''];

if ($is_edit) {
    $stmt = $pdo->prepare("SELECT * FROM attractions WHERE id = ?");
    $stmt->execute([$id]);
    $fetched = $stmt->fetch();
    if ($fetched) { $attr = $fetched; }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $destination_id = $_POST['destination_id'];
    $title = $_POST['title'];
    $excerpt = $_POST['excerpt'];
    $full_desc = $_POST['full_desc'];

    $image = $attr['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image = time() . '_attr.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
    }

    if ($is_edit) {
        $stmt = $pdo->prepare("UPDATE attractions SET destination_id=?, title=?, excerpt=?, full_desc=?, image=? WHERE id=?");
        $stmt->execute([$destination_id, $title, $excerpt, $full_desc, $image, $id]);
        $_SESSION['toast'] = ['title' => 'Updated', 'message' => 'Attraction updated.', 'type' => 'success'];
    } else {
        $stmt = $pdo->prepare("INSERT INTO attractions (destination_id, title, excerpt, full_desc, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$destination_id, $title, $excerpt, $full_desc, $image]);
        $_SESSION['toast'] = ['title' => 'Created', 'message' => 'New attraction published.', 'type' => 'success'];
    }

    header("Location: attractions.php");
    exit;
}

$destinations = $pdo->query("SELECT id, name FROM destinations ORDER BY name ASC")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit Attraction' : 'Add New Attraction' ?></h1>
    </div>
    <a href="attractions.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Destination City *</label>
                <select name="destination_id" class="form-control" required>
                    <option value="">Select Destination...</option>
                    <?php foreach ($destinations as $dest): ?>
                        <option value="<?= $dest['id'] ?>" <?= $attr['destination_id'] == $dest['id'] ? 'selected' : '' ?>><?= htmlspecialchars($dest['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Attraction Title *</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($attr['title']) ?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Short Excerpt (Displayed on Card Grid) *</label>
            <textarea name="excerpt" class="form-control" rows="2" required><?= htmlspecialchars($attr['excerpt']) ?></textarea>
        </div>

        <div class="form-group">
            <label class="form-label">Image Upload</label>
            <input type="file" name="image" class="form-control" accept="image/*" <?= $is_edit ? '' : 'required' ?>>
            <?php if($attr['image']): ?>
                <img src="<?= get_image_url($attr['image'], 'placeholder') ?>" style="height:80px; border-radius:8px; margin-top:10px;" alt="">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="form-label">Full Modal Description (Rich Text) *</label>
            <textarea name="full_desc" class="form-control rich-editor" rows="6"><?= htmlspecialchars($attr['full_desc']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="padding:16px 40px;"><i class="fa-solid fa-floppy-disk"></i> Save Attraction</button>
    </form>
</div>

</main>
</body>
</html>