<?php
require_once (__DIR__ . '/../../config/database.php');

// Permet de modifier la quantité quand on change de quantité dans le select
function updateQuantity(){
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cartId']) && isset($_POST['newQuantity'])) {
        global $access;
        // Récupère les valeurs de CatId et de la nouvelle quantité
        $cartId = $_POST['cartId'];
        $newQuantity = $_POST['newQuantity'];
    
        // requête SQL pour mettre à jour la quantité dans la table cart_Table
        $updateQuery = $access->prepare("UPDATE cart_Table 
                                        SET Quantity = :newQuantity 
                                        WHERE CartId = :cartId");

        $updateQuery->execute(array(':newQuantity' => $newQuantity, ':cartId' => $cartId));
    
        header("Location: panier.php");
        exit();
    }
}

// Permet de supprimer le produit du panier
function deleteProductCart(){
    // Gère la suppression du produit lorsque le lien "Supprimer" est cliqué
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteProductId'])) {
      global $access;
      // Récupère l'ID du produit à supprimer
      $productIdToDelete = $_POST['deleteProductId'];
        
      // requête SQL pour supprimer le produit du panier 
      $deleteQuery = $access->prepare("DELETE FROM cart_Table WHERE CartId = :productIdToDelete");
        

      $deleteQuery->execute(array(':productIdToDelete' => $productIdToDelete));
        
      // Rediriger vers la page panier après la suppression du produit
      header("Location: panier.php");
      exit();
    }
}