<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO suspect_number_cdr_info (complaint_id, number_id, cdr_id, cdr, email_sent, email_received, imei, imsi, location, location_date, location_time, night_loc, service_name, suspect_number, cdr_pdf, created_date, last_updated)
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssssssss", $complaint_id, $number_id, $cdr_id, $cdr, $email_sent, $email_received ,$imei, $imsi, $location, $location_date, $location_time, $night_loc, $service_name, $suspect_number, $cdr_pdf, $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $number_id = $_SESSION['numberkey'];
    $cdr_id = uniqid();
    
    $cdr = htmlspecialchars(strip_tags($_POST['cdr_number']));
    $email_sent = htmlspecialchars(strip_tags($_POST['cdr_email_outgoing']));
    $email_received = htmlspecialchars(strip_tags($_POST['cdr_mail_recieved']));

    $imei = htmlspecialchars(strip_tags($_POST['imei_number']));
    $imsi = htmlspecialchars(strip_tags($_POST['imsi_number']));
    $location = htmlspecialchars(strip_tags($_POST['cdr_location']));

    $location_date = htmlspecialchars(strip_tags($_POST['cdr_location_date']));
    $location_time = htmlspecialchars(strip_tags($_POST['cdr_location_time']));

    $night_loc = htmlspecialchars(strip_tags($_POST['cdr_night_location']));
    $service_name = htmlspecialchars(strip_tags($_POST['cdr_services_name']));
    $suspect_number = htmlspecialchars(strip_tags($_POST['cdr_suspect_number']));

    $cdr_pdf_name = $_FILES['cdr_pdf']['name'];
    $pdf_temp_loc = $_FILES['cdr_pdf']['tmp_name'];
    $cdr_pdf = "files/suspect_cdr_files/".$cdr_pdf_name;
    move_uploaded_file($pdf_temp_loc, $cdr_pdf);
    
    $createDate; 
    $lastUpdate; 
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
        $_SESSION['numberkey'] = $number_id;
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>