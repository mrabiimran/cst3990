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
                            <h2 class="contact-title" style="text-align:center; margin-top:4rem; margin-bottom:2rem">LOGIN</h2>
                        </div>
                        <div class="col-lg-8">
                        <form style="display: flex; justify-content: center; align-items: center; " method="POST" style="display:flex; justify-content: center;" action="" class="form-contact contact_form">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <input class="form-control valid" name="email" type="email" placeholder="Email" required>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group" style="justify-content: center;">
                <input class="form-control" name="password" type="password" placeholder="Enter Password" required>
            </div>
        </div>
   
    <div class="col-12">
            <div class="form-group" style="justify-content: center;">
          <a href="register.php" style="color:red" >Reister your Account</a>
        </div>
        </div>
   

   
                                <?php
include 'connection.php';

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user from the database based on email
    $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email' LIMIT 1");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        // Verify the password
        if (password_verify($password, $row['password'])) {
           
            $_SESSION['loginsuccessfull'] = 1;
            $_SESSION['email'] = $email;
            $_SESSION['adminname'] = $row['name']; // Store user name if needed
            $_SESSION['user_id'] = $row['id'];
            // Redirect to index.php
            echo "<script>window.location.href='index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Invalid Email or Password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password'); window.location.href='login.php';</script>";
    }
}
?>
<br>

<div class="form-group">
        <input type="submit" value="Login" class="button boxed-btn" name="btn">
    </div>
</form>



                        </div>
                    
                    </div>
                </div>
            </section>
        <!-- ================ contact section end ================= -->
    </main>
    <?php
include 'footer.php';
?>

    <!-- JS here -->

    <?php include 'footerlink.php'?>

    </body>
</html>
