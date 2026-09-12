<?php
// Path: /admin/index.php
require_once 'header.php';

$total_tours = $pdo->query("SELECT COUNT(*) FROM tours")->fetchColumn();
$total_dests = $pdo->query("SELECT COUNT(*) FROM destinations")->fetchColumn();
$total_attrs = $pdo->query("SELECT COUNT(*) FROM attractions")->fetchColumn();
$total_images = $pdo->query("SELECT COUNT(*) FROM gallery")->fetchColumn();

$recent_tours = $pdo->query("SELECT title, type, price FROM tours ORDER BY id DESC LIMIT 5")->fetchAll();
?>

<div class="page-header">
    <div class="page-title">
        <h1>Dashboard Overview</h1>
        <p>Real-time analytics and management shortcuts.</p>
    </div>
    <a href="tour_form.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New Tour</a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 24px; margin-bottom: 35px;">
    <div class="card" style="margin-bottom:0; display:flex; align-items:center; gap:20px;">
        <div style="width:60px; height:60px; border-radius:14px; background:#E8F4FD; color:#0D6EFD; display:flex; align-items:center; justify-content:center; font-size:24px;">
            <i class="fa-solid fa-map"></i>
        </div>
        <div><h3 style="font-size:28px; color:var(--navy); margin-bottom:2px; font-weight:800;"><?= $total_tours ?></h3><p style="color:var(--text-muted); font-size:14px; font-weight:500;">Total Tours</p></div>
    </div>
    
    <div class="card" style="margin-bottom:0; display:flex; align-items:center; gap:20px;">
        <div style="width:60px; height:60px; border-radius:14px; background:rgba(201,162,39,0.15); color:var(--gold-dark); display:flex; align-items:center; justify-content:center; font-size:24px;">
            <i class="fa-solid fa-city"></i>
        </div>
        <div><h3 style="font-size:28px; color:var(--navy); margin-bottom:2px; font-weight:800;"><?= $total_dests ?></h3><p style="color:var(--text-muted); font-size:14px; font-weight:500;">Destinations</p></div>
    </div>

    <div class="card" style="margin-bottom:0; display:flex; align-items:center; gap:20px;">
        <div style="width:60px; height:60px; border-radius:14px; background:#E8F8F5; color:#198754; display:flex; align-items:center; justify-content:center; font-size:24px;">
            <i class="fa-solid fa-landmark"></i>
        </div>
        <div><h3 style="font-size:28px; color:var(--navy); margin-bottom:2px; font-weight:800;"><?= $total_attrs ?></h3><p style="color:var(--text-muted); font-size:14px; font-weight:500;">Attractions</p></div>
    </div>

    <div class="card" style="margin-bottom:0; display:flex; align-items:center; gap:20px;">
        <div style="width:60px; height:60px; border-radius:14px; background:#FFEAEA; color:#FF4757; display:flex; align-items:center; justify-content:center; font-size:24px;">
            <i class="fa-solid fa-images"></i>
        </div>
        <div><h3 style="font-size:28px; color:var(--navy); margin-bottom:2px; font-weight:800;"><?= $total_images ?></h3><p style="color:var(--text-muted); font-size:14px; font-weight:500;">Gallery Photos</p></div>
    </div>
</div>

<div class="card">
    <h3 style="color:var(--navy); margin-bottom:20px; font-size:18px;">Recently Published Tours</h3>
    <div class="table-responsive">
        <table>
            <thead><tr><th>Tour Title</th><th>Category</th><th>Price</th></tr></thead>
            <tbody>
                <?php foreach($recent_tours as $t): ?>
                <tr>
                    <td style="font-weight:700; color:var(--navy);"><?= htmlspecialchars($t['title']) ?></td>
                    <td><span class="badge badge-blue"><?= ucfirst(htmlspecialchars($t['type'])) ?></span></td>
                    <td style="font-weight:800; color:var(--gold-dark);">$<?= htmlspecialchars($t['price']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</main>
</body>
</html>