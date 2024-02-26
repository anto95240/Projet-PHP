<div style="display:none;">
    <div class="container-fluid delete" id="deleteSection">
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Suppression de produit </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php 
                        // Permet de savoir si la Suppression a réussi
                        if(isset($_SESSION['statusSuppr']))
                        {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['statusSuppr']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['statusSuppr']);
                        }
                    ?>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="btn_admin/btn_suppr.php" method="POST">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                <button type="submit" name="product_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                            </th>
                                            <th>ProductId</th>
                                            <th style="width: 10% !important;" >Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Categorie</th>
                                            <th>Price</th>
                                            <th>Stock_Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                        <?php foreach($Produits as $product): ?>
                                            <!-- Affiche les information en fonction des valeurs dans la base de donnée -->
                                            <tr>
                                                <td style="width:10px; text-align: center;">
                                                    <input type="checkbox" name="product_delete_id[]" value="<?= $product['ProductId']; ?>">
                                                </td>
                                                <td><?= $product['ProductId']; ?></td>
                                                <td>
                                                    <img src="<?= $product['Image'] ?>" style="width: 60% !important;">    
                                                </td>
                                                <td><?= $product['Name']; ?></td>
                                                <td><?= $product['Description']; ?></td>
                                                <td><?= $product['Category']; ?></td>
                                                <td><?= $product['Price']; ?></td>
                                                <td><?= $product['Stock_Quantity']; ?></td>
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
</div>