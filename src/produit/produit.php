<?php
  // Inclure le header
  $currentPage = '';
  require_once (__DIR__ . '/../../includes/header.php');

  // Vérifier si l'identifiant du produit est passé dans les paramètres d'URL
  if(isset($_GET['product']) && isset($_GET['image'])) {
      // Récupérer l'identifiant du produit
      $productId = $_GET['product'];
      $imageName = $_GET['image'];
      
      // Vous pouvez utiliser $productId pour récupérer les données du produit depuis votre source de données (base de données, etc.)
      // Exemple de données fictives
      $productName = "Nom du produit $productId";
      $productPrice = "Prix du produit $productId";
      $productDescription = "Description du produit $productId";
      $productDeliveryTime = "Délai de livraison du produit $productId";
    //   echo '<img src="/chemin/vers/votre/dossier/images/' . $imageName . '" alt="Image du produit">';

  } else {
      // Rediriger vers une page d'erreur si aucun identifiant de produit n'est passé
      header("Location: /error.php");
      exit();
  }
?>

<main id="product">
    <div class="return py-3 px-3">
        <a href="/../../index.php" class="btn btn-primary">← RETOUR</a>

    </div>
    <div class="py-5 px-5" style="padding-top: 5rem !important;">
        <div class="container-fluid d-flex">
            <div class="container create me-5 col-3">
                <div class="row bg-light d-flex flex-column">
                    <?php
                        // Afficher l'image du produit récupérée à partir des paramètres d'URL
                        echo '<img src="/chemin/vers/votre/dossier/images/' . $imageName . '" alt="Image du produit">';
                    ?>                  
                </div>
            </div>
            <div class="container col-5 product">
                <div class="column d-flex flex-column gap-5">
                    <div class="col bg-light">
                        <h5 class="text-center"><?php echo $productName; ?></h5>
                        <h5 class="text-center"><?php echo $productPrice; ?></h5>
                    </div>
                    <div class="col bg-light">
                        <h5 class="text-center"><?php echo $productDescription; ?></h5>
                    </div>
                </div>
            </div>
            <div class="container product col text-center ms-5">
                <div class="row">
                    <div class="col-3 my-1">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <p class="card-text"><?php echo $productPrice; ?></p>
                                <p class="card-text"><?php echo $productDeliveryTime; ?></p>
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
                                <a href="#" class="btn btn-primary">AJOUTER AU PANIER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
  // Inclure le footer
  require_once (__DIR__ . '/../../includes/footer.php');
?>
