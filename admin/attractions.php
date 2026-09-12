<?php
// Path: /admin/attractions.php
require_once 'header.php';

if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM attractions WHERE id = ?")->execute([$del_id]);
    $_SESSION['toast'] = ['title' => 'Attraction Removed', 'message' => 'Attraction deleted.', 'type' => 'danger'];
    header("Location: attractions.php");
    exit;
}

$dest_filter = $_GET['dest_id'] ?? '';
$where = '';
$params = [];

if ($dest_filter) {
    $where = "WHERE a.destination_id = ?";
    $params[] = $dest_filter;
}

$destinations = $pdo->query("SELECT id, name FROM destinations ORDER BY name ASC")->fetchAll();
$stmt = $pdo->prepare("SELECT a.*, d.name as city_name FROM attractions a JOIN destinations d ON a.destination_id = d.id $where ORDER BY a.id DESC");
$stmt->execute($params);
$attractions = $stmt->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Attractions</h1>
        <p>Manage sights and monuments displayed inside city modals.</p>
    </div>
    <a href="attraction_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Attraction</a>
</div>

<div class="card">
    <form method="GET" class="filter-bar">
        <select name="dest_id" class="form-control" onchange="this.form.submit()">
            <option value="">Filter by Destination (All Cities)</option>
            <?php foreach ($destinations as $dest): ?>
                <option value="<?= $dest['id'] ?>" <?= $dest_filter == $dest['id'] ? 'selected' : '' ?>><?= htmlspecialchars($dest['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <a href="attractions.php" class="btn" style="background:#E0E0E0; color:#333;">Reset</a>
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Attraction Name</th>
                    <th>City</th>
                    <th>Excerpt</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($attractions as $attr): ?>
                <tr>
                    <td><img src="<?= get_image_url($attr['image'], 'placeholder') ?>" class="thumbnail" alt=""></td>
                    <td style="font-weight:700; color:var(--navy);"><?= htmlspecialchars($attr['title']) ?></td>
                    <td><span class="badge badge-green"><?= htmlspecialchars($attr['city_name']) ?></span></td>
                    <td style="color:var(--text-muted); font-size:13px;"><?= htmlspecialchars(mb_strimwidth(strip_tags($attr['excerpt']), 0, 60, '...')) ?></td>
                    <td>
                        <a href="attraction_form.php?id=<?= $attr['id'] ?>" class="btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="attractions.php?delete=<?= $attr['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this attraction?');"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</main>
</body>
</html>