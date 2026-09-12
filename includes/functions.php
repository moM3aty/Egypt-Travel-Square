<?php
// Path: /includes/functions.php

if (!function_exists('get_image_url')) {
    function get_image_url($path, $type = 'placeholder') {
        
        // 1. لو الصورة من رابط خارجي (زي Unsplash) نرجع الرابط زي ما هو
        if (strpos($path, 'http://') === 0 || strpos($path, 'https://') === 0) {
            return $path;
        }

        // 2. الكشف الذكي: هل نحن داخل لوحة التحكم أم في الموقع الأمامي؟
        $is_admin = (strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false);

        // 3. لو مفيش صورة (المسار فاضي)، نرجع الصورة الافتراضية بالمسار الصحيح
        if (empty($path)) {
            return $is_admin ? '../assets/images/default-' . $type . '.jpg' : 'assets/images/default-' . $type . '.jpg';
        }

        // 4. إرجاع مسار الصورة المرفوعة بناءً على مكان تواجد المستخدم
        return $is_admin ? 'uploads/' . $path : 'admin/uploads/' . $path;
    }
}
?>