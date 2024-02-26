<?php

require_once (__DIR__ . '/../../../config/database.php');

// Mise à jour d'un produit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_btn'])) {
    // Récupère les valeurs des champs de formulaire
    $productId = $_POST['product_id'];
    $categorieId = $_POST['categorie_id'];
    $image = $_POST['product_image'];
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];
    $description = $_POST['product_description'];
    $quantity = $_POST['product_quantity'];

    updateProduct($productId, $categorieId, $image, $name, $category, $price, $description, $quantity);
}

function updateProduct($productId, $categorieId, $image, $name, $category, $price, $description, $quantity) {
    global $access;

// Mise à jour de la catégorie dans la table category_table
$updateCategoryQuery = $access->prepare("UPDATE categorie_table SET Category = ? WHERE CategorieId = ?");
$categoryUpdated = $updateCategoryQuery->execute([$category, $categorieId]); 


// Mise à jour du produit dans la table product_table
$updateProductQuery = $access->prepare("UPDATE product_table SET CategorieId = ?, Name = ?, Image = ?, Description = ?, Price = ?, Stock_Quantity = ? WHERE ProductId = ?");
$productUpdated = $updateProductQuery->execute([$categorieId, $name, $image, $description, $price, $quantity, $productId]);

    // Vérifier si les mises à jour ont réussi
    if ($categoryUpdated && $productUpdated) {
        $_SESSION['statusMod'] = "Produit mis à jour avec succès";
    } else {
        $_SESSION['statusMod'] = "Erreur: Produit  non mis à jour";
    }
    
    // Redirige vers la page admin.php après la mise à jour
    header("Location: /src/admin/admin.php");
    exit();
}
