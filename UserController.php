<?php

class UserController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $fullname = $inputData['fullname'];
        $email = $inputData['email'];
        $phone = $inputData['phone'];
        $password = $inputData['password'];

        $studentQuery = "INSERT INTO users (fullname,email,phone,password) VALUES ('$fullname','$email','$phone','$password')";
        $result = $this->conn->query($studentQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }


     public function login($inputData)
    {
        
        $email = $inputData['email'];
        $password = $inputData['password'];
       

        $studentQuery = "SELECT email,password FROM users where email='$email' && password = '$password'";

        $results = $this->conn->query($studentQuery);


        $no_rows = mysqli_num_rows($results);  

        if($no_rows == 1){
            return true;
        }else{
            return false;
        }
    }







}
?>