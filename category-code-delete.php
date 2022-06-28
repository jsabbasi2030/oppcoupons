<?php
include('db.php');
include_once('CategoryController.php');
$db = new DatabaseConnection;
if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($db->conn, $_GET['id']);
    $category = new CategoryController;
    $result = $category->delete($id);
    if($result)
    {
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: all_categories.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Category Deleted un-Successfully";
        header("Location: all_categories.php");
        exit(0);

    }

}

?>