<?php
ini_set('display_errors', 0);

//avec les deux points warning sur index / sans les deux points warning sur controller + insertTweet undefined
include ('../Models/wysiwyg.php'); 
// echo realpath('Models/wysiwyg.php');
// include_once ('Models/searchModel.php');
// $user = seeProfil();

// echo "<pre>";
// var_dump($_POST);
// var_dump($_FILES);
// echo "</pre>";

function inputSanitize($str){
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    return $str;
}

function generateShortURL(){
    $str = md5(str_replace(".", "V", str_shuffle(uniqid(bin2hex(random_bytes(8)), true))));
    $offset = rand(strlen($str) / 2, strlen($str) - 1);
    $sTr = substr_replace($str, strtoupper($str), $offset);
    $offset = rand(0, strlen($str) - 8);
    $six = substr(str_shuffle($sTr), $offset, 6);
    return $six;
}

function getHashtags($str){
    // $pattern = "/(?<=^#|\s#|\b#)\w+/";
    $pattern = "/(?<=^#|\s#)\w+/";
    preg_match_all($pattern, $str, $matches);
    return $matches[0];
}

$max_size = 2.5 * 1024 * 1024;

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    for ($t = 1; $t <= count($_POST); $t++) 
    {
        $cols = "id_user";
        $values = "user.id";
        $execute = [];

        if (isset($_POST["tweet{$t}"]['content']) && !empty($_POST["tweet{$t}"]['content'])) 
        {
            $cols .= ", content";
            $values .= ", :content";
            $execute['content'] = inputSanitize($_POST["tweet{$t}"]['content']);

            $newHashtags = getHashtags($execute['content']);
            var_dump($newHashtags);

            if (isset($_FILES["tweet{$t}_medias"]) && !empty($_FILES["tweet{$t}_medias"]['name'])) 
            {
                
                $n = 1;
                if ($n <= count($_FILES["tweet{$t}_medias"]['name']) && count($_FILES["tweet{$t}_medias"]['name']) <= 4) 
                {
                    
                    for ($i = 0; $i < count($_FILES["tweet{$t}_medias"]['name']); $i++)
                    {

                        if ($_FILES["tweet{$t}_medias"]['error'][$i] != UPLOAD_ERR_OK) 
                        {
                            echo "Erreur lors du téléchargement du fichier {$_FILES["tweet{$t}_medias"]['name'][$i]}." . PHP_EOL;
                            continue;
                        }

                        // echo $i;
                        if ($_FILES["tweet{$t}_medias"]['size'][$i] > $max_size) 
                        {
                            echo "{$_FILES["tweet{$t}_medias"]['name'][$i]} est trop lourd" . PHP_EOL;
                        } 
                        else 
                        {
                            $name = preg_replace('/[,;|\'\s+\"]/', "-", inputSanitize($_FILES["tweet{$t}_medias"]['name'][$i]));
                            $newMedia = "../Assets/uploads/$name";
                            $tmpMedia = $_FILES["tweet{$t}_medias"]['tmp_name'][$i];
                            if (move_uploaded_file($tmpMedia, $newMedia)) 
                            {
                                $imgUrls = json_decode(file_get_contents('../Assets/Javascript/imgUrls.json'), 1);
                                $newUrl = generateShortURL();
                                // var_dump($newUrl);

                                $imgUrls[$newUrl] = "Assets/uploads/$name";
                                // var_dump($imgUrls);

                                file_put_contents('../Assets/Javascript/imgUrls.json', json_encode($imgUrls));

                                $cols .= ", media$n";
                                $values .= ", :media$n";
                                // $execute["media$n"] = $newUrl;
                                $execute["media$n"] = "Assets/uploads/$name";

                                $n++;


                            } 
                            else 
                            {
                                echo "Téléchargement du {$name} échoué" . PHP_EOL;
                            }

                        }
                    }
                } 
                else 
                {
                    echo "Vous ne pouvez ajouter que 4 médias par tweet... le téléchargement n'a pas pu aboutir." . PHP_EOL;
                }

               
           
                echo $cols . PHP_EOL;
                echo $values . PHP_EOL;
                var_dump($execute);

            } 
            else 
            {
                echo "Aucun média n'a été téléchargé !" . PHP_EOL;
            } 

            insertTweet($cols, $values, $execute);
            foreach($newHashtags as $hashtag) {
                insertHashtag($hashtag);
                echo $hashtag . 'added'.PHP_EOL;
            }
        } 
        else 
        {
            echo "Votre tweet ne contient pas de message !" . PHP_EOL;
        }
    }
}

    include_once ('Models/profilUserModel.php'); 
    // $user = seeProfil();

    include ('Views/wysiwygView.php');

// $cols 
