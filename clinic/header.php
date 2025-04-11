  <!-- Preloader Start -->
  <?php
 // Start the session

// Handle logout when the logout button is clicked
if (isset($_GET['logout'])) {
    session_unset(); // Unset session variables
    session_destroy(); // Destroy the session
    header("Location: index.php"); // Redirect to homepage
    exit();
}

// Include preloader
include 'preloader.php';
?>
<!-- Preloader Start -->

            <!--? Header Start -->
<header>

        <div class="header-area header-transparent">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="services.php">Services</a></li>
                                   
                                                <!-- <ul class="submenu">
                                                    <li><a href="blog.php">Blog</a></li>
                                                    <li><a href="blog_details.php">Blog Details</a></li>
                                                    <li><a href="elements.php">Element</a></li>
                                                </ul> -->
                                            </li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <?php 
                                if (isset($_SESSION['loginsuccessfull'])) {
                                    echo '<a href="userprofile.php" class="header-btn"><img src="img/user.png" width="20" /></a>';
                                } else {
                                    echo '<a href="login.php" class="header-btn">Login Now</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>     
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </header>

    <!-- Header End -->