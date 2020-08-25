<?php
    session_start();
    include_once "../includes/connection.php";
    global $conn;

    $stmt = $conn->prepare("INSERT INTO suspect_website_info (complaint_id, website_id, website_name, website_domain, mail_id, website_mobile_number, created_date, last_updated)
    VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssss", $complaint_key, $web_id, $web_name, $domain, $mail, $mob, $createDate, $lastUpdate);

    $complaint_key = $_SESSION['key'];
    $web_id = uniqid();

    $web_name =  htmlspecialchars(strip_tags($_POST['web_name']));
    $domain =  htmlspecialchars(strip_tags($_POST['domain']));
    $mail =  htmlspecialchars(strip_tags($_POST['mail_id']));
    $mob =  htmlspecialchars(strip_tags($_POST['suspect_number']));
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