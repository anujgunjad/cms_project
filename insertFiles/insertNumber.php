<?php
session_start();
include("../includes/config.php");
global $conn;
$stmt = $conn->prepare("INSERT INTO numbers(`number_one`, `company`, `files`, `email_sent`, `email_received`, `suspect_name`, `suspect_address`, `district`, `city`, `retailer_name`, `uid_num`, `other_num`, `pdf`, `confirmation`, `remark`, `reminder`, `mail_id`, `caf_date`, `complaint_id`) 
VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("sssssssssssssssssss",$number_one,$company, $files, $email_sent ,$email_received, $suspect_name, $suspect_address, $district, $city, $retailer_name, $uid_num, $other_num,$pdf, $confirmation, $remark, $reminder, $mail_id, $caf_date, $complaint_id);

    //First row
    $number_one = $_POST['number_one'];
    $company = $_POST['company'];
    $files = $_POST['files'];
    //Sec row 
    $email_sent = $_POST['email_sent'];
    $email_received = $_POST['email_received'];
    $suspect_name = $_POST['suspect_name'];
    //Third row
    $suspect_address = $_POST['suspect_address'];
    $district = $_POST['district'];
    $city = $_POST['city'];
    $retailer_name = $_POST['retailer_name'];
    //Fourth row
    $uid_num = $_POST['uid_num'];
    $other_num = $_POST['other_num'];
    $pdf = $_POST['pdf'];
    $confirmation = $_POST['confirmation'];
    //Fifth row
    $remark = $_POST['remark'];
    $reminder = $_POST['reminder'];
    $mail_id = $_POST['mail_id'];
    $caf_date = $_POST['caf_date'];

    $complaint_id = $_SESSION['key'];
    
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>