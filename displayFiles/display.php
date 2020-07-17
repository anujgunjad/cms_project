<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
 if(isset($_REQUEST['basicform']))
 {
    $query = "SELECT * from basic_details where 	
    complaint_id = '".$_SESSION['key']."'";
    $result = $conn->query($query);
    if($result->rowCount()> 0){
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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
                <div class='field text-center'>

                    <button class='ui button update-btn' id='update-display' name='update_basic'>
                        Update
                    </button>
                    <button class='ui button nexte-btn' type='button' id='next_button'  name='next_button'>
                        Next
                    </button>
                </div>
            </form>
             ";
        }
    }
    else{
        echo "0 results";
    }
 }
 //num details form
 if(isset($_REQUEST['numdetailform']))
 {  
     $query = "SELECT * from suspect_numbers where 	
     complaint_id = '".$_SESSION['key']."'";
     $result = $conn->query($query);
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>Phone numbers</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
     if($result->rowCount()> 0){
         while($row = $result->fetch(PDO::FETCH_ASSOC)) {
         
             echo "             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['number_one']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit'  name='delete_num' id='delete_num' value='".$row['number_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }
         echo "</tbody>
         </table>";
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr>";
         
     }
 }
//cdr details form
if(isset($_REQUEST['cdrdetailform']))
{   
    if(isset($_SESSION['numberkey']))
    {
        $query = "SELECT * from suspect_number_cdr_info where 	
        complaint_id = '".$_SESSION['key']."' and number_id='".$_SESSION['numberkey']."'";
         $result2 = $conn->prepare($query);
         $result2->execute();
         $i = 1;
         echo "<table class='table table-bordered p-0 m-0'>
         <thead>
             <tr id='table-head'>
                 <th scope='col'>S.No</th>
                 <th scope='col'>CDR numbers</th>
                 <th scope='col'>Update/Delete</th>
             </tr>
         </thead>
         <tbody>";
        
         if($result2->rowCount() >0){
             while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
             
                 echo "
                 
                     <tr>
                     <td>".$i."</td>
                     <td>".$row['cdr']."</td>
                     <td><a class='ui mini button green' href='#'>Update</a>
                         <button type='submit'id='delete_cdr'  name='delete_cdr' value='".$row['cdr_id']."' href='#'
                             class='ui mini red button delete'>
                             Delete
                         </button>
                     </td>
                     </tr>          
             "; 
                 $i=$i+1;
             
              }                
            } 
         else {
             echo "<tr>
             <td>No Number Added Yet</td>
             <td>No Number Added Yet</td>
             <td>No Number Added Yet</td>
         </tr> ";
             
         }
         echo "</tbody>
         </table>";
    }
  
}
// ipdr details form
if(isset($_REQUEST['ipdrdetailform']))
{   if(isset($_SESSION['numberkey']))
    {
        $query = "SELECT * from suspect_number_ipdr_info where 	
        complaint_id = '".$_SESSION['key']."' and number_id='".$_SESSION['numberkey']."'";
        $result2 = $conn->prepare($query);
        $result2->execute();
        $i = 1;
        echo "<table class='table table-bordered p-0 m-0'>
        <thead>
            <tr id='table-head'>
                <th scope='col'>S.No</th>
                <th scope='col'>IPDR numbers</th>
                <th scope='col'>Update/Delete</th>
            </tr>
        </thead>
        <tbody>";
        
        if($result2->rowCount() >0){
            while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
            
                echo "             
                    <tr>
                    <td>".$i."</td>
                    <td>".$row['ipdr']."</td>
                    <td><a class='ui mini button green' href='#'>Update</a>
                        <button type='submit' name='delete_ipdr' id='delete_ipdr' value='".$row['ipdr_id']."' href='#'
                            class='ui mini red button delete'>
                            Delete
                        </button>
                    </td>
                    </tr>          
            "; 
                $i=$i+1;
            
            }  
            } 
        else {
                echo "<tr>
                <td>No Number Added Yet</td>
                <td>No Number Added Yet</td>
                <td>No Number Added Yet</td>
                </tr> ";
            }
        echo "</tbody>
        </table>";

    }    
}
//upi details form
if(isset($_REQUEST['upidetailform']))
{   
    $query = "SELECT * from suspect_number_upi_info where 	
    complaint_id = '".$_SESSION['key']."' and number_id='".$_SESSION['numberkey']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>UPI Id</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['upi']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' id='delete_upi' name='delete_upi' value='".$row['upi_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }
         
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr> ";
         
     }
     echo "</tbody>
         </table>";
}
//account details info
if(isset($_REQUEST['accdetailform']))
{   
    $query = "SELECT * from suspect_bank_accounts where 	
    complaint_id = '".$_SESSION['key']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>Account Number</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['acc_number']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' name='delete_acc' id='delete_acc' value='".$row['acc_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }
        
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr>";
         
     }
     echo "</tbody>
     </table>";
}
// pan details form
if(isset($_REQUEST['pandetailform']))
{   
    $query = "SELECT * from suspect_pan_info where 	
    complaint_id = '".$_SESSION['key']."' and acc_id='".$_SESSION['acckey']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>PAN Number</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['pan']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' name='delete_pan' id='delete_pan' value='".$row['pan_info_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }     
        } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr> ";       
        }
     echo "</tbody>
     </table>";
}
//atm details form
if(isset($_REQUEST['atmdetailform']))
{   
    $query = "SELECT * from bank_accounts_atm where 	
    complaint_id = '".$_SESSION['key']."' and acc_id='".$_SESSION['acckey']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>Atm footage</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['atm_footage']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' name='delete_atm' id='delete_atm' value='".$row['atm_footage_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }
        
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr>";
         
     }
     echo "</tbody>
     </table>";
}
//iplogs detail form
if(isset($_REQUEST['iplogdetailform']))
{   
    $query = "SELECT * from bank_accounts_iplogs where 	
    complaint_id = '".$_SESSION['key']."' and acc_id='".$_SESSION['acckey']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>iplog</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['iplog']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' name='delete_iplog' id='delete_iplog' value='".$row['iplog_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }       
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr>";
         
     }
     echo "</tbody>
     </table>";
}
//ewallet detail form
if(isset($_REQUEST['ewalletdetailform']))
{   
    $query = "SELECT * from suspect_ewallet_info where 	
    complaint_id = '".$_SESSION['key']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>Ewallets</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['upi_name']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' name='delete_ewallet' id='delete_ewallet' value='".$row['suspect_ewallet_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }
         echo "</tbody>
         </table>";
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr>";
         
     }
     echo "</tbody>
     </table>";
}
//website detail form
if(isset($_REQUEST['websitedetailform']))
{   
    $query = "SELECT * from suspect_website_info where 	
    complaint_id = '".$_SESSION['key']."'";
     $result2 = $conn->prepare($query);
     $result2->execute();
     $i = 1;
     echo "<table class='table table-bordered p-0 m-0'>
     <thead>
         <tr id='table-head'>
             <th scope='col'>S.No</th>
             <th scope='col'>Website</th>
             <th scope='col'>Update/Delete</th>
         </tr>
     </thead>
     <tbody>";
    
     if($result2->rowCount() >0){
         while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
         
             echo "
             
                 <tr>
                 <td>".$i."</td>
                 <td>".$row['website_name']."</td>
                 <td><a class='ui mini button green' href='#'>Update</a>
                     <button type='submit' name='delete_website' id='delete_website' value='".$row['website_id']."' href='#'
                         class='ui mini red button delete'>
                         Delete
                     </button>
                 </td>
                 </tr>          
         "; 
             $i=$i+1;
         
         }
        
        
         } 
     else {
         echo "<tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         </tr>";
         
     }
     echo "</tbody>
     </table>";
}
?>