<?php
   
//    print_r ($_POST);

if (isset($_POST['email'])) {
    include('Models/subscriptionModels.php');

   
    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error = "L'email est invalide.";
    
    }

    if (!isset($_POST['birthdate']) || empty($_POST['birthdate'])) {
        $error = "Entrez votre date de naissance.";
    } else {
        $birthdate = $_POST['birthdate'];
        $year = date('Y', strtotime($birthdate));
        $currentYear = date('Y');
        $age = $currentYear - $year;
        if ($age < 18) {
            $error = "Ce site est réservé aux +18 ans.";
        } elseif (!isset($_POST['password']) || empty($_POST['password'])) {
            $error = "Entrez un mot de passe.";
        } else {
                $userData = [
                    'firstname'   => htmlspecialchars($_POST['firstname'] ?? ''),
                    'lastname'    => htmlspecialchars($_POST['lastname'] ?? ''),
                    'username'    => htmlspecialchars(string: $_POST['username'] ?? ''),
                    'birthdate' => $birthdate,
                    'email'     => htmlspecialchars($_POST['email']),
                    'password'  => hash('ripemd160', data: 'vive le projet tweet_academy' . $_POST['password']),
                    'city'    => htmlspecialchars($_POST['city'] ?? ''),
                    'country'    => htmlspecialchars($_POST['country'] ?? ''),
                    'genre'    => htmlspecialchars($_POST['genre'] ?? ''),
                    'picture'    => htmlspecialchars($_POST['picture'] ?? ''),

                ];

                    $resultat = CreateUser($userData);

                if ($resultat) {
                    $id = $resultat['LAST_INSERT_ID()'];

                    $error = "Inscription réussie.";
                    
                    $hash = md5($id . 'pavkis the best KVAp');
                    
                    setcookie(
                         "Twitter_connected",
                         "$hash",
                        0,
                         $path = "",
                         $domain = "",
                         $secure = true,
                         $httponly = true
                    );
                    header('Location: '.'/');

                } else {
                    $error = "Erreur lors de l'inscription.".$resultat;
                }
        }
    }
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-xl text-center w-fit m-auto mt-12' role='alert'>$error</div>";

}


include ('Views/subscriptionView.php');