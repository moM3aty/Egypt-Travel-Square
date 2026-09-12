<?php
// Path: /reviews.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

$msg = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $rating = (int)$_POST['rating'];
    $review_text = $_POST['review_text'];

    $stmt = $pdo->prepare("INSERT INTO reviews (name, country, rating, review_text, status) VALUES (?, ?, ?, ?, 'pending')");
    $stmt->execute([$name, $country, $rating, $review_text]);
    $msg = "Thank you! Your review has been submitted and is pending approval.";
}

// جلب التقييمات الموافق عليها فقط
$reviews = $pdo->query("SELECT * FROM reviews WHERE status = 'approved' ORDER BY id DESC")->fetchAll();

$pageTitle = "Guest Reviews | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    .review-card { background: var(--white); border-radius: 16px; padding: 30px; box-shadow: var(--shadow-soft); transition: transform 0.3s; border-top: 4px solid var(--gold); }
    .review-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-medium); }
    .review-stars { color: var(--gold); margin-bottom: 15px; font-size: 14px; }
    .review-text { font-size: 15px; color: var(--text-muted); line-height: 1.8; margin-bottom: 20px; font-style: italic; }
    .review-author { display: flex; align-items: center; gap: 15px; }
    .review-avatar { width: 50px; height: 50px; background: var(--navy); color: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-size: 24px; font-weight: bold; }
    .author-info h4 { font-size: 16px; color: var(--navy); margin-bottom: 2px; }
    .author-info p { font-size: 13px; color: var(--text-muted); }
</style>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_about'] ?? '', 'placeholder') ?>" alt="Guest Reviews" style="filter: brightness(0.3);">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Reviews</span></div>
            <h1 class="page-hero-title">Guest <span>Reviews</span></h1>
        </div>
    </div>
</section>

<section class="section-padding" style="padding: 100px 0; background: var(--sand);">
    <div class="container">
        
        <?php if($msg): ?>
            <div style="background: #E8FAEF; color: #2ED573; padding: 20px; border-radius: 12px; text-align: center; font-weight: bold; margin-bottom: 40px; border: 1px solid #BADBCC;">
                <i class="fa-solid fa-circle-check"></i> <?= $msg ?>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 50px; align-items: start;">
            
            <!-- Grid of Approved Reviews -->
            <div>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 30px;">
                    <?php if(empty($reviews)): ?>
                        <p>No reviews available yet. Be the first to share your experience!</p>
                    <?php else: ?>
                        <?php foreach($reviews as $rev): ?>
                        <div class="review-card reveal">
                            <div class="review-stars">
                                <?php for($i=1; $i<=5; $i++): ?>
                                    <i class="fa-<?= $i <= $rev['rating'] ? 'solid' : 'regular' ?> fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="review-text">"<?= htmlspecialchars($rev['review_text']) ?>"</p>
                            <div class="review-author">
                                <div class="review-avatar"><?= strtoupper(substr($rev['name'], 0, 1)) ?></div>
                                <div class="author-info">
                                    <h4><?= htmlspecialchars($rev['name']) ?></h4>
                                    <p><i class="fa-solid fa-earth-americas" style="color:var(--gold);"></i> <?= htmlspecialchars($rev['country']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Submit Review Form -->
            <div style="background: var(--navy); padding: 40px; border-radius: 20px; color: var(--white); position: sticky; top: 100px;">
                <h3 style="font-family: var(--font-display); font-size: 28px; color: var(--gold); margin-bottom: 10px;">Share Your Experience</h3>
                <p style="color: rgba(255,255,255,0.7); margin-bottom: 25px; font-size: 14px;">We'd love to hear about your trip with us!</p>
                
                <form method="POST">
                    <div class="form-group" style="margin-bottom: 16px;">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required style="width:100%; padding:14px; background:rgba(255,255,255,0.05); color:#fff; border:1px solid rgba(255,255,255,0.1); border-radius:8px;">
                    </div>
                    <div class="form-group" style="margin-bottom: 16px;">
                        <input type="text" name="country" class="form-control" placeholder="Your Country" required style="width:100%; padding:14px; background:rgba(255,255,255,0.05); color:#fff; border:1px solid rgba(255,255,255,0.1); border-radius:8px;">
                    </div>
                    <div class="form-group" style="margin-bottom: 16px;">
                        <select name="rating" class="form-control" required style="width:100%; padding:14px; background:rgba(255,255,255,0.05); color:#fff; border:1px solid rgba(255,255,255,0.1); border-radius:8px;">
                            <option value="5" style="color:#000;">★★★★★ (5 Stars - Excellent)</option>
                            <option value="4" style="color:#000;">★★★★☆ (4 Stars - Very Good)</option>
                            <option value="3" style="color:#000;">★★★☆☆ (3 Stars - Good)</option>
                            <option value="2" style="color:#000;">★★☆☆☆ (2 Stars - Fair)</option>
                            <option value="1" style="color:#000;">★☆☆☆☆ (1 Star - Poor)</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 24px;">
                        <textarea name="review_text" class="form-control" rows="5" placeholder="Write your review here..." required style="width:100%; padding:14px; background:rgba(255,255,255,0.05); color:#fff; border:1px solid rgba(255,255,255,0.1); border-radius:8px; resize:vertical;"></textarea>
                    </div>
                    <button type="submit" style="width:100%; padding:16px; background:var(--gold); color:var(--navy); font-weight:bold; border:none; border-radius:8px; cursor:pointer; font-size:16px;">Submit Review</button>
                </form>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>