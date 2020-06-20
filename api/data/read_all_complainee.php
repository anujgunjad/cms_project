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
  
// query products
$stmt = $data->readAll_complainee(); //Return stmt
  
$num = $stmt->rowCount();
  
if($num > 0) {
    $data_arr = array(); 
    $data_arr["records"] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data_items = array(
            "complaint_id" => $complaint_id,
            "complaint_no" => $complaint_no,
            "complaint_date" => $complaint_date,
            "app_name" => $ap_name,
            "ap_age" => $ap_age,
            "ap_mob" => $ap_mob,
            "ap_address" => $ap_address,
            "ap_country" => $ap_country,
            "ap_state" => $ap_state,
            "ap_city" => $ap_city,
            "ap_pin_code" => $ap_pin_code,
            "ap_adhar" => $ap_adhar,
            "crime_type" => $crime_type,
            "way_of_crime" => $way_of_crime,
            "it_act" => $it_act,
            "bh_dv" => $bh_dv,
            "crime_date" => $crime_date,
            "crime_time" => $crime_time,
            "amount" => $amount,
            "checker_name" => $checker_name
        );
        array_push($data_arr["records"], $data_items);
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
        array("message" => "No products found.")
    );
}
?>