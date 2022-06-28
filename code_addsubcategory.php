<?php
session_start();

include('db.php');
include('SubCategoryController.php');

$db = new DatabaseConnection;

if(isset($_POST['btnsubmit']))
{
    $inputData = [
        'b_name' => mysqli_real_escape_string($db->conn,$_POST['b_name']),
        'b_discription' => mysqli_real_escape_string($db->conn,$_POST['b_discription']),
        'b_affiliate_link' => mysqli_real_escape_string($db->conn,$_POST['b_affiliate_link']),
        'b_status' => mysqli_real_escape_string($db->conn,$_POST['b_status']),
        'cat_id' => mysqli_real_escape_string($db->conn,$_POST['cat_id']),
        
    ];

    $subs = new SubCategoryController;
    $result = $subs->create($inputData);
    
    if($result)
    {
        $_SESSION['message'] = "Brand Added Successfully";
        header("Location: add_sub_category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Brand Not Inserted";
        header("Location: add_sub_category.php");
        exit(0);
    }
}
?>

