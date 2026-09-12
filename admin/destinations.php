<?php
// Path: /admin/destinations.php
require_once 'header.php';

if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM destinations WHERE id = ?")->execute([$del_id]);
    $_SESSION['toast'] = ['title' => 'Destination Deleted', 'message' => 'City removed successfully.', 'type' => 'danger'];
    header("Location: destinations.php");
    exit;
}

$destinations = $pdo->query("SELECT * FROM destinations ORDER BY id DESC")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Destinations</h1>
        <p>Manage cities and regions displayed under "Where to Go".</p>
    </div>
    <a href="destination_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Destination</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>City Name</th>
                    <th>URL Slug</th>
                    <th>Intro Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($destinations as $d): ?>
                <tr>
                    <td><img src="<?= get_image_url($d['hero_image'], 'destination') ?>" class="thumbnail" alt=""></td>
                    <td style="font-weight:700; color:var(--navy);"><?= htmlspecialchars($d['name']) ?></td>
                    <td><code><?= htmlspecialchars($d['slug']) ?></code></td>
                    <td><?= htmlspecialchars($d['intro_title']) ?></td>
                    <td>
                        <a href="destination_form.php?id=<?= $d['id'] ?>" class="btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="destinations.php?delete=<?= $d['id'] ?>" class="btn btn-danger" onclick="return confirm('Deleting this city will remove its attractions!');"><i class="fa-solid fa-trash"></i></a>
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