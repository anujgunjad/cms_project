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
$basic = new Basic($db);
  
    // get id of product to be edited
        $data = json_decode(file_get_contents("php://input")); 
        $basic->complaint_id_acc = $data->complaint_id_acc; 
        // set product property values 
        $basic->acc_id_acc = $data->acc_id_acc;
        $basic->acc_number_acc = $data->acc_number_acc;
        $basic->bank_name_acc = $data->bank_name_acc;
        $basic->state_acc = $data->state_acc;
        $basic->branch_name_acc = $data->branch_name_acc;
        $basic->mail_date_acc = $data->mail_date_acc;
        $basic->mail_recieved_acc = $data->mail_recieved_acc;
        $basic->freeze_amount_acc = $data->freeze_amount_acc;
        $basic->kyc_name_acc = $data->kyc_name_acc;
        $basic->address_acc = $data->address_acc;
        $basic->city_acc = $data->city_acc;
        $basic->state_twice_acc = $data->state_twice_acc;
        $basic->altername_number_acc = $data->altername_number_acc; 
        $basic->profit_acc_acc = $data->profit_acc_acc;
        $basic->internet_banking_acc = $data->internet_banking_acc;
        $basic->bank_manager_name_acc = $data->bank_manager_name_acc;
        $basic->bank_manager_number_acc = $data->bank_manager_number_acc;
        $basic->kyc_pdf_acc = $data->kyc_pdf_acc;
        $basic->bank_statement_file_acc = $data->bank_statement_file_acc;
        $basic->created_date_acc = $data->created_date_acc;
        $basic->last_updated_acc = $data->last_updated_acc;
// update the product
if($basic->updateAcc()){
  
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
