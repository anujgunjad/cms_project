<?php
   session_start();
   include_once "../includes/connection.php";
   global $conn;
    
    $stmt = $conn->prepare("INSERT INTO suspect_details(complaint_id, suspect_id, suspect_name, suspect_address, suspect_mob, email_id, domain_name, upi_phone_no, upivpa, software_name, complaint_action, pending_reason, remark, created_date, last_updated) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssssss", $key, $suspectKey, $suspectName, $suspectAdd, $suspectMob, $accNo, $email_id, $domain_name, $upi_phone_no, $upivpa, $wallet_name, $software, $comAct, $penRea,$remark);
   
    $key = $_SESSION['key'];
    $suspectKey = uniqid();
    $suspectName = $_POST["suspect_name"];
    $suspectAdd = $_POST["address"];
    $suspectMob = $_POST["sus_number"];
    $accNo = $_POST["account_number"];
    $email_id = $_POST["email_id"];
    $domain_name = $_POST["domain_name"];
    $upi_phone_no = $_POST["upi_phone_number"];
    $upivpa = $_POST["upi_vpa"];
    $wallet_name = $_POST["wallet_name"];
    $software = $_POST["app_soft"];
    $comAct = $_POST["complaint_action"];
    $penRea = $_POST["panding_reason"];
    $remark = $_POST["remark"];
    
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>