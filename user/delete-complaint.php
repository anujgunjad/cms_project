<?php
    include("../includes/connection.php");
    $id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
    //
    $query = "DELETE FROM `basic_details` WHERE complaint_id = '$id'";
    mysqli_query($conn, $query);
    header("Location: user-dashboard.php");
?>