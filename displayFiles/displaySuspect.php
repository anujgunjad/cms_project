<?php
session_start();
include("../includes/config.php");
global $conn;
    $query = "select * from suspect_details where 	
    complaint_key = '".$_SESSION['key']."'";
    $result = $conn->query($query);

    if($result ->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            echo "
            <form id='suspectFormResult' class='suspect-form-result ui blue segment form'>
            <div class='two fields'>
            <div class='seven wide field'>
                <label> संदिग्ध का नाम </label>
                <span class='form-text'>".$row['suspect_name']."</span>
            </div>
            <div class='ten wide field'>
                <label>संदिग्ध का पता</label>
                <span class='form-text'>".$row['suspect_address']."</span>
            </div>
        </div>
        <div class='three fields'>
            <div class='six wide field'>
                <label>पहला मोबाइल नंबर</label>
                <span class='form-text'>".$row['first_mobile']."</span>
            </div>
            <div class='six wide field'>
                <label>दूसरा मोबाइल नंबर</label>
                <span class='form-text'>".$row['second_mobile']."</span>
            </div>
            <div class='six wide field'>
                <label>खाता क्रमांक</label>
                <span class='form-text'>".$row['account_no']."</span>
            </div>
        </div>
        <div class='three fields'>
            <div class='six wide field'>
                <label>आई टी ऐक्ट धारा</label>
                <span class='form-text'>".$row['it_act']."</span>
            </div>
            <div class='six wide field'>
                <label>ईमेल आईडी</label>
                <span class='form-text'>".$row['email_id']."</span>
            </div>
            <div class='six wide field'>
                <label>डोमेन नेम </label>
                <span class='form-text'>".$row['domain_name']."</span>
            </div>
        </div>
        <div class='four fields'>
            <div class='six wide field'>
                <label>यु पी आई फोन नंबर</label>
                <span class='form-text'>".$row['upi_phone_no']."</span>
            </div>
            <div class='six wide field'>
                <label>यु पी आई व्ही पी ए</label>
                <span class='form-text'>".$row['upivpa']."</span>
            </div>
            <div class='six wide field'>
                <label>वॉलेट का नाम</label>
                <span class='form-text'>".$row['wallet_name']."</span>
            </div>
            <div class='six wide field'>
                <label>मोबाइल ऐप/सॉफ्टवेयर</label>
                <span class='form-text'>".$row['software_name']."</span>
            </div>
        </div>
        <div class='two fields'>
            <div class='eight wide field'>
                <label>शिकायत में की गई कार्यवाही </label>
                <span class='form-text'>".$row['complaint_action']."</span>
            </div>
            <div class='eight wide field'>
                <label>लंबित रहने का कारण </label>
                <span class='form-text'>".$row['pending_reason']."</span>
            </div>
        </div>
        <div class='one fields'>
            <div class='sixteen wide field'>
                <label>रिमार्क </label>
                <span class='form-text'>".$row['remark']."</span>
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