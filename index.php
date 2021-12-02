
<?php 

  
  include_once('includes/header.php');


?>
  


  <!-- ***** Header Area Start ***** -->
  <?php 


    include_once('includes/navigation.php');


  ?>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" style="margin-top: -80px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="top-text header-text">
            
            <h2 style="font-size: 35px;text-shadow: 1px 1px 2px white;">FIND NEAR BY BANQUETS AND HALLS</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="POST" role="search" action="process.php">
            <div class="row">

              <div class="col-lg-4 align-self-center">
                  <fieldset>
                      <input type="date"  autocomplete="on" name="fromDate" placeholder="Enter From Date" required>
                     
                  </fieldset>
              </div>
              <div class="col-lg-4 align-self-center">
                  <fieldset>
                       <input type="date"  autocomplete="on" name="toDate" placeholder="Enter To Date" required>
                  </fieldset>
              </div>
              <div class="col-lg-4">                        
                  <fieldset>
                      <button class="main-button" type="submit" name="searchBanquets"><i class="fa fa-search"></i> SEARCH </button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-10 offset-lg-1">
          <h5 align="center" class="mt-5 text-light p-2" style="text-shadow: 2px 2px 10px white;font-weight: BOLD;">POPULAR CATEGORIES</h5>
          <ul class="categories">

            <?php 

               require('require/Data.php');
               require('database/database.php');
               $data = new Data();
              $result = $data->getCategoriesDetails();
               $a  = 1;
               while($row = mysqli_fetch_assoc($result)){

                if($a == 6) break;
                 $a++;
                ?>
                 <li>
                    <div class="card shadow-lg" style="background: #8d99af;">
                      <div class="card-body ">
                        <h6 class="text-light" style=" text-shadow: 2px 2px 10px white; font-size: 14px ;font-weight: BOLD; text-transform: uppercase;"><?php echo $row['category_name']?></h6>
                      </div>
                    </div>
                  </li>
                <?php
               }

            ?>

           
            

          </ul>
          <div class="row mt-5
          ">
            <div class="col-lg-12">
                <center><a href="categories.php"><button style="background: #8d99af;" class="btn btn-default text-light"><i class="fa fa-eye"></i> view categories</button></a></center>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="recent-listing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading">
            <h2>POPULAR BANQUETS</h2>
            <h6>These are the popular banquets in search</h6>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="container">
            <div class="row">
              <?php 

                  $a = 0;
                  $result = $data->getBanuqetDetailsQuery();
                  while($row = mysqli_fetch_assoc($result)){   
                    ?>
                     <div class="col-lg-4 ">
                    <a href="banquets_detail.php">
                   
                      <div class="card shadow-sm" style="background: #fcfcfc; height: 400px;">
                        <img class="img img-responsive img-thumbnail" src="uploads/<?php echo $row['banquet_image']?>" width="200px" height="200px">
                        <div class="card-body">
                          <h6 align="center" class="text-dark"><?php echo strtoupper($row['banquet_name'])?></h6>
                          
                          <div class="p-2">
                            <p>Price : <?php echo $row['price']." Rs"?></p>
                            <p>Category : <?php echo $row['category_name']?></p>
                            <p>Location : <?php echo $row['location_name']?></p>
                          </div>
                         
                        </div>
                      </div>
                   
                   </a>
                     </div>


                    <?php
                    $a++;
                    if($a == 6){
                      break;
                    }
                  }


              ?>
            </div>
          </div>
        </div>
       
      </div>
    </div>
  </div>


  <?php 



  include_once('includes/footer.php');


?>