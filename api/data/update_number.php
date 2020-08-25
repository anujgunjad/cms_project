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
            
            $basic->complaint_id_num = $data->complaint_id_num;
            $basic->number_id_num = $data->number_id_num;
            $basic->number_one_num = $data->number_one_num;
            $basic->company_num = $data->company_num;
            $basic->files_num = $data->files_num;
            $basic->email_sent_num = $data->email_sent_num;
            $basic->email_received_num = $data->email_received_num;
            $basic->suspect_name_num = $data->suspect_name_num;
            $basic->suspect_address_num = $data->suspect_address_num;
            $basic->city_num = $data->city_num;
            $basic->state_num = $data->state_num;
            $basic->retailer_name_num = $data->retailer_name_num;
            $basic->uid_num_num = $data->uid_num_num;
            $basic->other_num_num = $data->other_num_num;
            $basic->pdf_num = $data->pdf_num;
            $basic->confirmation_num = $data->confirmation_num;
            $basic->remark_num = $data->remark_num;
            $basic->remainder_num = $data->remainder_num;
            $basic->mail_id_num = $data->mail_id_num;
            $basic->caf_date_num = $data->caf_date_num;
            $basic->created_date_num = $data->created_date_num;
            $basic->last_updated_num = $data->last_updated_num;

    if($basic->updateNumber()){
        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "Product was updated."));
    }
    // if unable to update the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update product."));
    }
?>