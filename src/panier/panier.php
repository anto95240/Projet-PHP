<?php
  $currentPage = 'monpanier';
  require_once (__DIR__ . '/../../includes/header.php');
?>

<main id="panier">
  <div class="py-5 my-5">
    <div class="container-fluid d-flex flex-row">
      <div class="container">
        <div class="column d-grid gap-5" style="margin-left:10% !important;">
          <div class="col-5">
            <div class="card d-flex flex-row align-items-center" style="width: 60rem !important;">
              <div class="img">
                <img src="..." class="card-img-top ms-3" alt="...">
              </div>
              <div class="card-body text-left pt-2 gap-3 d-flex flex-column align-items-left">
                <h5 class="card-title ms-5">Nom produit</h5>
                <p class="card-title ms-5">Description produit</p>
                <p class="card-title ms-5">En stock</p>
                <div class="option ms-5 d-flex gap-3">
                  <p class="card-text">
                    <select id="inputState">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10+</option>
                    </select>
                </p>
                <a class="delete-product">Supprimer</a>
                </div>
                
              </div>
              <div class="d-flex flex-column text-center" style="gap: 6rem !important;">
                <p class="card-tex me-5">Price</p>
                <p class="card-tex me-5">Total du produit</p>
              </div>
            </div>
          </div>
          <div class="col-5">
            <div class="card d-flex flex-row align-items-center" style="width: 60rem !important;">
              <div class="img">
                <img src="..." class="card-img-top ms-3" alt="...">
              </div>
              <div class="card-body text-left pt-2 gap-3 d-flex flex-column align-items-left">
                <h5 class="card-title ms-5">Nom produit</h5>
                <p class="card-title ms-5">Description produit</p>
                <p class="card-title ms-5">En stock</p>
                <div class="option ms-5 d-flex gap-3">
                  <p class="card-text">
                    <select id="inputState">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10+</option>
                    </select>
                </p>
                <a class="delete-product">Supprimer</a>
                </div>
                
              </div>
              <div class="d-flex flex-column text-center" style="gap: 6rem !important;">
                <p class="card-tex me-5">Price</p>
                <p class="card-tex me-5">Total du produit</p>
              </div>
            </div>
          </div>
          <div class="col-5">
            <div class="card d-flex flex-row align-items-center" style="width: 60rem !important;">
              <div class="img">
                <img src="..." class="card-img-top ms-3" alt="...">
              </div>
              <div class="card-body text-left pt-2 gap-3 d-flex flex-column align-items-left">
                <h5 class="card-title ms-5">Nom produit</h5>
                <p class="card-title ms-5">Description produit</p>
                <p class="card-title ms-5">En stock</p>
                <div class="option ms-5 d-flex gap-3">
                  <p class="card-text">
                    <select id="inputQuantity" class="quantity-select">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10+</option>
                    </select>
                </p>
                <a class="delete-product">Supprimer</a>
                </div>
                
              </div>
              <div class="d-flex flex-column text-center" style="gap: 6rem !important;">
                <p class="card-tex me-5">Price</p>
                <p class="card-tex me-5">Total du produit</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container d-flex justify-content-around align-items-center">
        <div class="row" style="margin-left:40% !important;">
            <div class="col">
              <div class="card" style="width: 18rem; height: 15rem;">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body text-center d-flex flex-column justify-content-center gap-3">
                  <p class="card-title">QUANTITE DES PRODUITS DU PANIER</p>
                  <p class="card-text">TOTAL A PAYER</p>
                  <a href="#" class="btn btn-primary">Commander</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php
  require_once (__DIR__ . '/../../includes/footer.php');
?>