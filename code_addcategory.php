<?php
session_start();

include('db.php');
include('CategoryController.php');

$db = new DatabaseConnection;

if(isset($_POST['btnsubmit']))
{
    $inputData = [
        'cat_name' => mysqli_real_escape_string($db->conn,$_POST['cat_name']),
        'cat_status' => mysqli_real_escape_string($db->conn,$_POST['cat_status']),
        
    ];

    $category = new CategoryController;
    $result = $category->create($inputData);
    
    if($result)
    {
        $_SESSION['message'] = "Category Added Successfully";
        header("Location: add_category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Not Inserted";
        header("Location: add_category.php");
        exit(0);
    }
}
?>

