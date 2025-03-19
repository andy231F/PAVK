<?php
include 'Models/editProfil.php';
include_once('Models/profilUserModel.php');

$user = seeProfil();
$username = $user['username'];

function inputSanitize($str)
{
    $str = trim($str);
    $str = stripslashes($str);
    $str = htmlspecialchars($str);
    return $str;
}

$editMsg = "";
$toUpdate = [];
$newValue = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo "<pre>"; var_dump($_POST,  $_FILES); echo "</pre>";

    if (isset($_POST['firstname']) && !empty($_POST['firstname']) && (isset($_POST['lastname']) && !empty($_POST['lastname']))) {

        $toUpdate['firstname'] = 'firstname = :firstname';
        $newValue['firstname'] = inputSanitize($_POST['firstname']);

        $toUpdate['lastname'] = 'lastname = :lastname';
        $newValue['lastname'] = inputSanitize($_POST['lastname']);
    }

    if (isset($_POST['display_name'])) {
        if (!empty(trim($_POST['display_name']))) {
            $toUpdate['display_name'] = 'display_name = :display_name';
            $newValue['display_name'] = inputSanitize($_POST['display_name']);
        } else {
            $toUpdate['display_name'] = 'display_name = CONCAT(firstname, " ", lastname)';
        }
    }

    if (isset($_POST['url'])) {
        if (!empty(trim($_POST['url']))) {
            $toUpdate['url'] = 'url = :url';
            $newValue['url'] = inputSanitize($_POST['url']);
        } else {
            $toUpdate['url'] = 'url = default';
        }
    }

    if (isset($_POST['biography'])) {
        if (!empty(trim($_POST['biography']))) {
            $toUpdate['biography'] = 'biography = :biography';
            $newValue['biography'] = inputSanitize($_POST['biography']);
        } else {
            $toUpdate['biography'] = 'biography = default';
        }
    }

    if (isset($_POST['city'])) {
        if (!empty(trim($_POST['city']))) {
            $toUpdate['city'] = 'city = :city';
            $newValue['city'] = inputSanitize($_POST['city']);
        } else {
            $toUpdate['city'] = 'city = default';
        }
    }

    if (isset($_POST['country'])) {
        if (!empty(trim($_POST['country']))) {
            $toUpdate['country'] = 'country = :country';
            $newValue['country'] = inputSanitize($_POST['country']);
        } else {
            $toUpdate['country'] = 'country = default';
        }
    }

    $max_size = 2.5 * 1024 * 1024;

    //set header

    
    if(isset($_FILES['header']['name']) && !empty($_FILES['header']['name']) && empty($_FILES['error']))
    {
        if ($_FILES['header']['size'] > $max_size)
        {
            $editMsg .= 'Header trop lourd' . PHP_EOL;
        }
        else 
        {
            $newImage = "Assets/uploads/{$username}_header.". pathinfo($_FILES['header']['name'], PATHINFO_EXTENSION); // . basename($_FILES['header']['name']);
            $tmpName = $_FILES['header']['tmp_name'];
            if(move_uploaded_file($tmpName, $newImage))
            {
                // echo 'Header téléchargé' . PHP_EOL;
                $image_info = getimagesize($newImage);

                $width = $image_info[0];
                $height = $image_info[1];
                $mime = $image_info['mime'];

                switch ($mime) {
                    case 'image/jpeg':
                        $picture = imagecreatefromjpeg($newImage);
                        break;
                    case 'image/png':
                        $picture = imagecreatefrompng($newImage);
                        break;
                    case 'image/webp':
                        $picture = imagecreatefrompng($newImage);
                        break;
                    default:
                        $editMsg .= 'Veuillez choisir une image de type jpeg/jpg, png ou webp' . PHP_EOL;
                }

                $new_Width = 1500;
                $new_Height = 500;
                $new_Picture = imagecreatetruecolor($new_Width, $new_Height);

                imagecopyresampled($new_Picture, $picture, 0, 0, 0, ($height / 2) - (($width / 3) / 2), $new_Width, $new_Height, $width, $width / 3);
                imagejpeg($new_Picture, "Assets/img/headers/{$username}_header" . image_type_to_extension(IMAGETYPE_JPEG));
                print_r($image_info);
                unlink($newImage);

                $toUpdate['header'] = 'header = :header';
                $newValue['header'] = "Assets/img/headers/{$username}_header" . image_type_to_extension(IMAGETYPE_JPEG);

            }
            else
            {
                $editMsg .= 'Téléchargement du header échoué.' . PHP_EOL;
            }
        } 
    }
    else
    {
        $editMsg .= "Vous n'aviez pas choisi de header !!!";
    }

    //set picture

    if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name']) && empty($_FILES['error']))
    {
        if ($_FILES['picture']['size'] > $max_size)
        {
            $editMsg .= 'Taille de photo trop grande' . PHP_EOL;
        }
        else 
        {
            $newImage = "Assets/uploads/{$username}_profilPicture." . pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
            $tmpName = $_FILES['picture']['tmp_name'];
            if(move_uploaded_file($tmpName, $newImage))
            {
                // echo 'Photo de profil téléchargée' . PHP_EOL;
                $image_info = getimagesize($newImage);

                $width = $image_info[0];
                $height = $image_info[1];
                $mime = $image_info['mime'];

                switch ($mime) {
                    case 'image/jpeg':
                        $picture = imagecreatefromjpeg($newImage);
                        break;
                    case 'image/png':
                        $picture = imagecreatefrompng($newImage);
                        break;
                    case 'image/webp':
                        $picture = imagecreatefrompng($newImage);
                        break;
                    default:
                        $editMsg .= 'Veuillez choisir un format de photo de type jpeg/jpg, png ou webp.' . PHP_EOL;
                }

                $new_Size = 400;
                $new_Picture = imagecreatetruecolor($new_Size, $new_Size);

                imagecopyresampled($new_Picture, $picture, 0, 0, 0, 0, $new_Size, $new_Size, $width, $width);
                imagejpeg($new_Picture, "Assets/img/profiles/{$username}_profile" . image_type_to_extension(IMAGETYPE_JPEG));
                print_r($image_info);

                unlink($newImage);

                $toUpdate['picture'] = 'picture = :picture';
                $newValue['picture'] = "Assets/img/profiles/{$username}_profile".image_type_to_extension(IMAGETYPE_JPEG);
            
            }
            else
            {
                $editMsg .= 'Le chargement de la photo de profil a échoué. ' . PHP_EOL;
            }
        }
        
    }
    else
    {
        $editMsg .= "Vous n'aviez pas choisi de photo de profil !!!";
    }
    // var_dump($toUpdate);
    $toUpdate = implode(' , ', $toUpdate);
    // echo $toUpdate;

    // var_dump($newValue);
    // echo "<pre>";
    // $newValue = implode(' , ', $newValue);
    // var_dump($newValue);
    // echo "</pre>";

    // if(!empty($toUpdate) && !empty($newValues)) {
    $editMsg = editProfil($toUpdate, $newValue);
    // } else {
        // echo $editMsg;
        // header('Location: /profil');
    // }
    
}
// echo $editMsg;
// header('Location: /profil');

// include 'Views/editProfilView.php';
