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
$pan = new Basic($db);
  
    // get id of product to be edited
        $data = json_decode(file_get_contents("php://input")); 

        $pan->complaint_id_pan = $data->complaint_id_pan; 
        // set product property values 
        $pan->acc_id_pan = $data->acc_id_pan;
        $pan->pan_info_id_pan = $data->pan_info_id_pan;
        $pan->pan_pan = $data->pan_pan;
        $pan->pan_verified_pan = $data->pan_verified_pan;
        $pan->pan_username_pan = $data->pan_username_pan;
        $pan->adhar_number_pan = $data->adhar_number_pan;
        $pan->income_tax_pan = $data->income_tax_pan;
        $pan->gst_in_pan = $data->gst_in_pan;
       
        $pan->tin_pan = $data->tin_pan;
        $pan->sales_tax_pan = $data->sales_tax_pan;
        $pan->created_date_pan = $data->created_date_pan; 
        $pan->last_updated_pan = $data->last_updated_pan; 
// update the product
if($pan->updateAcc_pan()){
  
    // set response code - 200 ok
    http_response_code(200);

    // tell the user
    echo json_encode(array("message" => "Account was updated."));
}
  
// if unable to update the product, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array("message" => "Unable to update Account."));
}
?>