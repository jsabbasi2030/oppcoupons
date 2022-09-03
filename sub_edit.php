<?php session_start(); 
include('db.php');
include('SubCategoryController.php');
include_once('CategoryController.php');
?>


<?php    include("admin_header.php"); ?>






 <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        
                    </div>     
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Edit Brand  <i class="fas fa-angle-double-right"></i> </h4>
        <?php

                                            $categories = new CategoryController;
                                             $results = $categories->index();

                                         ?>




  <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h5>".$_SESSION['message']."</h5>";
                        unset($_SESSION['message']);
                    }
                ?>



                 <?php
                        if(isset($_GET['id']))
                        {
                            $category_id =$_GET['id'];
                            $category = new SubCategoryController;
                            $result = $category->edit($category_id);

                            if($result)
                            {
                                ?>




                                       
                                    <form action="code_editsubcategory.php" method="POST" enctype="multipart/form-data">



                                        <input type="hidden" value="<?=$result['b_id']?>" name="b_name" class="form-control" placeholder="Enter Brand Name">



                                        <div class="form-group">
                                            <label for="simpleinput">Brand Name</label>
                                            <input type="text" value="<?=$result['b_name']?>" name="b_name" class="form-control" placeholder="Enter Brand Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-password">Brand Discription</label>
                                            <textarea class="form-control" name="b_discription" id="exampleFormControlTextarea1" rows="10"><?=$result['b_discription']?></textarea>
                                        </div>

                                         <div class="form-group">
                                            <label for="example-password">Brand Affilate Link</label>
                                            <input type="text" value="<?=$result['b_affiliate_link']?>"  name="b_affiliate_link" placeholder="Enter Affilate Link"  class="form-control">
                                        </div>


                                         <div class="form-group">
                                            <label for="example-password">Brand Status</label>
                                            <input type="text" value="<?=$result['b_status']?>" name="b_status" placeholder="Enter Brand Status"  class="form-control">
                                        </div>


            <div class="form-group">
                    <label for="example-password">Brand Logo</label>
                <div class="custom-file">


               <!--
                    <input type="file" class="custom-file-input" name="b_image" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>


                 -->


                 <input type="file" name="b_image" >


                </div>
            </div>

                        <div class="form-group">
                                            

                            <label for="exampleFormControlSelect1">Select Category</label>

                              <select class="form-control" name="cat_id">
                                        
                                      <?php 
                                           
                                           foreach($results as $result){
                                      ?>

                                        <option value="<?php echo $result['cat_id']; ?>"><?php echo $result['cat_name']; ?></option>












                                     <?php  }  ?>
                                                
                                </select>
                                        
                         </div>
                                                
                                       <div class="form-group">
                                          <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Edit Brand  &nbsp;   <i class="fas fa-forward"></i></button>
                                        </div>
                                       
                                        
                                       
                                        
                                    </form>
                                

                             <?php
                            }
                            else
                            {
                                echo "<h4>No Record Found</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>Something Went Wront</h4>";
                        }
                        ?>
                               </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->
                           

                        </div> <!-- end col -->
                    
                       
                    </div>
                    <!-- end row-->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            

        </div>













<?php    include("admin_footer.php"); ?>