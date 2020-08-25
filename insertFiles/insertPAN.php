<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO suspect_pan_info(complaint_id, acc_id, pan_info_id, pan, pan_verified, pan_username, adhar_number, income_tax, gst_in, tin, sales_tax, created_date, last_updated)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssss", $complaint_id, $acc_id, $pan_id, $pan, $pan_verified, $pan_name, $aadhar_num, $income, $gst, $tin, $sales, $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $acc_id = $_SESSION['acckey'];
    $pan_id = uniqid();
    
    $pan = htmlspecialchars(strip_tags($_POST['pan_number']));
    $pan_verified = htmlspecialchars(strip_tags($_POST['pan_verified']));
    $pan_name = htmlspecialchars(strip_tags($_POST['Pan_username']));


    $aadhar_num = htmlspecialchars(strip_tags($_POST['aadhar_number']));

    $income = htmlspecialchars(strip_tags($_POST['incometax']));
    $gst = htmlspecialchars(strip_tags($_POST['gst_in']));
    $tin = htmlspecialchars(strip_tags($_POST['Tin']));
    $sales = htmlspecialchars(strip_tags($_POST['salestax']));
    
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