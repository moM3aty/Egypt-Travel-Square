<?php
// Path: /admin/header.php
ob_start();
session_start();
require_once '../config.php';

if (file_exists('../includes/functions.php')) {
    require_once '../includes/functions.php';
}

if (!function_exists('get_image_url')) {
    function get_image_url($path, $type = 'placeholder') {
        if (empty($path)) { return '/assets/images/default-' . $type . '.jpg'; }
        if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) { return $path; }
        return '/admin/uploads/' . $path;
    }
}

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

$current_page = basename($_SERVER['PHP_SELF']);

$stmt_logo = $pdo->query("SELECT setting_value FROM settings WHERE setting_key = 'default_logo'");
$admin_logo_path = $stmt_logo->fetchColumn();
$admin_logo_url = get_image_url($admin_logo_path, 'logo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETS Premium Control Panel</title>
    <link rel="icon" type="image/png" href="../img/logo3.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
          tinymce.init({
              selector: 'textarea.rich-editor',
              plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code help wordcount',
              toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | code',
              height: 320,
              branding: false,
              promotion: false,
              content_style: 'body { font-family: "Plus Jakarta Sans", sans-serif; font-size: 14px; }'
          });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --navy: #0A1628; 
            --navy-light: #162236;
            --gold: #C9A227; 
            --gold-dark: #8B6914;
            --bg: #F4F7F6; 
            --white: #FFFFFF;
            --text-main: #2A2A2A; 
            --text-muted: #7A7A7A;
            --shadow: 0 10px 30px rgba(10, 22, 40, 0.06);
            --border: #E8EBEF;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background-color: var(--bg); display: flex; color: var(--text-main); min-height: 100vh; }
        
        .sidebar { width: 280px; background: var(--navy); height: 100vh; position: fixed; top: 0; left: 0; display: flex; flex-direction: column; box-shadow: 4px 0 25px rgba(0,0,0,0.15); z-index: 100; }
        .sidebar-brand { padding: 25px 24px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.06); }
        .sidebar-brand img { width: 200px; border-radius: 30px; background: rgba(255,255,255,0.05); padding: 8px; }
        .sidebar-menu { padding: 20px 0; overflow-y: auto; flex-grow: 1; }
        .sidebar-menu a { display: flex; align-items: center; gap: 15px; padding: 14px 28px; color: rgba(255,255,255,0.65); text-decoration: none; font-weight: 500; font-size: 14.5px; transition: all 0.3s ease; border-left: 4px solid transparent; }
        .sidebar-menu a:hover { color: var(--white); background: rgba(255,255,255,0.03); }
        .sidebar-menu a.active { color: var(--gold); background: rgba(201,162,39,0.08); border-left-color: var(--gold); font-weight: 700; }
        .sidebar-menu i { font-size: 18px; width: 22px; text-align: center; }
        
        .user-profile { padding: 20px 24px; border-top: 1px solid rgba(255,255,255,0.06); display: flex; align-items: center; gap: 15px; }
        .user-profile .avatar { width: 42px; height: 42px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--navy); font-weight: bold; }
        .user-profile .info h4 { color: var(--white); font-size: 14px; margin-bottom: 2px; }
        .user-profile .info a { color: #FF4757; font-size: 12px; text-decoration: none; font-weight: 600; }

        .main-content { margin-left: 280px; width: calc(100% - 280px); padding: 40px; min-height: 100vh; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; }
        .page-title h1 { font-size: 30px; color: var(--navy); font-weight: 800; margin-bottom: 6px; }
        .page-title p { color: var(--text-muted); font-size: 14px; }
        
        .card { background: var(--white); border-radius: 20px; padding: 35px; box-shadow: var(--shadow); margin-bottom: 35px; border: 1px solid var(--border); }
        .btn { display: inline-flex; align-items: center; gap: 10px; padding: 12px 26px; border-radius: 10px; font-weight: 700; font-size: 14px; cursor: pointer; text-decoration: none; transition: all 0.3s ease; border: none; }
        .btn-primary { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--navy); box-shadow: 0 4px 15px rgba(201, 162, 39, 0.25); }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(201, 162, 39, 0.4); color: var(--navy); }
        .btn-danger { background: #FFEAEA; color: #FF4757; }
        .btn-danger:hover { background: #FF4757; color: var(--white); }
        .btn-edit { background: #E8F4FD; color: #0D6EFD; }
        .btn-edit:hover { background: #0D6EFD; color: var(--white); }

        .form-group { margin-bottom: 22px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: 700; color: var(--navy); font-size: 14px; }
        .form-control { width: 100%; padding: 14px 18px; border: 1px solid var(--border); border-radius: 10px; font-size: 14px; transition: all 0.3s ease; background: #FAFAFA; color: var(--text-main); }
        .form-control:focus { outline: none; border-color: var(--gold); background: var(--white); box-shadow: 0 0 0 4px rgba(201,162,39,0.12); }
        
        .table-responsive { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #F8F9FA; padding: 16px; text-align: left; font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; border-bottom: 2px solid var(--border); font-weight: 700; }
        td { padding: 16px; border-bottom: 1px solid var(--border); font-size: 14.5px; vertical-align: middle; }
        tr:hover td { background: #FAFCFF; }
        
        .thumbnail { width: 65px; height: 45px; border-radius: 8px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .badge { padding: 6px 14px; border-radius: 50px; font-size: 12px; font-weight: 700; }
        .badge-blue { background: #E8F4FD; color: #0D6EFD; }
        .badge-green { background: #E8F8F5; color: #198754; }

        .filter-bar { display: flex; gap: 15px; margin-bottom: 25px; background: #F8F9FA; padding: 18px; border-radius: 14px; align-items: center; border: 1px solid var(--border); }
        .filter-bar .form-control { margin-bottom: 0; padding: 12px 16px; }

        div:where(.swal2-container) div:where(.swal2-popup) { font-family: 'Plus Jakarta Sans', sans-serif !important; border-radius: 20px !important; }
        div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm { border-radius: 10px !important; font-weight: 700 !important; }
        div:where(.swal2-container) button:where(.swal2-styled).swal2-cancel { border-radius: 10px !important; font-weight: 700 !important; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-brand">
            <a href="index.php">
                <img src="<?= htmlspecialchars($admin_logo_url) ?>" alt="Admin Logo">
            </a>
        </div>
        <div class="sidebar-menu">
            <a href="index.php" class="<?= $current_page == 'index.php' ? 'active' : '' ?>"><i class="fa-solid fa-border-all"></i> Dashboard</a>
            <a href="tours.php" class="<?= in_array($current_page, ['tours.php', 'tour_form.php']) ? 'active' : '' ?>"><i class="fa-solid fa-map-location-dot"></i> Tours & Packages</a>
            <a href="destinations.php" class="<?= in_array($current_page, ['destinations.php', 'destination_form.php']) ? 'active' : '' ?>"><i class="fa-solid fa-city"></i> Destinations</a>
            <a href="attractions.php" class="<?= in_array($current_page, ['attractions.php', 'attraction_form.php']) ? 'active' : '' ?>"><i class="fa-solid fa-landmark"></i> Attractions</a>
            
            <a href="sliders.php" class="<?= $current_page == 'sliders.php' ? 'active' : '' ?>"><i class="fa-solid fa-layer-group"></i> Home Sliders</a>
            
            <a href="gallery.php" class="<?= in_array($current_page, ['gallery.php', 'gallery_form.php']) ? 'active' : '' ?>"><i class="fa-solid fa-images"></i> Gallery</a>
            <a href="videos.php" class="<?= in_array($current_page, ['videos.php', 'video_form.php']) ? 'active' : '' ?>"><i class="fa-solid fa-video"></i> Videos</a>
            <a href="reviews.php" class="<?= $current_page == 'reviews.php' ? 'active' : '' ?>"><i class="fa-solid fa-star"></i> Guest Reviews</a>
            <a href="faqs.php" class="<?= in_array($current_page, ['faqs.php', 'faq_form.php']) ? 'active' : '' ?>"><i class="fa-solid fa-circle-question"></i> FAQs</a>
            <a href="page_banners.php" class="<?= $current_page == 'page_banners.php' ? 'active' : '' ?>"><i class="fa-solid fa-panorama"></i> Page Banners</a>
            <a href="settings.php" class="<?= $current_page == 'settings.php' ? 'active' : '' ?>"><i class="fa-solid fa-gear"></i> Settings</a>
        </div>
        <div class="user-profile">
            <div class="avatar"><i class="fa-solid fa-user-shield"></i></div>
            <div class="info">
                <h4><?= htmlspecialchars($_SESSION['admin_username'] ?? 'Admin') ?></h4>
                <a href="logout.php"><i class="fa-solid fa-power-off"></i> Logout</a>
            </div>
        </div>
    </aside>

    <main class="main-content">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('a.btn-danger').forEach(button => {
                const oldOnclick = button.getAttribute('onclick');
                if(oldOnclick && oldOnclick.includes('confirm')) {
                    let match = oldOnclick.match(/confirm\(['"](.*?)['"]\)/);
                    let msg = match ? match[1] : "You won't be able to revert this action!";
                    button.removeAttribute('onclick');
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const link = this.href;
                        Swal.fire({
                            title: 'Are you absolutely sure?',
                            text: msg,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#FF4757',
                            cancelButtonColor: '#0A1628',
                            confirmButtonText: '<i class="fa-solid fa-trash"></i> Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) { window.location.href = link; }
                        });
                    });
                }
            });

            <?php if (isset($_SESSION['toast'])): ?>
                <?php
                $t_title = addslashes($_SESSION['toast']['title'] ?? 'Notice');
                $t_msg   = addslashes($_SESSION['toast']['message'] ?? '');
                $t_type  = addslashes($_SESSION['toast']['type'] ?? 'success');
                if($t_type == 'danger') $t_type = 'error';
                ?>
                const Toast = Swal.mixin({
                    toast: true, position: 'top-end', showConfirmButton: false, timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                Toast.fire({ icon: '<?= $t_type ?>', title: '<?= $t_title ?>', text: '<?= $t_msg ?>' });
                <?php unset($_SESSION['toast']); ?>
            <?php endif; ?>
        });

        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function() {
                let hasFiles = false;
                form.querySelectorAll('input[type="file"]').forEach(input => { if(input.files.length > 0) hasFiles = true; });
                if(hasFiles) {
                    Swal.fire({
                        title: 'Processing...',
                        html: 'Please wait while your files are being uploaded.<br><b>Do not close this window.</b>',
                        allowOutsideClick: false, showConfirmButton: false,
                        didOpen: () => { Swal.showLoading(); }
                    });
                }
            });
        });
    </script>