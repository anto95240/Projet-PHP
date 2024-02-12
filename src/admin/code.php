<?php
session_start();
$con = mysqli_connect("localhost","root","","e-commerce");

if(isset($_POST['product_delete_multiple_btn']))
{
    $all_id = $_POST['product_delete_id'];
    $extract_id = implode(',' , $all_id);
    // echo $extract_id;

    $query = "DELETE FROM product_table WHERE ProductId IN($extract_id) ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Product Deleted Successfully";
        header("Location: index.php");
    }
    else
    {
        $_SESSION['status'] = "Product Not Deleted";
        header("Location: index.php");
    }
}