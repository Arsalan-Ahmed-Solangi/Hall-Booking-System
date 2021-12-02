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
                                    <li class="breadcrumb-item active"><i class="fa fa-hotel"></i>  Show Banquet Details</li>
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



                                           require('../require/Owner.php');
                                           require('../database/database.php');
                                           $owner = new Owner();
                                           $row = $owner->getBanuqetDetails($_GET);

                                        ?>

                                        <div class="row mb-5">
                                            <div class="col-md-6">
                                                <img class="img img-thumbnail img-responsive shadow-sm" width="500px" src="../uploads/<?php echo $row['banquet_image']?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong>Banquet Name</strong>
                                                <p><?php echo $row['banquet_name']?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <strong>Owner Name</strong>
                                                <p><?php echo $row['username']?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <strong>Category</strong>
                                                <p><?php echo $row['category_name']?></p>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-4">
                                                <strong>Location</strong>
                                                <p><?php echo $row['location_name']?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <strong>Address</strong>
                                                <p><?php echo $row['address']?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <strong>Price</strong>
                                                <p><?php echo "Rs: ".$row['price']?></p>
                                            </div>
                                        </div>


                                         <div class="row">
                                            <div class="col-md-4">
                                                <strong>Phone Number</strong>
                                                <p><?php echo $row['phone_number']?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <strong>Total Guests Allowed</strong>
                                                <p><?php echo $row['total_guest']?></p>
                                            </div>

                                            <div class="col-md-4">
                                                <strong>Status</strong>
                                                <br/>
                                                <?php 

                                                    if($row['status_type'] == "Active"){
                                                        ?>
                                                        <p style="padding:10px" class=" badge bg-success"><i class="fa fa-toggle-on"></i> Active </p>
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <p style="padding:10px" class=" badge bg-danger"><i class="fa fa-toggle-off"></i> Inactive </p>
                                                        <?php
                                                    }



                                                ?>
                                            </div>
                                        </div>
                                      
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