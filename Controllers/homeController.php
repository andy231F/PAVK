<?php
include('Models/TweetModel.php');
include('Models/profilUserModel.php');

$tweets = findAllTweet();
$myUser = seeProfil();


// echo "<pre>";
// print_r(($tweets));
// echo "</pre>";


include('Views/homeView.php');

