<?php
     //Set Header
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Header: access");
     header("Access-Control-Allow-Methods: GET");
     header("Access-Control-Allow-Credentials: true");
     header("Content-Type: application/json; charset= UTF-8");
 
       //include files
       include_once "../../includes/config.php";
       include_once "../objects/basic_details.php";
   
       //initilize database
       $database = new Database();
       $db = $database->getConnection();
       
       //initialize Object
       $data = new Basic($db);

       $data->account_id = isset($_GET['account_id']) ? $_GET['account_id'] : die();
       $data->complaint_id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();

       //Query
       $stmt = $data->read_suspect_account_atm();
   
       $num = $stmt->rowCount();
   
       if($num > 0){
           $data_arr = array();
           $data_arr["atm"] = array();
   
           while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               extract($row);
               $data_items = array(
                   "complaint_number" => $complaint_number,
                   "acc_id" => $acc_id,
                   "atm_footage_id" => $atm_footage_id,
                   "atm_footage" => $atm_footage,
                   "email_sent" => $email_sent,
                   "email_received" => $email_received,
                   "created_date" => $created_date,
                   "last_update" => $last_update
               );
               array_push($data_arr["atm"], $data_items);
           }
               // set response code - 200 OK
               http_response_code(200);
               // show products data in json format
               echo json_encode($data_arr);
       }
       else {
           // set response code - 404 Not found
           http_response_code(404);   
           // tell the user no products found
           echo json_encode(
               array("message" => "No Atm found.")
           );
       }
?>