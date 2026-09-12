<?php
// Path: /admin/faqs.php
require_once 'header.php';

// عملية الحذف
if (isset($_GET['delete'])) {
    $del_id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM faqs WHERE id = ?")->execute([$del_id]);
    $_SESSION['toast'] = ['title' => 'FAQ Removed', 'message' => 'Question deleted successfully.', 'type' => 'danger'];
    header("Location: faqs.php");
    exit;
}

$faqs = $pdo->query("SELECT * FROM faqs ORDER BY id DESC")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Frequently Asked Questions</h1>
        <p>Manage travel tips and answers shown on the FAQ page.</p>
    </div>
    <a href="faq_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New FAQ</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer Snippet</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($faqs as $f): ?>
                <tr>
                    <td><?= $f['id'] ?></td>
                    <td style="font-weight:700; color:var(--navy);"><?= htmlspecialchars($f['question']) ?></td>
                    <td style="color:var(--text-muted); font-size:13px;"><?= htmlspecialchars(mb_strimwidth(strip_tags($f['answer']), 0, 80, '...')) ?></td>
                    <td>
                        <a href="faq_form.php?id=<?= $f['id'] ?>" class="btn btn-edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="faqs.php?delete=<?= $f['id'] ?>" class="btn btn-danger" onclick="return confirm('Delete this FAQ?');"><i class="fa-solid fa-trash"></i></a>
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