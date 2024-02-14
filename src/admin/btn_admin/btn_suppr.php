<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "e-commerce");

if (isset($_POST['product_delete_multiple_btn'])) {
    $all_id = $_POST['product_delete_id'];
    $extract_id = implode(',', $all_id);

    // Suppression des produits
    $product_query = "DELETE FROM product_table WHERE ProductId IN($extract_id)";
    $product_query_run = mysqli_query($con, $product_query);

    // Suppression des catégories associées aux produits supprimés
    $category_query = "DELETE FROM categorie_table WHERE id IN (SELECT CategorieId FROM product_table WHERE ProductId IN($extract_id))";
    $category_query_run = mysqli_query($con, $category_query);

    if ($product_query_run && $category_query_run) {
        $_SESSION['status'] = "Products deleted successfully";
        header("Location: admin.php");
    } else {
        $_SESSION['status'] = "Products not deleted";
        header("Location: admin.php");
    }
}
