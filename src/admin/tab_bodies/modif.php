<div style="display:none;">
    <div class="container-fluid delete" id="deleteSection">
        <div class="container mx-auto">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4>Modification de produit </h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php 
                        // Permet de savoir si la Modification a réussi
                        if(isset($_SESSION['statusMod']))
                        {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['statusMod']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['statusMod']);
                        }
                    ?>
                    <div class="card mt-4">
                        <div class="card-body">
                            <form action="btn_admin/btn_mod.php" method="POST">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ProductId</th>
                                            <th>Image</th>
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
                                                    <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                                                    <input type="hidden" name="categorie_id" value="<?= $product['CategorieId']; ?>">
                                                    <input type="hidden" name="product_id" value="<?= $product['ProductId']; ?>">
                                                </td>
                                                <td><?= $product['ProductId']; ?></td>
                                                <td><input class="form-control border border-info" type="text" name="product_image" value="<?= $product['Image']; ?>"></td>
                                                <td><input class="form-control border border-info" type="text" name="product_name" value="<?= $product['Name']; ?>"></td>
                                                <td><input class="form-control border border-info" type="text" name="product_description" value="<?= $product['Description']; ?>"></td>
                                                <td><input class="form-control border border-info" type="text" name="product_category" value="<?= $product['Category']; ?>"></td>
                                                <td><input class="form-control border border-info" type="text" name="product_price" value="<?= $product['Price']; ?>"></td>
                                                <td><input class="form-control border border-info" type="text" name="product_quantity" value="<?= $product['Stock_Quantity']; ?>"></td>
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
