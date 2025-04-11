<?php
session_start(); // Missing semicolon fixed

include 'admin_login_check.php';

// If the user is logged in, continue loading the page
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
                    <h1 class="h3 mb-2 text-gray-800">Services</h1>
                   <a href="addservice.php">Add Service</a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                     


                        <div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4 align-items-stretch text-center">
        <?php 
        include 'connection.php';
        $qu = mysqli_query($con, "SELECT * FROM services");
        while ($res = mysqli_fetch_array($qu)) { 
        ?>
        <div class="col">
            <div class="card shadow-sm h-100 d-flex flex-column">
                <img src="./service_image/<?php echo $res['img']; ?>" class="card-img-top img-fluid rounded" 
                     style="height: 150px; object-fit: cover;" alt="Service Image">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title"><strong>Service Name: </strong><br><?php echo $res['servicename']; ?></h5>
                    
                       <p> <strong> <h5 class="card-title">Service Desrciption: </h5><br></strong><?php echo $res['servicedesc']; ?></p>

                    <div class="mt-auto mr-10">
                    <a href="delete_service.php?id=<?php echo $res['id']; ?>" 
   onclick="return confirm('Are you sure you want to delete this service?');">
    <img src="img/delete.png" width="35" alt="Delete">
</a>             
<a href="update_service.php?id=<?php echo $res['id']; ?>" class="ml-4">
    <img src="img/update.png" width="35" alt="Update">
</a>

                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>




                        <!-- <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
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