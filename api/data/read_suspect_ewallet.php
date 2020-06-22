<?php
     //set headers
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Header: access");
     header("Access-Control-Allow-Methods: GET");
     header("Access-Control-Allow-Credentials: true");
     header("Content-Type: application/json; charset= UTF-8");

    //include files
    include_once "../../includes/config.php";
    include_once "../objects/basic_details.php";

    //initilize database
    $database = new Database();
    $db = $database->getConnection();
    
    //initialize Object
    $data = new Basic($db);

    $data->suspect_id = isset($_GET['suspect_id']) ? $_GET['suspect_id'] : die();
    $data->complaint_id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
    //Query
    $stmt = $data->read_suspect_ewallet();

    $num = $stmt->rowCount();

    if($num > 0){
        $data_arr = array();
        $data_arr["ewallet"] = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "complaint_number" => $complaint_number,
                "suspect_id" => $suspect_id,
                "suspect_ewallet_id" => $suspect_ewallet_id,
                "upi_name" => $upi_name,
                "mob_number" => $mob_number,
                "vpa_id" => $vpa_id,
                "statement" => $statement,
                "email_sent" => $email_sent,
                "email_received" => $email_received,
                "linked_account" => $linked_account,
                "ip_address" => $ip_address,
                "ip_add_number" => $ip_add_number,
                "device_id" => $device_id,
                "merchandise" => $merchandise,
                "hold_amount" => $hold_amount,
                "number" =>$number
            );
            array_push($data_arr["ewallet"], $data_items);
        }
            // set response code - 200 OK
            http_response_code(200);
            // show products data in json format
            echo json_encode($data_arr);
    }
    else {
        // set response code - 404 Not found
        http_response_code(404);   
        // tell the user no products found
        echo json_encode(
            array("message" => "No Wallet found.")
        );
    }
?>