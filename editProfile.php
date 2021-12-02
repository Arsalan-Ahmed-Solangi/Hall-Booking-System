
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
                                            <strong>Full Name <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $_SESSION['user']['username']?>" type="text" minlength="4" maxlength="20" name="username" required placeholder="Enter your full name" class="form-control">
                                        </div>

                                        <div class="form-group mb-4">
                                            <strong>Email <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $_SESSION['user']['email']?>" type="email" minlength="4" maxlength="40" name="email" required placeholder="Enter your email" class="form-control">
                                        </div>


                                        <div class="form-group mb-4">
                                            <strong>Phone Number <span class="text-danger">*</span></strong>
                                            <input value="<?php echo $_SESSION['user']['phone_no']?>" type="number" minlength="11" maxlength="11" name="number" required placeholder="Enter Phone No" class="form-control">
                                        </div>

                                        <div class="form-group mb-4">
                                            <center>
                                                <button type="submit" class="btn btn-dark" name="userProfileUpdate"><i class="fa fa-key"></i> Update</button>
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