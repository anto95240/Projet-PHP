<?php
  $currentPage = 'commandes';
  require_once (__DIR__ . '/../../includes/header.php');
  require_once (__DIR__ . '/afficher_command.php');

  $Command = afficherCommand();

  $queryProduit = "SELECT p.*
  FROM product_table p"; // Requête SQL pour récupérer les informations de l'utilisateur et de son adresse

$stmt = $access->prepare($queryProduit);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC); // Récupérer les résultats de la requête

// Vérifie si le formulaire pour la création de la facture a été soumis
if(isset($_POST['facture_btn'])) {
    // Récupérer les valeurs de la commande sélectionnée
    $commandId = $_POST['command_id'];
    $totalPrice = $_POST['total_price'];
    $userId = $_SESSION['user_id']; // Supposons que vous stockiez l'ID de l'utilisateur dans la session
    $invoiceDate = date('Y-m-d H:i:s');

    // Insérer les valeurs dans la table invoice_table
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
                                                <!-- Affiche les information en fonction des valeurs dans la base de donnée -->
                                                <tr>
                                                    <td style="width:10px; text-align: center;">
                                                        <button type="submit" name="facture_btn" class="btn btn-primary">Facture</button>
                                                        <input type="hidden" name="command_id" value="<?= $command['CommandId']; ?>">
                                                        <input type="hidden" name="total_price" value="<?= $command['TotalPrice']; ?>">
                                                    </td>
                                                    <td><?= $command['CommandId']; ?>    
                                                    </td>
                                                    <td><?= $command['TotalPrice']; ?></td>
                                                    <td><?= $command['Quantity']; ?></td>
                                                    <td><?= $command['CommandDate']; ?></td>
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