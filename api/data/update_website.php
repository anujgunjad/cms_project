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
            
            $basic->complaint_id_web = $data->complaint_id_web;
            $basic->website_id_web = $data->website_id_web;
            $basic->website_name_web = $data->website_name_web;
            $basic->website_domain_web = $data->website_domain_web;
            $basic->mail_id_web = $data->mail_id_web;
            $basic->website_mobile_number = $data->website_mobile_number;
            $basic->created_date_web = $data->created_date_web;
            $basic->last_updated_web = $data->last_updated_web;
           

    if($basic->updateWebsite()){
        // set response code - 200 ok
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "Website was updated."));
    }
    // if unable to update the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to update Website."));
    }
?>