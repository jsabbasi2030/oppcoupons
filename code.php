<?php
session_start();

include('db.php');
include('UserController.php');

$db = new DatabaseConnection;

if(isset($_POST['save_student']))
{
    $inputData = [
        'fullname' => mysqli_real_escape_string($db->conn,$_POST['fullname']),
        'email' => mysqli_real_escape_string($db->conn,$_POST['email']),
        'phone' => mysqli_real_escape_string($db->conn,$_POST['phone']),
        'password' => mysqli_real_escape_string($db->conn,$_POST['password']),
    ];

    $student = new UserController;
    $result = $student->create($inputData);
    
    if($result)
    {
        $_SESSION['message'] = "User Added Successfully";
        header("Location: user-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header("Location: user-add.php");
        exit(0);
    }
}



if(isset($_POST['login_user']))
{
    $inputData = [
       
        'email' => mysqli_real_escape_string($db->conn,$_POST['email']),
        'password' => mysqli_real_escape_string($db->conn,$_POST['password']),
    ];

    $student = new UserController;
    $result = $student->login($inputData);
    
    if($result)
    {
        $_SESSION['username'] = $_POST['email'];
        header("Location: dashboard.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Email or Password  is invalid ";
        header("Location: login.php");
        exit(0);
    }
}








?>