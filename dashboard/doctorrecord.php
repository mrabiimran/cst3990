<?php
session_start(); // Missing semicolon fixed

include 'admin_login_check.php';
include "connection.php";

// Fetch records
$records = mysqli_query($con, "SELECT * FROM record");

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
        <?php include 'nav.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Record</h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                    
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
            <th>Update</th>
            <th>Delete</th>
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
                    <td class="text-center">
    <a href="doctorrecordupdate.php?id=<?php echo $row['id']; ?>">
        <img src="img/update.png" width="35" alt="Update">
    </a>
</td>
<td class="text-center">
    <a href="doctorrecorddelete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">
        <img src="img/delete.png" width="35" alt="Delete">
    </a>
</td>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
   <?php include 'footerlink.php'?>

</body>

</html>