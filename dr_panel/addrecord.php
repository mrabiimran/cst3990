<?php
session_start();
include 'dr_login_check.php';

include 'connection.php';
// Fetch required data for dropdowns
$doctors = mysqli_query($con, "SELECT drname FROM doctor");
$services = mysqli_query($con, "SELECT id, servicename FROM services");

// Handle form submission
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $service_id = $_POST['service_id'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $petdetail = $_POST['petdetail'];
    $record = $_POST['record'];
    $bill = $_POST['bill'];
    $prescription = $_POST['prescription'];
    $useremail = $_POST['useremail'];
    $dr_id = $_SESSION['dr_id'];
    
    // Fetch doctor name from session dr_id
    $doctorQuery = mysqli_query($con, "SELECT drname FROM doctor WHERE id = '$dr_id'");
    $doctorRow = mysqli_fetch_assoc($doctorQuery);
    $drname = $doctorRow['drname'];

    // Insert data into record table
    $query = "INSERT INTO record 
              VALUES ('','$username', '$drname', '$service_id', '$record', '$bill', '$prescription', '$location', '$contact', '$petdetail', '$useremail')";
    
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Record added successfully'); window.location.href='record.php';</script>";
    } else {
        die("Error: " . mysqli_error($con));
    }
}
?>

<!DOCTYPE html>


<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

   <?php include 'headlink.php'?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php include 'sidebar.php'?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
          <?php  include "header.php";?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Add A Service</h1>
                

<form method="POST" class="user">
    <h3>Medical Record Form</h3>


    <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Client Name" name="username" required>
                                        </div>

  
  
                                        <label>Service:</label>
    <select name="service_id" required>
        <?php while ($service = mysqli_fetch_assoc($services)) : ?>
            <option value="<?= $service['id'] ?>"><?= $service['servicename'] ?></option>
        <?php endwhile; ?>
    </select><br>
    <div class="form-group">
    <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Location" name="location" required>
                                        </div>
                                        <div class="form-group">
    <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Contact" name="contact" required>
                                        </div>
                                        <div class="form-group">
    <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Pet Detail" name="petdetail" required>
                                        </div>
                                        <div class="form-group">
    <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Your Record" name="record" required>
                                        </div>
                                        <div class="form-group">
    <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Bill Amount" name="bill" required>
                                        </div>
                                        <div class="form-group">
    <textarea type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter  Prescription" name="prescription" required></textarea>
                                        </div>
                                        <div class="form-group">
    <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Client Email" name="useremail" required>
                                        </div>

    <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">Submit Record</button>
</form>



                    <!-- DataTales Example -->
                  

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

 

    <!-- Logout Modal-->


    <!-- Bootstrap core JavaScript-->
   <?php include 'footerlink.php'?>

</body>

</html>