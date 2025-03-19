<?php


function findUserByid($id)
{
    global $db;
    $sql = "SELECT * from user WHERE id = '$id'";
    $requete = $db->query($sql);
    $res = $requete->fetch();
    return $res;
}

function findUserByLogin($login)
{
    global $db;
    $sql = "SELECT * from user WHERE pseudo ='$login' OR email='$login'";
    $requete = $db->query($sql);
    $res = $requete->fetch();
    return $res;
}

function findUserByUsername($user)
{
    global $db;
    $sql = "SELECT * from user WHERE username ='$user'";
    $requete = $db->query($sql);
    $res = $requete->fetch();
    return $res;
}


function nbrAbonneesByUser($user)
{
    global $db;
    $sql = "SELECT COUNT(follow.id_user_follow) AS total_abonnenment, user.username FROM follow
        JOIN user ON user.id = follow.id_user_follow WHERE user.username ='$user'
        GROUP BY user.username";

    $requete = $db->query($sql);

    $res = $requete->fetch();
    return $res;
}


function nbrAbonnementsByUser($user)
{
    global $db;
    $sql = "SELECT COUNT(follow.id_user_followed) AS total_abonnes, user.username FROM follow
        JOIN user ON user.id = follow.id_user_followed WHERE user.username ='$user'
        GROUP BY user.username";

    $requete = $db->query($sql);

    $res = $requete->fetch();
    return $res;
}




function findAllTweetByUsersSearched($user)
{

    global $db;
    $sql = "SELECT tweet.id,user.id AS 'iduser', user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to, DATE_FORMAT(tweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM tweet JOIN user ON user.id=id_user WHERE username = '$user' 
    ORDER BY creation_date DESC";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();

    if (!$res) {
        return false;
    }


    $id = $res[0]['iduser'];


    //fetch les retweet
    $sql = "SELECT usr.id,usr.username AS 'retweetName',tweet.id, user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to,  DATE_FORMAT(retweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM retweet
    INNER JOIN tweet on id_tweet=tweet.id 
    INNER JOIN user on tweet.id_user=user.id 
    INNER JOIN user AS usr ON retweet.id_user=usr.id WHERE retweet.id_user = $id";

    $requete = $db->query($sql);
    $res2 = $requete->fetchAll();
    foreach ($res2 as $key => $rt) {
        // ajoute la mention 'retweet' dans la table
        $rt['retweet'] = "OUI";
        array_push($res, $rt);
    }

    foreach ($res as $key => $tweet) {
        if (!is_null($tweet['reply_to'])) {

            unset($res[$key]);
        } else {
            $res[$key]['replies'] = findReplietothistweet($tweet['id']);
        }
    }

    $res = Count_Like_and_tweet($res);

    return $res;
}