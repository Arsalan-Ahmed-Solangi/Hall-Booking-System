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
                                    <li class="breadcrumb-item active"><i class="fa fa-book"></i>  Add Booking</li>
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
                                            
                                            <select name="banquet_id" required class="form-select">
                                                <option value="" >---SELECT BANQUET NAME---</option>
                                                 <?php 

                                                     require('../require/owner.php');
                                                     require('../database/database.php');
                                                     $owner = new Owner();
                                                     $owner->getBanquets();


                                                ?>
                                            </select>
                                        </div>

                                        
                                        <div class="form-group mb-4">
                                            <strong>Client Name <span class="text-danger">*</span></strong>
                                            <select name="user_id" required class="form-select">
                                                <option value="" >---SELECT CLIENT NAME---</option>
                                                <?php 

                                                   
                                                     $owner->getClients();


                                                ?>
                                            </select>
                                        </div>
                                    
                                        

                                        <div class="row mb-2">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>From Date <span class="text-danger">*</span></strong>
                                                 <input type="date" name="from_date" required class="form-control">
                                            </div>

                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>To Date <span class="text-danger">*</span></strong>
                                                <input type="date" name="to_date" required class="form-control">
                                            </div>
                                        </div>


                                      

                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="submit" class="btn btn-success mt-2" name="addBookingOwner"><i class="fa fa-book"></i> Add Booking</button>
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