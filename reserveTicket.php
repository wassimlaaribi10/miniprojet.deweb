<?php

include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $match = $_POST['match'];
    $tickets = $_POST['tickets'];
    $userId = $_SESSION['user_id']; 

    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, match_id, tickets) VALUES (:user_id, :match_id, :tickets)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':match_id', $match);
        $stmt->bindParam(':tickets', $tickets);

        if ($stmt->execute()) {
            echo "Reservation successful!";
        } else {
            echo "Error in reservation.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
