<?php

function seeProfil()
{
    global $db;
    $cookie = $_COOKIE['Twitter_connected'];
    $sql = "SELECT * FROM user WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '$cookie'
        GROUP BY user.id";
    $requete = $db->query($sql);
    $res = $requete->fetch();
    return $res;
}

function nbrAbonnees()
{
    global $db;
    $cookie = $_COOKIE['Twitter_connected'];
    $sql = "SELECT COUNT(follow.id_user_follow) AS total_abonnenment, user.username FROM follow
        JOIN user ON user.id = follow.id_user_follow WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '$cookie'
        GROUP BY user.username";

    $requete = $db->query($sql);

    $res = $requete->fetch();
    return $res;
}
// var_dump($_COOKIE['Twitter_connected']);

function nbrAbonnements()
{
    global $db;
    $cookie = $_COOKIE['Twitter_connected'];
    $sql = "SELECT COUNT(follow.id_user_followed) AS total_abonnes, user.username FROM follow
        JOIN user ON user.id = follow.id_user_followed WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '$cookie'
        GROUP BY user.username";

    $requete = $db->query($sql);

    $res = $requete->fetch();
    return $res;
}


function creationCompte(){
    global $db;
    $sql = "SELECT CONCAT(MONTHNAME(creation_date), ' ', YEAR(creation_date)) AS m_y FROM user";
    $requete = $db->query($sql);

    $res = $requete->fetch();
    return $res;
}

function GetAllInfoAbonnement($id){
    global $db;
    $sql = "SELECT username,id,picture from user INNER JOIN follow on id_user_followed=user.id WHERE id_user_follow = '$id'";
    $requete = $db->query($sql);

    $res = $requete->fetchAll();
    return $res;
}

function GetAllInfoAbonne($id){
    global $db;
    $sql = "SELECT username,id from user INNER JOIN follow on id_user_follow=user.id WHERE id_user_followed = '$id'";
    $requete = $db->query($sql);

    $res = $requete->fetchAll();
    return $res;
}

function GetallConversation($id){
    global $db;
    $sql = "SELECT username,user.id,picture from user INNER JOIN message ON (id_sender=$id OR id_receiver=$id) GROUP BY username";
    $requete = $db->query($sql);

    $res = $requete->fetchAll();
    return $res;
}


function followSomeone($user)
{
    global $db;
    $sql = "SELECT * from user WHERE username ='$user'";
    $requete = $db->query($sql);
    $res = $requete->fetch();
    return $res;
}


// INSERT INTO follow (id_user_follow, id_user_followed) VALUES ('10', '4');


function seeAllPhotosPostedByME($id_user)
{
    global $db;
    $sql = "SELECT tweet.media1, tweet.media2, tweet.media3, tweet.media4 FROM tweet 
    WHERE tweet.id_user ='$id_user'";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();
    return $res;
}


function seeAllRepliesByMe($id_user)
{
    global $db;
    $sql = "SELECT * FROM tweet 
    INNER JOIN user on id_user=user.id
    WHERE tweet.id_user ='$id_user'";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();


    foreach ($res as $key => $tweet) {
        if (is_null($tweet['reply_to'])) {

            unset($res[$key]);
        } 
    }


    return $res;
}


function GetAllContact(){
    global $db;
    $sql = "SELECT username,id,picture FROM user";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();

    return $res;

}

function suggestProfil($all){
    global $db;
    $cookie = $_COOKIE['Twitter_connected'];

    foreach ($all as $key => $contact) {
        $id = $contact['id'];
        $sql = "SELECT * FROM follow WHERE MD5(CONCAT(id_user_follow,'pavkis the best KVAp')) = '$cookie' AND id_user_followed = '$id'";
        $requete = $db->query($sql);
        $res = $requete->fetchAll();
        if($res){
            unset($all[$key]);
        }
       
    }

    return $all;
}