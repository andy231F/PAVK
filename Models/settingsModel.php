<?php
function changePassword()
{
    global $db;
    $cookie = $_COOKIE['Twitter_connected'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {



        if (isset($_POST['mdpNew'])) {
            $mdpNew = $_POST['mdpNew'];
        }
        if (isset($_POST['mdpNewConfirmed'])) {
            $mdpNewConfirmed = $_POST['mdpNewConfirmed'];
        }
        if (isset($_POST['password'])) {
            $password_POST = $_POST['password'];
        }



        $message_res = '<div class= pt-2> <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Info </span>- Votre mot de passe a été mis à jour
                        </div>
                        </div>
                    </div>';

        $message_not_same = '<div class= pt-2> 
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Info </span>- Les mots de passe ne correspondent pas.
                        </div>
                        </div>
                    </div>';

        $message_mdp_actu = '<div class= pt-2> 
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
                        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">Info </span>- Les mots de passe actuel ne correspondent pas.
                        </div>
                        </div>
                    </div>';

        $sqlCheckPassword = "SELECT password FROM user WHERE MD5(CONCAT(user.id,'pavkis the best KVAp')) = '$cookie'";
        $requete = $db->query($sqlCheckPassword);
        $res = $requete->fetch();

        if ($res) {
            $password = $res["password"];

            $hashedPassword = hash(
                'ripemd160',
                'vive le projet tweet_academy' . $password_POST
            );

            if ($hashedPassword === $password) {

                if ($mdpNew !== $mdpNewConfirmed) {
                    return $message_not_same;
                } else {
                    $mdpNewConfirmed = hash('ripemd160', 'vive le projet tweet_academy' . $mdpNew);

                    $sqlUpdatePassword = "UPDATE user SET password = '$mdpNewConfirmed'  WHERE MD5(CONCAT(user.id,'pavkis the best KVAp')) = '$cookie'";
                    $stmt = $db->query($sqlUpdatePassword);
                    $res = $stmt->fetch();

                    return $message_res;

                }
            } else {
                return $message_mdp_actu;
            }
        } else {
            return;
        }
    }
}




function settingsCompte(){
    global $db;
    $cookie = $_COOKIE['Twitter_connected'];
    $sql = "SELECT * FROM user WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '$cookie'";
    $requete = $db->query($sql);
    $res = $requete->fetch();
    return $res;
}

// settingsInactifCompte