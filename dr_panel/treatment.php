<?php
session_start();
include 'dr_login_check.php';
include 'connection.php';

// Get logged-in doctor name from session
$dr_id = $_SESSION['dr_id'];
$dr_query = mysqli_query($con, "SELECT drname FROM doctor WHERE id = '$dr_id'");
$dr_data = mysqli_fetch_assoc($dr_query);
$loggedInDoctorName = $dr_data['drname'];

// Fetch only records that belong to the logged-in doctor
$records = mysqli_query($con, "SELECT * FROM record WHERE drname = '$loggedInDoctorName'");

// Fetch services for lookup
$serviceLookup = [];
$services = mysqli_query($con, "SELECT id, servicename FROM services");
while ($s = mysqli_fetch_assoc($services)) {
    $serviceLookup[$s['id']] = $s['servicename'];
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
        <?php include "nav.php"?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Treatment
                    </h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                  
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Doctor Name</th>
            <th>Service</th>
            <th>Record</th>
            <th>Bill</th>
            <th>Prescription</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Pet Detail</th>
            <th>User Email</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($records)) : ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['username']; ?></td>
            <td><?= $row['drname']; ?></td>
            <td>
                <?= isset($serviceLookup[$row['servicesname']]) ? $serviceLookup[$row['servicesname']] : 'Unknown'; ?>
            </td>
            <td><?= $row['record']; ?></td>
            <td><?= $row['bill']; ?></td>
            <td><?= $row['prescription']; ?></td>
            <td><?= $row['location']; ?></td>
            <td><?= $row['contact']; ?></td>
            <td><?= $row['petdetail']; ?></td>
            <td><?= $row['useremail']; ?></td>
        </tr>
    <?php endwhile; ?>
</tbody>

    </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
   <?php include 'footerlink.php'?>

</body>

</html>