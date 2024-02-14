<?php
require_once (__DIR__ . '/../../config/database.php');

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

function afficherProduitParId($productId) {
    global $access;

    $req = $access->prepare("SELECT * FROM product_table WHERE ProductId = :productId");
    $req->bindParam(':productId', $productId);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// Fonction pour afficher les produits d'une catégorie spécifique
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
// Fonction pour générer le lien de catégorie avec les filtres actifs
function generateCategoryLink($selectedCategories, $category)
{
    $categories = array_diff($selectedCategories, [$category]);
    $categoriesString = implode(',', $categories);
    return "?category=$categoriesString";
}