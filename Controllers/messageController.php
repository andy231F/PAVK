<?php
include('Models/profilUserModel.php');
include('Models/userFinderModel.php');


$profil = seeProfil();
$myid = $profil['id'];

$contacts = GetAllInfoAbonnement($myid);
$contacts2 = GetallConversation($myid);
$AllContact = GetAllContact();
foreach ($contacts2 as $key => $value) {
    if(!in_array($value,$contacts) && $value['username'] != $profil['username']){
        array_push($contacts,$value);
    }
}
// echo "<pre>";
// var_dump($contacts2);
// echo "</pre>";


if(isset($_GET['dest'])){
    $dest = findUserByUsername($_GET['dest']);
}


include('Views/messageView.php');