<?php
session_start();
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Animal | Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <l<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

   <!-- CSS here -->
 <?php include 'headlink.php'?>
</head>

<body>
<!-- Header -->
 <?php include 'header.php'?>
 <!-- Header -->
    <main>
         <!-- Hero Area Start -->
         <div class="slider-area2 slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Contact US</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- ================ contact section start ================= -->
        <section class="contact-section">
                <div class="container">
                  
                    <div class="row">
                        <div class="col-12">
                            <h2 class="contact-title">Get in Touch</h2>
                        </div>
                        <div class="col-lg-8">
                            <form method="POST"  action="contact.php"  class="form-contact contact_form"  >
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"   onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control valid" name="name" id="name" type="text"   onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control valid" name="email" id="email" type="email"   onblur="this.placeholder = 'Enter email address'" placeholder="Email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="subject" id="subject" type="text"   onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" required>
                                        </div>
                                    </div>
                                </div>
                                <?php
include 'connection.php'; 
if (isset($_POST['btn'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$qu =mysqli_query($con,"insert into contact values('','$name','$email','$subject','$message')");
if ($qu) {
    echo 'Thanks For Contacting us';

   
    
}
else{
echo 'Hmm! Something Wrong';

}

}






?>   
                                <div class="form-group mt-3">
                                    <input type="submit"  value="Send" class="button  boxed-btn" name="btn">
                                </div>
                            </form>



                        </div>
                        <div class="col-lg-3 offset-lg-1">
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-home"></i></span>
                                <div class="media-body">
                                    <h3>Buttonwood, California.</h3>
                                    <p>Rosemead, CA 91770</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                <div class="media-body">
                                    <h3>+1 253 565 2365</h3>
                                    <p>Mon to Fri 9am to 6pm</p>
                                </div>
                            </div>
                            <div class="media contact-info">
                                <span class="contact-info__icon"><i class="ti-email"></i></span>
                                <div class="media-body">
                                    <h3>support@colorlib.com</h3>
                                    <p>Send us your query anytime!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- ================ contact section end ================= -->
    </main>
    <?php
include 'footer.php';
?>

    <?php include 'footerlink.php'?>

    </body>
</html>