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
      $data->complaint_id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
      //Query
      $stmt = $data->read_suspect_account();
  
      $num = $stmt->rowCount();
  
      if($num > 0){
          $data_arr = array();
          $data_arr["accounts"] = array();
  
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              extract($row);
              $data_items = array(
                  "complaint_number" => $complaint_number,
                  "acc_id" => $acc_id,
                  "acc_number" => $acc_number,
                  "bank_name" => $bank_name,
                  "state" => $state,
                  "branch_name" => $branch_name,
                  "mail_date" => $mail_date,
                  "mail_received" => $mail_received,
                  "freeze_amount" => $freeze_amount,
                  "kyc_name" => $kyc_name,
                  "address" => $address,
                  "city" => $city,
                  "state_twice" => $state_twice,
                  "alternate_number" => $alternate_number,
                  "profit_acc" => $profit_acc,
                  "internet_banking" => $internet_banking,
                  "bank_manager_name" => $bank_manager_name,
                  "bank_manager_number" => $bank_manager_number,
                  "kyc_pdf" => $kyc_pdf,
                  "bank_statement_file" => $bank_statement_file,
                  "created_date" => $created_date,
                  "last_updated" => $last_updated
              );
              array_push($data_arr["accounts"], $data_items);
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
              array("message" => "No Accounts found.")
          );
      }
?>