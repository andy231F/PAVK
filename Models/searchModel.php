<?php
function hashtag($hashtag)
{

    global $db;
    $sql = "SELECT name from hashtag where name like '%$hashtag%'";

    $requete = $db->query($sql);
    $response = $requete->fetch();
    return $response;
}

function Allhashtags()
{

    global $db;
    $sql = "SELECT name from hashtag";

    $requete = $db->query($sql);
    $response = $requete->fetchAll();
    return $response;
}

