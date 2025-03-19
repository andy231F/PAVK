<?php

include('Connect.php');
include('profilUserModel.php');

$user = seeProfil();
$userID = $user['id'];


if(isset($_POST['id'])){
    $idTweet = $_POST['id'];
    $content = $_POST['content'];
    $sql = "INSERT INTO tweet (id_user, reply_to, content, creation_date) VALUES ('$userID', '$idTweet', '$content', NOW())";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
    
    $user['comment'] = $content;
    echo json_encode($user);
}