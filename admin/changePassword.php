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
                       
                        <div class="container-fluid mt-3">
                            <div class="card shadow-sm p-3 mb-5 bg-white">
                                <h4 class="mt-2">ONLINE BANQUET SYSTEM</h4>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item active"><i class="fa fa-key"></i>  Change Password</li>
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
                                    <form action="../process.php" method="POST" id="form">
                                        <div class="form-group mb-4">
                                            <strong>Old Password <span class="text-danger">*</span></strong>
                                            <input type="password" minlength="4" maxlength="20" name="old_password" required placeholder="Enter your old password" class="form-control">
                                        </div>

                                        <div class="form-group mb-4">
                                            <strong>New Password <span class="text-danger">*</span></strong>
                                            <input type="password" minlength="4" maxlength="20" name="new_password" required placeholder="Enter new password" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">
                                            <strong>Confirm Password <span class="text-danger">*</span></strong>
                                            <input type="password" minlength="4" maxlength="20" name="confirm_password" required placeholder="Confirm your password" class="form-control">
                                        </div>

                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="UpdatePassword" class="btn btn-success" name="UpdatePassword"><i class="fa fa-key"></i> Update</button>
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