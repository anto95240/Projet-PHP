<?php
  $currentPage = 'commandes';
  require_once (__DIR__ . '/../../includes/header.php');
  require_once (__DIR__ . '/../admin/afficher_facture.php');

  $Facture = afficherFacture();

?>

<main>
    <div class="container-fluid delete" id="deleteSection">
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Mes Factures </h4>
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
                                            <th>Commande</th>
                                            <th>Price</th>
                                            <th>Nombre d'article</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        // Tableau associatif pour stocker les commandes déjà affichées
                                        $displayedinvoices = [];
                                        ?>
                                        <?php foreach($Facture as $facture): ?>
                                            <?php
                                            // Vérifier si la commande a déjà été affichée
                                            if(!isset($displayedinvoices[$facture['InvoiceId']])):
                                                $displayedinvoices[$facture['InvoiceId']] = true;
                                                ?>
                                                <!-- Affiche les informations en fonction des valeurs dans la base de données -->
                                                <tr>
                                                    <td>n°<?= $facture['InvoiceId']; ?> de la Commande <?=$facture['CommandId'];?>
                                                        <div class="row">
                                                            <?php
                                                            // Requête pour récupérer les produits de la commande actuelle
                                                            $queryProduitsInvoice = "SELECT p.*, i.*, co.*, ca.*
                                                                                      FROM command_Table co
                                                                                      INNER JOIN product_Table p ON co.ProductId = p.ProductId
                                                                                      INNER JOIN categorie_Table ca ON p.CategorieId = ca.CategorieId
                                                                                      INNER JOIN invoices_Table i ON co.CommandId = i.CommandId
                                                                                      WHERE i.InvoiceId =  ?";
                                                            $stmtProduitsInvoice = $access->prepare($queryProduitsInvoice);
                                                            $stmtProduitsInvoice->execute([isset($facture['InvoiceId']) ? $facture['InvoiceId'] : '']);
                                                            $produitsInvoice = $stmtProduitsInvoice->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach($produitsInvoice as $produitInvoice) {
                                                                echo '<div class="col-4"><p>' . $produitInvoice['Quantity'] . ' x ' . $produitInvoice['Name'] . ' </br>' . $produitInvoice['Description'] . ' </br>' . $produitInvoice['Category'] . ' </p></div>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </td>
                                                    <td><?= isset($facture['TotalPrice']) ? $facture['TotalPrice'] : ''; ?></td>
                                                    <td><?= isset($facture['Quantity']) ? $facture['Quantity'] : ''; ?></td>
                                                    <td><?= isset($facture['CommandDate']) ? $facture['CommandDate'] : ''; ?></td>
                                                </tr>
                                            <?php endif; ?>
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