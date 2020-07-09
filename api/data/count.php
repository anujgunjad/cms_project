<?php
   //set headers
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Header: access");
   header("Access-Control-Allow-Methods: GET");
   header("Access-Control-Allow-Credentials: true");
   header("Content-Type: application/json; charset= UTF-8");

    // include database and object files
    include_once '../../includes/config.php';
    include_once '../objects/count_objects.php';

    // instantiate database and product object
    $database = new Database();
    $db = $database->getConnection();
  
    // initialize object
    $data = new Count($db);
    
    //gender count
    $stmt_gender = $data->genderCount();

    //main array
    $data_arr = array();
    //gender array
    $data_arr["gender"] = array();

    array_push($data_arr["gender"], $stmt_gender);

    
    //complaint_type count
    $stmt_ct = $data->complaintCount();

    //complaint_type array
    $data_arr["complaint_type"] = array();

    array_push($data_arr["complaint_type"],  $stmt_ct);


    
     //complaint_type count
     $stmt_sct = $data->subComplaintType();

     //complaint_type array
     $data_arr["sub_complaint_type"] = array();
 
     array_push($data_arr["sub_complaint_type"],  $stmt_sct);



    http_response_code(200);
    echo json_encode($data_arr);
?>