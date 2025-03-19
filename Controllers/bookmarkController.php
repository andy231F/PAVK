<?php

include('Models/TweetModel.php');
include('Models/profilUserModel.php');


$bookmarkedTweets = findAllTweetBookmarked();
$myUser = seeProfil();


include('Views/bookmarkView.php');