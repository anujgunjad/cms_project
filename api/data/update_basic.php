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
            
            $basic->complaint_id_basic = $data->complaint_id_basic;
            $basic->complaint_no_basic = $data->complaint_no_basic;
            $basic->ap_name_basic = $data->ap_name_basic;
            $basic->ap_age_basic = $data->ap_age_basic;
            $basic->ap_gender_basic = $data->ap_gender_basic;
            $basic->ap_mob_basic = $data->ap_mob_basic;
            $basic->ap_address_basic = $data->ap_address_basic;
            $basic->ap_country_basic = $data->ap_country_basic;
            $basic->ap_state_basic = $data->ap_state_basic;
            $basic->ap_city_basic = $data->ap_city_basic;
            $basic->ap_pin_code_basic = $data->ap_pin_code_basic;
            $basic->ap_adhar_basic = $data->ap_adhar_basic;
            $basic->complaint_type_basic = $data->complaint_type_basic;
            $basic->sub_complaint_type_basic = $data->sub_complaint_type_basic;
            $basic->it_act_basic = $data->it_act_basic;
            $basic->bh_dv_basic = $data->bh_dv_basic;
            $basic->crime_date_basic = $data->crime_date_basic;
            $basic->crime_time_basic = $data->crime_time_basic;
            $basic->amount_basic = $data->amount_basic;
            $basic->freeze_amount_basic = $data->freeze_amount_basic;
            $basic->checker_name_basic = $data->checker_name_basic;
            
            $basic->created_date_basic = $data->created_date_basic; 
            $basic->last_update_basic = $data->last_update_basic; ; 
            $basic->complaint_status_basic  = $data->complaint_status_basic;

    if($basic->updateBasic()){
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