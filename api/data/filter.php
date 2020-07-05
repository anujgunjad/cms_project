<?php
   //set headers
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Header: access");
   header("Access-Control-Allow-Methods: GET");
   header("Access-Control-Allow-Credentials: true");
   header("Content-Type: application/json; charset= UTF-8");

    // include database and object files
    include_once '../../includes/config.php';
    include_once '../objects/filter_objects.php';

    $complaint_type = [];
    $sub_complaint_type = [];
    $applicant_gender = [];
    
     // get keywords
     $min_amount = isset($_GET["min_amount"]) ? $_GET["min_amount"] : die();
     $max_amount = isset($_GET["max_amount"]) ? $_GET["max_amount"] : die();
     $complaint_type = isset($_GET["complaint_type"]) ? $_GET["complaint_type"] : die();
     $sub_complaint_type = isset($_GET["sub_complaint_type"]) ? $_GET["sub_complaint_type"] : die();
     $applicant_gender = isset($_GET["applicant_gender"]) ? $_GET["applicant_gender"] : die();
     $applicant_age = isset($_GET["applicant_age"]) ? $_GET["applicant_age"] : die();

     //database 
    $database = new Database();
    $db = $database->getConnection();

    //initialize  Object
    $data = new Filter($db);

    $stmt = $data->getMainFilter($min_amount,$max_amount,$complaint_type, $sub_complaint_type ,$applicant_gender, $applicant_age); 
    $num = $stmt->rowCount();
    if($num > 0){
    $data_arr = array(); 
    $data_arr["applicant"] = array();

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
            "checker_name" => $checker_name,
            "created_date" => $created_date,
            "last_updated" => $last_updated,
            "complaint_status" => $complaint_status	
        );
        array_push($data_arr["applicant"], $data_items);
    }
      // set response code - 200 OK
      http_response_code(200);
      // show products data in json format
      echo json_encode($data_arr);
    }
    else{
        // set response code - 404 Not found
        http_response_code(503);
        // tell the user no products found
        echo json_encode(
            array("message" => "No applicant found.")
        );
    }
?>