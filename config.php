<?php
// Path: /config.php

$host = 'shareddb-l.hosting.stackcp.net';
$db   = 'egyptTravel-3939f1b2';
$user = 'egyptTravel-3939f1b2';
$pass = '3Ci6sZx}/a.*';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // في حالة فشل الاتصال
    die("Database connection failed: " . $e->getMessage());
}

// مسار الموقع الأساسي لسهولة استخدامه في الروابط
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/');
?>