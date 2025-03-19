<?php
if (!isset($_COOKIE['Twitter_connected']) && $_SERVER['PATH_INFO'] != "/login" && $_SERVER['PATH_INFO'] != "/subscription" && !isset($_POST['login'])){
    header('Location: '.'/login');
}


if(isset($_POST['logout'])){
    unset($_COOKIE['Twitter_connected']);
    setcookie('Twitter_connected', '', -1, '/');
    header('Location: '.'/login');
}
