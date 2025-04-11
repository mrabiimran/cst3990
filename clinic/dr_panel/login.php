<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>
<?php include 'headlink.php'?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="login.php">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                        </div>
                                       
                                        <input type="submit" class="btn btn-primary btn-user btn-block"  name="btn" value="Login">
                                            
                                        
                                       
                                    </form>
                                 
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php
include 'connection.php';

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch doctor from the database based on email
    $query = mysqli_query($con, "SELECT * FROM doctor WHERE dremail='$email' LIMIT 1");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            $_SESSION['dr_id'] = $row['id'];
            $_SESSION['email'] = $email;
            $_SESSION['drname'] = $row['drname']; // Store user name if needed
            
            // Redirect to index.php
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Invalid Email or Password'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid Email or Password'); window.location.href='login.php';</script>";
    }
}
?>
<?php include 'footerlink.php'?>
</body>

</html>