<?php
// Path: /admin/video_form.php
require_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $id > 0;
$video = ['title' => '', 'description' => '', 'video_path' => ''];

if ($is_edit) {
    $stmt = $pdo->prepare("SELECT * FROM videos WHERE id = ?");
    $stmt->execute([$id]);
    $fetched = $stmt->fetch();
    if ($fetched) { $video = $fetched; }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_path = $video['video_path'];

    if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] == 0) {
        $ext = pathinfo($_FILES['video_file']['name'], PATHINFO_EXTENSION);
        $video_path = time() . '_vid.' . $ext;
        move_uploaded_file($_FILES['video_file']['tmp_name'], 'uploads/' . $video_path);
    }

    if ($is_edit) {
        $stmt = $pdo->prepare("UPDATE videos SET title=?, description=?, video_path=? WHERE id=?");
        $stmt->execute([$title, $description, $video_path, $id]);
        $_SESSION['toast'] = ['title' => 'Updated', 'message' => 'Video details updated.', 'type' => 'success'];
    } else {
        $stmt = $pdo->prepare("INSERT INTO videos (title, description, video_path) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $video_path]);
        $_SESSION['toast'] = ['title' => 'Uploaded', 'message' => 'New video published to site.', 'type' => 'success'];
    }
    header("Location: videos.php");
    exit;
}
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit Video' : 'Upload New Video' ?></h1>
    </div>
    <a href="videos.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to Library</a>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Video Title *</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($video['title']) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Video File (MP4/WebM) <?= $is_edit ? '(Leave empty to keep current)' : '*' ?></label>
                <input type="file" name="video_file" class="form-control" accept="video/*" <?= $is_edit ? '' : 'required' ?>>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label">Short Description</label>
            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($video['description']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="padding:16px 40px;"><i class="fa-solid fa-floppy-disk"></i> Save Video</button>
    </form>
</div>

</main>
</body>
</html>