<?php
session_start();
include "connection.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>window.location.href='login.php';</script>";
    exit();
}
$user_id = $_SESSION['user_id'];
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Animal | Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <?php include 'headlink.php' ?>
</head>

<body>
    <!-- Header -->
    <?php include 'header.php' ?>
    <!-- Header -->

    <main>
        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title" style="text-align:center; margin-top:4rem; margin-bottom:2rem">User Profile</h2>
                    </div>
                    <div class="col-lg-8 mx-auto" style="text-align:center;">

                    <?php
                    $query = "SELECT * FROM user WHERE id = '$user_id'";
                    $result = mysqli_query($con, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo "<div style='margin-bottom: 20px; border-bottom: 1px solid #ccc; padding-bottom: 50px;'>
                                <p><strong>Name:</strong> {$row['name']}</p>
                                <p><strong>Email:</strong> {$row['email']}</p>
                                <p><strong>Contact:</strong> {$row['contact']}</p>
                                <a href='logout.php' class='header-btn' style='margin-top:50px'>Log Out</a>
                              </div>";
                    } else {
                        echo "<p>User not found.</p>";
                    }
                    ?>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
    <?php include 'footerlink.php'; ?>
</body>
</html>