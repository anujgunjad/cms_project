<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO `bank_accounts_iplogs`(`complaint_id`, `acc_id`, `iplog_id`, `iplog`, `email_sent`, `email_received`, `created_date`, `last_updated`)
VALUES (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $complaint_id, $acc_id, $iplog_id, $iplog, $email_sent, $email_received , $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $acc_id = $_SESSION['acckey'];
    $iplog_id = uniqid();
    
    $iplog = htmlspecialchars(strip_tags($_POST['iplog']));
    $email_sent = htmlspecialchars(strip_tags($_POST['iplog_email_sent']));
    $email_received = htmlspecialchars(strip_tags($_POST['iplog_email_recieved"']));
    
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