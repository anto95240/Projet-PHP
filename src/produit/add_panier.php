<?php
require_once(__DIR__ . '/../../config/database.php');

// Vérifier si les données du formulaire ont été envoyées
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    // Récupère les valeurs du formulaire
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Vérifie si la quantité est supérieure à 0
    if ($quantity > 0) {
        // requête d'insertion dans la table du panier
        $query = "INSERT INTO cart_table (ProductId, Quantity, Status) VALUES (?, ?, 'reserved')";

        $stmt = $access->prepare($query);
        $stmt->execute([$productId, $quantity]);
        
     } else {
        // Rediriger vers une page d'erreur si la quantité est invalide
        header("Location: /error.php");
        exit();
    }
} else {
    // Rediriger vers une page d'erreur si les données du formulaire sont manquantes
    header("Location: /error.php");
    exit();
}