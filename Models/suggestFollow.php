<?php
require_once '../connect.php';
session_start();

$currentUserId = $_SESSION['user_id'] ?? null;

if (!$currentUserId) {
    http_response_code(401);
    echo json_encode(["error" => "Utilisateur non authentifié"]);
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $followedId = $_POST['followed_id'] ?? null;

    if ($followedId) {
        $stmt = $pdo->prepare("INSERT INTO follows (follower_id, followed_id) VALUES (?, ?)");
        $stmt->execute([$currentUserId, $followedId]);
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "ID de l'utilisateur à suivre manquant"]);
    }
    exit;
}

$stmt = $pdo->prepare("
    SELECT id, username, profile_picture FROM user 
    WHERE id != ? 
    AND id NOT IN (
        SELECT followed_id FROM follows WHERE follower_id = ?
    )
    ORDER BY RAND() LIMIT 5
");
$stmt->execute([$currentUserId, $currentUserId]);
$suggestedUsers = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($suggestedUsers); 
exit;
?>