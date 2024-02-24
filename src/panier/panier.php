<?php
  $currentPage = 'monpanier';
  require_once (__DIR__ . '/../../includes/header.php');
  require_once (__DIR__ . '/../../config/database.php');
  
  require_once (__DIR__ . '/../admin/affichage.php');
  require_once (__DIR__ . '/update_cart.php');
  
  $Cart=afficherCart();

  updateQuantity();

  deleteProductCart()

?>

<main id="panier">
  <div class="py-5 my-5">
    <div class="container-fluid d-flex flex-row">
      <div class="container d-flex">
        <div class="column d-grid gap-5" style="margin-left:10% !important;">
        <?php 
            // Initialise des variables afin de caluler le prix total et le nombre total de produits
            $totalPrice = 0;
            $totalProducts = 0;
          ?>
          <?php foreach($Cart as $cart): ?>
            <div class="col-5">
              <div class="card d-flex flex-row align-items-center" style="width: 60rem !important;">
                <div class="img" style="width: 15% !important;">
                  <img src="<?= $cart['Image'] ?>" class="card-img-top mx-auto" alt="..." style="width: 80% !important">
                </div>
                <div class="card-body text-left pt-2 gap-3 d-flex flex-column align-items-left">
                  <h5 class="card-title ms-5"><?= $cart['Name'] ?></h5>
                  <p class="card-title ms-5"><?= $cart['Description'] ?></p>
                  <p class="card-title ms-5">En stock</p>
                  <div class="option ms-5 d-flex gap-3">
                    <p class="card-text">
                    <form method="post" action="">
                      <input type="hidden" name="cartId" value="<?= $cart['CartId'] ?>"> <!-- Utilisez $cart['CartId'] au lieu de $cart['cartId'] -->
                      <select name="newQuantity" onchange="this.form.submit()">
                        <?php
                        for ($i = 1; $i <= min($cart['Stock_Quantity'], 9); $i++) {
                          // Si $i correspond à la quantité totale du produit, $i sera la valeur par défaut dans le select
                          $selected = ($i == $cart['TotalQuantity']) ? 'selected' : '';
                          echo '<option ' . $selected . '>' . $i . '</option>';
                        }
                        // Si la quantité totale est supérieure à 10, afficher "10+"
                        if ($cart['Stock_Quantity'] > 10) {
                            echo '<option>10+</option>';
                        }
                        ?>
                      </select>
                    </form>

                    </p>
                    <form method="post" action="">
                        <input type="hidden" name="deleteProductId" value="<?= $cart['CartId'] ?>">
                        <button type="submit" class="delete-product btn btn-danger">Supprimer</button>
                    </form>
                  </div>
                        
                </div>
                <div class="d-flex flex-column text-center m-2" style="gap: 5rem !important;">
                  <div class="price">
                      <span> Prix :</span>
                      <p class="card-text"><?= $cart['Price'] ?> €</p>
                  </div>
                  <div class="priceTot">
                    <span> Prix Total du produit : </span>
                    <p class="card-text"><?= $cart['Price'] * $cart['TotalQuantity'] ?> €</p>
                  </div>
                        
                </div>
              </div>
            </div>
            <?php 
              // Calcul du prix total de tous les produits et du nombre total de produits dans le panier
              $totalPrice += $cart['Price'] * $cart['TotalQuantity'];
              $totalProducts += $cart['TotalQuantity'];
            ?>
          <?php endforeach; ?>
        </div>
        <div class="container d-flex justify-content-around align-items-start">
          <div class="row" style="margin-left:40% !important;">
            <div class="col">
              <div class="card" style="width: 18rem; height: 15rem;">
                <div class="card-body text-left pt-2 gap-3 d-flex flex-column align-items-left">
                  <h5 class="card-title ms-5">Total à Payer</h5>
                  <p class="card-text">Prix Total : <?= $totalPrice ?> €</p>
                  <p class="card-text">Nombre Total de Produits : <?= $totalProducts ?></p>
                  <a href="#" class="btn btn-primary">Commander</a>
                </div>
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
