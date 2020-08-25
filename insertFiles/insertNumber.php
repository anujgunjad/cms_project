<?php
session_start();
include_once "../includes/connection.php";
global $conn;
$stmt = $conn->prepare("INSERT INTO suspect_numbers(complaint_id, number_id , number_one , company, files, email_sent, email_received, suspect_name, suspect_address, city, state, retailer_name, uid_num, other_num, pdf, confirmation, remark, reminder, mail_id, caf_date, created_date, last_updated) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssssssssssssssss", $complaint_id, $number_id, $number_one, $company, $files, $email_sent ,$email_received, $suspect_name, $suspect_address, $city, $state, $retailer_name, $uid_num, $other_num, $pdf, $confirmation, $remark, $reminder, $mail_id, $caf_date, $createDate, $lastUpdate);

    $complaint_id = $_SESSION['key'];
    $number_id = uniqid();
    //First row
    $number_one = htmlspecialchars(strip_tags($_POST['number_one']));
   
    $company = htmlspecialchars(strip_tags($_POST['company']));
    $files = htmlspecialchars(strip_tags($_POST['files']));
    //Sec row 
    $email_sent = htmlspecialchars(strip_tags($_POST['email_sent']));
    $email_received = htmlspecialchars(strip_tags($_POST['email_received']));
    $suspect_name = htmlspecialchars(strip_tags($_POST['suspect_name']));
    //Third row
    $suspect_address = htmlspecialchars(strip_tags($_POST['suspect_address']));
    $city = htmlspecialchars(strip_tags($_POST['city']));
    $state = htmlspecialchars(strip_tags($_POST['state']));
    $retailer_name = htmlspecialchars(strip_tags($_POST['retailer_name']));
    //Fourth row
    $uid_num = htmlspecialchars(strip_tags($_POST['uid_num']));
    $other_num = htmlspecialchars(strip_tags($_POST['other_num']));

    //$pdf = htmlspecialchars(strip_tags($_POST['pdf']));

    $pdf_name = $_FILES['pdf']['name'];
    $pdf_temp_loc = $_FILES['pdf']['tmp_name'];
    $pdf = "files/suspect_number/".$pdf_name;
    move_uploaded_file($pdf_temp_loc, $pdf);


    $confirmation = htmlspecialchars(strip_tags($_POST['confirmation']));
    //Fifth row
    $remark = htmlspecialchars(strip_tags($_POST['remark']));
    $reminder = htmlspecialchars(strip_tags($_POST['reminder']));
    $mail_id = htmlspecialchars(strip_tags($_POST['mail_id']));
    $caf_date = htmlspecialchars(strip_tags($_POST['caf_date']));

    
    
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