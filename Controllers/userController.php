<?php

include_once('Models/TweetModel.php');
include_once('Models/userFinderModel.php');
include_once('Models/profilUserModel.php');



$user = $_GET['user'];


$tweets = findAllTweetByUsersSearched($user);

if($tweets){
    
    $userConnectedInfos = findUserByUsername($user);
    $id_user = $userConnectedInfos['id'];
    $mediasByMe = seeAllPhotosPostedByME($id_user);

    $myUser = seeProfil();
    $userInfo = findUserByUsername($user);
    
    $dp = ($userInfo['picture']) ? $userInfo['picture'] : 'Assets/img/profiles/img_1.jpg';
    $banner = ($userInfo['header']) ? $userInfo['header'] : 'Assets/img/headers/bannier_default.jpg';
    
    $followersUser = nbrAbonneesByUser($user);
    $followingUser = nbrAbonnementsByUser($user);
    
    $m_y = creationCompte();
    //redirection si son profil
    if($userInfo['username'] == $myUser['username'] ){
        header('Location: /profil');
    }
    include('Views/userView.php');
}else{
    include('Views/404.php');

}



