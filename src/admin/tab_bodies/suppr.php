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
                        if(isset($_SESSION['status']))
                        {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        unset($_SESSION['status']);
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
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Categorie</th>
                                            <th>Price</th>
                                            <th>Stock_Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $con = mysqli_connect("localhost","root","","e-commerce");
                                            $query = "SELECT p.ProductId, p.Name, p.Description, p.Price, p.Stock_Quantity, c.Category
                                                      FROM categorie_table c
                                                      INNER JOIN product_table p ON c.CategorieId = p.CategorieId
                                                      ORDER BY ProductId ASC";
                                            $query_run  = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td style="width:10px; text-align: center;">
                                                            <input type="checkbox" name="product_delete_id[]" value="<?= $row['ProductId']; ?>">
                                                        </td>
                                                        <td><?= $row['ProductId']; ?></td>
                                                        <td><?= $row['Name']; ?></td>
                                                        <td><?= $row['Description']; ?></td>
                                                        <td><?= $row['Category']; ?></td>
                                                        <td><?= $row['Price']; ?></td>
                                                        <td><?= $row['Stock_Quantity']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <tr>
                                                        <td colspan="5">No Record Found</td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
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