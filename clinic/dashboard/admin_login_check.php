<?php
if (!isset($_SESSION['adminloginsuccessfull'])) {
    echo "<script>alert('You are not logged In'); window.location.href='LOGIN.PHP';</script>";
    exit(); // Ensure script stops executing after redirection
}
?>