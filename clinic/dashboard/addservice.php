<?php
session_start();
include 'admin_login_check.php';


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
                    <h1 class="h3 mb-2 text-gray-800">Add A Service</h1>
                
                   <form class="user" method="POST" action="addservice.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Service Name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea type="password" class="form-control" cols="10" rows="8"
                                                id="exampleInputPassword" placeholder="Services Description" name="description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control "
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Image" name="image" >
                                        </div>
                                       
<?php
include 'connection.php';
if (isset($_POST['btn'])) {
$name = $_POST['name'];
$image = $_FILES['image']['name'];
$tmpimage = $_FILES['image']['tmp_name'];
$description = $_POST['description'];


if(move_uploaded_file($tmpimage,"service_image/".$image)){
    $qu = mysqli_query($con,"insert into services values('','$name','$description','$image')");



if ($qu) {
    echo	"<script>alert('Servies has been added successfully');window.location.href='services.php';</script>";
}

else {
    echo "Hmm! Something Wrong"."<br>";
}}
else {
    echo "Image Error". "<br>";
}
}
        
        
        ?>

                                        <input type="submit" class="btn btn-primary btn-user btn-block"  name="btn" value="Add Service">
                                            
                                        
                                       
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