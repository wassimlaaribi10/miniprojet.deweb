<?php
require_once 'db.php';
include 'signin.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $pdo = getPDO();

    if ($pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO users (Email, password) VALUES (:Email,:password)");
            $stmt->execute([':Email'=> $email,':password' => $password]);
            echo "Enregistrement réussi.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement : " . $e->getMessage();
        }
    } else {
        echo "Échec de la connexion à la base de données.";
    }
}
?>
