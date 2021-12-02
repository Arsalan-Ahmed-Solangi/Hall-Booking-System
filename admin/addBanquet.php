<!----Start of Check Session -->
<?php 

   
   require('includes/session.php');


?>
<!---End of Check Session------>

<!-- Start of Header -->
<?php 


require('includes/header.php');


?>
<!-- End of Header -->


<!-- Start of Navigation -->
<?php 

    require('includes/navigation.php');

?>
<!-- End of Navigation -->


        <div id="layoutSidenav">
           

            <!-- Start of Sidebar -->
            <?php 

                require('includes/sidebar.php');

            ?>
            <!-- End of Sidebar -->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       
                        <div class="container-fluid mt-2">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <h4 class="mt-2">ONLINE BANQUET SYSTEM</h4>
                                <ol class="breadcrumb mb-2">
                                    <li class="breadcrumb-item active"><i class="fa fa-hotel"></i>  Add Banquet</li>
                                </ol>
                                <div class="card-body">
                                    <?php 

                                        if(isset($_SESSION['success'])){

                                            ?>
                                            <div class="alert alert-success mt-1" id="message">
                                                <b><?php echo $_SESSION['success']?></b>

                                            </div>
                                            <?php
                                            unset($_SESSION['success']);

                                        }else if(isset($_SESSION['error'])){
                                            ?>
                                            <div class="alert alert-danger mt-1" id="message">
                                                <b><?php echo $_SESSION['error']?></b>

                                            </div>
                                            <?php
                                            unset($_SESSION['error']);
                                        }



                                        ?>
                                    <form action="../process.php" method="POST" id="form" enctype="multipart/form-data">
                                        <div class="form-group mb-4">
                                            <strong>Banquet Name <span class="text-danger">*</span></strong>
                                            <input type="text" minlength="4" maxlength="20" name="banquet_name" required placeholder="Enter Banquet Name" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">
                                            <strong>Banquet Thumbnail <span class="text-danger">*</span></strong>
                                            <input type="file" name="banquet_image" required class="form-control" accept="image/*">
                                        </div>

                                        <div class="form-group mb-4">
                                            <strong>Banquet Images <span class="text-danger">*</span></strong>
                                            <input type="file" multiple name="images[]" required class="form-control" accept="image/*">
                                        </div>


                                    

                                        <div class="form-group mb-4">
                                            <strong>Owner Name <span class="text-danger">*</span></strong>

                                             <select class="form-select" required name="user_id">
                                                     <option value="">--SELECT OWNER--</option>
                                                      <?php 

                                                     require('../require/Data.php');
                                                     require('../database/database.php');
                                                     $data = new Data();
                                                     $data->getClients();
                                                
                                                    ?>
                                                </select>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Category Name <span class="text-danger">*</span></strong>
                                                <select class="form-select" required name="category_id">
                                                     <option value="">--SELECT CATEGORY--</option>
                                                    <?php 

                                                    
                                                    $data->getCategories();

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Location Name <span class="text-danger">*</span></strong>
                                                <select class="form-select" required name="location_id">
                                                    <option value="">--SELECT LOCATION---</option>
                                                <?php 

                                                  
                                                   $data->getLocations();

                                                ?>
                                                </select>
                                            </div>
                                        </div>


                                         <div class="row mb-2">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Price <span class="text-danger">*</span></strong>
                                                <input type="number"  name="price" class="form-control" required placeholder="Enter Price">
                                            </div>

                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Contact Number <span class="text-danger">*</span></strong>
                                               <input type="number" placeholder="Enter Contact Number" class="form-control" minlength="11" maxlength="11" name="number">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Address <span class="text-danger">*</span></strong>
                                                <textarea name="address" required placeholder="Enter Banquet Address" class="form-control"></textarea>
                                            </div>

                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Total Guests Allowed<span class="text-danger">*</span></strong>
                                               <input type="number" class="form-control" required placeholder="Enter Total Guests Allowed"  maxlength="800" name="total_guest">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <strong>Select Status <span class="text-danger">*</span></strong>
                                                <select name="status_id" required class="form-select">
                                                    <option value="">--SELECT STATUS---</option>
                                                     <!-- Start of  Getting Users-->
                                                    <?php 

                                                     
                                                       $data->getStatus();

                                                    ?>
                                                    <!---End of Getting Users---->
                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="submit" class="btn btn-success mt-2" name="addBanquet"><i class="fa fa-hotel"></i> Add Banquet</button>
                                            </center>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </main>
<!-- Start of Footer -->
<?php 

    require('includes/footer.php');

?>
<!-- End of Footer