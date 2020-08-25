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
$iplog = new Basic($db);
  
    // get id of product to be edited
        $data = json_decode(file_get_contents("php://input")); 

        $iplog->complaint_id_iplog = $data->complaint_id_iplog; 
        // set product property values 
        $iplog->acc_id_iplog = $data->acc_id_iplog;
        $iplog->iplog_id_iplog = $data->iplog_id_iplog;
        $iplog->iplog_iplog = $data->iplog_iplog;
        $iplog->email_sent_iplog = $data->email_sent_iplog;
        $iplog->email_received_iplog = $data->email_received_iplog;
        $iplog->created_date_iplog = $data->created_date_iplog;
        $iplog->last_updated_iplog = $data->last_updated_iplog;
      
// update the product
if($iplog->updateAcc_iplog()){
  
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