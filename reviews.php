<?php
// Path: /reviews.php
require_once 'config.php';
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $rating = (int)$_POST['rating'];
    $review_text = $_POST['review_text'];

    $stmt = $pdo->prepare("INSERT INTO reviews (name, country, rating, review_text, status) VALUES (?, ?, ?, ?, 'pending')");
    $stmt->execute([$name, $country, $rating, $review_text]);
    
    header("Location: reviews.php?success=1");
    exit;
}

$msg = '';
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $msg = "Thank you! Your review has been submitted and is pending approval.";
}

$reviews = $pdo->query("SELECT * FROM reviews WHERE status = 'approved' ORDER BY id DESC")->fetchAll();

$pageTitle = "Guest Reviews | Egypt Travel Square";
include 'includes/header.php';
?>

<style>
    /* Reviews Grid Layout */
    .reviews-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; }
    .review-card { background: var(--pure-white); border-radius: 8px; padding: 40px; box-shadow: 0 5px 20px rgba(0,0,0,0.04); border-top: 3px solid var(--logo-gold); transition: var(--transition); display: flex; flex-direction: column;}
    .review-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-elegant); }
    .review-stars { color: var(--logo-gold); font-size: 14px; margin-bottom: 20px; display: flex; gap: 3px;}
    .review-text { font-size: 15px; color: var(--text-gray); line-height: 1.8; margin-bottom: 30px; font-style: italic; flex-grow: 1;}
    .review-author { display: flex; align-items: center; gap: 15px; border-top: 1px solid var(--border); padding-top: 20px;}
    .review-avatar { width: 50px; height: 50px; background: var(--off-white); color: var(--logo-gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: var(--font-display); font-size: 22px; font-weight: 700; border: 1px solid #EAEAEA; }
    .author-info h4 { font-size: 15px; color: var(--logo-navy); margin-bottom: 4px; font-weight: 700; }
    .author-info p { font-size: 13px; color: var(--text-gray); margin:0; }

    /* Form Layout */
    .review-form-box { background: var(--logo-navy); padding: 40px; border-radius: 8px; color: var(--pure-white); position: sticky; top: 100px; box-shadow: var(--shadow-elegant); border-bottom: 4px solid var(--logo-gold);}
    .form-control { width: 100%; padding: 14px; background: rgba(255,255,255,0.05); color: #fff; border: 1px solid rgba(255,255,255,0.1); border-radius: 4px; font-family: var(--font-body); margin-bottom: 16px; outline: none; transition: 0.3s;}
    .form-control:focus { border-color: var(--logo-gold); }
    .form-control::placeholder { color: rgba(255,255,255,0.4); }
    .btn-submit { width: 100%; padding: 16px; background: var(--logo-gold); color: var(--logo-navy); font-weight: 700; border: none; border-radius: 4px; cursor: pointer; font-size: 15px; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px;}
    .btn-submit:hover { background: var(--pure-white); }
</style>

<section class="page-hero">
    <div class="page-hero-bg">
        <img src="<?= get_image_url($settings['hero_about'] ?? '', 'placeholder') ?>" alt="Guest Reviews">
    </div>
    <div class="page-hero-overlay"></div>
    <div class="container">
        <div class="page-hero-content">
            <div class="breadcrumb"><a href="index.php">Home</a> <i class="fa-solid fa-circle"></i> <span>Reviews</span></div>
            <h1 class="page-hero-title">Guest <span>Reviews</span></h1>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        
        <?php if($msg): ?>
            <div style="background: #E8FAEF; color: #2ED573; padding: 20px; border-radius: 8px; text-align: center; font-weight: bold; margin-bottom: 40px; border: 1px solid #BADBCC;">
                <i class="fa-solid fa-circle-check"></i> <?= $msg ?>
            </div>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 2.5fr 1fr; gap: 50px; align-items: start;">
            
            <!-- Grid of Approved Reviews -->
            <div>
                <div class="reviews-grid">
                    <?php if(empty($reviews)): ?>
                        <p style="color: var(--text-gray);">No reviews available yet. Be the first to share your experience!</p>
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
                                    <p><i class="fa-solid fa-earth-americas" style="color:var(--logo-gold); margin-right:5px;"></i> <?= htmlspecialchars($rev['country']) ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Submit Review Form -->
            <div class="review-form-box reveal">
                <h3 style="font-family: var(--font-display); font-size: 32px; color: var(--logo-gold); margin-bottom: 10px;">Share Experience</h3>
                <p style="color: rgba(255,255,255,0.7); margin-bottom: 25px; font-size: 14px;">We'd love to hear about your trip with us!</p>
                
                <form method="POST">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    <input type="text" name="country" class="form-control" placeholder="Your Country" required>
                    <select name="rating" class="form-control" required style="color:#000;">
                        <option value="5">★★★★★ (5 Stars - Excellent)</option>
                        <option value="4">★★★★☆ (4 Stars - Very Good)</option>
                        <option value="3">★★★☆☆ (3 Stars - Good)</option>
                        <option value="2">★★☆☆☆ (2 Stars - Fair)</option>
                        <option value="1">★☆☆☆☆ (1 Star - Poor)</option>
                    </select>
                    <textarea name="review_text" class="form-control" rows="5" placeholder="Write your review here..." required style="resize:vertical;"></textarea>
                    
                    <button type="submit" class="btn-submit">Submit Review</button>
                </form>
            </div>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>