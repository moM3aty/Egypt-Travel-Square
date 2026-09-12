<?php
// Path: /admin/reviews.php
require_once 'header.php';

// تغيير حالة التقييم (موافقة / إخفاء)
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $action = $_GET['action'];
    
    if ($action == 'approve') {
        $pdo->prepare("UPDATE reviews SET status = 'approved' WHERE id = ?")->execute([$id]);
        $_SESSION['toast'] = ['title' => 'Approved', 'message' => 'Review is now visible on the website.', 'type' => 'success'];
    } elseif ($action == 'hide') {
        $pdo->prepare("UPDATE reviews SET status = 'pending' WHERE id = ?")->execute([$id]);
        $_SESSION['toast'] = ['title' => 'Hidden', 'message' => 'Review is now hidden.', 'type' => 'warning'];
    } elseif ($action == 'delete') {
        $pdo->prepare("DELETE FROM reviews WHERE id = ?")->execute([$id]);
        $_SESSION['toast'] = ['title' => 'Deleted', 'message' => 'Review deleted permanently.', 'type' => 'danger'];
    }
    header("Location: reviews.php");
    exit;
}

// جلب التقييمات
$reviews = $pdo->query("SELECT * FROM reviews ORDER BY id DESC")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Guest Reviews</h1>
        <p>Moderate and manage what your clients say about your services.</p>
    </div>
</div>

<div class="card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Guest Info</th>
                    <th>Rating</th>
                    <th>Review Text</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $rev): ?>
                <tr>
                    <td style="color:var(--text-muted); font-size:13px;"><?= date('M d, Y', strtotime($rev['created_at'])) ?></td>
                    <td>
                        <strong style="color:var(--navy); display:block;"><?= htmlspecialchars($rev['name']) ?></strong>
                        <span style="font-size:12px; color:var(--text-muted);"><i class="fa-solid fa-earth-americas"></i> <?= htmlspecialchars($rev['country']) ?></span>
                    </td>
                    <td style="color:var(--gold);">
                        <?php for($i=1; $i<=5; $i++): ?>
                            <i class="fa-<?= $i <= $rev['rating'] ? 'solid' : 'regular' ?> fa-star"></i>
                        <?php endfor; ?>
                    </td>
                    <td style="font-size:13px; color:var(--text-main); max-width: 250px;">
                        <?= htmlspecialchars(mb_strimwidth($rev['review_text'], 0, 80, '...')) ?>
                    </td>
                    <td>
                        <?php if($rev['status'] == 'approved'): ?>
                            <span class="badge badge-green">Approved</span>
                        <?php else: ?>
                            <span class="badge" style="background:#FFF4E5; color:#FFA502;">Pending</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($rev['status'] == 'pending'): ?>
                            <a href="reviews.php?action=approve&id=<?= $rev['id'] ?>" class="btn" style="background:#E8FAEF; color:#2ED573; padding:8px 12px; font-size:12px;" title="Approve"><i class="fa-solid fa-check"></i></a>
                        <?php else: ?>
                            <a href="reviews.php?action=hide&id=<?= $rev['id'] ?>" class="btn" style="background:#FFF4E5; color:#FFA502; padding:8px 12px; font-size:12px;" title="Hide"><i class="fa-solid fa-eye-slash"></i></a>
                        <?php endif; ?>
                        <a href="reviews.php?action=delete&id=<?= $rev['id'] ?>" class="btn btn-danger" style="padding:8px 12px; font-size:12px;" onclick="return confirm('Delete this review?');" title="Delete"><i class="fa-solid fa-trash"></i></a>
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