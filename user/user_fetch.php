<?php
   include_once "../includes/config.php";
   $database = new Database();
   $db = $database->getConnection();
   if(isset($_POST['country']))
   {    $country = $_POST['country'];
        $stmt = $db->query("SELECT * from states where country_id ='$country'");
        $num = $stmt->rowCount();
        $states="<option value=''>Select State</option>";
        if($num > 0)
        {   
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $states.= "<option value=".$row['id'].">".$row['name']."</option>";
            }   
        }
        echo $states;
   }
   if(isset($_POST['state']))
   {    $state = $_POST['state'];
        $stmt = $db->query("SELECT * from cities where state_id ='$state'");
        $num = $stmt->rowCount();
        $cities="<option value=''>Select City</option>";
        if($num > 0)
        {   
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $cities.= "<option value=".$row['id'].">".$row['name']."</option>";
            }   
        }
        echo $cities;
   }   
   ?>