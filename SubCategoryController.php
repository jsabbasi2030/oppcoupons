
<?php

class SubCategoryController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData,$image,$tmp)
    {
        $b_name = $inputData['b_name'];
        $b_discription = $inputData['b_discription'];
        $b_affiliate_link = $inputData['b_affiliate_link'];
        $b_status = $inputData['b_status'];
        $cat_id = $inputData['cat_id'];
       
        $fileNew = rand() . $image;

        move_uploaded_file($tmp,"uploads/".$fileNew);



          
         
        

        $categoryQuery = "INSERT INTO brands (b_name,b_discription,b_affiliate_link,b_status,cat_id,b_logo) VALUES ('$b_name','$b_discription','$b_affiliate_link','$b_status','$cat_id','$fileNew')";

        $result = $this->conn->query($categoryQuery);

        if($result){
            return true;
        }else{
            return false;
        }
    }



    public function index()
    {
        $categoryQuery = "SELECT * FROM brands";
        $result = $this->conn->query($categoryQuery);
        if($result->num_rows > 0){
            return $result; 
        }else{
            return false;
        }
    }


    public function edit($id)
    {
        $cat_id = mysqli_real_escape_string($this->conn, $id);
        $categoryQuery = "SELECT * FROM brands WHERE b_id='$cat_id' LIMIT 1";
        $result = $this->conn->query($categoryQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function update($inputData,$image,$tmp,$b_id)
    {
        $id = mysqli_real_escape_string($this->conn, $b_id);
        $b_name = $inputData['b_name'];
        $b_discription = $inputData['b_discription'];
        $b_affiliate_link = $inputData['b_affiliate_link'];
        $b_status = $inputData['b_status'];

        $cat_id = $inputData['cat_id'];
        

        $fileNew = rand() . $image;

        move_uploaded_file($tmp,"uploads/".$fileNew);


        $categoryQuery = "UPDATE brands SET b_name='$b_name', b_discription='$b_discription',b_affiliate_link = '$b_affiliate_link', b_status ='$b_status',cat_id = '$cat_id', b_logo= '$fileNew' WHERE b_id ='$id' LIMIT 1";
        $result = $this->conn->query($categoryQuery);
        if($result){
            return true;
        }else{
            return false;
        }



    }



    public function delete($id)
    {
        $cat_id = mysqli_real_escape_string($this->conn,$id);
        $categoryDeleteQuery = "DELETE FROM brands WHERE b_id='$cat_id' LIMIT 1";
        $result = $this->conn->query($categoryDeleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>
