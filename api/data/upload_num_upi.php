<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once '../../includes/config.php';
include_once '../objects/basic_details.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$basic = new Basic($db);
// get id of product to be edited
            $data = json_decode(file_get_contents("php://input"));
            
            $basic->complaint_id_upi = $data->complaint_id_upi;
            $basic->number_id_upi = $data->number_id_upi;
            $basic->upi_id_upi = $data->upi_id_upi;
            $basic->upi_upi = $data->upi_upi;
            $basic->upi_name_upi = $data->upi_name_upi;
            $basic->upi_link_upi = $data->upi_link_upi;
            $basic->created_date_upi = $data->created_date_upi;
            $basic->last_updated_upi = $data->last_updated_upi;

    if($basic->updateNumberUPI()){
        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "UPI was updated."));
    }
    // if unable to update the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update UPI."));
    }
?>