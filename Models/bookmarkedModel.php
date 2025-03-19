<?php

include_once('Connect.php');
include_once('profilUserModel.php');
$user = seeProfil();
$userID = $user['id'];


if(isset($_GET['id'])){
    global $db;
    $idBookmark = $_GET['id'];
    $sql = "SELECT * from bookmark where id_user ='$userID' AND id_tweet = '$idBookmark'";
    $requete = $db->query($sql);
    $response = $requete->fetch();
    echo json_encode($response);
}

if (isset($_POST['add'])) {
    global $db;

    $idTweet = $_POST['add'];

    $sql = "INSERT INTO `bookmark` (id_user, id_tweet) VALUES ('$userID','$idTweet')";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
    echo json_encode($cmnd);
}


if (isset($_POST['supprimer'])) {
    global $db;

    $idTweet = $_POST['supprimer'];
    $sql = "DELETE FROM bookmark WHERE id_tweet = '$idTweet'";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
    echo json_encode($cmnd);
}




// include('TweetModel.php');
// // $tweets_id_bookmark = findAllTweet();
// echo '<pre>';
// var_dump($tweets_id_bookmark);
// echo '</pre>';
// // $userDuTweetBookmarked = $userDuTweet['id_tweet'];
// // var_dump($user);
// // var_dump($userDuTweetBookmarked);
// if (isset($_POST['add'])) {
//     global $db;

//     $idTweet = $_POST['add'];
//     // $userDuTweet = $tweet['id'];

//     $sql = "INSERT INTO `bookmark` (id_user, id_tweet) VALUES ('$bmIds','$idTweet')";
//     $cmnd = $db->prepare($sql);
//     $cmnd->execute();
//     echo json_encode($cmnd);
// }


// if (isset($_POST['supprimer'])) {
//     global $db;

//     $idTweet = $_POST['supprimer'];
//     $sql = "DELETE FROM bookmark WHERE id_tweet = '$idTweet'";
//     $cmnd = $db->prepare($sql);
//     $cmnd->execute();
//     echo json_encode($cmnd);
// }









