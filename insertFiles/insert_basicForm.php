<?php
    session_start();
    include("../includes/config.php");
    global $conn;

    $stmt = $conn->prepare("INSERT INTO basic_details (complaint_key, ap_name, ap_age, ap_mob, ap_address, ap_adhar, crime_type, way_of_crime, it_act, bh_dv, crime_date, crime_time, amount, checker_name, complaint_no,com_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssssssssss",$complaintKey, $apName, $apAge, $apMob, $apAdd, $apAdhar, $crimeType, $wayOfCrime, $itAct, $bhDv, $crimeDate, $crimeTime, $amount, $checkerName, $complaintNo,$com_date);

    $complaintKey = uniqid();
    $apName = $_POST["ap_name"];
    $apAge = $_POST["ap_age"];
    $apMob = $_POST["ap_mob"];
    $apAdd = $_POST["ap_add"];
    $apAdhar = $_POST["ap_adhar"];
    $crimeType = $_POST["crime_type"];
    $wayOfCrime = $_POST["way_of_crime"];
    $itAct = $_POST["it_act"];
    $bhDv = $_POST["bh_dv"];
    $crimeDate = $_POST["crime_date"];
    $crimeTime = $_POST["crime_time"];
    $amount = $_POST["amount"];
    $checkerName = $_POST["checker_name"];
    $complaintNo = $_POST["complaint_no"];
    $com_date = $_POST["com_date"];
    
    $execution = $stmt->execute();
    if($execution == true){
        echo "Inserted Successfully!!!";
        $_SESSION['key'] = $complaintKey;
    }
    else {
        echo "Insertion Failed!!!";  
    }
?>