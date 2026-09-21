<?php
// Path: /admin/login.php
session_start();
require_once '../config.php';

// إذا كان مسجل الدخول بالفعل، تحويله للرئيسية
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // التحقق المباشر والصارم من الباسورد الفعلي في قاعدة البيانات
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Egypt Travel Square</title>
    <link rel="icon" type="image/png" href="../img/logo3.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --gold: #C9A227;
            --gold-dark: #8B6914;
            --navy: #0A1628;
            --white: #FFFFFF;
            --font-display: 'Cormorant Garamond', serif;
            --font-body: 'Plus Jakarta Sans', sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: var(--font-body); }
        
        body { 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            min-height: 100vh; 
            background: url('https://images.unsplash.com/photo-1539650116574-8efeb43e2750?q=80&w=2000&auto=format&fit=crop') no-repeat center center/cover;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(10, 22, 40, 0.95), rgba(10, 22, 40, 0.6));
            z-index: 1;
        }

        .login-wrapper {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 450px;
            padding: 20px;
            animation: fadeIn 0.8s ease forwards;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 50px 40px;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            border-top: 5px solid var(--gold);
        }

        .logo-area { text-align: center; margin-bottom: 30px; }
        
        .form-group { margin-bottom: 20px; position: relative; }
        .form-group i { position: absolute; top: 50%; left: 18px; transform: translateY(-50%); color: #999; font-size: 18px; }
        
        .form-control { width: 100%; padding: 16px 16px 16px 50px; border: 1px solid #E0E0E0; border-radius: 12px; font-size: 15px; background: #F9F9F9; color: var(--navy); transition: all 0.3s ease; outline: none; }
        .form-control:focus { background: var(--white); border-color: var(--gold); box-shadow: 0 0 0 4px rgba(201, 162, 39, 0.1); }
        .form-control:focus + i { color: var(--gold); }

        .btn-login { width: 100%; padding: 16px; background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: var(--navy); border: none; border-radius: 12px; font-weight: 700; font-size: 16px; cursor: pointer; transition: all 0.3s ease; margin-top: 10px; box-shadow: 0 8px 20px rgba(201, 162, 39, 0.3); }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 25px rgba(201, 162, 39, 0.4); }

        .error-message { background: #FFF0F0; color: #D32F2F; padding: 12px; border-radius: 8px; font-size: 14px; font-weight: 600; text-align: center; margin-bottom: 20px; border: 1px solid #FFCDD2; }
        .footer-text { text-align: center; margin-top: 25px; font-size: 13px; color: #888; }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="logo-area">
                <img src="../img/logo2.png" width="250px" alt="Logo">
                <p style="color: #666; margin-top: 5px; font-size: 14px;">Secure Admin Control Panel</p>
            </div>

            <?php if ($error): ?>
                <div class="error-message"><i class="fa-solid fa-circle-exclamation" style="margin-right: 5px;"></i> <?= $error ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" class="form-control" placeholder="Username" required autocomplete="username">
                </div>
                <div class="form-group">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="current-password">
                </div>
                <button type="submit" class="btn-login">Sign In <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i></button>
            </form>
            
            <div class="footer-text">&copy; <?= date('Y') ?> Egypt Travel Square. All Rights Reserved.</div>
        </div>
    </div>
</body>
</html>