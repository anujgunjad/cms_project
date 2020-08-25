<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO suspect_number_ipdr_info (complaint_id, number_id, ipdr_id, ipdr, email_sent, email_received, location, website, created_date, last_updated)
VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssss", $complaint_id, $number_id, $ipdr_id, $ipdr, $email_sent, $email_received , $location, $website, $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $number_id = $_SESSION['numberkey'];
    $ipdr_id = uniqid();
    
    $ipdr = htmlspecialchars(strip_tags($_POST['ipdr_number']));
    $email_sent = htmlspecialchars(strip_tags($_POST['ipdr_email_outgoing']));
    $email_received = htmlspecialchars(strip_tags($_POST['ipdr_mail_recieved']));


    $location = htmlspecialchars(strip_tags($_POST['ipdr_location']));

    $website = htmlspecialchars(strip_tags($_POST['ipdr_websites']));
    
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