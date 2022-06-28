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
                                    <h4 class="card-title">All Categories  <i class="fas fa-angle-double-right"></i></h4>
                                    <br>
                                    
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Category Name</th>
                                                    <th>Category Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                             <?php
                                            $categories = new CategoryController;
                                             $result = $categories->index();

                                            if($result)
                                             {
                                             foreach($result as $row)
                                               {
                                                ?>

                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td><?= $row['cat_name'] ?></td>
                                                    <td><?= $row['cat_status'] ?></td>
                                                    <td>
                                                     <a href="category-edit.php?id=<?=$row['cat_id'];?>">	
                                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit   <i class="mdi mdi-lead-pencil">  </i></button></a>



                                                  --

                                                 
                                              


   
      <a href="category-code-delete.php?id=<?=$row['cat_id'];?>">  

        <button type="submit" name="deleteCategory" class="btn btn-danger waves-effect waves-light">Delete  <i class="mdi mdi-close-thick"></i> </button>

      </a>

                                                    </td>
                                                </tr>

                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "No Record Found";
                                        }
                                    ?>



                                                
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <!-- end card-body-->
                            </div>
                            <!-- end card -->

                        </div>
                       
                    </div>
                    <!-- end row-->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

          

        </div>













<?php    include("admin_footer.php"); ?>