<?php
include_once ('Connect.php'); //normalement déjà include dans index mais depuis controller $db = null sans cet include
// echo 'MODELS WYSIWYG'.PHP_EOL;
function insertTweet($cols, $values, $tweet) {
    
    global $db;

    try {
        $sql = "INSERT INTO tweet ($cols) SELECT $values FROM user 
        WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '{$_COOKIE['Twitter_connected']}';";

        $stmt = $db->prepare($sql);
        $stmt->execute($tweet);

        echo "Nouveau tweet ajouté: " . $db->lastInsertId();
    
    } catch (PDOException $e) {
        echo "ERR: " . $e->getMessage();
    }
}

function insertHashtag($newTag) {

    global $db;

    try {
        $sql = "INSERT INTO hashtag (name) SELECT ? WHERE NOT EXISTS (SELECT name FROM hashtag WHERE binary name = ?);";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(1, $newTag);
        $stmt->bindParam(2, $newTag);
        $stmt->execute();

        echo "Nouveau hashtag ajouté: " . $db->lastInsertId();
        
    } catch (PDOException $e) {
        echo "ERR: " . $e->getMessage();
    }
}

// SELECT CASE WHEN id = NULL THEN :hashtag END FROM hashtag;
// SELECT :hashtag FROM hashtag WHERE id ISNULL;