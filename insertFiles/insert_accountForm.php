<?php
    session_start();
    include("../includes/config.php");
    global $conn;

    $stmt = $conn->prepare("INSERT INTO account_info (`acc_number`, `bank_name`, `state`, `branch_name`, `mail_date`, `mail_received`, `kyc_name`, `address`, `city`, `state_twice`, `alternate_number`, `profit_acc`, `internet_banking`, `bank_manager_name`, `bank_manager_number`, `kyc_pdf`, `complaint_key`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssssssss",$acc_num, $bank_num, $state, $branch_name, $mail_date, $mail_update, $kyc_name, $address, $city, $state_twice, $alt_num, $profit_acc, $internet_acc, $bank_man_name,$bank_man_num, $kyc_pdf, $complaint_key);

    $acc_num = $_POST['acc_num'];
    $bank_num = $_POST['bank_name'];
    $state = $_POST['state'];
    $branch_name = $_POST['branch_name'];
    $mail_date = $_POST['mail_date'];
    $mail_update = $_POST['mail_update'];
    $kyc_name = $_POST['kyc_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state_twice = $_POST['state_twice'];
    $alt_num = $_POST['alt_num'];
    $profit_acc = $_POST['profit_acc'];
    $internet_acc = $_POST['internet_info'];
    $bank_man_name = $_POST['bank_man_name'];
    $bank_man_num = $_POST['bank_man_num'];
    $kyc_pdf = $_POST['kyc_pdf'];
    $complaint_key = 11;

    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>