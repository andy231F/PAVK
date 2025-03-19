<?php
include('Connect.php');

$post_json = file_get_contents('php://input');
$sessionJSON = json_decode($post_json, true);
$response = [];

$MyId = $sessionJSON[0];
$FollowId = $sessionJSON[1];
$function = $sessionJSON[2];

if ($function == "Follow") {
    $sql = "INSERT into follow (id_user_follow,id_user_followed) VALUES('$MyId','$FollowId')";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
}
if ($function == "UnFollow") {
    $sql = "DELETE from follow WHERE id_user_follow = $MyId AND id_user_followed = $FollowId";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
}
if ($function == "GET") {
    $sql = "SELECT * from follow WHERE id_user_follow = $MyId AND id_user_followed = $FollowId";
    $requete = $db->query($sql);
    $response = $requete->fetch();
}

echo json_encode(["BodyInput" => $sessionJSON, "response" => $response]);
