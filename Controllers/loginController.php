<?php


// print_r($_POST);

if(isset($_POST['login'])){
    include('Models/loginModel.php');

    $login = $_POST['login'];
    $mdp = $_POST['passeword'];

    $logged = TestLogin($login,$mdp);
    
    if(is_array($logged)){
        $id = $logged['id'];
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
        
    }else{
        $error = $logged;
        echo "<div class='z bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-xl text-center w-fit m-auto mt-12' role='alert'>$error</div>";
        
    }
}


include('Views/loginView.php');




// INSERT INTO user (name,birthdate,email,pseudo,password,active,date_from,dplink) VALUES('pol','2020-01-01 10:10:10','pol@gmail.fr','pol','ae7d710e53cdfcc341b8d35db54fdfacb1d1e5d5','1','2020-01-01 10:10:10','1');
