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
            
            $basic->complaint_id_e = $data->complaint_id_e;
            $basic->suspect_ewallet_e = $data->suspect_ewallet_e;
            $basic->upi_name_e = $data->upi_name_e;
            $basic->mob_number_e = $data->mob_number_e;
            $basic->vpa_id_e = $data->vpa_id_e;
            $basic->statement_e = $data->statement_e;
            $basic->email_sent_e = $data->email_sent_e;
            $basic->email_received_e = $data->email_received_e;
            $basic->linked_account_e = $data->linked_account_e;
            $basic->beneficiary_e = $data->beneficiary_e;
            $basic->ip_address_e = $data->ip_address_e;
            $basic->ip_add_number_e = $data->ip_add_number_e;
            $basic->device_id_e = $data->device_id_e;
            $basic->merchandise_e = $data->merchandise_e;
            $basic->hold_amount_e = $data->hold_amount_e;
            $basic->number_e = $data->number_e;
            $basic->created_date_e = $data->created_date_e;
            $basic->last_updated_e = $data->last_updated_e;

    if($basic->updateEwallet()){
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
  