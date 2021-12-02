
<?php 
 
   

  include_once('includes/header.php');


?>
  
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->


  <!-- ***** Header Area Start ***** -->
  <?php 


    include_once('includes/navigation.php');


  ?>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <?php 

              if(!isset($_SESSION['user'])){
                header("location:index.php");
              }

            ?>
            <h2><i class="fa fa-user"></i> <?php echo $_SESSION['user']['username']?></h2>
            <a href="process.php?userLogout=true"><button class="btn text-dark" style="background: #fcfcfc;"><i class="fa fa-power-off"></i>  Logout</button></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid mt-4 mb-5">
    <div class="row">
        <div class="col-md-4">
          
         <div class="card shadow-sm">
            <ul class="list-group">
               <li class="list-group-item bg-dark text-light">MANAGE PROFILE</li>
              <a href="viewBookings.php" class="text-dark"><li class="list-group-item"><i class="fa fa-edit"></i> Bookings</li></a>
              <a href="editProfile.php" class="text-dark"><li class="list-group-item"><i class="fa fa-edit"></i> Edit Profile</li></a>
             <a href="changePassword.php" class="text-dark"><li class="list-group-item"><i class="fa fa-key"></i> Change Password</li></a>
            </ul>
         </div>

        </div>
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-header bg-dark">
              <p class="text-light">CHANGE PASSWORD</p>
            </div>
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
              <form action="process.php" method="POST" id="form">
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
                                                <button type="submit" class="btn btn-dark" name="userPasswordUpdate"><i class="fa fa-key"></i> Update</button>
                                            </center>
                                        </div>


                                    </form>
            </div>
            </div>
          </div>
        </div>
      </div>
  </div>

 <?php 



  include_once('includes/footer.php');


?>