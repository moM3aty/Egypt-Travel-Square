<?php
// Path: /admin/videos.php
require_once 'header.php';

// عملية الحذف مع إزالة الفيديو من السيرفر
if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $vidStmt = $pdo->prepare("SELECT video_path FROM videos WHERE id = ?");
    $vidStmt->execute([$del_id]);
    $vid = $vidStmt->fetchColumn();
    if ($vid && file_exists('uploads/' . $vid)) { unlink('uploads/' . $vid); }

    $pdo->prepare("DELETE FROM videos WHERE id = ?")->execute([$del_id]);
    $_SESSION['toast'] = ['title' => 'Video Deleted', 'message' => 'Video permanently removed.', 'type' => 'danger'];
    header("Location: videos.php");
    exit;
}

$videos = $pdo->query("SELECT * FROM videos ORDER BY id DESC")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Videos Library</h1>
        <p>Manage media tours and promotional clips.</p>
    </div>
    <a href="video_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Video</a>
</div>

<div class="card">
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap:20px;">
        <?php foreach ($videos as $v): ?>
        <div style="border-radius:14px; overflow:hidden; border:1px solid var(--border); background:#fff;">
            <video controls style="width:100%; height:180px; background:#000; object-fit:cover;">
                <source src="<?= (strpos($v['video_path'], 'http') === 0) ? htmlspecialchars($v['video_path']) : 'uploads/' . htmlspecialchars($v['video_path']) ?>" type="video/mp4">
            </video>
            <div style="padding:18px;">
                <h4 style="color:var(--navy); font-size:16px; margin-bottom:6px; font-weight:700;"><?= htmlspecialchars($v['title']) ?></h4>
                <p style="color:var(--text-muted); font-size:13px; margin-bottom:15px;"><?= htmlspecialchars($v['description']) ?></p>
                <div style="display:flex; gap:10px;">
                    <a href="video_form.php?id=<?= $v['id'] ?>" class="btn btn-edit" style="flex:1; justify-content:center;"><i class="fa-solid fa-pen"></i> Edit</a>
                    <a href="videos.php?delete=<?= $v['id'] ?>" class="btn btn-danger" style="flex:1; justify-content:center;" onclick="return confirm('Delete video?');"><i class="fa-solid fa-trash"></i> Delete</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

</main>
</body>
</html>