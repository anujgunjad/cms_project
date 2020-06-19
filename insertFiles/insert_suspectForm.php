<?php
    session_start();
    include("../includes/config.php");
    global $conn;
    
    $stmt = $conn->prepare("INSERT INTO suspect_details (complaint_key,suspect_id, suspect_name, suspect_address, first_mobile, second_mobile, account_no, it_act, email_id, domain_name, upi_phone_no, upivpa, wallet_name, software_name, complaint_action, pending_reason,remark) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssssssss",$key,$suspectKey, $suspectName, $suspectAdd, $firstMob, $secondMob, $accNo, $itAct, $email_id, $domain_name, $upi_phone_no, $upivpa, $wallet_name, $software, $comAct, $penRea,$remark);
    $key = $_SESSION['key'];
    $suspectKey = uniqid();
    $suspectName = $_POST["suspect_name"];
    $suspectAdd = $_POST["address"];
    $firstMob = $_POST["first_sus_number"];
    $secondMob = $_POST["sec_sus_number"];
    $accNo = $_POST["account_number"];
    $itAct = $_POST["it_act"];
    $email_id = $_POST["sus_emailid"];
    $domain_name = $_POST["domain_name"];
    $upi_phone_no = $_POST["upi_phone_number"];
    $upivpa = $_POST["upi_vpa"];
    $wallet_name = $_POST["wallet_name"];
    $software = $_POST["app_soft"];
    $comAct = $_POST["com_action"];
    $penRea = $_POST["pen_reason"];
    $remark = $_POST["remark"];
    
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>