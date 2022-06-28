<?php session_start(); ?>
<?php
include('db.php');
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
                                    <h4 class="card-title">Edit Category  <i class="fas fa-angle-double-right"></i> </h4>
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
                            $category = new CategoryController;
                            $result = $category->edit($category_id);

                            if($result)
                            {
                                ?>

                                    <form action="code_editcategory.php" method="POST">

                                    	<input type="hidden" name="cat_id" value="<?=$result['cat_id']?>">


                                        <div class="form-group">
                                            <label for="simpleinput">Category Name</label>
                                            <input type="text" value="<?=$result['cat_name']?>" name="cat_name"  class="form-control" placeholder="Enter Category Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-password">Category Status</label>
                                            <input type="text" value="<?=$result['cat_status']?>" name="cat_status" placeholder="Enter Category Status"  class="form-control">
                                        </div>
                                                
                                       <div class="form-group">
                                          <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Edit Category  &nbsp;   <i class="fas fa-forward"></i></button>
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