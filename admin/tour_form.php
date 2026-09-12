<?php
// Path: /admin/tour_form.php
require_once 'header.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$is_edit = $id > 0;

$tour = [
    'title' => '', 'type' => 'day', 'location' => '', 'price' => '',
    'price_single' => '', 'price_group_small' => '', 'duration' => '',
    'timing' => '', 'languages' => 'English, Spanish, German, French',
    'availability' => 'Runs on a daily basis', 'overview' => '',
    'excludes_html' => '', 'brings_html' => '', 'itinerary' => '', 'hero_image' => ''
];

if ($is_edit) {
    $stmt = $pdo->prepare("SELECT * FROM tours WHERE id = ?");
    $stmt->execute([$id]);
    $fetched = $stmt->fetch();
    if ($fetched) { $tour = $fetched; }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $type = $_POST['type'];
    $location = $_POST['location'];
    $price = $_POST['price'];
    $price_single = $_POST['price_single'];
    $price_group_small = $_POST['price_group_small'];
    $duration = $_POST['duration'];
    $timing = $_POST['timing'];
    $languages = $_POST['languages'];
    $availability = $_POST['availability'];
    $overview = $_POST['overview'];
    $excludes_html = $_POST['excludes_html'];
    $brings_html = $_POST['brings_html'];
    $itinerary = $_POST['itinerary'];

    $hero_image = $tour['hero_image'];
    if (isset($_FILES['hero_image']) && $_FILES['hero_image']['error'] == 0) {
        $ext = pathinfo($_FILES['hero_image']['name'], PATHINFO_EXTENSION);
        $hero_image = time() . '_tour.' . $ext;
        move_uploaded_file($_FILES['hero_image']['tmp_name'], 'uploads/' . $hero_image);
    }

    if ($is_edit) {
        $stmt = $pdo->prepare("UPDATE tours SET type=?, title=?, location=?, hero_image=?, price=?, price_single=?, price_group_small=?, duration=?, timing=?, languages=?, availability=?, overview=?, excludes_html=?, brings_html=?, itinerary=? WHERE id=?");
        $stmt->execute([$type, $title, $location, $hero_image, $price, $price_single, $price_group_small, $duration, $timing, $languages, $availability, $overview, $excludes_html, $brings_html, $itinerary, $id]);
        $_SESSION['toast'] = ['title' => 'Tour Updated', 'message' => 'Tour details updated successfully.', 'type' => 'success'];
    } else {
        $stmt = $pdo->prepare("INSERT INTO tours (type, title, location, hero_image, price, price_single, price_group_small, duration, timing, languages, availability, overview, excludes_html, brings_html, itinerary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$type, $title, $location, $hero_image, $price, $price_single, $price_group_small, $duration, $timing, $languages, $availability, $overview, $excludes_html, $brings_html, $itinerary]);
        $_SESSION['toast'] = ['title' => 'Tour Created', 'message' => 'New tour has been published.', 'type' => 'success'];
    }

    header("Location: tours.php");
    exit;
}
?>

<div class="page-header">
    <div class="page-title">
        <h1><?= $is_edit ? 'Edit Tour' : 'Add New Tour' ?></h1>
        <p>Fill in all details using the rich text editor to publish or update.</p>
    </div>
    <a href="tours.php" class="btn" style="background:#E0E0E0; color:#333;"><i class="fa-solid fa-arrow-left"></i> Back to List</a>
</div>

<div class="card">
    <form method="POST" enctype="multipart/form-data">
        <div style="display:grid; grid-template-columns: 2fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Tour Title *</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($tour['title']) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Category *</label>
                <select name="type" class="form-control" required>
                    <option value="day" <?= $tour['type'] == 'day' ? 'selected' : '' ?>>Day Tour</option>
                    <option value="half" <?= $tour['type'] == 'half' ? 'selected' : '' ?>>Half Day Tour</option>
                    <option value="shore" <?= $tour['type'] == 'shore' ? 'selected' : '' ?>>Shore Excursion</option>
                    <option value="package" <?= $tour['type'] == 'package' ? 'selected' : '' ?>>Tour Package</option>
                    <option value="transfer" <?= $tour['type'] == 'transfer' ? 'selected' : '' ?>>Transfer</option>
                </select>
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Location *</label>
                <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($tour['location']) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Base Price ($) *</label>
                <input type="number" step="0.01" name="price" class="form-control" value="<?= htmlspecialchars($tour['price']) ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Single Person Price ($)</label>
                <input type="number" step="0.01" name="price_single" class="form-control" value="<?= htmlspecialchars($tour['price_single']) ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Group (2-3) Price ($)</label>
                <input type="number" step="0.01" name="price_group_small" class="form-control" value="<?= htmlspecialchars($tour['price_group_small']) ?>">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Duration *</label>
                <input type="text" name="duration" class="form-control" value="<?= htmlspecialchars($tour['duration']) ?>" placeholder="e.g. 8 Hours" required>
            </div>
            <div class="form-group">
                <label class="form-label">Timing / Pickup Time</label>
                <input type="text" name="timing" class="form-control" value="<?= htmlspecialchars($tour['timing']) ?>" placeholder="e.g. 08:00 AM">
            </div>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Languages</label>
                <input type="text" name="languages" class="form-control" value="<?= htmlspecialchars($tour['languages']) ?>">
            </div>
            <div class="form-group">
                <label class="form-label">Availability</label>
                <input type="text" name="availability" class="form-control" value="<?= htmlspecialchars($tour['availability']) ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Hero Cover Image (Upload File)</label>
            <input type="file" name="hero_image" class="form-control" accept="image/*" <?= $is_edit ? '' : 'required' ?>>
            <?php if($tour['hero_image']): ?>
                <img src="<?= get_image_url($tour['hero_image'], 'tour') ?>" style="height:80px; border-radius:8px; margin-top:10px;" alt="">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="form-label">Overview Details (Rich Text)</label>
            <textarea name="overview" class="form-control rich-editor"><?= htmlspecialchars($tour['overview']) ?></textarea>
        </div>

        <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px;">
            <div class="form-group">
                <label class="form-label">Excludes List (Rich Text)</label>
                <textarea name="excludes_html" class="form-control rich-editor"><?= htmlspecialchars($tour['excludes_html']) ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">What to Bring List (Rich Text)</label>
                <textarea name="brings_html" class="form-control rich-editor"><?= htmlspecialchars($tour['brings_html']) ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Itinerary Details (Rich Text)</label>
            <textarea name="itinerary" class="form-control rich-editor"><?= htmlspecialchars($tour['itinerary']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="padding:16px 40px; font-size:16px;"><i class="fa-solid fa-floppy-disk"></i> Save Tour</button>
    </form>
</div>

</main>
</body>
</html>