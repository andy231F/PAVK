<?php
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        "Twitter_connected",
        "$hash",
        0,
        $path = "",
        $domain = "",
        $secure = true,
        $httponly = true
    );
    header('Location: ' . '/login');
}
