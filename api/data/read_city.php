<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
// include database and object files
include_once '../../includes/config.php';
include_once '../objects/count_objects.php';


// get keywords
$key = isset($_GET["state_id"]) ? $_GET["state_id"] : die();
  
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
  
// initialize object
$data = new Count($db);
  
// query products
$stmt = $data->readCity($key); //Return stmt 
$num = $stmt->rowCount();

if($num > 0) { 
    
    $data_arr = array(); 
    $data_arr["cities"] = array();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $data_items = array(
            "id" => $id,
            "name" => $name,
            "state_id" => $state_id
        );
        array_push($data_arr["cities"], $data_items);
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