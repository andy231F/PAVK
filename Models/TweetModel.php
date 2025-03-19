<?php

function findAllTweet()
{
    global $db;

    $sql = "SELECT tweet.id, user.id AS 'user_id', user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to, DATE_FORMAT(tweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM tweet
    JOIN user ON id_user = user.id 
    ORDER BY tweet.creation_date DESC";


    $requete = $db->query($sql);
    $res = $requete->fetchAll();


    //fetch les retweet
    $sql = "SELECT user.id,user.username AS 'retweetName',tweet.id, user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to,  DATE_FORMAT(retweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM retweet
    INNER JOIN tweet on id_tweet=tweet.id 
    INNER JOIN user on tweet.id_user=user.id 
    INNER JOIN user AS usr ON retweet.id_user=usr.id";

    $requete = $db->query($sql);
    $res2 = $requete->fetchAll();
    foreach ($res2 as $key => $rt) {
        // ajoute la mention 'retweet' dans la table
        $rt['retweet'] = "OUI";
        array_push($res, $rt);
    }


    //garde que les tweet et pas les réponse;
    foreach ($res as $key => $tweet) {
        if (!is_null($tweet['reply_to'])) {

            unset($res[$key]);
        } else {
            $res[$key]['replies'] = findReplietothistweet($tweet['id']);
        }
    }

    //retrie par date
    usort($res, function ($a, $b) {
        return strtotime($b['creation_date']) - strtotime($a['creation_date']);
    });

    $res = Count_Like_and_tweet($res);


    return $res;
}

function findReplietothistweet($tweet)
{
    global $db;
    $sql = "SELECT * FROM tweet where reply_to='$tweet'";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();

    foreach ($res as $key => $value) {
        $sql = "SELECT username,display_name,picture FROM user where id='$value[id_user]'";
        $requete = $db->query($sql);
        $user = $requete->fetch();
        $res[$key]['userinfo'] = $user;
    }

    return $res;
}

function findAllTweetByUser($user)
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



function findAllTweetByUserConnected()
{

    global $db;
    $cookie = $_COOKIE['Twitter_connected'];

    $sql = "SELECT tweet.id, user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to, DATE_FORMAT(tweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM tweet JOIN user on user.id=id_user 
    WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '$cookie' 
    ORDER BY creation_date DESC";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();



    //fetch les retweet
    $sql = "SELECT usr.id,usr.username AS 'retweetName',tweet.id, user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to,  DATE_FORMAT(retweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM retweet
    INNER JOIN tweet on id_tweet=tweet.id 
    INNER JOIN user on tweet.id_user=user.id 
    INNER JOIN user AS usr ON retweet.id_user=usr.id WHERE MD5(CONCAT(retweet.id_user,'pavkis the best KVAp')) = '$cookie'";

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

    //retrie par date
    usort($res, function ($a, $b) {
        return strtotime($b['creation_date']) - strtotime($a['creation_date']);
    });

    $res = Count_Like_and_tweet($res);

    return $res;
}


function findAllTweetByHashtag($hashtag)
{

    global $db;
    $sql = "SELECT tweet.id, user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to, DATE_FORMAT(tweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM tweet JOIN user ON user.id=id_user WHERE content LIKE '%#$hashtag%' ORDER BY creation_date DESC";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();


    //garde que les tweet et pas les réponse;
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



function Count_Like_and_tweet($res)
{
    global $db;
    //compte les likes =>
    foreach ($res as $key => $tweet) {
        $id = $tweet['id'];
        $sql = "SELECT * from likes WHERE id_tweet=$id";
        $requete = $db->query($sql);
        $compte = $requete->fetchAll();
        $res[$key]['like_Count'] = count($compte);
    }

    //compte les retweet =>
    foreach ($res as $key => $tweet) {
        $id = $tweet['id'];
        $sql = "SELECT * from retweet WHERE id_tweet=$id";
        $requete = $db->query($sql);
        $compte = $requete->fetchAll();
        $res[$key]['retweet_Count'] = count($compte);
    }
    return $res;
}


function findAllTweetBookmarked()
{

    global $db;
    $cookie = $_COOKIE['Twitter_connected'];
    $sql = "SELECT bookmark.id_tweet,bookmark.id_user, tweet.id, user.id AS 'user_id', user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to, DATE_FORMAT(tweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM bookmark JOIN tweet ON tweet.id = bookmark.id_tweet JOIN user ON user.id = tweet.id_user  WHERE
    MD5(CONCAT(bookmark.id_user, 'pavkis the best KVAp')) = '$cookie'";
    $requete = $db->query($sql);
    $res = $requete->fetchAll();



    if (!$res) {
        global $message;
        $message = "Tu n'as rien enregistrer ici !";
        return $message;
    } else {
        //garde que les tweet et pas les réponse;bash
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
}



function findAllTweetLikedByConnectedUser()
{

    global $db;
    $cookie = $_COOKIE['Twitter_connected'];

    $sql = "SELECT likes.id_user, tweet.id, tweet.id_user, user.username, user.display_name, user.picture, tweet.content, tweet.media1, tweet.media2, tweet.media3, tweet.media4, tweet.reply_to, DATE_FORMAT(tweet.creation_date, '%H:%i %d %b %y') AS 'creation_date' 
    FROM likes JOIN user ON likes.id_user = user.id JOIN tweet ON likes.id_tweet = tweet.id 
    WHERE MD5(CONCAT(likes.id_user, 'pavkis the best KVAp')) = '$cookie'
    ORDER BY creation_date DESC";

    // var_dump($cookie);
    $requete = $db->query($sql);
    $res = $requete->fetchAll();



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