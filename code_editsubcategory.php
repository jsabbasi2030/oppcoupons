<?php
include('db.php');
include_once('CategoryController.php');
include_once('SubCategoryController.php');

if(isset($_POST['btnsubmit']))
{
    $db = new DatabaseConnection;
    $b_id = mysqli_real_escape_string($db->conn,$_POST['b_id']);
     $inputData = [
        'b_name' => mysqli_real_escape_string($db->conn,$_POST['b_name']),
        'b_discription' => mysqli_real_escape_string($db->conn,$_POST['b_discription']),
        'b_affiliate_link' => mysqli_real_escape_string($db->conn,$_POST['b_affiliate_link']),
        'b_status' => mysqli_real_escape_string($db->conn,$_POST['b_status']),
        'cat_id' => mysqli_real_escape_string($db->conn,$_POST['cat_id']),


        
        
    ];



   
    $image=$_FILES['b_image']['name'];
    $tmp=$_FILES['b_image']['tmp_name'];
   

    $subs = new SubCategoryController;
    $result = $subs->update($inputData,$image,$tmp,$b_id);
    
    if($result)
    {
        $_SESSION['message'] = "Brand Added Successfully";
        header("Location: all_sub_categories.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Brand Not Inserted";
        header("Location: all_sub_categories.php");
        exit(0);
    }
}

?>