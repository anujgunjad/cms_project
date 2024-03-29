<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// include database and object files
include_once '../../includes/config.php';
include_once '../objects/basic_details.php';
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$data = new Basic($db);
$created_date =  isset($_GET['date']) ?  $_GET['date'] : die();
// query products
$stmt = $data->readAll_complainee_by_date($created_date); //Return stmt 
$num = $stmt->rowCount();

$stmttwo = $data->readMax_Amount();
$numtwo = $stmttwo->rowCount();

if($num > 0 && $numtwo > 0) { 
    
    $data_arr = array(); 
    $data_arr["complainee"] = array();
    $data_arr["more_data"] = array();

    while($rowtwo = $stmttwo->fetch(PDO::FETCH_ASSOC)){
        extract($rowtwo);
        $more_data_items = array(
           "max_amount" => $max_amount
        );
        array_push($data_arr["more_data"] , $more_data_items);
    }
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data_items = array(
            "complaint_id" => $complaint_id,
            "complaint_no" => $complaint_no,
            "ap_name" => $ap_name,
            "ap_age" => $ap_age,
            "ap_gender" => $ap_gender,
            "ap_mob" => $ap_mob,
            "ap_address" => $ap_address,
            "ap_country" => $ap_country,
            "ap_state" => $ap_state,
            "ap_city" => $ap_city,
            "ap_pin_code" => $ap_pin_code,
            "ap_adhar" => $ap_adhar,
            "complaint_type" => $complaint_type,
            "sub_complaint_type" => $sub_complaint_type,
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