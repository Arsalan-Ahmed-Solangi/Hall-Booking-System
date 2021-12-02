<?php 


  include_once('includes/header.php');


?>
  
  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
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
            <h6>Keep in touch with us</h6>
            <h2>Feel free to send us a message about your business needs</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="contact-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-6">
                <div id="map">
                 <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=University%20of%20Sindh+(Univer)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">truck gps tracker</a></iframe></div>
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
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
                <form id="contact" action="process.php" method="POST" >
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="name" name="name" id="name" placeholder="Name" autocomplete="on" required>
                      </fieldset>
                    </div>
                  
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="email" name="email" id="email" placeholder="Your Email" required="">
                      </fieldset>
                    </div>
                   
                    <div class="col-lg-12">
                      <fieldset>
                        <textarea name="message" type="text" class="form-control"  placeholder="Message" required=""></textarea>  
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" name="send_message" class="main-button "><i class="fa fa-paper-plane"></i> Send Message</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


 <?php 



  include_once('includes/footer.php');


?>