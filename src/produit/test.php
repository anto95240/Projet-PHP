<?php
// Vérifier si l'ID du produit est présent dans l'URL
if(isset($_GET['product_id'])) {
    // Récupérer l'ID du produit depuis l'URL
    $product_id = $_GET['product_id'];

    // Charger les détails du produit à partir de la source de données locale (par exemple, un tableau de produits)
    // Exemple d'un tableau de produits (simulé)
    $products = array(
        1 => array(
            'name' => 'Produit 1',
            'description' => 'Description du produit 1',
            'price' => 10.99
        ),
        2 => array(
            'name' => 'Produit 2',
            'description' => 'Description du produit 2',
            'price' => 19.99
        ),
        // Ajoutez d'autres produits ici...
    );

    // Vérifier si le produit avec l'ID donné existe dans la source de données
    if(isset($products[$product_id])) {
        $product = $products[$product_id];
        // Afficher les détails du produit
        echo "<h1>{$product['name']}</h1>";
        echo "<p>Description: {$product['description']}</p>";
        echo "<p>Prix: {$product['price']} €</p>";
    } else {
        // Afficher un message d'erreur si le produit n'existe pas
        echo "<p>Produit non trouvé.</p>";
    }
} else {
    // Afficher un message d'erreur si aucun ID de produit n'est fourni dans l'URL
    echo "<p>Aucun ID de produit fourni.</p>";
}
?>
