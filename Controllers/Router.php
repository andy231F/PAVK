<?php

    if(isset($_SERVER['PATH_INFO'])){
        $path = $_SERVER['PATH_INFO'];
    }else{
        $path = "/home";
    }
    
    switch ($path) {
        case '/home':
            include('Controllers/homeController.php');
            break;
        case '/login':
            include('Controllers/loginController.php');
            break;
        case '/user':
            include('Controllers/userController.php');
            break;
        case '/subscription':
            include('Controllers/subscriptionController.php');
            break;
        case '/message':
            include('Controllers/messageController.php');
            break;
        case '/profil':
            include('Controllers/profilController.php');
            break;
        case '/editProfile':
            include('Controllers/editProfilController.php');
            break;
                
        case '/composeTweet':
            include('Controllers/wysiwygController.php');
            break;
        case '/settings':
            include('Controllers/settingsController.php');
            break;
        // case '/emojis':
        //     include('Controllers/emojisController.php');
        //     break;
        case '/search':
            include('Controllers/searchController.php');
            break;
        case '/logout':
            include('Controllers/logoutController.php');
            break;
        case '/save':
            include('Controllers/bookmarkController.php');
            break;

    default:
            echo('<p class="error404 text-black dark:text-white">404</p>');
            break;
    }


     
