<?php
    session_start();
    include_once "../includes/connection.php";
    $complaintKey = $_SESSION['key'];
    $id = $_SESSION['user_id'];
    //$query = "INSERT INTO basic_details (complaint_id, complaint_no, ap_name, ap_age, ap_gender, ap_mob, ap_address, ap_country, ap_state, ap_city, ap_pin_code, ap_adhar, complaint_type, sub_complaint_type, it_act, bh_dv, crime_date, crime_time, amount, checker_name, created_date, last_updated, complaint_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $id = $_SESSION['user_id'];
    $stmt = $conn->prepare("UPDATE basic_details SET complaint_id = ?,complaint_no = ?, ap_name= ?, ap_age = ?,ap_gender= ?,ap_mob = ?,ap_address = ?,ap_country = ?,ap_state = ?, ap_city = ?, ap_pin_code = ?, ap_adhar = ?, complaint_type = ?, sub_complaint_type = ?, it_act = ?, bh_dv = ?, crime_date = ?, crime_time = ? , amount = ?, freeze_amount = ?, checker_name = ?, created_date = ?, last_updated = ?, complaint_status = ?, user_id = ? WHERE complaint_id = '$complaintKey'");
    $stmt->bind_param("sssssssssssssssssssssssss", $complaintKey, $complaintNo , $apName, $apAge, $apGender, $apMob, $apAdd, $country, $state, $city, $pinCode, $apAdhar, $complaintType, $subComplaintType, $itAct, $bhDv, $crimeDate, $crimeTime, $amount, $freeze_amount, $checkerName, $createDate, $lastUpdate, $comStatus, $id);

    
    
    //FORM FIELDS FROM HERE
    $complaintNo = $_POST["complaint_no"];
    $apName = $_POST["ap_name"];
    $apAge =  $_POST["ap_age"];
    $apGender = $_POST["ap_gender"];
    $apMob = $_POST["ap_mob"];
    $apAdd = $_POST["ap_address"];
    $country = $_POST["ap_country"];
    $state = $_POST["ap_state"];
    $city = $_POST["ap_city"];
    $pinCode = $_POST["ap_pin_code"];
    $apAdhar = $_POST["ap_adhar"];
    $complaintType = $_POST["complaint_type"];
    $subComplaintType = $_POST["sub_complaint_type"];
    $itAct = $_POST["it_act"];
    $bhDv = $_POST["bh_dv"];
    $crimeDate = $_POST["crime_date"];
    $crimeTime = $_POST["crime_time"];
    $amount = $_POST["amount"];
    $freeze_amount = $_POST["freeze_amount"];
    $checkerName = $_POST["checker_name"];
    
    $createDate; 
    $lastUpdate; 
    $comStatus  = "1";
    
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
        $_SESSION['key'] = $complaintKey;
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>