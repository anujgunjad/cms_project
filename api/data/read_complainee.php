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

  if(isset($_GET['complaint_id'])){
    $data->complaint_id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
  }
  else {
    $data->complaint_no = isset($_GET['complaint_no']) ?  $_GET['complaint_no'] : die();
  }
 

 //Query
 $stmt = $data->read_complainee();
   
 $num = $stmt->rowCount();
if($num > 0) { 
    
    $data_arr = array(); 
    $data_arr["complainee"] = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data_items = array(
            "complaint_id" => $complaint_id,
            "complaint_no" => $complaint_no,
            "ap_name" => $ap_name,
            "ap_age" => $ap_age,
            "ap_gender" => $ap_gender,
            "gender_id" => $gender_id,
            "ap_mob" => $ap_mob,
            "ap_address" => $ap_address,
            "ap_country" => $ap_country,
            "country_id" => $country_id,
            "ap_state" => $ap_state,
            "state_id" => $state_id,
            "ap_city" => $ap_city,
            "city_id" => $city_id,
            "ap_pin_code" => $ap_pin_code,
            "ap_adhar" => $ap_adhar,
            "complaint_type" => $complaint_type,
            "complaint_type_id" => $complaint_type_id,
            "sub_complaint_type" => $sub_complaint_type,
            "sub_complaint_type_id" => $sub_complaint_type_id,
            "it_act" => $it_act,
            "bh_dv" => $bh_dv,
            "crime_date" => $crime_date,
            "crime_time" => $crime_time,
            "amount" => $amount,
            "freeze_amount" => $freeze_amount,
            "checker_name" => $checker_name,
            "created_date" => $created_date,
            "last_updated" => $last_updated,
            "complaint_status" => $complaint_status	
        );
        array_push($data_arr["complainee"], $data_items);
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
        array("message" => "No Complainee found.")
    );
}
?>