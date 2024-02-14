<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs de formulaire
    $name = $_POST['productName'];
    $category = $_POST['productCat'];
    $price = $_POST['productPrice'];
    $description = $_POST['productDescription'];
    $quantity = $_POST['productQuantity'];

    // Appeler la fonction pour ajouter un produit avec les valeurs récupérées
    addProduct($name, $category, $price, $description, $quantity);
}

function addProduct($name, $category, $price, $description, $quantity) {
    global $access;

    // Insérer la catégorie dans la table categorie_table
    $reqCategory = $access->prepare("INSERT INTO categorie_table (category) VALUES (?)");
    $reqCategory->execute(array($category));
    $categoryId = $access->lastInsertId(); // Récupérer l'ID de la catégorie nouvellement insérée

    // Insérer le produit dans la table product_Table
    $reqProduct = $access->prepare("INSERT INTO product_Table (Name, CategorieId, Price, Description, stock_Quantity) VALUES (?, ?, ?, ?, ?)");
    $reqProduct->execute(array($name, $categoryId, $price, $description, $quantity));
}