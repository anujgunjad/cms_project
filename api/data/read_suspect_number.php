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
    $stmt = $data->read_suspect_mobile();

    $num = $stmt->rowCount();

    if($num > 0){
        $data_arr = array();
        $data_arr["numbers"] = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "complaint_number" => $complaint_number,
                "number_id" => $number_id,
                "suspect_id" => $suspect_id,
                "number" => $number_one,
                "company" => $company,
                "files" => $files,
                "email_sent" => $email_sent,
                "email_received" => $email_received,
                "suspect_name" => $suspect_name,
                "suspect_address" => $suspect_address,
                "city" => $city,
                "state" => $state,
                "retailer_name" => $retailer_name,
                "uid_num" => $uid_num,
                "other_num" => $other_num,
                "pdf" => $pdf,
                "confirmation" => $confirmation,
                "remark" => $remark,
                "reminder" => $reminder,
                "mail_id" => $mail_id,
                "caf_date" => $caf_date
            );
            array_push($data_arr["numbers"], $data_items);
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
            array("message" => "No numbers found.")
        );
    }
?>