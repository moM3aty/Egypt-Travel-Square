<?php
// Path: /admin/tours.php
require_once 'header.php';

if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $imgStmt = $pdo->prepare("SELECT hero_image FROM tours WHERE id = ?");
    $imgStmt->execute([$del_id]);
    $img = $imgStmt->fetchColumn();
    if ($img && file_exists('uploads/' . $img)) { unlink('uploads/' . $img); }

    $pdo->prepare("DELETE FROM tours WHERE id = ?")->execute([$del_id]);
    $_SESSION['toast'] = ['title' => 'Tour Deleted', 'message' => 'Tour has been permanently removed.', 'type' => 'danger'];
    header("Location: tours.php");
    exit;
}

$where = [];
$params = [];

if (!empty($_GET['search'])) {
    $where[] = "title LIKE ?";
    $params[] = "%" . trim($_GET['search']) . "%";
}
if (!empty($_GET['type'])) {
    $where[] = "type = ?";
    $params[] = $_GET['type'];
}

$sql = "SELECT * FROM tours";
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$sql .= " ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tours = $stmt->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Tours & Packages</h1>
        <p>Manage all day tours, half-day tours, shore excursions, and multi-day packages.</p>
    </div>
    <a href="tour_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Tour</a>
</div>

<div class="card">
    <form method="GET" class="filter-bar">
        <input type="text" name="search" class="form-control" placeholder="Search by title..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        <select name="type" class="form-control">
            <option value="">All Categories</option>
            <option value="day" <?= ($_GET['type'] ?? '') == 'day' ? 'selected' : '' ?>>Day Tour</option>
            <option value="half" <?= ($_GET['type'] ?? '') == 'half' ? 'selected' : '' ?>>Half Day</option>
            <option value="shore" <?= ($_GET['type'] ?? '') == 'shore' ? 'selected' : '' ?>>Shore Excursion</option>
            <option value="package" <?= ($_GET['type'] ?? '') == 'package' ? 'selected' : '' ?>>Tour Package</option>
            <option value="transfer" <?= ($_GET['type'] ?? '') == 'transfer' ? 'selected' : '' ?>>Transfer</option>
        </select>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-filter"></i> Filter</button>
        <a href="tours.php" class="btn" style="background:#E0E0E0; color:#333;">Reset</a>
    </form>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tours as $t): ?>
                <tr>
                    <td>
                        <img src="<?= get_image_url($t['hero_image'], 'tour') ?>" class="thumbnail" alt="">
                    </td>
                    <td style="font-weight:700; color:var(--navy);"><?= htmlspecialchars($t['title']) ?></td>
                    <td><span class="badge badge-blue"><?= ucfirst(htmlspecialchars($t['type'])) ?></span></td>
                    <td><i class="fa-solid fa-location-dot" style="color:var(--gold);"></i> <?= htmlspecialchars($t['location']) ?></td>
                    <td style="font-weight:800; color:var(--gold-dark);">$<?= htmlspecialchars($t['price']) ?></td>
                    <td>
                        <a href="tour_form.php?id=<?= $t['id'] ?>" class="btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="tours.php?delete=<?= $t['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tour?');"><i class="fa-solid fa-trash"></i></a>
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