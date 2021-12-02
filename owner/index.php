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
                    <div class="container-fluid px-4">

                        <?php 


                            if(isset($_SESSION['success'])){

                                ?>
                                <div class="alert alert-success mt-5" id="message">
                                    <b><?php echo $_SESSION['success']?></b>

                                </div>
                                <?php
                                unset($_SESSION['success']);

                            }



                        ?>

                        <h4 class="mt-2">ONLINE BANQUET SYSTEM</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><i class="fa fa-hotel"></i>    Banquet</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewBanquet.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><i class="fa fa-book"></i> Bookings</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="viewBookings.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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