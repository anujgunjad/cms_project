<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO `bank_accounts_atm`(`complaint_id`, `acc_id`, `atm_footage_id`, `atm_footage`, `email_sent`, `email_received`, `created_date`, `last_updated`) 
VALUES (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $complaint_id, $acc_id, $atm_id, $atm_foot, $email_sent, $email_received , $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $acc_id = $_SESSION['acckey'];
    $atm_id = uniqid();
    
    $atm_foot = htmlspecialchars(strip_tags($_POST['atm_footage']));
    $email_sent = htmlspecialchars(strip_tags($_POST['atm_email_sent']));
    $email_received = htmlspecialchars(strip_tags($_POST['atm_email_recieved']));
    
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