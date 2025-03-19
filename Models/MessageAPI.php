<?php
include('Connect.php');

$data = json_decode(file_get_contents('php://input'));

if (isset($data->methode)) {
    $methode = $data->methode;
} else {
    $methode = "GET";
}
$coockie = $_COOKIE['Twitter_connected'];

if ($methode == "GET") {
    $myId = $data->myId;
    $dest = $data->dest;

    $sql = "SELECT * from message WHERE (id_sender = '$myId' OR id_receiver =  '$myId') AND (id_sender = '$dest' OR id_receiver =  '$dest') ORDER BY date DESC";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();
    echo json_encode(["res" => $res]);
}
if ($methode == "POST") {
    $msg = $data->message;
    $dest = $data->dest;

    $myId = $data->myId;
    $sql = "INSERT into message (id_sender,id_receiver,content) VALUES('$myId','$dest','$msg')";
    $cmnd = $db->prepare($sql);
    $cmnd->execute();
    echo json_encode(["res" => $msg]);
}
