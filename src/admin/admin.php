<?php
  $currentPage = '';
  require_once (__DIR__ . '/../../includes/header.php');
  // require_once (__DIR__ . '/../../config/database.php');

  // Inclure les fonctions de gestion des produits
  require_once (__DIR__ . '/btn_admin.php');
  require_once (__DIR__ . '/affichage.php');

  // Récupérer le nombre de produits par catégorie
  $countProductsByCategory = countProductsByCategory();

  $Produits = afficherProduit();

?>

<main id="admin">
    <div class="py-5">
        <div class="container-fluid d-flex flex-row gap-5 justify-content-around">
          <h1 class="btn btn-secondary fs-4" id="btnAdd">AJOUTER</h1>
          <h1 class="btn btn-secondary fs-4" id="btnMod">MODIFIER</h1>
          <h1 class="btn btn-secondary fs-4" id="btnSup">SUPPRIMER</h1>
        </div>
        <div class="py-5 create container-fluid"  id="createSection">
          <div class="container-fluid d-flex gap-3">
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
                            <divw class="form-floating p-2">
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
            <div class="container bg-light col-2 cat" style="height:150px !important; width:20rem !important;">
                <div class="row">
                  <h5 class="text-center">Liste des catégories</h5>
                  <div class="column mt-3 ms-4">
                        <?php foreach ($countProductsByCategory as $category) {
                            echo "<a href=\"#\">" . $category['category'] . " (" . $category['product_count'] . ")</a><br>";
                        }?>
                  </div>
                </div>
            </div>
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
                              <a href="/src/produit/produit.php?product=1&image=image1.jpg" class="btn btn-primary">Voir plus</a>
                            
                            <!-- <button class="btn btn-danger delete-product" data-product-id="<?= $product['ProductId'] ?>">Supprimer</button> -->
                            <input class="form-check-input product-checkbox" type="checkbox" value="<?= $product['ProductId'] ?>">
                          
                            </div>
                            </div>
                        </div>
                    </div>   
                </div>
                <?php endforeach; ?>
                
            </div>
          </div>
            
        </div>
        <!-- Formulaire de modification -->
        <div class="container-fluid me-2 col-3 modify" style="display: none;" id="modifySection">
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>How to Delete Multiple Data or record using Checkbox in PHP MySQL</h4>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- Formulaire de suppression -->
        <div class="container-fluid delete" style="display: none;" id="deleteSection">
          <div class="container mx-auto">
              <div class="row justify-content-center">
                  <div class="col-md-12">
                      <div class="card mt-5">
                          <div class="card-header">
                              <h4>Suppréssion de produit </h4>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-4">
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <button type="submit" name="product_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                        </th>
                                        <th>ProductId</th>
                                        <th>CategorieId</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>stock_Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $con = mysqli_connect("localhost","root","","e-commerce");

                                        $query = "SELECT * FROM product_Table";
                                        $query_run  = mysqli_query($con, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
                                                ?>
                                                <tr>
                                                    <td style="width:10px; text-align: center;">
                                                        <input type="checkbox" name="product_delete_id[]" value="<?= $row['ProductId']; ?>">
                                                    </td>
                                                    <td><?= $row['ProductId']; ?></td>
                                                    <td><?= $row['CategorieId']; ?></td>
                                                    <td><?= $row['Name']; ?></td>
                                                    <td><?= $row['Description']; ?></td>
                                                    <td><?= $row['Price']; ?></td>
                                                    <td><?= $row['stock_Quantity']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="5">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                  </div>
            
              </div>
          </div>
        </div>
    </div>
</main>

<script src="/../../assets/js/onglet.js"></script>



<?php
require_once (__DIR__ . '/../../includes/footer.php');
?>
