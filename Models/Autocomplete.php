<?php

include('Connect.php');



if(isset($_POST['hashtag'])){
    $hashtag = $_POST['hashtag'];

    $sql = "SELECT * from hashtag WHERE name LIKE  '$hashtag%' LIMIT 5";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();

    echo json_encode($res);
}

if(isset($_POST['profil'])){
    $profil = $_POST['profil'];

    $sql = "SELECT username AS 'name' from user WHERE username LIKE '$profil%' LIMIT 5";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();

    echo json_encode($res);
}