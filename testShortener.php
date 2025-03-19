<?php

function generateShortURL() {
    $str = md5(str_replace(".", "V",str_shuffle(uniqid(bin2hex(random_bytes(8)), true))));
    $offset = rand(strlen($str)/2,strlen($str)-1);
    $sTr = substr_replace($str, strtoupper($str), $offset);
    echo $str .PHP_EOL;
    $offset = rand(0,strlen($str)-8);
    // $six = bin2hex(random_bytes(8));
    $six = substr(str_shuffle(str_shuffle($sTr)), $offset, 6);
    return $six;
}

// echo generateShortURL();

function getHashtags($str) {
    $pattern = "/(?<=^#|\s#|\b#)\w+/";
    preg_match_all($pattern, $str, $matches);
    return $matches[0];
}

// $str = "Vous avez été tirée au sort #OneLife #Joy3uX #_oui #ma_n0N #lookAtTh!s";

// echo $str . PHP_EOL;
// var_dump(getHashtags($str));
