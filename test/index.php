<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funda of Web IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>How to Delete Multiple Data or record using Checkbox in PHP MySQL</h4>
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
                        <form action="code.php" method="POST">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <button type="submit" name="product_delete_multiple_btn" class="btn btn-danger">Delete</button>
                                        </th>
                                        <th>ProductId</th>
                                        <th>CategorieId</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>stock_Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $con = mysqli_connect("localhost","root","","e-commerce");

                                        $query = "SELECT * FROM product_Table";
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
                                                    <td><?= $row['CategorieId']; ?></td>
                                                    <td><?= $row['Name']; ?></td>
                                                    <td><?= $row['Description']; ?></td>
                                                    <td><?= $row['Price']; ?></td>
                                                    <td><?= $row['stock_Quantity']; ?></td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
