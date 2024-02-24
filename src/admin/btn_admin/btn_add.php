<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs des champs de formulaire
    $name = $_POST['product_name'];
    $image = $_POST['product_image'];
    $description = $_POST['product_description'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];

    addProduct($category, $name, $image, $description, $price, $quantity);
}

// Fonction pour faire une insertion de produit
function addProduct($category, $name, $image, $description, $price, $quantity) {
    global $access;

     // Insert la catégorie dans la table categorie_table
    $reqCategory = $access->prepare("INSERT INTO categorie_table (category) VALUES (?)");
    $reqCategory->execute(array($category));
    $categoryId = $access->lastInsertId(); // Récupérer l'ID de la catégorie insérée

    // Insert le produit dans la table product_Table
    $reqProduct = $access->prepare("INSERT INTO product_Table (CategorieId, Name, Image, Description, Price, stock_Quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $reqProduct->execute(array($categoryId, $name, $image, $description, $price, $quantity));
}

