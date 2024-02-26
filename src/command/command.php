<?php
$currentPage = 'commandes';
require_once (__DIR__ . '/../../includes/header.php');
require_once (__DIR__ . '/../admin/affichage.php');

$Command = afficherCommand();


// Vérifie si le formulaire pour la création de la facture a été soumis
if(isset($_POST['facture_btn'])) {
    // Récupérer les valeurs de la commande sélectionnée
    $commandId = $_POST['command_id'];
    $totalPrice = $_POST['total_price'];
    $userId = $_SESSION['user_id']; 
    $invoiceDate = date('Y-m-d H:i:s');

    $query = "INSERT INTO invoices_table (CommandId, UserId, Total, InvoiceDate) VALUES (?, ?, ?, ?)";
    $stmt = $access->prepare($query);
    $stmt->execute([$commandId, $userId, $totalPrice, $invoiceDate]);
}

?>

<main>
    <div class="container-fluid delete" id="deleteSection">
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Mes Commandes </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="" method="POST">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Commande</th>
                                            <th>Price</th>
                                            <th>Nombre article</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($Command as $command): ?>
                                        <!-- Affiche les informations en fonction des valeurs dans la base de données -->
                                        <tr>
                                            <td style="width:10px; text-align: center;">
                                                <!-- Le bouton "Facture" ne sera affiché qu'une seule fois pour chaque commande -->
                                                <button type="submit" name="facture_btn" class="btn btn-primary">Facture</button>
                                                <!-- Assurez-vous que les clés existent avant de les utiliser -->
                                                <input type="hidden" name="command_id" value="<?= isset($command['CommandId']) ? $command['CommandId'] : ''; ?>">
                                                <input type="hidden" name="total_price" value="<?= isset($command['TotalPrice']) ? $command['TotalPrice'] : ''; ?>">
                                            </td>
                                            
                                            <td>n°<?=$command['CommandId'];?>

                                            <div class="row">
                                                    <?php
                                                    // Requête pour récupérer les produits de la commande actuelle
                                                    $queryProduitsCommande = "SELECT p.*, co.*, ca.*
                                                                              FROM product_table p
                                                                              INNER JOIN categorie_Table ca ON p.CategorieId = ca.CategorieId
                                                                              INNER JOIN command_table co ON p.ProductId = co.ProductId
                                                                              WHERE co.CommandId = ?";
                                                    $stmtProduitsCommande = $access->prepare($queryProduitsCommande);
                                                    $stmtProduitsCommande->execute([isset($command['CommandId']) ? $command['CommandId'] : '']);
                                                    $produitsCommande = $stmtProduitsCommande->fetchAll(PDO::FETCH_ASSOC);
                                                                        
                                                    foreach($produitsCommande as $produitCommande) {
                                                        echo '<div class="col-4"><p>' . $produitCommande['Quantity'] . ' x ' . $produitCommande['Name'] . ' </br>' . $produitCommande['Description'] . ' </br>' . $produitCommande['Category'] . ' </p></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                            <td><?= isset($command['TotalPrice']) ? $command['TotalPrice'] : ''; ?></td>
                                            <td><?= isset($command['Quantity']) ? $command['Quantity'] : ''; ?></td>
                                            <td><?= isset($command['CommandDate']) ? $command['CommandDate'] : ''; ?></td>
                                        </tr>
    
                                    <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </form>
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
