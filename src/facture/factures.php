<?php
  $currentPage = 'commandes';
  require_once (__DIR__ . '/../../includes/header.php');
  require_once (__DIR__ . '/afficher_facture.php');

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
                                            <th>Nombre article</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($Facture as $facture): ?>
                                                <!-- Affiche les information en fonction des valeurs dans la base de donnée -->
                                                <tr>
                                                    <td><?= $facture['InvoiceId']; ?>    
                                                    </td>
                                                    <td><?= $facture['Total']; ?></td>
                                                    <td><?= $facture['Quantity']; ?></td>
                                                    <td><?= $facture['InvoiceDate']; ?></td>
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