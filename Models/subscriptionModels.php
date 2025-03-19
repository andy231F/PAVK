<?php
function CreateUser($data)
{
    // echo "<pre>"; 
    // print_r($data); 
    // echo "</pre>"; 

    global $db;
    $query = "INSERT INTO user (firstname,lastname, username, display_name, birthdate, email,password, city,country,genre, picture) 
               VALUES (:firstname,:lastname, :username, :display_name, :birthdate, :email, :password, :city, :country, :genre, :picture)";

    $stmt = $db->prepare($query);
    $res = $stmt->execute([
        ':firstname' => $data['firstname'],
        ':lastname' => $data['lastname'],
        ':username' => $data['username'],
        ':display_name' => "{$data['firstname']} {$data['lastname']}",
        ':birthdate' => $data['birthdate'],
        ':email' => $data['email'],
        ':password' => $data['password'],
        ':city' => $data['city'],
        ':country' => $data['country'],
        ':genre' => $data['genre'],
        ':picture' => $data['picture'],

    ]);

    $sql = "SELECT LAST_INSERT_ID()";
    $requete = $db->query($sql);
    $id = $requete->fetch();

    return $id;
}