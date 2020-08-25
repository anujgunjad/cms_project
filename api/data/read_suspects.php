<?php
    //set headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Header: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset= UTF-8");

    //include Files
    include_once '../../includes/config.php';
    include_once '../objects/basic_details.php';

    //initialize Database
    $database = new Database();
    $db = $database->getConnection();

    //initialize Object
    $data = new Basic($db);

    $data->complaint_id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
    //Query Product
    $stmt = $data->read_suspect();

    $num = $stmt->rowCount();

    if($num > 0){
        $data_arr = array();
        $data_arr["suspects"] = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "complaint_number" => $complaint_number,
                "suspect_id" => $suspect_id,
                "suspect_name" => $suspect_name,
                "suspect_address" => $suspect_address,
                "email_id" => $email_id,
                "domain_name" => $domain_name,
                "upi_phone_no" => $upi_phone_no,
                "upivpa" => $upivpa,
                "software_name" => $software_name,
                "complaint_action" => $complaint_action,
                "pending_reason" => $pending_reason,
                "remark" => $remark,
                "created_date" => $created_date,
                "last_updated" => $last_updated
            );
            array_push($data_arr["suspects"], $data_items);
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
            array("message" => "No suspects found.")
        );
    }
?>