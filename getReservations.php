<?php
include 'db.php';
session_start();

$userId = $_SESSION['user_id'];

try {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT * FROM reservations WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($reservations as $reservation) {
        echo "Match ID: " . htmlspecialchars($reservation['match_id']) . "<br>";
        echo "Number of Tickets: " . htmlspecialchars($reservation['tickets']) . "<br>";
        echo "<hr>";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>

