<?php 


  include_once('includes/header.php');


?>
  


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
            <h6>Categories of Banquets</h6>
            <h2>We have a wide range of business categories for you</h2>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="category-post">
    <div class="container">
      <div class="row mt-2">
        
            <?php 

              require('require/Data.php');
              require('database/database.php');
              $data = new Data();
              $result = $data->getCategoriesDetails();

              while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-4">
                <div class="card shadow-sm mt-2">
                  <div class="card-header text-light" style="background: #8d99af;">
                    <h4><?php echo strtoupper($row['category_name'])?></h4>
                  </div>
                  <div class="card-body">
                    <h6>Description</h6> <p> <?php echo $row['category_desc']?></p>
                  </div>
                </div>
                 </div>
                <?php
              }

            ?>
       
      </div>
    </div>
  </div>

 <?php 



  include_once('includes/footer.php');


?>