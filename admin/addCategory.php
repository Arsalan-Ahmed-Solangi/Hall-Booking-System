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
                                    <li class="breadcrumb-item active"><i class="fa fa-list"></i>  Add Category</li>
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
                                            <strong>Category Title <span class="text-danger">*</span></strong>
                                            <input type="text" minlength="4" maxlength="20" name="category_name" required placeholder="Enter category title" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">

                                            <strong>Category Description <span class="text-danger">*</span></strong>
                                            <textarea name="category_description" required placeholder="Enter Category Description" class="form-control" minlength="50"></textarea>
                                            
                                        </div>
                                    
                                      
                                    
                                        <div class="row mb-2">
                                            <div class="col-md-12 col-xs-12 col-sm-12">
                                                <strong>Category Status <span class="text-danger">*</span></strong>
                                                <select name="status_id" required class="form-select">
                                                    <option value="">--SELECT STATUS---</option>
                                                     <!-- Start of  Getting Users-->
                                                    <?php 

                                                       require('../require/Data.php');
                                                       require('../database/database.php');
                                                       $data = new Data();
                                                       $data->getStatus();

                                                    ?>
                                                    <!---End of Getting Users---->
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="submit" class="btn btn-success mt-2" name="addCategory"><i class="fa fa-list"></i> Add Category</button>
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