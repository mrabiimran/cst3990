<?php
session_start();
include 'connection.php'; // Database connection
$loggedInUserId = $_SESSION['user_id'];

// Restrict access to logged-in users only
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch username and email from database
$userResult = mysqli_query($con, "SELECT name, email FROM user WHERE id = '$loggedInUserId'");
$user = mysqli_fetch_assoc($userResult);

$loggedInUsername = $user ? $user['name'] : "Guest"; // Default to 'Guest' if not found
$loggedInUseremail = $user ? $user['email'] : "guest@example.com"; // Default to a placeholder email



// Fetch doctors
$doctors = mysqli_query($con, "SELECT id, drname FROM doctor");

// Fetch services
$services = mysqli_query($con, "SELECT id, servicename FROM services");

// Handle form submission
if (isset($_POST['submit'])) {
    $drname = $_POST['drname'];
    $servicesname = $_POST['servicesname'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $message = $_POST['message'];
    $petdetail = $_POST['petdetail'];

    // Insert into database (removed 'username')
    $query = "INSERT INTO form 
              VALUES ('','$drname', '$servicesname', '$petdetail', '$location', '$contact','$message','$loggedInUseremail','$loggedInUsername')";

    if (mysqli_query($con, $query)) {
        echo "<script>alert('Record added successfully'); window.location.href='thankyou.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
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
                            <h2 class="contact-title" style="text-align:center; margin-top:4rem; margin-bottom:2rem">Appointment</h2>
                        </div>
                        <div class="col-lg-8">
                        <form method="POST" action="formtesting.php">

<div class="mb-3">
    <label class="form-label">Doctor Name:</label>
    <select name="drname" class="form-control" required>
        <option value="">Select Doctor</option>
        <?php while ($row = mysqli_fetch_assoc($doctors)) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['drname']; ?></option>
        <?php } ?>
    </select>
</div>


<div class="mb-3">
    <label class="form-label">Service Name:</label>
    <select name="servicesname" class="form-control" required>
        <option value="">Select Service</option>
        <?php while ($row = mysqli_fetch_assoc($services)) { ?>
            <option value="<?= $row['id']; ?>"><?= $row['servicename']; ?></option>
        <?php } ?>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Pet Details:</label>
    <input type="text" name="petdetail" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Location:</label>
    <input type="text" name="location" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Contact:</label>
    <input type="number" name="contact" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Message:</label>
    <textarea name="message" class="form-control" required></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<a href="your_page.php" class="btn btn-secondary">Cancel</a>
</form>



                        </div>
                    
                    </div>
                </div>
            </section>
        <!-- ================ contact section end ================= -->
    </main>
<?php include 'footer.php';?>
    <!-- JS here -->

    <?php include 'footerlink.php'?>

    </body>
</html>