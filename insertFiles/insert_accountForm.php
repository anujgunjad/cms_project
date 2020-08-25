<?php
    session_start();
    include_once "../includes/connection.php";
    global $conn;

    $stmt = $conn->prepare("INSERT INTO suspect_bank_accounts(complaint_id, acc_id, acc_number, bank_name, state, branch_name, mail_date, mail_received, freeze_amount, kyc_name, address, city, state_twice, alternate_number, profit_acc, internet_banking, bank_manager_name, bank_manager_number, kyc_pdf, bank_statement_file, created_date, last_updated) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssssssssss",$complaint_key, $acc_id, $acc_num, $bank_name, $state, $branch_name, $mail_date, $mail_update, $freeze_amount, $kyc_name, $address, $city, $state_twice, $alt_num, $profit_acc, $internet_acc, $bank_man_name,$bank_man_num, $kyc_pdf, $state_pdf, $createDate, $lastUpdate);


    $complaint_key = $_SESSION['key'];
    $acc_id = uniqid();

    $acc_num = $_POST['acc_num'];
    $bank_name = $_POST['bank_name'];
    $state = $_POST['state'];
    $branch_name = $_POST['branch_name'];
    $mail_date = $_POST['mail_date'];
    $mail_update = $_POST['mail_received'];
    $freeze_amount = $_POST['freeze_amount'];
    $kyc_name = $_POST['kyc_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state_twice = $_POST['state_twice'];
    $alt_num = $_POST['alt_num'];
    $profit_acc = $_POST['profit_acc'];
    $internet_acc = $_POST['internet_info'];
    $bank_man_name = $_POST['bank_man_name'];
    $bank_man_num = $_POST['bank_man_num'];


    $pdf_name = $_FILES['kyc_pdf']['name'];
    $pdf_temp_loc = $_FILES['kyc_pdf']['tmp_name'];
    $kyc_pdf = "files/kyc_pdf/".$pdf_name;
    move_uploaded_file($pdf_temp_loc, $kyc_pdf);

    
    $state_name = $_FILES['bank_statement']['name'];
    $state_temp_loc = $_FILES['bank_statement']['tmp_name'];
    $state_pdf = "files/bank_statement/".$state_name;
    move_uploaded_file($state_temp_loc, $state_pdf);
    
    $createDate; 
    $lastUpdate; 
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
        $_SESSION['acckey'] = $acc_id;
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>