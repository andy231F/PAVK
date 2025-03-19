<?php
include_once('Models/TweetModel.php');
include_once('Models/profilUserModel.php');
include_once('Models/subscriptionModels.php');

$myUser = seeProfil();
$myUserInfos = seeProfil();
$id_user = $myUserInfos['id'];
$followingUser = nbrAbonnements();
$followersUser = nbrAbonnees();
$m_y = creationCompte();

$tweets = findAllTweetByUserConnected();
$tweetsLikedByMe = findAllTweetLikedByConnectedUser();

// echo "<pre>";
// print_r($tweetsLikedByMe);
// echo "</pre>";
$allTweets = findAllTweet();
$mediasByMe = seeAllPhotosPostedByME($id_user);

$repliesByMe = seeAllRepliesByMe($id_user);
// $id_user = $repliesByMe['reply_to'];

// echo "<pre>";
// // print_r($repliesbyme);
// // print_r($mediasByMe);
// echo "</pre>";

$userInfo = $myUser;

$dp = ($myUser['picture']) ? $myUser['picture'] : 'Assets/img/profiles/img_1.jpg';
$banner = ($myUser['header']) ? $myUser['header'] : 'Assets/img/headers/bannier_default.jpg';

if (isset($_POST['login'])) {
    include('Models/loginModel.php');

    $login = $_POST['login'];
    $mdp = $_POST['passeword'];

    $logged = TestLogin($login, $mdp);

    if (is_array($logged)) {
        $id = $logged['id'];
        $hash = hash(
            'ripemd160',
            'vive le projet tweet_academy' . $id
        );
        setcookie(
            "Twitter_connected",
            "$hash",
            0,
            $path = "",
            $domain = "",
            $secure = true,
            $httponly = true
        );
        header('Location: ' . '/');

    } else {
        $error = $logged;
        echo "<div class='z-40 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-xl text-center w-fit m-auto mt-12' role='alert'>$error</div>";

    }
}
include('Controllers/editProfilController.php');
include_once('Views/profilView.php');