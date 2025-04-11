<?php
session_start();
include "connection.php"
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Animal | Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php include 'headlink.php'?>
</head>

<body>
    <!-- Preloader Start -->
 <?php include 'header.php'?>
    <main> 
        <!-- Hero Area Start -->
        <div class="slider-area2 slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Services</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!--? Our Services Start -->
        <div class="our-services section-padding30">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-70">
                            <span>Our Professional Services</span>
                            <h2>Best Pet Care Services</h2>
                        </div> 
                    </div>
                </div>
                <?php
include 'connection.php';
$query = mysqli_query($con, "SELECT * FROM services");
?>

<div class="row">
    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
       <a href="form.php">
        <div class="col-lg-4 col-md-6 col-sm-6" >
            <div class="single-services text-center mb-30">
            <?php
                    $imagePath = 'dashboard/service_image/'.$row['img'];
                    if (!empty($row['img']) && file_exists($imagePath)) {
                        echo '<img src="' . $imagePath . '" alt="' . htmlspecialchars($row['img']) . '" width="100%" style="margin-top: 10px; border-radius: 10px; height:30vh">';
                    } else {
                        echo '<p><em>Image not available</em></p>';
                    }
                    ?>
                    <br><br>
                <div class="services-cap">
                    <h5><a href="#"><?php echo htmlspecialchars($row['servicename']); ?></a></h5>
                    <p><?php echo nl2br(htmlspecialchars($row['servicedesc'])); ?></p>

                   
                </div>
            </div>
        </div>
                </a>
    <?php } ?>
</div>




            </div>
        </div>
        <!-- Our Services End -->
        <!--? contact-animal-owner Start -->
        <div class="contact-animal-owner section-bg" data-background="assets/img/gallery/section_bg04.png">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact_text text-center">
                            <div class="section_title text-center">
                                <h3>Any time you can call us!</h3>
                                <p>Because we know that even the best technology is only as good as the people behind it. 24/7 tech support.</p>
                            </div>
                            <div class="contact_btn d-flex align-items-center justify-content-center">
                                <a href="contact.html" class="btn white-btn">Contact Us</a>
                                <p>Or<a href="#"> +880 4664 216</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact-animal-owner End -->
    </main>
    <?php
include 'footer.php';
?>

    <!-- JS here -->

  <?php include 'footerlink.php'?>
        
    </body>
</html>