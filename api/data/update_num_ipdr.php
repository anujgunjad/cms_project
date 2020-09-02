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
            
            $basic->complaint_id_ipdr = $data->complaint_id_ipdr;
            $basic->number_id_ipdr = $data->number_id_ipdr;
            $basic->ipdr_id_ipdr = $data->ipdr_id_ipdr;
            $basic->ipdr_ipdr = $data->ipdr_ipdr;
            $basic->email_sent_ipdr = $data->email_sent_ipdr;
            $basic->email_received_ipdr = $data->email_received_ipdr;
            $basic->location_ipdr = $data->location_ipdr;
            $basic->website_ipdr = $data->website_ipdr;
            $basic->created_date_ipdr = $data->created_date_ipdr;
            $basic->last_updated_ipdr = $data->last_updated_ipdr;

    if($basic->updateNumberIPDR()){
        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "IPDR was updated."));
    }
    // if unable to update the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update IPDR."));
    }
?>