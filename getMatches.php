<?php

include 'db.php';

header('Content-Type: application/json');

function getMatches() {
    $pdo = getPDO();

    if ($pdo === null) {
        echo json_encode(['error' => 'Failed to connect to the database.']);
        return;
    }

    try {
       
        $stmt = $pdo->prepare("SELECT id, team_home, team_away, date, venue FROM matches WHERE date >= CURDATE()");
        $stmt->execute();

        $matches = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode($matches);
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

getMatches();

?>
