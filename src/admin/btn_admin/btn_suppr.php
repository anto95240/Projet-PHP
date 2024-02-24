<?php

require_once (__DIR__ . '/../../../config/database.php');

// Ajout d'un produit a l'aide des checkbox
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_delete_multiple_btn'])) {
    deleteProducts($_POST['product_delete_id']);
}

function deleteProducts($productIds) {
    global $access;

    // Converti les ProduitId en une chaîne séparée par des virgules
    $productIdsString = implode(',', $productIds);
    
    // Supprime les catégories associées aux produits supprimés
    $deleteCategoriesQuery = $access->prepare("DELETE FROM categorie_table WHERE CategorieId IN (SELECT CategorieId FROM product_table WHERE ProductId IN ($productIdsString))");
    $deleteCategoriesQuery->execute();

    // Supprime les produits de la table product_table
    $deleteProductsQuery = $access->prepare("DELETE FROM product_table WHERE ProductId IN ($productIdsString)");
    $deleteProductsQuery->execute();


    // Vérifier si les suppressions ont réussi
    if ($deleteProductsQuery && $deleteCategoriesQuery) {
        $_SESSION['status'] = "Products deleted successfully";
    } else {
        $_SESSION['status'] = "Error: Products not deleted";
    }
    
    // Redirige vers la page admin.php après que la suppression ait réussit
    header("Location: /src/admin/admin.php");
    exit();
}