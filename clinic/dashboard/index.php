<?php
session_start(); // Missing semicolon fixed

include 'admin_login_check.php';
include "connection.php";
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
                    <h1 class="h3 mb-2 text-gray-800">Appointment</h1>
                 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                     
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Doctor</th>
            <th>Service</th>
            <th>Pet Details</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Message</th>
            <th>User Email</th>
            <th>Username</th>
            <th>Update</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch form submissions
$formDataQuery = "SELECT * FROM form ORDER BY id DESC";
$formDataResult = mysqli_query($con, $formDataQuery);

        while ($row = mysqli_fetch_assoc($formDataResult)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td>
                    <?php 
                        // Get doctor name using ID
                        $drId = $row['drname'];
                        $drQuery = mysqli_query($con, "SELECT drname FROM doctor WHERE id = '$drId'");
                        $dr = mysqli_fetch_assoc($drQuery);
                        echo $dr['drname'] ?? 'N/A';
                    ?>
                </td>
                <td>
                    <?php 
                        // Get service name using ID
                        $serviceId = $row['servicesname'];
                        $serviceQuery = mysqli_query($con, "SELECT servicename FROM services WHERE id = '$serviceId'");
                        $service = mysqli_fetch_assoc($serviceQuery);
                        echo $service['servicename'] ?? 'N/A';
                    ?>
                </td>
                <td><?= $row['petdetail']; ?></td>
                <td><?= $row['location']; ?></td>
                <td><?= $row['contact']; ?></td>
                <td><?= $row['message']; ?></td>
                <td><?= $row['useremail']; ?></td>
                <td><?= $row['uername']; ?></td>
                
            <td class="text-center">
    <a href="appointmentupdate.php?id=<?php echo $row['id']; ?>">
        <img src="img/update.png" width="35" alt="Update">
    </a>
</td>
<td class="text-center">
    <a href="appointmentdelete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?')">
        <img src="img/delete.png" width="35" alt="Delete">
    </a>
</td>
            </tr>
        <?php } ?>
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

<?php
include 'connection.php';

// Handle message submission
if (isset($_POST['send'])) {
    $msg = $_POST['message'];
    if ($msg != '') {
        mysqli_query($con, "INSERT INTO chat VALUES('', '$msg')");
        echo "<script>window.location.href='chat.php';</script>";
    }
}

// Handle message delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM chat WHERE id = $id");
    echo "<script>window.location.href='chat.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Chat</title>
    <style>
        .chat-box { width: 400px; margin: auto; border: 1px solid #ccc; padding: 10px; }
        .msg { padding: 10px; border-radius: 8px; background: #f1f1f1; margin-bottom: 10px; position: relative; }
        .dots { position: absolute; right: 10px; top: 10px; cursor: pointer; }
        .options { display: none; position: absolute; right: 10px; top: 25px; background: white; border: 1px solid #ccc; border-radius: 5px; }
        .options a { display: block; padding: 5px 10px; text-decoration: none; color: red; }
        .options a:hover { background: #eee; }
    </style>
</head>
<body>

<div class="chat-box">
    <h3>Admin Chat</h3>
    
    <form method="post">
        <input type="text" name="message" placeholder="Type message..." required style="width: 75%; padding: 8px;">
        <button type="submit" name="send" style="padding: 8px;">Send</button>
    </form>

    <hr>

    <?php
    $res = mysqli_query($con, "SELECT * FROM chat ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<div class="msg">';
        echo htmlspecialchars($row['message']);
        echo '
            <div class="dots" onclick="toggleOptions(this)">•••</div>
            <div class="options">
                <a href="?delete='.$row['id'].'">Delete</a>
            </div>
        </div>';
    }
    ?>
</div>

<script>
    function toggleOptions(el) {
        let all = document.querySelectorAll('.options');
        all.forEach(opt => opt.style.display = 'none'); // hide all
        let options = el.nextElementSibling;
        options.style.display = (options.style.display === 'block') ? 'none' : 'block';
    }

    // Hide menu if clicked outside
    window.onclick = function(e) {
        if (!e.target.classList.contains('dots')) {
            document.querySelectorAll('.options').forEach(opt => opt.style.display = 'none');
        }
    }
</script>

</body>
</html>