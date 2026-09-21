<?php
// Path: /includes/header.php

// استدعاء الاتصال بقاعدة البيانات والدوال
require_once __DIR__ . '/../config.php';
if (file_exists(__DIR__ . '/functions.php')) {
    require_once __DIR__ . '/functions.php';
}

global $pdo;
$stmt_set = $pdo->query("SELECT setting_key, setting_value FROM settings");
$global_settings = $stmt_set->fetchAll(PDO::FETCH_KEY_PAIR);

$site_logo = get_image_url($global_settings['default_logo'] ?? '', 'logo');
$site_favicon = get_image_url($global_settings['default_tour_img'] ?? '', 'tour');

$stmt_nav_dest = $pdo->query("SELECT name, slug FROM destinations ORDER BY id ASC");
$nav_destinations = $stmt_nav_dest->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Egypt Travel Square' ?></title>
  
  <link rel="icon" type="image/png" href="../img/logo3.png">
  <link rel="apple-touch-icon" href="<?= $site_favicon ?>">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <style>
    /* ===================== LUXURY ROYAL THEME VARIABLES ===================== */
    :root {
        --logo-navy: #0A1628;
        --logo-gold: #C9A227;
        --logo-gold-dark: #8B6914;
        --pure-white: #FFFFFF;
        --off-white: #F9FAFB;
        --text-dark: #1A1A1A;
        --text-gray: #666666;
        --border: #EAEAEA;
        --transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        --font-display: 'Cormorant Garamond', serif;
        --font-body: 'Plus Jakarta Sans', sans-serif;
        --header-h: 80px;
        --shadow-elegant: 0 15px 35px rgba(10, 22, 40, 0.08);
    }
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; scroll-padding-top: var(--header-h); }
    body { font-family: var(--font-body); color: var(--text-dark); background: var(--off-white); line-height: 1.7; overflow-x: hidden; width: 100%; }
    body.menu-open { overflow: hidden; }
    ul, ol { list-style: none; padding: 0; margin: 0; }
    a { text-decoration: none; color: inherit; }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: var(--logo-navy); }
    ::-webkit-scrollbar-thumb { background: var(--logo-gold); border-radius: 4px; }
    h1, h2, h3, h4 { font-family: var(--font-display); font-weight: 700; line-height: 1.2; }
    .container { max-width: 1400px; margin: 0 auto; padding: 0 clamp(20px, 5vw, 80px); }

    .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .reveal.active { opacity: 1; transform: translateY(0); }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }

    /* ===================== TOP BAR ===================== */
    .top-bar { position: absolute; top: 0; left: 0; width: 100%; background-color: var(--logo-navy); color: var(--pure-white); padding: 10px 0; font-size: 13px; border-bottom: 1px solid rgba(255,255,255,0.05); z-index: 1001; height: 42px; }
    .top-bar .container { display: flex; justify-content: space-between; align-items: center; }
    .top-bar-contact { display: flex; gap: 20px; }
    .top-bar-contact a { color: rgba(255,255,255,0.8); display: flex; align-items: center; gap: 8px; transition: 0.3s; }
    .top-bar-contact a:hover, .top-bar-social a:hover { color: var(--logo-gold); }
    .top-bar-contact i { color: var(--logo-gold); }
    .top-bar-social { display: flex; gap: 15px; align-items: center; }
    .top-bar-social a { color: rgba(255,255,255,0.8); transition: 0.3s; font-size: 15px; }

    /* ===================== HEADER & NAV ===================== */
    .header { position: absolute; top: 42px; left: 0; width: 100%; z-index: 1000; height: var(--header-h); display: flex; align-items: center; transition: var(--transition); }
    .header::before { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10,22,40,0.8) 0%, transparent 100%); transition: opacity 0.4s ease; pointer-events: none; }
    .header.scrolled::before { opacity: 0; }
    .header.scrolled { position: fixed; top: 0; background: rgba(10,22,40,0.98); height: 75px; box-shadow: 0 4px 30px rgba(0,0,0,0.2); }
    
    .nav { display: flex; justify-content: space-between; align-items: center; width: 100%; position: relative; z-index: 2; }
    .logo { display: flex; align-items: center; gap: 12px; flex-shrink: 0; }
    .logo-icon { width: 45px; height: 45px; background: linear-gradient(135deg, var(--logo-gold), var(--logo-gold-dark)); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--logo-navy); font-size: 20px; transition: transform 0.3s ease; }
    .logo:hover .logo-icon { transform: rotate(15deg) scale(1.05); }
    .logo-text { font-family: var(--font-display); font-size: 24px; font-weight: 700; color: var(--pure-white); }
    .logo-text span { color: var(--logo-gold); }

    .nav-links { display: flex; align-items: center; gap: 4px; }
    .nav-links > li > a { color: rgba(255,255,255,0.85); font-weight: 500; font-size: 14.5px; position: relative; padding: 10px 16px; transition: color 0.3s ease; display: flex; align-items: center; gap: 6px; white-space: nowrap; }
    .nav-links > li > a::after { content: ''; position: absolute; bottom: 4px; left: 16px; right: 16px; height: 2px; background: var(--logo-gold); transform: scaleX(0); transition: transform 0.3s ease; }
    .nav-links > li > a:hover, .nav-links > li > a.active { color: var(--logo-gold); }
    .nav-links > li > a:hover::after, .nav-links > li > a.active::after { transform: scaleX(1); }
    .chevron { font-size: 9px; transition: transform 0.3s ease; margin-left: 2px; }

    .dropdown { position: relative; }
    .dropdown-menu { position: absolute; top: calc(100% + 8px); left: 50%; transform: translateX(-50%) translateY(10px); background: rgba(10,22,40,0.98); min-width: 220px; border-radius: 8px; padding: 8px 0; opacity: 0; visibility: hidden; transition: var(--transition); box-shadow: 0 20px 40px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.05); }
    .dropdown-menu::before { content: ''; position: absolute; top: -20px; left: 0; right: 0; height: 20px; z-index: -1; }
    .dropdown:hover > a { color: var(--logo-gold); }
    .dropdown:hover > a::after { transform: scaleX(1); }
    .dropdown:hover > a .chevron { transform: rotate(180deg); }
    .dropdown:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); }
    .dropdown-menu li { width: 100%; }
    .dropdown-menu a { padding: 12px 25px !important; display: flex !important; align-items: center; gap: 10px; font-size: 14px !important; font-weight: 500 !important; color: rgba(255,255,255,0.8) !important; border-bottom: 1px solid rgba(255,255,255,0.04); transition: all 0.25s ease !important; }
    .dropdown-menu a::after { display: none !important; }
    .dropdown-menu li:last-child a { border-bottom: none; }
    .dropdown-menu a:hover { background: rgba(201,162,39,0.1) !important; color: var(--logo-gold) !important; padding-left: 30px !important;}
    
    /* Search Icon */
    .nav-search-btn { font-size: 18px; color: var(--pure-white) !important; cursor: pointer; transition: 0.3s; padding: 10px !important;}
    .nav-search-btn:hover { color: var(--logo-gold) !important; transform: scale(1.1); }
    .nav-search-btn::after { display: none !important; }

    /* Book Now Button */
    .nav-cta { display: inline-flex !important; align-items: center; justify-content: center; height: 44px; padding: 0 28px !important; background: var(--logo-gold); color: var(--logo-navy) !important; border-radius: 4px; font-weight: 700 !important; font-size: 13px !important; text-transform: uppercase; letter-spacing: 1px; transition: var(--transition); border: 2px solid var(--logo-gold); margin-left: 12px; }
    .nav-cta:hover { background: transparent !important; color: var(--logo-gold) !important; transform: translateY(-2px); }
    .nav-cta::after { display: none !important; }
    
    .mobile-toggle { display: none; background: none; border: none; color: var(--pure-white); font-size: 26px; cursor: pointer; padding: 8px; z-index: 10; }

    /* ===================== SEARCH OVERLAY MODAL ===================== */
    .search-overlay { position: fixed; inset: 0; background: rgba(10,22,40,0.98); backdrop-filter: blur(10px); z-index: 9999; display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: 0.4s ease; }
    .search-overlay.active { opacity: 1; pointer-events: auto; }
    .search-close { position: absolute; top: 40px; right: 40px; font-size: 40px; color: rgba(255,255,255,0.5); cursor: pointer; transition: 0.3s; }
    .search-close:hover { color: var(--logo-gold); transform: rotate(90deg); }
    .search-form { position: relative; width: 100%; max-width: 800px; padding: 0 20px; transform: translateY(30px); transition: 0.4s ease; opacity: 0;}
    .search-overlay.active .search-form { transform: translateY(0); opacity: 1; transition-delay: 0.2s;}
    .search-form input { width: 100%; background: transparent; border: none; border-bottom: 2px solid rgba(255,255,255,0.2); font-size: clamp(24px, 4vw, 40px); color: var(--pure-white); padding: 15px 60px 15px 0; font-family: var(--font-display); outline: none; transition: 0.3s; }
    .search-form input::placeholder { color: rgba(255,255,255,0.2); font-style: italic; }
    .search-form input:focus { border-bottom-color: var(--logo-gold); }
    .search-form button { position: absolute; right: 20px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--logo-gold); font-size: 28px; cursor: pointer; transition: 0.3s;}
    .search-form button:hover { transform: translateY(-50%) scale(1.1); }

    /* ===================== GLOBAL LAYOUTS (FOR INNER PAGES) ===================== */
    .page-hero { position: relative; height: 50vh; min-height: 400px; display: flex; align-items: center; justify-content: center; text-align: center; overflow: hidden; margin:0;} 
    .page-hero-bg { position: absolute; inset: 0; z-index: 0; } 
    .page-hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.4); transform: scale(1.05); } 
    .page-hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.9) 0%, rgba(10, 22, 40, 0.3) 100%); } 
    .page-hero-content { position: relative; z-index: 2; color: var(--pure-white); margin-top: 50px; animation: fadeInUp 1s ease both;} 
    .breadcrumb { font-size: 13px; font-weight: 600; letter-spacing: 2px; text-transform: uppercase; color: var(--logo-gold); margin-bottom: 16px; display: flex; align-items: center; justify-content: center; gap: 12px; } 
    .breadcrumb a { transition: color 0.3s ease; color: rgba(255,255,255,0.7); } 
    .breadcrumb a:hover { color: var(--pure-white); } 
    .page-hero-title { font-size: clamp(40px, 5vw, 65px); font-weight: 700; line-height: 1.1; margin-bottom: 20px; color: var(--pure-white); }
    .page-hero-title span { color: var(--logo-gold); font-style: italic; font-weight: 400; }
    
    .section-padding { padding: 100px 0; }
    .section-header { text-align: center; max-width: 650px; margin: 0 auto 60px; display: flex; flex-direction: column; align-items: center;}
    .gold-line { width: 30px; height: 3px; background: var(--logo-gold); margin-bottom: 20px; }
    .section-header h2 { font-family: var(--font-display); font-size: clamp(38px, 5vw, 50px); color: var(--logo-navy); margin-bottom: 20px; font-weight: 700; line-height: 1.2; }
    .section-header h2 span { color: var(--logo-gold); font-style: italic; font-weight: 400;}
    .section-header p { font-size: 16px; color: var(--text-gray); line-height: 1.8; }

    /* Buttons */
    .btn-gold { display: inline-flex; align-items: center; justify-content: center; height: 52px; padding: 0 35px; background: var(--logo-gold); color: var(--logo-navy); font-weight: 700; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; transition: var(--transition); border: 2px solid var(--logo-gold); border-radius: 4px; }
    .btn-gold:hover { background: transparent; color: var(--logo-gold); }
    .btn-outline { display: inline-flex; align-items: center; justify-content: center; height: 52px; padding: 0 35px; border: 2px solid var(--logo-navy); color: var(--logo-navy); font-weight: 600; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; transition: var(--transition); border-radius: 4px; }
    .btn-outline:hover { background: var(--logo-navy); color: var(--pure-white); }

    /* ===================== TOURS CARDS (LUXURY) ===================== */
    .tours-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 35px; }
    .tour-card { background: var(--pure-white); border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: var(--transition); display: flex; flex-direction: column; border: 1px solid #EEEEEE; border-bottom: 3px solid transparent;}
    .tour-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-elegant); border-bottom-color: var(--logo-gold); }
    .tour-image { position: relative; height: 260px; overflow: hidden; display: block; }
    .tour-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease; }
    .tour-card:hover .tour-image img { transform: scale(1.08); }
    .tour-wishlist { position: absolute; top: 15px; right: 15px; width: 40px; height: 40px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #ccc; cursor: pointer; transition: var(--transition); }
    .tour-wishlist:hover { color: #E74C3C; }
    .tour-body { padding: 30px; flex-grow: 1; display: flex; flex-direction: column; }
    .tour-location { font-size: 12px; color: var(--text-gray); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;}
    .tour-location i { color: var(--logo-gold); font-size: 14px;}
    .tour-name { font-family: var(--font-display); font-size: 24px; font-weight: 700; color: var(--logo-navy); margin-bottom: 20px; line-height: 1.3; transition: color 0.3s ease; text-decoration: none; display: block;}
    .tour-card:hover .tour-name { color: var(--logo-gold); }
    .tour-meta { display: flex; justify-content: space-between; padding-bottom: 20px; border-bottom: 1px solid #EEEEEE; margin-bottom: 20px; }
    .tour-meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-gray); font-weight: 500;}
    .tour-meta-item i { color: var(--logo-navy); }
    .tour-footer { display: flex; justify-content: space-between; align-items: flex-end; margin-top: auto; }
    .tour-price-label { font-size: 11px; color: var(--text-gray); display: block; margin-bottom: 4px; text-transform: uppercase; letter-spacing: 1px;}
    .tour-price-amount { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--logo-navy); line-height: 1;}
    .tour-book-btn { width: 45px; height: 45px; border: 1px solid var(--border); border-radius: 4px; display: flex; align-items: center; justify-content: center; color: var(--logo-navy); font-size: 16px; transition: var(--transition); background: transparent; }
    .tour-card:hover .tour-book-btn { background: var(--logo-navy); color: var(--logo-gold); border-color: var(--logo-navy); }

    /* ===================== DESTINATIONS GRID ===================== */
    .dest-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; }
    .dest-card { position: relative; overflow: hidden; cursor: pointer; height: 450px; border-radius: 8px; transition: var(--transition); }
    .dest-card-bg { position: absolute; inset: 0; transition: transform 0.8s ease; }
    .dest-card-bg img { width: 100%; height: 100%; object-fit: cover; }
    .dest-card:hover .dest-card-bg { transform: scale(1.1); }
    .dest-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10,22,40,0.9) 0%, rgba(10,22,40,0.1) 60%, transparent 100%); transition: var(--transition); }
    .dest-card:hover .dest-card-overlay { background: linear-gradient(to top, rgba(10,22,40,0.95) 0%, rgba(10,22,40,0.4) 60%, rgba(10,22,40,0.1) 100%); }
    .dest-card-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 30px; color: var(--pure-white); transition: var(--transition); text-align: center; }
    .dest-card:hover .dest-card-content { transform: translateY(-10px); }
    .dest-name { font-family: var(--font-display); font-size: 32px; font-weight: 700; margin-bottom: 10px; }
    .dest-excerpt { font-size: 14px; color: rgba(255, 255, 255, 0.7); line-height: 1.6; margin-bottom: 0; opacity: 0; height: 0; transition: var(--transition); overflow: hidden; }
    .dest-card:hover .dest-excerpt { opacity: 1; height: auto; margin-bottom: 15px; margin-top: 10px;}
    .dest-cta { font-size: 12px; font-weight: 700; color: var(--logo-gold); text-transform: uppercase; letter-spacing: 2px; opacity: 0; transition: var(--transition); display: inline-block;}
    .dest-card:hover .dest-cta { opacity: 1; }

    /* ===================== POLICIES & FORMS ===================== */
    .policy-container { background: var(--pure-white); padding: 50px; border-radius: 8px; box-shadow: var(--shadow-elegant); max-width: 900px; margin: 0 auto; border-top: 4px solid var(--logo-gold);}
    .policy-container h2 { font-family: var(--font-display); color: var(--logo-navy); font-size: 32px; border-bottom: 1px solid var(--border); padding-bottom: 15px; margin-bottom: 25px; margin-top: 40px;}
    .policy-container h2:first-child { margin-top: 0; }
    .policy-container p { font-size: 16px; color: var(--text-gray); line-height: 1.9; margin-bottom: 20px; }

    @media (max-width:991px) {
      :root { --header-h: 70px; }
      .mobile-toggle { display: block; }
      .top-bar { display: none; }
      .header { top: 0; background: rgba(10,22,40,0.98); }
      .nav-links { position: fixed; top: var(--header-h); left: 0; right: 0; bottom: 0; background: rgba(10,22,40,0.98); flex-direction: column; padding: 20px 0; overflow-y: auto; opacity: 0; visibility: hidden; transform: translateX(100%); transition: var(--transition); }
      .nav-links.active { opacity: 1; visibility: visible; transform: translateX(0); }
      .nav-links > li > a { padding: 15px 30px; font-size: 16px; border-bottom: 1px solid rgba(255,255,255,0.05); width: 100%; justify-content: space-between;}
      .dropdown-menu { position: static; opacity: 1; visibility: visible; transform: none; box-shadow: none; background: transparent; border: none; padding: 0; max-height: 0; overflow: hidden; transition: max-height 0.4s ease; }
      .dropdown.open .dropdown-menu { max-height: 500px; }
      .dropdown-menu a { padding: 12px 40px !important; }
      .nav-cta { margin: 20px 30px !important; width: calc(100% - 60px); justify-content: center;}
      .tours-grid { grid-template-columns: 1fr; }
      .dest-grid { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

  <div class="top-bar" id="topBar">
      <div class="container">
          <div class="top-bar-contact">
              <?php if(!empty($global_settings['email'])): ?>
                  <a href="mailto:<?= htmlspecialchars($global_settings['email']) ?>"><i class="fa-solid fa-envelope"></i> <?= htmlspecialchars($global_settings['email']) ?></a>
              <?php endif; ?>
              <?php if(!empty($global_settings['phone'])): ?>
                  <a href="tel:<?= preg_replace('/[^0-9+]/', '', $global_settings['phone']) ?>"><i class="fa-solid fa-phone"></i> <?= htmlspecialchars($global_settings['phone']) ?></a>
              <?php endif; ?>
          </div>
          <div class="top-bar-social">
              <?php if(!empty($global_settings['facebook'])): ?><a href="<?= htmlspecialchars($global_settings['facebook']) ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a><?php endif; ?>
              <?php if(!empty($global_settings['instagram'])): ?><a href="<?= htmlspecialchars($global_settings['instagram']) ?>" target="_blank"><i class="fa-brands fa-instagram"></i></a><?php endif; ?>
              <?php if(!empty($global_settings['youtube'])): ?><a href="<?= htmlspecialchars($global_settings['youtube']) ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a><?php endif; ?>
              <?php if(!empty($global_settings['tiktok'])): ?><a href="<?= htmlspecialchars($global_settings['tiktok']) ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a><?php endif; ?>
              <?php if(!empty($global_settings['tripadvisor'])): ?><a href="<?= htmlspecialchars($global_settings['tripadvisor']) ?>" target="_blank"><i class="fa-solid fa-star"></i></a><?php endif; ?>
          </div>
      </div>
  </div>

  <header class="header" id="header">
    <div class="container">
      <nav class="nav">
        <a href="index.php" class="logo">
          <?php if(!empty($global_settings['default_logo'])): ?>
              <img src="<?= $site_logo ?>" alt="Egypt Travel Square" style="height: 60px;">
          <?php else: ?>
              <div class="logo-icon"><i class="fa-solid fa-ankh"></i></div>
              <span class="logo-text">Egypt<span>Travel</span>Square</span>
          <?php endif; ?>
        </a>
        
        <ul class="nav-links" id="navLinks">
          <li><a href="index.php">Home</a></li>
          
          <li class="dropdown">
            <a href="where-to-go.php" data-dropdown>Where to Go <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <?php foreach($nav_destinations as $nav_dest): ?>
                <li><a href="destination.php?slug=<?= htmlspecialchars($nav_dest['slug']) ?>"><?= htmlspecialchars($nav_dest['name']) ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          
          <li class="dropdown">
            <a href="tours.php" data-dropdown>Tours <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <li><a href="tours.php?type=day">Day Tours</a></li>
              <li><a href="tours.php?type=half">Half Day Tours</a></li>
              <li><a href="tours.php?type=shore">Shore Excursions</a></li>
            </ul>
          </li>
          
          <li><a href="packages.php">Packages</a></li>
          
          <li class="dropdown">
            <a href="transfers.php" data-dropdown>Transfers <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <li><a href="transfers.php?city=cairo">Cairo</a></li>
              <li><a href="transfers.php?city=luxor">Luxor</a></li>
              <li><a href="transfers.php?city=aswan">Aswan</a></li>
              <li><a href="transfers.php?city=sharm">Sharm El-Sheikh</a></li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a href="#" data-dropdown>Explore <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <li><a href="about.php">About Us</a></li>
              <li><a href="gallery.php">Gallery</a></li>
              <li><a href="videos.php">Videos</a></li>
              <li><a href="faq.php">Travel Tips & FAQ</a></li>
              <li><a href="reviews.php">Guest Reviews</a></li>
            </ul>
          </li>
          
          <li><a href="contact.php">Contact</a></li>
          
          <li>
              <a href="javascript:void(0)" class="nav-search-btn" onclick="document.getElementById('searchOverlay').classList.add('active')">
                  <i class="fa-solid fa-magnifying-glass"></i>
              </a>
          </li>
          
          <li>
              <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $global_settings['phone'] ?? '201006796511') ?>" class="nav-cta" target="_blank" rel="noopener">Book Now</a>
          </li>
        </ul>
        <button class="mobile-toggle" id="mobileToggle"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </div>
  </header>

  <div class="search-overlay" id="searchOverlay">
      <div class="search-close" onclick="document.getElementById('searchOverlay').classList.remove('active')"><i class="fa-solid fa-xmark"></i></div>
      <div class="search-form">
          <form action="search.php" method="GET">
              <input type="text" name="q" placeholder="What are you looking for? (e.g. Pyramids, Luxor...)" required autocomplete="off">
              <button type="submit" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
      </div>
  </div>