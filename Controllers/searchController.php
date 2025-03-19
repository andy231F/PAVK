<?php
require_once "Models/TweetModel.php";
include('Models/profilUserModel.php');
include('Models/searchModel.php');



if(isset($_GET['hashtag'])){
    $hashtag = $_GET['hashtag'];
    $tweetHashtags = findAllTweetByHashtag($hashtag);
}
$myUser = seeProfil();

$allHashtags = Allhashtags();


// var_dump($tweetHashtags);
require_once "Views/searchView.php";