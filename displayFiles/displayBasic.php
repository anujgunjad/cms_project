<?php
session_start();
include_once "../includes/connection.php";
global $conn;
    $query = "select * from basic_details where 	
    complaint_id = '".$_SESSION['key']."'";
    $result = $conn->query($query);

    if($result ->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo "
            <form id='basicFormResult' class='basic-form-result ui blue segment form'>
                <div class='three fields'>
                    <div class='seven wide field'>
                        <label>आवेदक का नाम </label>
                        <span class='form-text'>".$row['ap_name']."</span>
                    </div>
                    <div class='four wide field'>
                        <label>उम्र</label>
                        <span class='form-text'>".$row['ap_age']."</span>
                    </div>
                    <div class='five wide field'>
                        <label>मोबाइल नंबर</label>
                        <span class='form-text'>".$row['ap_mob']."</span>
                    </div>
                </div>
                <div class='two fields'>
                    <div class='ten wide field'>
                        <label>आवेदक का पता</label>
                        <span class='form-text'>".$row['ap_address']."</span>
                    </div>
                    <div class='six wide field'>
                        <label>आधार क्रमांक</label>
                        <span class='form-text'>".$row['ap_adhar']."</span>
                    </div>
                </div>
                <div class='three fields'>
                    <div class='six wide field'>
                        <label>प्रकार</label>
                        <span class='form-text'>".$row['complaint_type']."</span>
                    </div>
                    <div class='six wide field'>
                        <label>अपराध का तरीका</label>
                        <span class='form-text'>".$row['sub_complaint_type']."</span>
                    </div>
                    <div class='six wide field'>
                        <label>आई टी ऐक्ट धारा</label>
                        <span class='form-text'>".$row['it_act']."</span>
                    </div>
                </div>
                <div class='three fields'>
                    <div class='six wide field'>
                        <label>भा द वि धारा</label>
                        <span class='form-text'>".$row['bh_dv']."</span>
                    </div>
                    <div class='six wide field'>
                        <label>घटना का दिनांक</label>
                        <span class='form-text'>".$row['crime_date']."</span>
                    </div>
                    <div class='six wide field'>
                        <label>घटना का समय</label>
                        <span class='form-text'>".$row['crime_time']."</span>
                    </div>
                </div>
    
                <div class='four fields'>
                    <div class='four wide field'>
                        <label>आवेदक की राशि</label>
                        <span class='form-text'>".$row['amount']."</span>
                    </div>
                    <div class='four wide field'>
                        <label>जांचकर्ता का नाम</label>
                        <span class='form-text'>".$row['checker_name']."</span>
                    </div>
                    <div class='four wide field'>
                        <label>शिकायत क्रमांक</label>
                        <span class='form-text'>".$row['complaint_no']."</span>
                    </div>
                    <div class='four wide field'>
                        <label>शिकायत की दिनांक</label>
                        <span class='form-text'>".$row['created_date']."</span>
                    </div>
                </div>
                <button class='ui button update-btn' id='update-display' type='submit' name='update' value='Update'>
                    Update
                </button>
            </form>
    ";
  
          }
        } else {
          echo "0 results";
    }
?>