<?php
    $currentPage = 'accueil';
    require_once (__DIR__ . '/includes/header.php');
// echo"Hezllo World";
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
                    <div class="row py-4 text-center bg-light">
                        <h5>Liste des catégories</h5>
                    </div>
                </div>

                <div class="container2 text-center ms-5 d-flex flex-wrap" id="productList">
                    <!-- <div class="row ms-5">
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Nom produit1</h5>
                                <p class="card-text">Price1</p>
                                <a href="/src/produit/produit.php?product=1&image=image1.jpg" class="btn btn-primary">Voir plus</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Nom produit2</h5>
                                <p class="card-text">Price2</p>
                                <a href="/src/produit/produit.php?product=2&image=image2.jpg" class="btn btn-primary">Voir plus</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card" style="width: 18rem;">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Nom produit3</h5>
                                <p class="card-text">Price3</p>
                                <a href="/src/produit/produit.php?product=3&image=image3.jpg" class="btn btn-primary">Voir plus</a>
                              </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            

        </div>

    </main>

<script type="application/javascript" src="/assets/js/btn_admin.js" > </script>


<?php
require_once (__DIR__ . '/includes/footer.php');
