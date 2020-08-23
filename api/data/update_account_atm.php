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

// prepare product object
$atm = new Basic($db);
  
    // get id of product to be edited
        $data = json_decode(file_get_contents("php://input")); 

        $atm->complaint_id_atm = $data->complaint_id_atm; 
        // set product property values 
        $atm->acc_id_atm = $data->acc_id_atm;
        $atm->atm_footage_id_atm = $data->atm_footage_id_atm;
        $atm->atm_footage_atm = $data->atm_footage_atm;
        $atm->email_sent_atm = $data->email_sent_atm;
        $atm->email_received_atm = $data->email_received_atm;
        $atm->created_date_atm = $data->created_date_atm;
        $atm->last_updated_atm = $data->last_updated_atm;
        
// update the product
if($atm->updateAcc_atm()){
  
    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Account atm was updated."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update Account atm."));
}
?>