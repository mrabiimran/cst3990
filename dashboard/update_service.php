<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM services WHERE id = $id";
    $result = mysqli_query($con, $query);
    $service = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $servicename = $_POST['servicename'];
    $servicedesc = $_POST['servicedesc'];
    $old_image = $service['img']; // Store old image filename

    // Handle Image Upload
    if ($_FILES['img']['name'] != '') {  // If a new file is uploaded
        $image_name = time() . '_' . $_FILES['img']['name']; // Rename image to prevent conflicts
        $target_directory = "service_image/";
        $target_file = $target_directory . $image_name;

        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
            // Delete old image if exists
            if (file_exists($target_directory . $old_image)) {
                unlink($target_directory . $old_image);
            }
        } else {
            echo "<script>alert('Error uploading image');</script>";
            $image_name = $old_image; // Keep the old image if upload fails
        }
    } else {
        $image_name = $old_image; // Keep the old image if no new image is uploaded
    }

    // Update query
    $updateQuery = "UPDATE services SET servicename = '$servicename', servicedesc = '$servicedesc', img = '$image_name' WHERE id = $id";
    $updateResult = mysqli_query($con, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Service updated successfully!'); window.location.href='services.php';</script>";
    } else {
        echo "<script>alert('Failed to update service!'); window.location.href='services.php';</script>";
    }
}
?>

<?php
session_start(); // Missing semicolon fixed

if (!isset($_SESSION['adminloginsuccessfull'])) {
    echo "<script>alert('You are not logged In'); window.location.href='LOGIN.PHP';</script>";
    exit(); // Ensure script stops executing after redirection
}

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
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                   <a href="addservice.php">Add Service</a>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>


                        <div class="container mt-5">
        <h2>Update Service</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Service Name:</label>
                <input type="text" name="servicename" class="form-control" value="<?php echo $service['servicename']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Service Description:</label>
                <textarea name="servicedesc" class="form-control" required><?php echo $service['servicedesc']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Image:</label><br>
                <img src="service_image/<?php echo $service['img']; ?>" width="150" alt="Service Image">
            </div>

            <div class="mb-3">
                <label class="form-label">Upload New Image:</label>
                <input type="file" name="img" class="form-control">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
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


