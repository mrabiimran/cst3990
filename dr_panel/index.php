<?php
session_start();
include "dr_login_check.php";
include "connection.php";
$query = "SELECT 
            f.*, 
            d.drname AS doctor_name, 
            s.servicename AS service_name
          FROM form f
          LEFT JOIN doctor d ON f.drname = d.id
          LEFT JOIN services s ON f.servicesname = s.id";

$result = mysqli_query($con, $query);

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
                    <h1 class="h3 mb-2 text-gray-800">
                    Appointments</h1>
                
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                   
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th> <!-- User Name -->
                <th>Doctor</th> <!-- Doctor Name -->
                <th>Service</th> <!-- Service Name -->
                <th>Pet Detail</th>
                <th>Location</th>
                <th>Contact</th>
                <th>Message</th>
                <th>User Email</th>
            </tr>
        </thead>
        <tbody>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['uername']) . "</td>"; // User Name
            echo "<td>" . htmlspecialchars($row['doctor_name']) . "</td>"; // Doctor Name from JOIN
            echo "<td>" . htmlspecialchars($row['service_name']) . "</td>"; // Service Name from JOIN
            echo "<td>" . htmlspecialchars($row['petdetail']) . "</td>";
            echo "<td>" . htmlspecialchars($row['location']) . "</td>";
            echo "<td>" . htmlspecialchars($row['contact']) . "</td>";
            echo "<td>" . htmlspecialchars($row['message']) . "</td>";
            echo "<td>" . htmlspecialchars($row['useremail']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
    }
    ?>
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