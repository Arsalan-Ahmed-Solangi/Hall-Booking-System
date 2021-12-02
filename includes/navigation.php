 <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
           <!-- <h4 class="center text-light">ONLINE BANQUET SYSTEM</h4 -->
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php" class="active">Home</a></li>
                 <li><a href="about.php" class="active">About Us</a></li>
              <li><a href="banquets.php">Banquets</a></li>
            
              <li><a href="gallery.php">Gallery</a></li>
                <li><a href="contact.php">Contact Us</a></li>
              <?php 
               
                if(isset($_SESSION['user'])){
                  ?>
                    <li><div class="main-white-button"><a href="profile.php"><i class="fa fa-user"></i><?php echo $_SESSION['user']['username']?></a></div></li>
                  <?php
                }else{
                  ?>
                 
                   <li><a href="login.php">Login</a></li>
              <li><div class="main-white-button"><a href="register.php"><i class="fa fa-user-plus"></i> Register</a></div></li>
                  <?php

                }

              ?>
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>