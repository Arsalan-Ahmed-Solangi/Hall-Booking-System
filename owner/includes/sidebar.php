 <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Manage Dashboard</div>
                           


                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#halls" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-hotel"></i></div>
                                Banquet
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>


                            <div class="collapse" id="halls" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="addBanquet.php">   Add Banquet</a>
                                    <a class="nav-link" href="viewBanquet.php"> View Banquet</a>
                                </nav>
                            </div>  


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#bookings" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                                Bookings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="bookings" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <!-- <a class="nav-link" href="">   Add Booking</a> -->
                                    <a class="nav-link" href="addBookings.php"> Add Bookings</a>
                                    <a class="nav-link" href="viewBookings.php"> View Bookings</a>
                                </nav>
                            </div>


                         

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 

                            echo $_SESSION['owner']['username'];

                        ?>
                    </div>
                </nav>
            </div>