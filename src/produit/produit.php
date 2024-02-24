<?php
    $currentPage = '';
    require_once (__DIR__ . '/../../includes/header.php');
    require_once (__DIR__ . '/../../config/database.php');
    
    require_once (__DIR__ . '/../admin/affichage.php');
    
    
    // Récupère l'identifiant du produit
    $productId = $_GET['product'];
    
    // Récupère les informations du produit depuis la base de données en fonction de son identifiant
    $produit = afficherProduitParId($productId);
    
    // Vérifie si le produit existe
    if($produit) {
        // Récupère les informations du produit
        $productImage= $produit['Image'];
        $productId= $produit['ProductId'];
        $productName = $produit['Name'];
        $productPrice = $produit['Price'];
        $productDescription = $produit['Description'];
        $productDeliveryTime = "Date de livraison du produit $productId";
        $productStock = $produit['Stock_Quantity'];
    } else {
        // Redirige vers une page d'erreur si le produit n'existe pas
        header("Location: /error.php");
        exit();
    }
  
  
    // Vérifie si l'utilisateur a cliqué sur le bouton "AJOUTER AU PANIER"
    if(isset($_POST['add_to_cart']) && isset($_SESSION['user_id'])) {
        // Récupère l'identifiant du produit
        $productId = isset($_GET['product']) ? $_GET['product'] : null;
        // Récupèrer l'identifiant de l'utilisateur depuis la session
        $userId = $_SESSION['user_id'];
        
        // Récupèrer la quantité sélectionnée
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
    
        $Statut = "reserved";
    
        $sql = "INSERT INTO cart_table (UserId, productId, Quantity, Statut) VALUES (?, ?, ?, ?)";
        $stmt = $access->prepare($sql);
        $stmt->execute([$userId, $productId, $quantity, $Statut]);
    
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
                        echo '<img src="' . $productImage . '" alt="Image du produit">';
                    ?>                  
                </div>
            </div>
            <div class="container col-5 product">
                <div class="column d-flex flex-column gap-5">
                    <div class="col bg-light">
                        <h5 class="text-center"><?php echo $productName; ?></h5>
                        <h5 class="text-center"><?php echo $productPrice; ?> €</h5>
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
                                <p class="card-text"><?php echo $productPrice; ?> €</p>
                                <p class="card-text">
                                    <form method="post" class="d-flex flex-column gap-3 w-75 align-items-center mx-auto">
                                        <select id="inputState" name="quantity">
                                            <?php
                                            // Afficher les quantité du produit dans select
                                            for ($i = 1; $i <= min($productStock, 9); $i++) {
                                                echo '<option>' . $i . '</option>';
                                            }
                                            // Si le stock est supérieur à 10, afficher "10+"
                                            if ($productStock > 10) {
                                                echo '<option>10+</option>';
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" name="add_to_cart" class="btn btn-primary">AJOUTER AU PANIER</button>
                                    </form>
                                </p>
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
