<?php

include('Connect.php');
include('profilUserModel.php');

$user = seeProfil();
$userID = $user['id'];


if(isset($_POST['add'])){
    $idTweet = $_POST['add'];
    $sql = "INSERT into retweet (id_user,id_tweet) VALUES('$userID','$idTweet')";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
    echo json_encode($cmnd);
}

if(isset($_POST['supp'])){
    $idTweet = $_POST['supp'];
    $sql = "DELETE from retweet where id_user ='$userID' AND id_tweet = '$idTweet'";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
    echo json_encode($cmnd);
}

if(isset($_GET['id'])){
    $idTweet = $_GET['id'];
    $sql = "SELECT * from retweet where id_user ='$userID' AND id_tweet = '$idTweet'";
    $requete = $db->query($sql);
    $response = $requete->fetch();
    echo json_encode($response);
}



?>