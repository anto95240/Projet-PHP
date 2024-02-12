<?php
require_once (__DIR__ . '/../../config/database.php');

function afficherProduit() {
    global $access;

    $req = $access->prepare("SELECT product_Table.*, categorie_table.category
                            FROM categorie_table
                            INNER JOIN product_Table ON categorie_table.CategorieId = product_Table.CategorieId
                            ORDER BY ProductId ASC");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}

// function afficherCat() {
//     global $access;

//     $req = $access->prepare("SELECT *
//                             FROM categorie_table
//                             ORDER BY CategorieId ASC");
//     $req->execute();
//     $data = $req->fetchAll(PDO::FETCH_ASSOC);
//     $req->closeCursor();
//     return $data;
// }

function countProductsByCategory() {
    global $access;

    $req = $access->prepare("
        SELECT COUNT(p.CategorieId) AS product_count, c.category
        FROM product_Table p
        INNER JOIN categorie_table c ON c.CategorieId = p.CategorieId
        GROUP BY c.category
        ORDER BY c.category
    ");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $data;
}
