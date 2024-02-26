<?php
require_once (__DIR__ . '/../../config/database.php');

// Permet de récupérer toute les informations pour les produits et les catégories
function afficherProduit() {
    global $access;

    $req = $access->prepare("SELECT p.*, c.Category
                            FROM categorie_table c
                            INNER JOIN product_table p ON c.CategorieId = p.CategorieId
                            ORDER BY ProductId ASC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// Permet de récupérer toute les informations pour les produits qui sont dans le panier
function afficherCart(){
    global $access;

    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
        
        $req = $access->prepare("SELECT p.*, SUM(c.Quantity) as TotalQuantity, c.CartId
                            FROM cart_table c
                            INNER JOIN product_table p ON c.ProductId = p.ProductId
                            WHERE c.UserId = ?
                            GROUP BY c.ProductId");
        $req->execute([$userId]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $data;
    }
}

// Permet de récupérer toute les informations pour les commandes réaliser
function afficherCommand() {
    global $access;

    $req = $access->prepare("SELECT c.*
                            FROM command_table c
                            GROUP BY c.CommandId
                            ORDER BY c.CommandId ASC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// Permet de récupérer toute les informations pour les factures 
function afficherFacture() {
    global $access;

    $req = $access->prepare("SELECT i.*, c.*
                            FROM invoices_table i
                            INNER JOIN command_table c ON i.CommandId = c.CommandId
                            ORDER BY i.InvoiceId ASC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// Permet de compter tous les catégories en fonction de leur Id
function countProductsByCategory() {
    global $access;

    $req = $access->prepare("
        SELECT COUNT(p.CategorieId) AS product_count, c.Category
        FROM product_table p
        INNER JOIN categorie_table c ON c.CategorieId = p.CategorieId
        GROUP BY c.Category
        ORDER BY c.Category
    ");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// Permet d'afficher tous les produits aqui ont le même id
function afficherProduitParId($productId) {
    global $access;

    $req = $access->prepare("SELECT * FROM product_table WHERE ProductId = :productId");
    $req->bindParam(':productId', $productId);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// Permet d'afficher tous les produit qui ont les mêmes catégories
function afficherProduitParCategorie($category)
{
    global $access;

    $req = $access->prepare("
        SELECT p.*, c.Category
        FROM product_table p
        INNER JOIN categorie_table c ON c.CategorieId = p.CategorieId
        WHERE c.Category = :category
        ORDER BY p.ProductId ASC
    ");
    $req->bindParam(':category', $category);
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}