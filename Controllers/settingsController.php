<?php
ini_set('display_errors', 0); //pour que les warnings/fatal errors ne s'affichent pas

include_once('Models/settingsModel.php');


$changemdp = changePassword();
echo $changemdp;
$myUserInfos = settingsCompte();
// $id_user = $myUserInfos['id'];


// echo "<pre>";
// print_r($myUserInfos);
// echo "</pre>";
include_once('Views/settingsView.php');