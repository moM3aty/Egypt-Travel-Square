<?php
// Path: /admin/faq_form.php
require_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $id > 0;
$faq = ['question' => '', 'answer' => ''];

if ($is_edit) {
    $stmt = $pdo->prepare("SELECT * FROM faqs WHERE id = ?");
    $stmt->execute([$id]);
    $fetched = $stmt->fetch();
    if ($fetched) { $faq = $fetched; }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    if ($is_edit) {
        $stmt = $pdo->prepare("UPDATE faqs SET question = ?, answer = ? WHERE id = ?");
        $stmt->execute([$question, $answer, $id]);
        $_SESSION['toast'] = ['title' => 'FAQ Updated', 'message' => 'Question details saved.', 'type' => 'success'];
    } else {
        $stmt = $pdo->prepare("INSERT INTO faqs (question, answer) VALUES (?, ?)");
        $stmt->execute([$question, $answer]);
        $_SESSION['toast'] = ['title' => 'FAQ Published', 'message' => 'New question added.', 'type' => 'success'];
    }
    header("Location: faqs.php");
    exit;
}
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit FAQ' : 'Add New FAQ' ?></h1>
    </div>
    <a href="faqs.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card">
    <form method="POST">
        <div class="form-group">
            <label class="form-label">Question *</label>
            <input type="text" name="question" class="form-control" value="<?= htmlspecialchars($faq['question']) ?>" required>
        </div>
        <div class="form-group">
            <label class="form-label">Answer (Rich Text) *</label>
            <textarea name="answer" class="form-control rich-editor" rows="4"><?= htmlspecialchars($faq['answer']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary" style="padding:16px 40px;"><i class="fa-solid fa-floppy-disk"></i> Save Question</button>
    </form>
</div>

</main>
</body>
</html>