<?php
session_start();
include("../includes/config.php");
global $conn;
$stmt = $conn->prepare("INSERT INTO suspect_numbers(complaint_id, number_id , number_one , company, files, email_sent, email_received, suspect_name, suspect_address, city, state, retailer_name, uid_num, other_num, pdf, confirmation, remark, reminder, mail_id, caf_date, created_date, last_updated) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssssssssssssssss", $complaint_id, $number_id, $number_one, $company, $files, $email_sent ,$email_received, $suspect_name, $suspect_address, $city, $state, $retailer_name, $uid_num, $other_num, $pdf, $confirmation, $remark, $reminder, $mail_id, $caf_date, $createDate, $lastUpdate);

    //First row
    $number_one = $_POST['number_one'];
    $number_id = uniqid();
    $company = $_POST['company'];
    $files = $_POST['files'];
    //Sec row 
    $email_sent = $_POST['email_sent'];
    $email_received = $_POST['email_received'];
    $suspect_name = $_POST['suspect_name'];
    //Third row
    $suspect_address = $_POST['suspect_address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $retailer_name = $_POST['retailer_name'];
    //Fourth row
    $uid_num = $_POST['uid_num'];
    $other_num = $_POST['other_num'];


    $pdf_name = $_FILES['pdf']['name'];
    $pdf_temp_loc = $_FILES['pdf']['tmp_name'];
    $pdf = ".files/suspect_number/".$pdf_name;
    move_uploaded_file($pdf_temp_loc, $pdf);


    $confirmation = $_POST['confirmation'];
    //Fifth row
    $remark = $_POST['remark'];
    $reminder = $_POST['reminder'];
    $mail_id = $_POST['mail_id'];
    $caf_date = $_POST['caf_date'];

    $complaint_id = $_SESSION['key'];
    
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