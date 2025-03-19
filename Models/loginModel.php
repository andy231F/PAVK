<?php

     function TestLogin($login,$testmdp){

        global $db;
        $sql = "SELECT * from user WHERE email = '$login' OR username = '$login' ";
        $requete = $db->query($sql);
        $res = $requete->fetch();
        if($res){
            $hashPassword = $res["password"];
            $testHashPass = hash(
                'ripemd160',
                'vive le projet tweet_academy'.$testmdp
           );
    
            if($testHashPass == $hashPassword){
                if(!$res['is_active']){
                    return 'Compte Supprimé !';
                }else{
                    return $res;
                }
            }else{
                return "mauvais mot de passe";
            }
        }else{
            return 'Auncun compte assosié à ce mail/pseudo';
        }

    }
