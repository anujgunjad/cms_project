<?php
    session_start();
    include_once "../includes/connection.php";
    //$query = "INSERT INTO basic_details (complaint_id, complaint_no, ap_name, ap_age, ap_gender, ap_mob, ap_address, ap_country, ap_state, ap_city, ap_pin_code, ap_adhar, complaint_type, sub_complaint_type, it_act, bh_dv, crime_date, crime_time, amount, checker_name, created_date, last_updated, complaint_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare("INSERT INTO basic_details (complaint_id, complaint_no, ap_name, ap_age, ap_gender, ap_mob, ap_address, ap_country, ap_state, ap_city, ap_pin_code, ap_adhar, complaint_type, sub_complaint_type, it_act, bh_dv, crime_date, crime_time, amount,freeze_amount, checker_name, created_date, last_updated, complaint_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssssssssssss", $complaintKey, $complaintNo , $apName, $apAge, $apGender, $apMob, $apAdd, $country, $state, $city, $pinCode, $apAdhar, $complaintType, $subComplaintType, $itAct, $bhDv, $crimeDate, $crimeTime, $amount, $freeze_amount, $checkerName, $createDate, $lastUpdate, $comStatus);

    $complaintKey = uniqid();
    
    //FORM FIELDS FROM HERE
    $complaintNo = htmlspecialchars(strip_tags($_POST["complaint_no"]));
    $apName = htmlspecialchars(strip_tags($_POST["ap_name"]));
    $apAge = htmlspecialchars(strip_tags( $_POST["ap_age"]));
    $apGender = htmlspecialchars(strip_tags($_POST["ap_gender"]));
    $apMob = htmlspecialchars(strip_tags($_POST["ap_mob"]));
    $apAdd = htmlspecialchars(strip_tags($_POST["ap_address"]));
    $country = htmlspecialchars(strip_tags($_POST["ap_country"]));
    $state = htmlspecialchars(strip_tags($_POST["ap_state"]));
    $city = htmlspecialchars(strip_tags($_POST["ap_city"]));
    $pinCode = htmlspecialchars(strip_tags($_POST["ap_pin_code"]));
    $apAdhar = htmlspecialchars(strip_tags($_POST["ap_adhar"]));
    $complaintType = htmlspecialchars(strip_tags($_POST["complaint_type"]));
    $subComplaintType = htmlspecialchars(strip_tags($_POST["sub_complaint_type"]));
    $itAct = htmlspecialchars(strip_tags($_POST["it_act"]));
    $bhDv = htmlspecialchars(strip_tags($_POST["bh_dv"]));
    $crimeDate = htmlspecialchars(strip_tags($_POST["crime_date"]));
    $crimeTime = htmlspecialchars(strip_tags($_POST["crime_time"]));
    $amount = htmlspecialchars(strip_tags($_POST["amount"]));
    $freeze_amount = htmlspecialchars(strip_tags($_POST["freeze_amount"]));
    $checkerName = htmlspecialchars(strip_tags($_POST["checker_name"]));
    
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