<?php

/**
 * Tạo URL đầy đủ tới file tĩnh (assets)
 * 
 * @param string $path Đường dẫn tương đối của file (VD: public/assets/css/home.css)
 * @return string URL đầy đủ tới file
 */
function asset($path) {
    $baseUrl = BASE_URL ?? (
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
        "://" . $_SERVER['HTTP_HOST'] . 
        str_replace('public/index.php', '', $_SERVER['SCRIPT_NAME'])
    );

    $path = ltrim($path, '/');
    
    return $baseUrl . $path;
}