<?php
    session_start();
    include_once "../includes/connection.php";
    global $conn;

    $stmt = $conn->prepare("INSERT INTO suspect_ewallet_info(complaint_id, suspect_ewallet_id, upi_name, mob_number, vpa_id, statement, email_sent, email_received, linked_account, beneficiary, ip_address, ip_add_number, device_id, merchandise, hold_amount, number, created_date, last_updated)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssssss",$complaint_key, $ew_id, $upi_name, $mob, $vpa, $state, $mail_date, $mail_update, $linked, $beneficiary, $ip_add, $ip_add_num, $device_id, $merch, $hold, $num, $createDate, $lastUpdate);


    $complaint_key = $_SESSION['key'];
    $ew_id = uniqid();

    $upi_name = $_POST['upi_name'];
    $mob = $_POST['mob_num'];
    $vpa = $_POST['vpaID'];
    $state = $_POST['statement'];
    $mail_date = $_POST['sent'];
    $mail_update = $_POST['received'];
    $linked = $_POST['linked_acc'];
    $beneficiary = $_POST['benificiar'];
    $ip_add = $_POST['ip_adress'];
    $ip_add_num = $_POST['ip_address_num'];
    $device_id = $_POST['device_id'];
    $merch = $_POST['merchandise'];
    $hold = $_POST['hold_amount'];
    $num = $_POST['number'];    
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