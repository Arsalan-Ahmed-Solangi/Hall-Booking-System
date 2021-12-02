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
                                    <li class="breadcrumb-item active"><i class="fa fa-user"></i>  Edit Profile</li>
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
                                            <strong>Username <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $_SESSION['owner']['username']?>" type="text" minlength="4" maxlength="20" name="username" required placeholder="Enter your full name" class="form-control">
                                        </div>

                                    
                                        <div class="form-group mb-4">
                                            <strong>Email Address <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $_SESSION['owner']['email']?>" type="email" minlength="4" maxlength="40" name="email" required placeholder="Enter your valid email" class="form-control">
                                            <p style="font-size: 14px;" class="text-success">please provide valid email</p>
                                        </div>


                                         <div class="form-group mb-4">
                                            <strong>Phone Number <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $_SESSION['owner']['phone_no']?>" type="number" minlength="11" maxlength="11" name="number" required placeholder="Enter your valid phone number" class="form-control">
                                            
                                        </div>

                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="submit" class="btn btn-success" name="UpdateProfileOwner"><i class="fa fa-edit"></i> Update</button>
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