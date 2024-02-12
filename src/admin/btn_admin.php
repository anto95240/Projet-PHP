<?php
require_once (__DIR__ . '/../../config/database.php');

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

function supprimer($productId) {
    global $access;
    $req = $access->prepare("DELETE FROM product_Table WHERE ProductId=?");
    $req->execute(array($productId));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];

    // Vous devrez écrire une fonction pour récupérer les informations du produit en fonction de son ID à partir de la base de données.
    // Supposons que vous ayez une fonction nommée 'getProductInfoById' dans votre fichier btn_admin.php.
    $productInfo = afficherProduit();

    // Envoyer les informations du produit au format JSON
    header('Content-Type: application/json');
    echo json_encode($productInfo);
}
