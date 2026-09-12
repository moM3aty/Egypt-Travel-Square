<?php
// Path: /includes/header.php

// استدعاء الاتصال بقاعدة البيانات والدوال
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/functions.php';

// جلب الإعدادات العامة لكي تكون متاحة في الهيدر والفوتر وكل الصفحات
global $pdo;
$stmt_set = $pdo->query("SELECT setting_key, setting_value FROM settings");
$global_settings = $stmt_set->fetchAll(PDO::FETCH_KEY_PAIR);

// تحديد اللوجو والـ Favicon
$site_logo = get_image_url($global_settings['default_logo'] ?? '', 'logo');
$site_favicon = get_image_url($global_settings['default_tour_image'] ?? '', 'tour');

// --- السحر هنا: جلب جميع المدن من قاعدة البيانات لعرضها في القائمة العلوية ---
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
   :root {
      --gold: #C9A227; --gold-light: #E8D5A3; --gold-dark: #8B6914;
      --navy: #0A1628; --navy-light: #162236; --sand: #F5EDE0;
      --sand-dark: #E8DCC8; --terracotta: #C75B39; --turquoise: #1A8A7D;
      --white: #FFFFFF; --text-dark: #1A1A1A; --text-muted: #5A5A5A;
      --font-display: 'Cormorant Garamond', serif;
      --font-body: 'Plus Jakarta Sans', sans-serif;
      --shadow-soft: 0 8px 32px rgba(10, 22, 40, 0.08);
      --shadow-medium: 0 16px 48px rgba(10, 22, 40, 0.15);
      --shadow-gold: 0 8px 32px rgba(201, 162, 39, 0.25);
      --header-h: 80px;
    }
    
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html { scroll-behavior: smooth; scroll-padding-top: var(--header-h); }
    body { font-family: var(--font-body); color: var(--text-dark); background: var(--sand); line-height: 1.7; overflow-x: hidden; width: 100%; }
    body.menu-open { overflow: hidden; }
    ul, ol { list-style: none; padding: 0; margin: 0; }
    a { text-decoration: none; color: inherit; }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: var(--navy); }
    ::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 4px; }
    h1, h2, h3, h4 { font-family: var(--font-display); font-weight: 700; line-height: 1.2; }
    .container { max-width: 1400px; margin: 0 auto; padding: 0 clamp(20px, 5vw, 80px); }

    .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
    .reveal.active { opacity: 1; transform: translateY(0); }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }

    /* ===================== TOP BAR ===================== */
    .top-bar {
        position: absolute; top: 0; left: 0; width: 100%; background-color: var(--navy); color: var(--white);
        padding: 10px 0; font-size: 13px; border-bottom: 1px solid rgba(255,255,255,0.05); z-index: 1001; height: 42px;
    }
    .top-bar .container { display: flex; justify-content: space-between; align-items: center; }
    .top-bar-contact { display: flex; gap: 20px; }
    .top-bar-contact a { color: rgba(255,255,255,0.8); text-decoration: none; display: flex; align-items: center; gap: 8px; transition: 0.3s; }
    .top-bar-contact a:hover { color: var(--gold); }
    .top-bar-contact i { color: var(--gold); }
    .top-bar-social { display: flex; gap: 15px; align-items: center; }
    .top-bar-social a { color: rgba(255,255,255,0.8); transition: 0.3s; font-size: 15px; }
    .top-bar-social a:hover { color: var(--gold); transform: translateY(-2px); }

    /* ===================== HEADER & NAV ===================== */
    .header {
        position: absolute; top: 42px; left: 0; width: 100%; z-index: 1000; height: var(--header-h);
        display: flex; align-items: center; transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .header::before { content: ''; position: absolute; inset: 0; background: linear-gradient(180deg, rgba(10,22,40,0.65) 0%, transparent 100%); transition: opacity 0.4s ease; pointer-events: none; }
    .header.scrolled::before { opacity: 0; }
    .header.scrolled { position: fixed; top: 0; background: rgba(10,22,40,0.98); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); height: 68px; box-shadow: 0 4px 30px rgba(0,0,0,0.3); }
    
    .nav { display: flex; justify-content: space-between; align-items: center; width: 100%; position: relative; z-index: 2; }
    .logo { display: flex; align-items: center; gap: 12px; flex-shrink: 0; }
    .logo-icon { width: 150px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: var(--navy); font-size: 20px; transition: transform 0.3s ease; }
    .logo:hover .logo-icon { transform: rotate(15deg) scale(1.05); }
    .logo-text { font-family: var(--font-display); font-size: 24px; font-weight: 700; color: var(--white); letter-spacing: -0.5px; }
    .logo-text span { color: var(--gold); }

    .nav-links { display: flex; align-items: center; gap: 4px; }
    .nav-links > li > a { color: rgba(255,255,255,0.85); font-weight: 500; font-size: 14.5px; position: relative; padding: 10px 16px; transition: color 0.3s ease; display: flex; align-items: center; gap: 6px; white-space: nowrap; }
    .nav-links > li > a::after { content: ''; position: absolute; bottom: 4px; left: 16px; right: 16px; height: 2px; background: var(--gold); border-radius: 1px; transform: scaleX(0); transform-origin: center; transition: transform 0.3s ease; }
    .nav-links > li > a:hover, .nav-links > li > a.active { color: var(--gold); }
    .nav-links > li > a:hover::after, .nav-links > li > a.active::after { transform: scaleX(1); }
    .chevron { font-size: 9px; transition: transform 0.3s ease; margin-left: 2px; }

    .dropdown { position: relative; }
    .dropdown-menu { position: absolute; top: calc(100% + 8px); left: 50%; transform: translateX(-50%) translateY(10px); background: rgba(10,22,40,0.98); backdrop-filter: blur(20px); min-width: 240px; border-radius: 16px; padding: 8px 0; opacity: 0; visibility: hidden; transition: all 0.3s cubic-bezier(0.16,1,0.3,1); box-shadow: 0 20px 60px rgba(0,0,0,0.4); display: flex; flex-direction: column; border: 1px solid rgba(255,255,255,0.06); }
    .dropdown-menu::before { content: ''; position: absolute; top: -30px; left: 0; right: 0; height: 30px; z-index: -1; }
    .dropdown:hover > a { color: var(--gold); }
    .dropdown:hover > a::after { transform: scaleX(1); }
    .dropdown:hover > a .chevron { transform: rotate(180deg); }
    .dropdown:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); }
    .dropdown-menu li { width: 100%; }
    .dropdown-menu a { padding: 12px 25px !important; display: flex !important; align-items: center; gap: 10px; font-size: 15px !important; font-weight: 500 !important; color: #f0f0f0 !important; border-bottom: 1px solid rgba(255,255,255,0.04); transition: all 0.25s ease !important; background-color: transparent !important; }
    .dropdown-menu a::after { display: none !important; }
    .dropdown-menu li:last-child a { border-bottom: none; }
    .dropdown-menu a:hover { background: rgba(201,162,39,0.2) !important; color: #C9A227 !important; }
    .dropdown-menu a:hover .dm-icon { color: #C9A227 !important; }
    .dm-icon { font-size: 13px; color: rgba(255,255,255,0.4); width: 20px; text-align: center; transition: color 0.25s ease; display: inline-block; }

    .nav-cta { display: inline-flex !important; align-items: center; justify-content: center; height: 44px; padding: 0 28px !important; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--navy) !important; border-radius: 50px; font-weight: 700 !important; font-size: 14px !important; white-space: nowrap; letter-spacing: 0.5px; transition: all 0.3s ease; box-shadow: 0 4px 20px rgba(201,162,39,0.3); margin-left: 12px; }
    .nav-cta:hover { transform: translateY(-2px); box-shadow: 0 8px 30px rgba(201,162,39,0.5); color: var(--navy) !important; background: linear-gradient(135deg, #d4ad2e, var(--gold-dark)) !important; }
    .nav-cta::after { display: none !important; }
    .mobile-toggle { display: none; background: none; border: none; color: var(--white); font-size: 26px; cursor: pointer; padding: 8px; line-height: 1; z-index: 10; }
    .mobile-toggle:hover { color: var(--gold); }

    /* ===================== HERO SECTIONS & GLOBALS ===================== */
    .home-hero { position: relative; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; }
    .home-hero-bg { position: absolute; inset: 0; z-index: 0; }
    .home-hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.5); }
    .home-hero-content { position: relative; z-index: 2; color: var(--white); animation: fadeInUp 1s ease both; }
    .home-hero-title { font-size: clamp(40px, 8vw, 90px); font-weight: 700; margin-bottom: 20px; line-height: 1.1; }
    .home-hero-title span { color: var(--gold); font-style: italic; }
    .home-hero-subtitle { font-size: 20px; color: rgba(255,255,255,0.8); margin-bottom: 30px; }
    .section-title-main { text-align: center; font-size: clamp(32px, 4vw, 48px); color: var(--navy); margin-bottom: 50px; }
    .section-padding { padding: 100px 0; }

    .page-hero, .inner-hero { position: relative; height: 55vh; min-height: 450px; display: flex; align-items: center; overflow: hidden; margin:0; } 
    .inner-hero { justify-content: center; text-align: center; height: 50vh; min-height: 400px;}
    .page-hero-bg, .hero-bg { position: absolute; inset: 0; z-index: 0; } 
    .page-hero-bg img, .hero-bg img { width: 100%; height: 100%; object-fit: cover; filter: brightness(0.4); } 
    .page-hero-overlay, .hero-overlay { position: absolute; inset: 0; background: linear-gradient(135deg, rgba(10, 22, 40, 0.85) 0%, rgba(10, 22, 40, 0.2) 100%); } 
    .page-hero-content, .inner-hero-content { position: relative; z-index: 2; color: var(--white); max-width: 900px; margin: 40px auto 0; text-align: center; width: 100%; animation: fadeInUp 1s ease both;} 
    .breadcrumb { font-size: 14px; font-weight: 500; letter-spacing: 2px; text-transform: uppercase; color: var(--gold-light); margin-bottom: 16px; display: flex; align-items: center; justify-content:center; gap: 12px; } 
    .breadcrumb a { transition: color 0.3s ease; } .breadcrumb a:hover { color: var(--white); } 
    .breadcrumb i { font-size: 10px; color: rgba(255,255,255,0.4); } 
    .page-hero-title, .hero-title { font-size: clamp(36px, 5vw, 64px); font-weight: 700; line-height: 1.1; margin-bottom: 24px; color: var(--white); }
    .page-hero-title span, .hero-title span { color: var(--gold); font-style: italic; }
    .tour-hero-price { font-size: 20px; font-weight: 500; color: rgba(255,255,255,0.8); display: flex; justify-content:center; align-items: center; gap: 12px; } 
    .tour-hero-price span { font-family: var(--font-display); font-size: 42px; font-weight: 700; color: var(--gold); }

    /* ===================== INTRO ===================== */
    .intro-section { padding: 100px 0 60px; background: var(--sand); text-align: center; } 
    .intro-title { font-size: clamp(32px, 4vw, 48px); color: var(--navy); margin-bottom: 24px; } 
    .intro-text-wrapper { max-width: 800px; margin: 0 auto; } 
    .intro-text { font-size: 18px; color: var(--text-muted); line-height: 1.9; margin-bottom: 20px; text-align: center; } 

    /* ===================== TOURS GRID ===================== */
    .tours-section { padding: 0 0 120px 0; background: var(--sand); } 
    .tours-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px; } 
    .tour-card { background: var(--white); border-radius: 24px; overflow: hidden; box-shadow: var(--shadow-soft); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); display: flex; flex-direction: column; } 
    .tour-card:hover { transform: translateY(-12px); box-shadow: var(--shadow-medium); } 
    .tour-image { position: relative; height: 240px; overflow: hidden; display:block; } 
    .tour-image img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; } 
    .tour-card:hover .tour-image img { transform: scale(1.08); } 
    .tour-badge { position: absolute; top: 20px; left: 20px; background: var(--white); padding: 6px 14px; border-radius: 50px; font-size: 12px; font-weight: 600; display: flex; align-items: center; gap: 6px; box-shadow: var(--shadow-soft); } 
    .tour-badge i { color: var(--gold); } 
    .tour-wishlist { position: absolute; top: 20px; right: 20px; width: 40px; height: 40px; background: var(--white); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 16px; color: var(--text-muted); cursor: pointer; transition: all 0.3s ease; box-shadow: var(--shadow-soft); border:none;} 
    .tour-wishlist:hover { color: var(--terracotta); transform: scale(1.1); } 
    .tour-body { padding: 24px; flex-grow: 1; display: flex; flex-direction: column; } 
    .tour-location { font-size: 13px; color: var(--text-muted); margin-bottom: 12px; display: flex; align-items: center; gap: 8px; } 
    .tour-location i { color: var(--gold); } 
    .tour-name { font-family: var(--font-display); font-size: 20px; font-weight: 700; color: var(--navy); margin-bottom: 20px; line-height: 1.4; transition: color 0.3s ease; } 
    .tour-card:hover .tour-name { color: var(--gold-dark); } 
    .tour-meta { display: flex; gap: 20px; padding-bottom: 20px; border-bottom: 1px solid rgba(0,0,0,0.08); margin-bottom: 20px; flex-wrap: wrap; } 
    .tour-meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: var(--text-muted); } 
    .tour-meta-item i { color: var(--turquoise); } 
    .tour-footer { display: flex; justify-content: space-between; align-items: center; margin-top: auto; } 
    .tour-price { display: flex; flex-direction: column; } 
    .tour-price-label { font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; } 
    .tour-price-amount { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--navy); } 
    .tour-book { width: 48px; height: 48px; background: var(--navy); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--gold); font-size: 18px; transition: all 0.3s ease; } 
    .tour-book:hover { background: var(--gold); color: var(--navy); transform: rotate(-45deg); }

    /* ===================== DESTINATIONS GRID ===================== */
    .destinations { padding: 0 0 120px 0; background: var(--sand); position: relative; } 
    .dest-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; } 
    .dest-card { position: relative; border-radius: 20px; overflow: hidden; cursor: pointer; height: 350px; box-shadow: var(--shadow-soft); transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1); } 
    .dest-card-bg { position: absolute; inset: 0; transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1); } 
    .dest-card-bg img { width: 100%; height: 100%; object-fit: cover; } 
    .dest-card:hover .dest-card-bg { transform: scale(1.1); } 
    .dest-card-overlay { position: absolute; inset: 0; background: linear-gradient(to top, rgba(10, 22, 40, 0.95) 0%, rgba(10, 22, 40, 0.4) 60%, transparent 100%); transition: background 0.4s ease; } 
    .dest-card:hover .dest-card-overlay { background: linear-gradient(to top, rgba(10, 22, 40, 0.98) 0%, rgba(10, 22, 40, 0.6) 70%, rgba(10, 22, 40, 0.2) 100%); } 
    .dest-card-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 24px; color: var(--white); transform: translateY(15px); transition: transform 0.4s ease; text-align: left;} 
    .dest-card:hover .dest-card-content { transform: translateY(0); } 
    .dest-name { font-family: var(--font-display); font-size: 26px; font-weight: 700; margin-bottom: 12px; transition: color 0.3s ease; } 
    .dest-card:hover .dest-name { color: var(--gold); } 
    .dest-excerpt { font-size: 14px; color: rgba(255, 255, 255, 0.8); line-height: 1.6; margin-bottom: 16px; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; } 
    .dest-cta { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: transparent; border: 1px solid var(--gold); color: var(--gold); border-radius: 50px; font-weight: 600; font-size: 13px; opacity: 0; transform: translateY(10px); transition: all 0.4s ease 0.1s; pointer-events: none; } 
    .dest-card:hover .dest-cta { opacity: 1; transform: translateY(0); background: var(--gold); color: var(--navy); }

    /* ===================== TOUR DETAILS PAGE ===================== */
    .tour-layout { display: grid; grid-template-columns: 1fr 380px; gap: 40px; padding: 80px 0; align-items: start; }
    .content-box { background: var(--white); padding: 40px; border-radius: 24px; box-shadow: var(--shadow-soft); margin-bottom: 40px; }
    .section-title { font-size: 28px; color: var(--navy); margin-bottom: 24px; display: flex; align-items: center; gap: 12px; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 16px; } 
    .section-title i { color: var(--gold); font-size: 24px; }
    .tour-text { font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 24px; }
    .price-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(130px, 1fr)); gap: 16px; margin: 30px 0; }
    .price-card { background: var(--sand); border: 1px solid var(--gold-light); border-radius: 16px; padding: 15px; text-align: center; transition: transform 0.3s ease; display:flex; flex-direction:column; justify-content:center;} 
    .price-card:hover { transform: translateY(-5px); border-color: var(--gold); } 
    .price-card h4 { font-size: 14px; color: var(--text-muted); text-transform: uppercase; margin-bottom: 8px; font-family: var(--font-body); } 
    .price-card p { font-family: var(--font-display); font-size: 28px; font-weight: 700; color: var(--navy); margin: 0; }
    .child-price { display: inline-flex; align-items: center; gap: 10px; font-size: 15px; color: var(--navy); background: rgba(201, 162, 39, 0.1); padding: 12px 20px; border-radius: 12px; } 
    .child-price i { color: var(--terracotta); }
    .info-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; } 
    .info-item { display: flex; gap: 16px; align-items: flex-start; } 
    .info-item > i { font-size: 24px; color: var(--gold); margin-top: 4px; } 
    .info-item h5 { font-size: 16px; color: var(--navy); margin-bottom: 4px; } 
    .info-item p { font-size: 14px; color: var(--text-muted); line-height: 1.6; }
    .dual-lists { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; } 
    .styled-list li { display: flex; align-items: flex-start; gap: 12px; font-size: 15px; color: var(--text-muted); margin-bottom: 12px; line-height: 1.6; } 
    .styled-list.exclude li i { color: var(--terracotta); margin-top: 4px; } 
    .styled-list.bring li i { color: var(--turquoise); margin-top: 4px; }
    .map-container iframe { width: 100%; height: 400px; border-radius: 16px; border: none; }
    .booking-widget { background: var(--white); border-radius: 24px; padding: 32px; box-shadow: var(--shadow-medium); position: sticky; top: 100px; border-top: 6px solid var(--gold); }
    .booking-header { margin-bottom: 24px; text-align: center; } 
    .booking-header h3 { font-size: 24px; color: var(--navy); margin-bottom: 8px; } 
    .booking-header .price { font-size: 14px; color: var(--text-muted); text-transform: uppercase; } 
    .booking-header .price span { font-family: var(--font-display); font-size: 36px; font-weight: 700; color: var(--gold); display: block; text-transform: none; }
    .booking-form .form-group { margin-bottom: 16px; } 
    .booking-form label { display: block; font-size: 13px; font-weight: 600; color: var(--navy); margin-bottom: 8px; } 
    .booking-form input, .booking-form textarea { width: 100%; padding: 14px; background: var(--sand); border: 1px solid transparent; border-radius: 12px; font-family: var(--font-body); font-size: 14px; outline: none; transition: 0.3s; } 
    .booking-form input:focus, .booking-form textarea:focus { background: var(--white); border-color: var(--gold); }
    .btn-book { width: 100%; padding: 16px; background: #25D366; color: var(--white); border: none; border-radius: 50px; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 10px; margin-top: 10px; } 
    .btn-book:hover { background: #1ebd5a; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(37, 211, 102, 0.3); } 
    .widget-features { margin-top: 24px; padding-top: 24px; border-top: 1px solid rgba(0,0,0,0.05); } 
    .widget-features p { display: flex; align-items: center; gap: 10px; font-size: 13px; color: var(--text-muted); margin-bottom: 12px; font-weight: 500; } 
    .widget-features p i { color: var(--gold); font-size: 16px; width: 20px; text-align: center; }

    /* ===================== MODAL ===================== */
    .modal-overlay { position: fixed; inset: 0; background: rgba(10, 22, 40, 0.85); backdrop-filter: blur(8px); z-index: 2000; display: flex; align-items: center; justify-content: center; opacity: 0; pointer-events: none; transition: 0.4s ease; padding: 20px; }
    .modal-overlay.active { opacity: 1; pointer-events: auto; }
    .modal-content { background: var(--sand); border-radius: 24px; max-width: 800px; width: 100%; max-height: 90vh; overflow-y: auto; transform: translateY(40px) scale(0.95); transition: 0.4s cubic-bezier(0.16, 1, 0.3, 1); box-shadow: var(--shadow-medium); position: relative;}
    .modal-overlay.active .modal-content { transform: translateY(0) scale(1); }
    .modal-close { position: absolute; top: 20px; right: 20px; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); border: 2px solid rgba(255,255,255,0.5); width: 44px; height: 44px; border-radius: 50%; font-size: 20px; color: var(--white); cursor: pointer; display: flex; align-items: center; justify-content: center; z-index: 10; transition: all 0.3s ease; }
    .modal-close:hover { background: var(--terracotta); border-color: var(--terracotta); transform: rotate(90deg); }
    .modal-header-img { width: 100%; height: 350px; background-size: cover; background-position: center; border-radius: 24px 24px 0 0; position: relative; }
    .modal-header-img::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 100px; background: linear-gradient(to top, var(--sand), transparent); }
    .modal-body-content { padding: 40px; margin-top: -40px; position: relative; z-index: 2; }
    .modal-title { font-family: var(--font-display); font-size: 42px; color: var(--navy); margin-bottom: 20px; line-height: 1.2; font-weight: 700; }
    .modal-title span { color: var(--gold-dark); }
    .modal-description { font-size: 16px; color: var(--text-muted); line-height: 1.9; }
    .modal-description p { margin-bottom: 16px; }
    .modal-content::-webkit-scrollbar { width: 8px; }
    .modal-content::-webkit-scrollbar-track { background: var(--sand); border-radius: 0 24px 24px 0;}
    .modal-content::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 4px; }

    /* ===================== VIDEOS GRID ===================== */
    .video-section { padding: 100px 0; background: var(--sand); }
    .video-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; }
    .video-card { position: relative; border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-soft); background: var(--navy); transition: transform 0.4s ease, box-shadow 0.4s ease; }
    .video-card:hover { transform: translateY(-8px); box-shadow: var(--shadow-medium); }
    .video-card video { width: 100%; display: block; border-radius: 16px; aspect-ratio: 16/9; object-fit: cover; }
    .video-info { padding: 20px; background: var(--white); border-radius: 0 0 16px 16px; border: 1px solid rgba(0,0,0,0.05); border-top: none; }
    .video-info h3 { font-size: 18px; color: var(--navy); margin-bottom: 8px; font-family: var(--font-body); }
    .video-info p { font-size: 14px; color: var(--text-muted); }

    /* ===================== FAQ & TIPS & FORMS ===================== */
    .tips-section { padding: 100px 0; background: var(--white); }
    .tips-intro { text-align: center; max-width: 800px; margin: 0 auto 60px; }
    .tips-intro h2 { font-size: 32px; color: var(--navy); margin-bottom: 20px; }
    .tips-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 60px; align-items: start; }
    
    .faq-container { width: 100%; }
    details { background: var(--sand); border-radius: 12px; margin-bottom: 16px; box-shadow: var(--shadow-soft); overflow: hidden; border: 1px solid transparent; transition: 0.3s; }
    details[open] { border-color: rgba(201,162,39,0.3); background: var(--white); }
    summary { padding: 24px; font-weight: 700; cursor: pointer; list-style: none; display: flex; justify-content: space-between; align-items: center; color: var(--navy); font-size: 18px; font-family: var(--font-display); }
    summary::-webkit-details-marker { display: none; }
    summary::after { content: '\f067'; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--gold); transition: transform 0.3s; font-size: 16px;}
    details[open] summary::after { transform: rotate(45deg); color: var(--terracotta); }
    .faq-content { padding: 0 24px 24px; color: var(--text-muted); line-height: 1.8; font-size: 15px; }

    .sidebar-form { background: var(--navy); border-radius: 20px; padding: 40px; color: var(--white); box-shadow: var(--shadow-medium); position: sticky; top: 100px; }
    .sidebar-form h3 { font-size: 28px; color: var(--gold); margin-bottom: 10px; }
    .sidebar-form p { color: rgba(255,255,255,0.7); margin-bottom: 24px; font-size: 14px; }
    .form-control { width: 100%; padding: 14px 18px; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; font-family: inherit; font-size: 14px; background: rgba(255,255,255,0.05); color: var(--white); transition: all 0.3s; margin-bottom: 16px;}
    .form-control::placeholder { color: rgba(255,255,255,0.4); }
    .form-control:focus { outline: none; border-color: var(--gold); background: rgba(255,255,255,0.1);}
    textarea.form-control { resize: vertical; min-height: 120px; }
    .btn-submit { width: 100%; padding: 16px; background: var(--gold); color: var(--navy); border: none; border-radius: 8px; font-weight: 700; font-size: 16px; cursor: pointer; transition: 0.3s; }
    .btn-submit:hover { background: var(--white); transform: translateY(-3px); }

    /* ===================== ABOUT & CONTACT & POLICY ===================== */
    .about-grid, .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
    .about-text h2 { font-size: 36px; color: var(--navy); margin-bottom: 24px; }
    .about-text p { font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 20px; }
    .about-image img { width: 100%; border-radius: 24px; box-shadow: var(--shadow-medium); }

    .contact-info-box { background: var(--white); padding: 40px; border-radius: 24px; box-shadow: var(--shadow-soft); margin-bottom: 20px; display: flex; gap: 20px; align-items: center;}
    .contact-info-box i { font-size: 32px; color: var(--gold); }
    .contact-info-box h4 { font-size: 20px; color: var(--navy); margin-bottom: 5px; }
    .contact-info-box p { color: var(--text-muted); }
    .contact-form { background: var(--navy); padding: 50px; border-radius: 24px; color: var(--white); box-shadow: var(--shadow-medium); }

    .policy-section { padding: 80px 0; }
    .policy-container { max-width: 900px; margin: 0 auto; background: var(--white); padding: 60px; border-radius: 24px; box-shadow: var(--shadow-soft); }
    .policy-container h2 { font-size: 28px; color: var(--navy); margin: 40px 0 20px; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 12px; }
    .policy-container h2:first-child { margin-top: 0; }
    .policy-container h3 { font-size: 20px; color: var(--gold-dark); margin: 24px 0 12px; }
    .policy-container p { font-size: 16px; color: var(--text-muted); line-height: 1.9; margin-bottom: 20px; }

    /* ===================== FOOTER ===================== */
    .footer { background: var(--navy); padding: 80px 0 0; position: relative; }
    .footer::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--gold), var(--terracotta), var(--gold)); }
    .footer-grid { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1.5fr; gap: 50px; padding-bottom: 60px; border-bottom: 1px solid rgba(255, 255, 255, 0.08); }
    .footer-brand p { color: rgba(255, 255, 255, 0.6); font-size: 15px; line-height: 1.9; margin: 24px 0; }
    .footer-social { display: flex; gap: 12px; flex-wrap: wrap;}
    .footer-social a { width: 40px; height: 40px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--white); transition: all 0.3s ease; }
    .footer-social a:hover { background: var(--gold); border-color: var(--gold); color: var(--navy); transform: translateY(-4px); }
    .footer-title { font-family: var(--font-display); font-size: 22px; font-weight: 700; color: var(--white); margin-bottom: 28px; position: relative; padding-bottom: 16px; }
    .footer-title::after { content: ''; position: absolute; bottom: 0; left: 0; width: 40px; height: 2px; background: var(--gold); }
    .footer-links li { margin-bottom: 14px; }
    .footer-links a { color: rgba(255, 255, 255, 0.6); font-size: 15px; transition: all 0.3s ease; display: flex; align-items: center; gap: 8px; }
    .footer-links a::before { content: '\f105'; font-family: "Font Awesome 6 Free"; font-weight: 900; color: var(--gold); opacity: 0; transform: translateX(-10px); transition: all 0.3s ease; font-size: 12px; }
    .footer-links a:hover { color: var(--white); padding-left: 8px; }
    .footer-links a:hover::before { opacity: 1; transform: translateX(0); }
    .footer-contact li { display: flex; align-items: flex-start; gap: 16px; margin-bottom: 20px; color: rgba(255, 255, 255, 0.6); font-size: 15px; }
    .footer-contact i { color: var(--gold); margin-top: 4px; width: 16px; text-align: center; flex-shrink: 0;}
    .footer-bottom { padding: 24px 0; display: flex; justify-content: space-between; align-items: center; color: rgba(255, 255, 255, 0.5); font-size: 14px; }
    .footer-bottom .designed-by span { color: var(--gold); font-weight: 600; letter-spacing: 1px; }

    /* ===================== FLOATING BUTTONS ===================== */
    .floating-btn { position: fixed; left: 30px; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; color: white; box-shadow: 0 4px 12px rgba(0,0,0,0.3); z-index: 9999; transition: transform 0.3s ease; text-decoration: none; }
    .floating-btn:hover { transform: scale(1.1); color: white; }
    .whatsapp-btn { bottom: 30px; background: #25D366; }
    .reviews-btn { bottom: 105px; background: var(--gold); color: var(--navy); font-size: 24px; }
    .reviews-btn:hover { color: var(--navy); background: var(--gold-light); }

    /* ===================== RESPONSIVE (MEDIA QUERIES) ===================== */
    @media (max-width: 1200px) { 
        .footer-grid { grid-template-columns: 1fr 1fr; gap: 40px; } 
        .dest-grid { grid-template-columns: repeat(2, 1fr); }
    }
    
    @media (max-width:991px) {
      :root { --header-h: 68px; }
      .mobile-toggle { display: block; }
      
      .top-bar { display: none; }
      .header { top: 0; }

      .nav-links {
        position: fixed; top: var(--header-h); left: 0; right: 0; bottom: 0;
        background: rgba(10,22,40,.99); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
        flex-direction: column; align-items: stretch; padding: 16px 0 0; gap: 0;
        overflow-y: auto; overflow-x: hidden; opacity: 0; visibility: hidden;
        transform: translateX(30px); transition: all .4s cubic-bezier(.16,1,.3,1); -webkit-overflow-scrolling: touch;
      }
      .nav-links.active { opacity: 1; visibility: visible; transform: translateX(0); }
      .nav-links > li > a { padding: 16px clamp(20px,5vw,80px); border-bottom: 1px solid rgba(255,255,255,.06); width: 100%; display: flex; justify-content: space-between; align-items: center; font-size: 16px; }
      .nav-links > li > a::after { display: none !important; }
      
      .dropdown-menu { position: static; opacity: 1; visibility: visible; transform: none; box-shadow: none; background: rgba(0,0,0,.25); border: none; border-radius: 0; padding: 0; min-width: 100%; max-height: 0; overflow: hidden; transition: max-height .4s cubic-bezier(.16,1,.3,1); }
      .dropdown-menu::before { display: none; }
      .dropdown.open .dropdown-menu { max-height: 400px; }
      #header .nav-links .dropdown-menu a { padding: 14px 40px !important; border-bottom-color: rgba(255,255,255,.04) !important; font-size: 15px !important; color: #f0f0f0 !important; background-color: transparent !important; opacity: 1 !important; visibility: visible !important; display: flex !important; -webkit-text-fill-color: initial !important; }
      #header .nav-links .dropdown-menu a:hover, #header .nav-links .dropdown-menu a:active, #header .nav-links .dropdown-menu a:focus { padding-left: 50px !important; color: #C9A227 !important; background-color: rgba(201,162,39,.15) !important; opacity: 1 !important; visibility: visible !important; -webkit-text-fill-color: #C9A227 !important; }
      .dropdown.open > a .chevron { transform: rotate(180deg); }
      .nav-links li:last-child { position: sticky; bottom: 0; background: rgba(10,22,40,.95); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 16px clamp(20px,5vw,80px) !important; border-top: 1px solid rgba(255,255,255,.06); border-bottom: none; margin-top: auto; }
      .nav-links li:last-child a::after { display: none !important; }
      .nav-links .nav-cta { margin: 0; width: 100%; height: 52px; font-size: 16px !important; border-radius: 14px; display: flex !important; justify-content: center;}

      .tour-layout { grid-template-columns: 1fr; }
      .booking-widget { position: static; margin-bottom: 40px; }
      .tips-grid { grid-template-columns: 1fr; }
      .sidebar-form { position: relative; top: 0; }
      .about-grid, .contact-grid { grid-template-columns: 1fr; }
      .modal-header-img { height: 250px; } .modal-title { font-size: 32px; }
      .policy-container { padding: 40px 20px; }
    }

    @media (max-width: 767px) {
      .price-cards { grid-template-columns: repeat(2, 1fr); }
      .dual-lists { grid-template-columns: 1fr; gap: 24px; }
      .info-grid { grid-template-columns: 1fr; }
      .dest-grid { grid-template-columns: 1fr; gap: 24px; }
      .video-grid { grid-template-columns: 1fr; }
      .footer { padding-top: 60px; }
      .footer-grid { grid-template-columns: 1fr; gap: 40px; text-align: left; }
      .footer-bottom { flex-direction: column; gap: 16px; text-align: center; }
      .modal-body-content { padding: 20px; }
    }
  </style>
</head>
<body>

  <!-- ===================== TOP BAR ===================== -->
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
              <?php if(!empty($global_settings['facebook'])): ?>
                  <a href="<?= htmlspecialchars($global_settings['facebook']) ?>" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
              <?php endif; ?>
              
              <?php if(!empty($global_settings['instagram'])): ?>
                  <a href="<?= htmlspecialchars($global_settings['instagram']) ?>" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
              <?php endif; ?>
              
              <?php if(!empty($global_settings['youtube'])): ?>
                  <a href="<?= htmlspecialchars($global_settings['youtube']) ?>" target="_blank" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
              <?php endif; ?>

              <?php if(!empty($global_settings['tiktok'])): ?>
                  <a href="<?= htmlspecialchars($global_settings['tiktok']) ?>" target="_blank" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
              <?php endif; ?>

              <?php if(!empty($global_settings['tripadvisor'])): ?>
                  <a href="<?= htmlspecialchars($global_settings['tripadvisor']) ?>" target="_blank" aria-label="TripAdvisor"><i class="fa-solid fa-star"></i></a>
              <?php endif; ?>
          </div>
      </div>
  </div>

  <!-- ===================== MAIN NAVIGATION ===================== -->
  <header class="header" id="header">
    <div class="container">
      <nav class="nav">
        <a href="index.php" class="logo">
          <?php if(!empty($global_settings['default_logo'])): ?>
              <img src="<?= $site_logo ?>" alt="Egypt Travel Square" style="height: 65px; border-radius: 30px;">
          <?php else: ?>
              <div class="logo-icon"><i class="fa-solid fa-ankh"></i></div>
              <span class="logo-text">Egypt<span>Travel</span>Square</span>
          <?php endif; ?>
        </a>
        <ul class="nav-links" id="navLinks">
          <li><a href="index.php">Home</a></li>
          
          <li class="dropdown">

            <a href="where-to-go.php" data-dropdown="">Where to Go <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <?php foreach($nav_destinations as $nav_dest): ?>
                <li>
                  <a href="destination.php?slug=<?= htmlspecialchars($nav_dest['slug']) ?>">
                    <i class="fa-solid fa-location-dot dm-icon"></i> <?= htmlspecialchars($nav_dest['name']) ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </li>
          
          <li class="dropdown">

            <a href="tours.php" data-dropdown="">Tours <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <li><a href="tours.php?type=day"><i class="fa-solid fa-sun dm-icon"></i> Day Tours</a></li>
              <li><a href="tours.php?type=half"><i class="fa-regular fa-clock dm-icon"></i> Half Day Tours</a></li>
              <li><a href="tours.php?type=shore"><i class="fa-solid fa-ship dm-icon"></i> Shore Excursions</a></li>
            </ul>
          </li>
          
          <li><a href="packages.php">Packages</a></li>
          
          <li class="dropdown">
        
            <a href="transfers.php" data-dropdown="">Transfers <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <li><a href="transfers.php?city=cairo"><i class="fa-solid fa-van-shuttle dm-icon"></i> Cairo</a></li>
              <li><a href="transfers.php?city=luxor"><i class="fa-solid fa-van-shuttle dm-icon"></i> Luxor</a></li>
              <li><a href="transfers.php?city=aswan"><i class="fa-solid fa-van-shuttle dm-icon"></i> Aswan</a></li>
              <li><a href="transfers.php?city=sharm"><i class="fa-solid fa-van-shuttle dm-icon"></i> Sharm El-Sheikh</a></li>
            </ul>
          </li>
          
          <li class="dropdown">
            <a href="#" data-dropdown="">Explore <i class="fa-solid fa-chevron-down chevron"></i></a>
            <ul class="dropdown-menu">
              <li><a href="about.php"><i class="fa-solid fa-users dm-icon"></i> About Us</a></li>
              <li><a href="gallery.php"><i class="fa-solid fa-images dm-icon"></i> Gallery</a></li>
              <li><a href="videos.php"><i class="fa-solid fa-video dm-icon"></i> Videos</a></li>
              <li><a href="faq.php"><i class="fa-solid fa-lightbulb dm-icon"></i> Travel Tips & FAQ</a></li>
              <li><a href="reviews.php"><i class="fa-solid fa-star dm-icon"></i> Guest Reviews</a></li>
            </ul>
          </li>
          
          <li><a href="contact.php">Contact</a></li>
          
          <li>
              <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $global_settings['phone'] ?? '201006796511') ?>" class="nav-cta" target="_blank" rel="noopener">Book Now</a>
          </li>
        </ul>
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle Menu"><i class="fa-solid fa-bars"></i></button>
      </nav>
    </div>
  </header>