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


     $data->number_id = isset($_GET['number_id']) ?  $_GET['number_id'] : die();
     $data->suspect_id = isset($_GET['suspect_id']) ? $_GET['suspect_id'] : die();
     $data->complaint_id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
    
     //Query
     $stmt = $data->read_suspect_mobile_cdr();

     $num = $stmt->rowCount();

     if($num > 0){

        $data_arr = array();
        $data_arr["cdr"] = array();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            $data_items = array(
                "complaint_number" => $complaint_number,
                "suspect_id" => $suspect_id,
                "number_id" => $number_id,
                "cdr_id" => $cdr_id,
                "cdr" => $cdr,
                "email_sent" => $email_sent,
                "email_received" => $email_received,
                "imei" => $imei,
                "imsi" => $imsi,
                "location" => $location,
                "location_date" => $location_date,
                "night_loc" => $night_loc,
                "service_name" => $service_name,
                "suspect_number" => $suspect_number,
                "cdr_pdf" => $cdr_pdf
            );
            array_push($data_arr["cdr"], $data_items);
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