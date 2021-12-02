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
                                    <li class="breadcrumb-item active"><i class="fa fa-user-plus"></i>  Add Client</li>
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
                                            <strong>Full Name <span class="text-danger">*</span></strong>
                                            <input type="text" minlength="4" maxlength="20" name="fullname" required placeholder="Enter your full name" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">
                                            <strong>Phone Number <span class="text-danger">*</span></strong>
                                            <input type="number" minlength="11" maxlength="11" name="number" placeholder="Enter Phone No" required class="form-control">
                                        </div>
                                    
                                        <div class="form-group mb-4">
                                            <strong>Email Address <span class="text-danger">*</span></strong>
                                            <input  type="email" minlength="4" maxlength="40" name="email" required placeholder="Enter your valid email" class="form-control">
                                            <p style="font-size: 14px;" class="text-success">please provide valid email</p>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Password <span class="text-danger">*</span></strong>
                                                <input type="password" minlength="4" maxlength="20" name="password" placeholder="Enter your password" required class="form-control">
                                            </div>

                                            <div class="col-md-6 col-xs-6 col-sm-6">
                                                <strong>Confirm Password <span class="text-danger">*</span></strong>
                                                <input type="password" minlength="4" maxlength="20" name="confirm_password" placeholder="Confirm your password" required class="form-control">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <strong>Select Role <span class="text-danger">*</span></strong>
                                                <select name="role_id" required class="form-select">
                                                    <option value="">--SELECT ROLE---</option>
                                                     <!-- Start of  Getting Users-->
                                                    <?php 

                                                       require('../require/Data.php');
                                                       require('../database/database.php');
                                                       $data = new Data();
                                                       $data->getRoles();

                                                    ?>
                                                    <!---End of Getting Users---->
                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="submit" class="btn btn-success mt-2" name="addClient"><i class="fa fa-user-plus"></i> Add Client</button>
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