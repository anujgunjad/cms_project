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
  
    // get keywords
    $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : die();
    $category_id = isset($_GET["category_id"]) ? $_GET["category_id"] : die();
    //database 
    $database = new Database();
    $db = $database->getConnection();

    //initialize  Object
    $data = new Filter($db);

    //Applicant Search 
    
    if($category_id <= 3){

    $stmt = $data->searchApplicant($keyword, $category_id); 
    $num = $stmt->rowCount();
    if($num > 0){
    $data_arr = array(); 
    $data_arr["applicant"] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data_items = array(
            "complaint_id" => $complaint_id,
            "complaint_no" => $complaint_no,
            "app_name" => $ap_name,
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
        http_response_code(404);
        // tell the user no products found
        echo json_encode(
            array("message" => "No applicant found.")
        );
    }

    }
    
    //Suspect Search
    
    else {
        $stmt = $data->searchSuspect($keyword, $category_id);

          
        $num = $stmt->rowCount();
        if($num > 0){
        $data_arr = array(); 
        $data_arr["applicant"] = array();
    
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $data_items = array(
                "complaint_id" => $complaint_id,
                "complaint_no" => $complaint_no,
                "applicant_name" => $ap_name
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
            http_response_code(404);
            // tell the user no products found
            echo json_encode(
                array("message" => "No applicant found.")
            );
        }
    }
   
?>