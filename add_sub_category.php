<?php session_start(); 
include('db.php');
include('CategoryController.php');
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
                                    <h4 class="card-title">Add Brand  <i class="fas fa-angle-double-right"></i> </h4>
                                    
 <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h5>".$_SESSION['message']."</h5>";
                        unset($_SESSION['message']);
                    }
                ?>



                                        <?php

                                            $categories = new CategoryController;
                                             $results = $categories->index();

                                         ?>
                                    <form action="code_addsubcategory.php" method="POST">
                                        <div class="form-group">
                                            <label for="simpleinput">Brand Name</label>
                                            <input type="text" name="b_name" class="form-control" placeholder="Enter Brand Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-password">Brand Discription</label>
                                            <textarea class="form-control" name="b_discription" id="exampleFormControlTextarea1" rows="10"></textarea>
                                        </div>

                                         <div class="form-group">
                                            <label for="example-password">Brand Affilate Link</label>
                                            <input type="text" name="b_affiliate_link" placeholder="Enter Affilate Link"  class="form-control">
                                        </div>


                                         <div class="form-group">
                                            <label for="example-password">Brand Status</label>
                                            <input type="text" name="b_status" placeholder="Enter Brand Status"  class="form-control">
                                        </div>


            <div class="form-group">
                    <label for="example-password">Brand Logo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="b_image" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
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
                                          <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add Brand  &nbsp;   <i class="fas fa-forward"></i></button>
                                        </div>
                                       
                                        
                                       
                                        
                                    </form>
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

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2020 © Lunoz.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by Myra
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>













<?php    include("admin_footer.php"); ?>