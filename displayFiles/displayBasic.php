<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
$query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from basic_details c  INNER JOIN genders as g ON g.id = c.ap_gender  INNER JOIN countries co  ON co.id = c.ap_country INNER JOIN states s  ON s.id = c.ap_state INNER JOIN cities ci ON ci.id = c.ap_city INNER JOIN complaint_type ct ON ct.type_id = c.complaint_type INNER JOIN sub_complaint_type cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE complaint_id = '".$_SESSION['key']."'";
$result = $conn->query($query);
while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "
    <form id='basicFormResult' class='basic-form-result ui blue segment form'>
            <div class='one fields'>
                <div class='four wide field'>
                    <label><span class='complaint-field'>शिकायत क्रमांक *</span></label>
                    <input class='form-text' id = 'complaint_no'  value = '".$row['complaint_no']."' disabled = 'disabled'/>
                </div>
            </div>
            <hr />

            <div class='four fields'>
                <div class='six wide field'>
                    <label>आवेदक का नाम </label>
                    <input class='form-text' id = 'ap_name' name = 'lets__test'  value = '".$row['ap_name']."' disabled = 'disabled' />
                </div>
                <div class='three wide field'>
                    <label>उम्र</label>
                    <input class='form-text' id = 'ap_age'  value = '".$row['ap_age']."' disabled = 'disabled'  />
                </div>
                <div class='three wide field'>
                    <label>लिंग</label>
                    <input class='form-text' id = 'ap_gender'  value = '".$row['ap_gender']."' disabled = 'disabled'  />
                </div>
                <div class='four wide field'>
                    <label>मोबाइल नंबर</label>
                    <input class='form-text' id = 'ap_mob'  value = '".$row['ap_mob']."' disabled = 'disabled'  />
                </div>
            </div>

            <div class='three fields'>
                <div class='eight wide field'>
                    <label>आवेदक का पता</label>
                    <input class='form-text' id = 'ap_address'  value = '".$row['ap_address']."' disabled = 'disabled'  />
                </div>
                <div class='four wide field'>
                    <label>Country</label>
                    <select class='form-text ui dropdown' name = 'ap__country' id = 'ap__country' disabled = 'disabled'  required>";
                            
                    $stmt = $conn->query("SELECT * from countries");
                    $num = $stmt->rowCount();
                    echo "<option value=''>Select Country</option>";
                    if($num > 0)
                    {   
                        while($rowcont = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo  "<option value=".$rowcont['id'].">".$rowcont['name']."</option>";
                        }   
                    }

                    echo "
                    </select>
                </div>
                <div class='four wide field'>
                    <label>State</label>
                    <select id='ap__state' name='ap__state' class='form-text ui dropdown' required>
                        <option value=''>Select State</option>
                    </select>
                </div>
            </div>

            <div class='three fields'>
                <div class='six wide field'>
                    <label>City</label>
                    <input class='form-text' id = 'ap_city'  value = '".$row['ap_city']."' disabled = 'disabled'  />
                </div>
                <div class='six wide field'>
                    <label>पिन कोड</label>
                    <input class='form-text' id = 'ap_pin_code' value = '".$row['ap_pin_code']."' disabled = 'disabled'  />
                </div>
                <div class='six wide field'>
                    <label>आधार क्रमांक</label>
                    <input class='form-text' id = 'ap_adhar'  value = '".$row['ap_adhar']."' disabled = 'disabled'  />
                </div>
            </div>

            <div class='three fields'>
                <div class='six wide field'>
                    <label>प्रकार</label>
                    <input class='form-text' id = 'complaint_type'  value = '".$row['complaint_type']."' disabled  = 'disabled' />
                </div>
                <div class='six wide field'>
                    <label>उप-प्रकार</label>
                    <input class='form-text' id = 'sub_complaint_type'   value = '".$row['sub_complaint_type']."' disabled  = 'disabled' />
                </div>
                <div class='six wide field'>
                    <label>आई टी ऐक्ट धारा</label>
                    <input class='form-text' id = 'it_act'  value = '".$row['it_act']."' disabled = 'disabled'  />
                </div>
            </div>

            <div class='three fields'>
                <div class='six wide field'>
                    <label>भा द वि धारा</label>
                    <input class='form-text' id = 'bh_dv' value = '".$row['bh_dv']."' disabled = 'disabled'  />
                </div>
                <div class='six wide field'>
                    <label>घटना का दिनांक</label>
                    <input class='form-text' id = 'crime_date'  value = '".$row['crime_date']."' disabled = 'disabled'  />
                </div>
                <div class='six wide field'>
                    <label>घटना का समय</label>
                    <input class='form-text' id = 'crime_time'  value = '".$row['crime_time']."' disabled = 'disabled'  />
                </div>
            </div>

            <div class='three fields'>
                <div class='eight wide field'>
                    <label>आवेदक की राशि</label>
                    <input class='form-text' id = 'amount'  value = '".$row['amount']."' disabled = 'disabled'  />
                </div>
                <div class='eight wide field'>
                    <label>फ्रीज़ रुपये</label>
                    <input class='form-text' id = 'freeze_amount'  value = '".$row['freeze_amount']."' disabled = 'disabled'  />
                </div>
                <div class='eight wide field'>
                    <label>जांचकर्ता का नाम</label>
                    <input class='form-text' id = 'checker_name'  value = '".$row['checker_name']."' disabled = 'disabled'  />
                </div>
            </div>
            <div id = 'done' class='field text-center'>

            <button class='ui button update-btn' id='update-display' type = 'button' name = 'update_basic'>
                Update
            </button>
            <button class='ui button nexte-btn' type='button' id='next_button'  name='next_button'>
                Next
            </button>
            
            </div>
        </form>
     ";
}
?>