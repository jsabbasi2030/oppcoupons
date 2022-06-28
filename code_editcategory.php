<?php
include('db.php');
include_once('CategoryController.php');

if(isset($_POST['btnsubmit']))
{
    $db = new DatabaseConnection;
    $id = mysqli_real_escape_string($db->conn,$_POST['cat_id']);
    $inputData = [
        'cat_name' => mysqli_real_escape_string($db->conn,$_POST['cat_name']),
        'cat_status' => mysqli_real_escape_string($db->conn,$_POST['cat_status']),
        
    ];
    $category = new CategoryController;
    $result = $category->update($inputData, $id);

    if($result)
    {
        $_SESSION['message'] = "Category Edit / Update Successfully";
        header("Location: all_categories.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Edit / Update not Successfully";
        header("Location: all_categories.php");
        exit(0);
    }
}

?>