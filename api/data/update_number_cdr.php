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
            
            $basic->complaint_id_cdr = $data->complaint_id_cdr;
            $basic->number_id_cdr = $data->number_id_cdr;
            $basic->cdr_id_cdr = $data->cdr_id_cdr;
            $basic->cdr_cdr = $data->cdr_cdr;
            $basic->email_sent_cdr = $data->email_sent_cdr;
            $basic->email_received_cdr = $data->email_received_cdr;
            $basic->imei_cdr = $data->imei_cdr;
            $basic->imsi_cdr = $data->imsi_cdr;
            $basic->location_cdr = $data->location_cdr;
            $basic->location_date_cdr = $data->location_date_cdr;
            $basic->location_time_cdr = $data->location_time_cdr;
            $basic->night_loc_cdr = $data->night_loc_cdr;
            $basic->service_name_cdr = $data->service_name_cdr;
            $basic->suspect_number_cdr = $data->suspect_number_cdr;
            $basic->cdr_pdf_cdr = $data->cdr_pdf_cdr;
            $basic->created_date_cdr = $data->created_date_cdr;
            $basic->last_updated_cdr = $data->last_updated_cdr;

    if($basic->updateNumberCDR()){
        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "CDR was updated."));
    }
    // if unable to update the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update CDR."));
    }
?>