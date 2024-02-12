<?php
  $currentPage = '';
  require_once (__DIR__ . '/../../includes/header.php');
?>

  <main id="admin">
      <div class="py-5">
          <div class="container-fluid d-flex gap-3">
              <div class="container create me-2 col-3">
                  <div class="row d-flex flex-column">
                      <h5 class="pb-2">Création de produit</h5>
                      <div class="form-column bg-light">
                        <div class="form-floating p-2">
                          <input type="text" class="form-control bg-white" id="productName" placeholder="name">
                          <label class="bg-transparent" for="floatingInput">Name</label>
                        </div>
                        <div class="form-floating p-2">
                          <textarea class="form-control" placeholder="description" id="productDescription" style="height: 100px"></textarea>
                          <label for="floatingTextarea">Description</label>
                        </div>
                        <div class="form-floating p-2">
                          <input type="text" class="form-control bg-white" id="productCat" placeholder="categorie">
                          <label class="bg-transparent" for="floatingInput">Catégories</label>
                        </div>
                        <div class="form-floating p-2">
                          <input type="number" class="form-control bg-white" id="productPrice" placeholder="prix">
                          <label class="bg-transparent" for="floatingInput">Prix</label>
                        </div>
                        <div class="form-floating p-2">
                          <input type="number" class="form-control bg-white" id="productQuantity" placeholder="quantite">
                          <label class="bg-transparent" for="floatingInput">Quantité</label>
                        </div>
                      </div>
                      <div class="row pt-4">
                          <div class="col-6 text-center">
                            <a href="#" class="btn btn-primary" id="btnAjouter">Ajouter</a>
                          </div>
                          <div class="col-6 text-center">
                              <a href="#" class="btn btn-primary" id="btnModifier">Modifier</a>
                          </div>
                          <div class="col pt-3 text-center">
                              <a href="#" class="btn btn-primary" id="btnSupprimerTout">Tout Supprimer</a>
                          </div>
                      </div>
                      
                  </div>
              </div>
              <div class="container bg-light col-2 cat" style="height:150px !important; width:20rem !important;">
                  <div class="row">
                      <h5 class="text-center pt-4">Liste des catégories</h5>
                      <!-- <select class="form-select category-list">
                           Les options des catégories seront ajoutées dynamiquement ici
                      </select> -->
                    </div>
              </div>
              <div class="container product col-7 gap-5 w-50 text-center d-flex flex-wrap" style="gap: 5rem !important;" id="productList">
                  <!-- <div class="row">
                      <div class="col-6 my-1">
                          <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Nom produit</h5>
                              <p class="card-text">Price</p>
                              <a href="/src/produit/produit.php?product=1&image=image1.jpg" class="btn btn-primary">Voir plus</a>
                            </div>
                          </div>
                      </div>
                      <div class="col-6 my-1">
                          <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Nom produit</h5>
                              <p class="card-text">Price</p>
                              <a href="/src/produit/produit.php?product=2&image=image2.jpg" class="btn btn-primary">Voir plus</a>
                            </div>
                          </div>
                      </div>
                      <div class="col-3 my-1">
                          <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Nom produit</h5>
                              <p class="card-text">Price</p>
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
  require_once (__DIR__ . '/../../includes/footer.php');
?>