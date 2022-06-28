<?php session_start(); ?>
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
                                    <h4 class="card-title">Add Category  <i class="fas fa-angle-double-right"></i> </h4>
                 <?php
                    if(isset($_SESSION['message']))
                    {
                        echo "<h5>".$_SESSION['message']."</h5>";
                        unset($_SESSION['message']);
                    }
                ?>

                                    <form action="code_addcategory.php" method="POST">
                                        <div class="form-group">
                                            <label for="simpleinput">Category Name</label>
                                            <input type="text" name="cat_name"  class="form-control" placeholder="Enter Category Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-password">Category Status</label>
                                            <input type="text" name="cat_status" placeholder="Enter Category Status"  class="form-control">
                                        </div>
                                                
                                       <div class="form-group">
                                          <button type="submit" name="btnsubmit" class="btn btn-primary waves-effect waves-light">Add Category  &nbsp;   <i class="fas fa-forward"></i></button>
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