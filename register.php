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
      
        <!-- Hero Area End -->
        <!-- ================ contact section start ================= -->
        <section class="contact-section">
                <div class="container">
                  
                    <div class="row">
                        <div class="col-12">
                            <h2 class="contact-title" style="text-align:center; margin-top:4rem; margin-bottom:2rem">REGISTER</h2>
                        </div>
                        <div class="col-lg-8">
                            <form method="POST" style="  display:flex; justify-content: center;"  action="register.php"  class="form-contact contact_form"  >
                                <div class="row">
                                  
                                 
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid" name="name" id="email" type="text"   onblur="this.placeholder = 'Enter Your Name'" placeholder="Enter Your Name" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid" name="email" id="email" type="email"   onblur="this.placeholder = 'Enter email address'" placeholder="Enter email address" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control valid" name="contact" id="email" type="number"   onblur="this.placeholder = 'Enter Your Phone Number'" placeholder="Enter Your Phone Number" required>
                                        </div>
                                    </div>
                                    
                                  

                                    <div class="col-12">
                                        <div class="form-group" style="  justify-content: center;">
                                            <input class="form-control" name="password" id="subject" type="password"   onblur="this.placeholder = 'Enter Password'" placeholder="Password" required>
                                        </div>
                                    </div>
                              

<?php 
include 'connection.php';

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
 
    $password = $_POST['password'];

    // Hash the password
    $pass = password_hash($password, PASSWORD_BCRYPT);

    // Check if email already exists
    $check_email_query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        // Email exists
        echo "<script>alert('Email already exists! Please use a different email.');</script>";
    } else {
        // Insert new user
        $query = "insert into user  values ('','$name', '$email', '$pass', '$contact')";
        if (mysqli_query($con, $query)) {
            echo "<script>alert('Account has been created successfully!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: Could not create account.');</script>";
        }
    }
}
?>


<br>

                                <div class="form-group ">
                                    <input type="submit"  value="Register" class="button  boxed-btn" name="btn">
                                </div>
                                </div>
                            </form>



                        </div>
                    
                    </div>
                </div>
            </section>
        <!-- ================ contact section end ================= -->
    </main>
<?php include 'footer.php'; ?>

    <!-- JS here -->

    <?php include 'footerlink.php'?>

    </body>
</html>