<?php
    $currentPage = 'accueil';
    require_once (__DIR__ . '/includes/header.php');

    // Inclure les fonctions de gestion des produits
  require_once (__DIR__ . '/src/admin/btn_admin.php');
  require_once (__DIR__ . '/src/admin/affichage.php');

    // Récupérer le nombre de produits par catégorie
    $countProductsByCategory = countProductsByCategory();

    $Produits=afficherProduit();
    // $Categorie=afficherCat();
?>

<main>
    <div class="py-5 ms-3">
        <div class="container-fluid d-flex flex-row">
            <div class="container1">
                <div class="row">
                    <p>
                        <a href="/src/admin/admin.php" class="btn btn-success">Admin</a>
                    </p>
                </div>
                <div class="row py-4 bg-light">
                    <h5 class="text-center">Liste des catégories</h5>
                    <div class="column mt-3 ms-4">
                        <?php foreach ($countProductsByCategory as $category) {
                            echo "<a href=\"#\">" . $category['category'] . " (" . $category['product_count'] . ")</a><br>";
                        }?>
                    </div>
                </div>
            </div>

            <div class="container2 text-center ms-5 d-flex flex-wrap" id="productList">
                <?php foreach($Produits as $product): ?>
                    <div class="col-4 my-1">
                        <div class="card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['Name'] ?></h5>
                                <p class="card-text"><?= $product['category'] ?></p>
                                <p class="card-text"><?= $product['Price'] ?> €</p>
                                <a href="/src/produit/produit.php?product=1&image=image1.jpg" class="btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once (__DIR__ . '/includes/footer.php');
?>
