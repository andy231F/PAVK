<?php
// include 'Connect.php';

function editProfil(string $toUpdate, array $newValues) { 
    
    global $db;

    try {
        $stmt = $db->prepare("UPDATE user SET $toUpdate WHERE MD5(CONCAT(user.id, 'pavkis the best KVAp')) = '{$_COOKIE['Twitter_connected']}'");
        $stmt->execute($newValues);
        return 'Votre profil a bien été modifié.' . PHP_EOL;
    } catch(PDOException $e) {
        return "ERR: " . $e->getMessage();
    }

} 