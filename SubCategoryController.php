
<?php

class SubCategoryController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {
        $b_name = $inputData['b_name'];
        $b_discription = $inputData['b_discription'];
        $b_affiliate_link = $inputData['b_affiliate_link'];
        $b_status = $inputData['b_status'];
        $cat_id = $inputData['cat_id'];
        
        

        $categoryQuery = "INSERT INTO brands (b_name,b_discription,b_affiliate_link,b_status,cat_id) VALUES ('$b_name','$b_discription','$b_affiliate_link','$b_status','$cat_id')";
        $result = $this->conn->query($categoryQuery);

        if($result){
            return true;
        }else{
            return false;
        }
    }



    public function index()
    {
        $categoryQuery = "SELECT * FROM categories";
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
        $categoryQuery = "SELECT * FROM categories WHERE cat_id='$cat_id' LIMIT 1";
        $result = $this->conn->query($categoryQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $cat_id = mysqli_real_escape_string($this->conn, $id);
         $cat_name = $inputData['cat_name'];
         $cat_status = $inputData['cat_status'];

        $categoryQuery = "UPDATE categories SET cat_name='$cat_name', cat_status='$cat_status' WHERE cat_id='$cat_id' LIMIT 1";
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
        $categoryDeleteQuery = "DELETE FROM categories WHERE cat_id='$cat_id' LIMIT 1";
        $result = $this->conn->query($categoryDeleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>
