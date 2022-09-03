<?php   
include('db.php');
 include("admin_header.php");

include_once('SubCategoryController.php');
 ?>






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
                                    <h4 class="card-title">All Brands  <i class="fas fa-angle-double-right"></i></h4>
                                    <br>
                                    
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Brand Image</th>
                                                    <th>Brand Name</th>
                                                    <th>Brand Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                             <?php
                                            $sub_categories = new SubCategoryController;
                                             $result = $sub_categories->index();

                                            if($result)
                                             {
                                             foreach($result as $row)
                                               {
                                                ?>





                                                <tr>
                                                    <th scope="row"><?php echo $row['b_id']; ?></th>


                                                     <td>
                                                         
                                                  <img src="<?php echo 'uploads/'. $row['b_logo'] ?>" height="75px" width="120px">




                                                     </td>



                                                    <td><?php echo $row['b_name']; ?></td>
                                                    <td><?php echo $row['b_status']; ?></td>
                                                    <td>
                                                    	




                                      <a href="sub_edit.php?id=<?=$row['b_id'];?>">
                                                  <button type="button" class="btn btn-success waves-effect waves-light">Edit   <i class="mdi mdi-lead-pencil">  </i></button>

                                       </a>




                                                  --


                                                   <a href="sub_code_delete.php?id=<?=$row['b_id'];?>">  

                                                  <button type="button" class="btn btn-danger waves-effect waves-light">Delete  <i class="mdi mdi-close-thick"></i> </button>
                                              
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