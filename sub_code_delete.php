<?php
include('db.php');
include_once('SubCategoryController.php');
$db = new DatabaseConnection;
if(isset($_GET['id']))
{
    $id = mysqli_real_escape_string($db->conn, $_GET['id']);
    $category = new SubCategoryController;
    $result = $category->delete($id);
    if($result)
    {
        $_SESSION['message'] = "Sub Category Deleted Successfully";
        header("Location: all_sub_categories.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Sub Category Deleted un-Successfully";
        header("Location: all_sub_categories.php");
        exit(0);

    }

}

?>