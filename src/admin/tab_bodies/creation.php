<div style="display:block;">
    <div class="container-fluid py-4 d-flex gap-3">
        <!-- start Creation produit -->
        <div class="container me-2 col-3">
            <div class="row d-flex flex-column">
                <h5 class="pb-2 text-center">Création de produit</h5>
                <div class="form-column bg-light">
                    <form method="post">
                        <div class="form-floating p-2">
                            <input type="text" class="form-control bg-white" id="productName" name="productName" placeholder="name">
                            <label class="bg-transparent" for="productName">Name</label>
                        </div>
                        <div class="form-floating p-2">
                            <textarea class="form-control" name="productDescription" id="productDescription" placeholder="description" style="height: 100px"></textarea>
                            <label for="productDescription">Description</label>
                        </div>
                        <div class="form-floating p-2">
                            <input type="text" class="form-control bg-white" id="productCat" name="productCat" placeholder="categorie">
                            <label class="bg-transparent" for="productCat">Catégories</label>
                        </div>
                        <div class="form-floating p-2">
                            <input type="number" class="form-control bg-white" id="productPrice" name="productPrice" placeholder="prix">
                            <label class="bg-transparent" for="productPrice">Prix</label>
                        </div>
                        <div class="form-floating p-2">
                            <input type="number" class="form-control bg-white" id="productQuantity" name="productQuantity" placeholder="quantite">
                            <label class="bg-transparent" for="productQuantity">Quantité</label>
                        </div>
                        <div class="mx-auto my-3 text-center">
                          <button type="submit" class="btn btn-primary" id="btnAjouter">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end Creation produit -->
        <!-- start Liste Catégorie -->
        <div class="container col-2 cat" style="width:20rem !important;">
            <div class="row py-3">
                <h5 class="text-center">Liste des catégories</h5>
                <div class="column mt-3 ms-4 fs-6">
                    <?php if (isset($_GET['category'])) : ?>
                        <!-- Afficher le bouton pour supprimer le filtre -->
                        <div class="row py-4">
                            <a href="?clear_filter=true" class="fs-6 ">Supprimer le filtre (<?= $numFilters ?>)</a>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($countProductsByCategory as $category) {
                        echo "<a href='?category=" . urlencode($category['Category']) . "'>" . $category['Category'] . " (" . $category['product_count'] . ")</a><br>";
                    } ?>
                </div>
            </div>
        </div>
        <!-- end Liste Catégorie -->
        <!-- start Liste Produit -->
        <div class="container product col-7 gap-5 w-50 text-center d-flex flex-wrap" style="gap: 5rem !important;" id="productList">
          <?php foreach($Produits as $product): ?>
          <div class="row">
              <div class="col-md-4 my-1">
                  <div class="card" style="width: 18rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                      <h5 class="card-title"><?= $product['Name'] ?></h5>
                      <p class="card-text"><?= $product['Description'] ?></p>
                      <p class="card-text"><?= $product['Price'] ?> €</p>
                      <div class="d-flex justify-content-center align-items-center gap-3">
                        <a href="/src/produit/produit.php?product=<?= $product['ProductId'] ?>&image=<?= $product['ProductId'] ?>.jpg" class="btn btn-primary">Voir plus</a>
                        <!-- <button class="btn btn-danger delete-product" data-product-id="<?= $product['ProductId'] ?>">Supprimer</button> -->
                        <!-- <input class="form-check-input product-checkbox" type="checkbox" value="<?= $product['ProductId'] ?>"> -->
                      </div>
                    </div>
                  </div>
              </div>   
          </div>
          <?php endforeach; ?>
    
        </div>
        <!-- end Liste Produit -->
    </div>
</div>