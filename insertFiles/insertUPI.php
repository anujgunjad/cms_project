<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO suspect_number_upi_info(complaint_id, number_id, upi_id, upi, upi_name, upi_link, created_date, last_updated)
VALUES (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $complaint_id, $number_id, $upi_id, $upi, $upi_name, $upi_link, $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $number_id = $_SESSION['numberkey'];
    $upi_id = uniqid();
    
    $upi = htmlspecialchars(strip_tags($_POST['upi_id']));
    $upi_link = htmlspecialchars(strip_tags($_POST['upi_link']));
    $upi_name = htmlspecialchars(strip_tags($_POST['upi_name']));

    $createDate; 
    $lastUpdate; 
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>