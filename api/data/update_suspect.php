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
            
            $basic->suspect_name_suspect = $data->suspect_name_suspect;
            $basic->suspect_address_suspect = $data->suspect_address_suspect;
            $basic->suspect_mob_suspect = $data->suspect_mob_suspect;
            $basic->email_id_suspect = $data->email_id_suspect;
            $basic->domain_name_suspect = $data->domain_name_suspect;
            $basic->upi_phone_no_suspect = $data->upi_phone_no_suspect;
            $basic->upivpa_suspect = $data->upivpa_suspect;
            $basic->software_name_suspect = $data->software_name_suspect;

            $basic->complaint_action_suspect = $data->complaint_action_suspect;
            $basic->pending_reason_suspect = $data->pending_reason_suspect;
            $basic->remark_suspect = $data->remark_suspect;
            $basic->created_date_suspect = $data->created_date_suspect;
            $basic->last_updated_suspect = $data->last_updated_suspect;
            $basic->complaint_id_suspect = $data->complaint_id_suspect;
            $basic->suspect_id_suspect = $data->suspect_id_suspect;

    if($basic->updateSuspect()){
        // set response code - 200 ok
        http_response_code(200);
        // tell the user
        echo json_encode(array("message" => "Suspect was updated."));
    }
    // if unable to update the product, tell the user
    else{
        // set response code - 503 service unavailable
        http_response_code(503); 
        // tell the user
        echo json_encode(array("message" => "Unable to update Suspect."));
    }
?>