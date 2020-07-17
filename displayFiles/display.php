<?php
//789456122
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
            <form id='basicForm' method='POST' action='../insertFiles/insert_basicForm.php'
                    class='basic-form ui blue segment form'>
                    <div class='one fields'>
                        <div class='four wide field'>
                            <label><span class='complaint-field'>शिकायत क्रमांक *</span></label>
                            <input class='complaint-num-box' value = '".$row['complaint_no']."' />
                        </div>
                    </div>
                    <hr />

                    <div class='four fields'>
                        <div class='six wide field'>
                            <label>आवेदक का नाम </label>
                            <input type='text' name='ap_name' placeholder='नाम' />
                        </div>
                        <div class='three wide field'>
                            <label>उम्र</label>
                            <input type='text' name='ap_age' placeholder='उम्र' />
                        </div>
                        <div class='three wide field'>
                            <label>लिंग</label>
                           
                        </div>
                        <div class='four wide field'>
                            <label>मोबाइल नंबर</label>
                            <input type='tel' name='ap_mob' placeholder='मोबाइल नंबर' />
                        </div>
                    </div>

                    <div class='three fields'>
                        <div class='eight wide field'>
                            <label>आवेदक का पता</label>
                            <input type='text' name='ap_address' placeholder='आवेदक का पता'/>
                        </div>
                        <div class='four wide field'>
                            <label>Country</label>
                          
                        </div>
                        <div class='four wide field'>
                            <label>State</label>
                           
                        </div>
                    </div>

                    <div class='three fields'>
                        <div class='six wide field'>
                            <label>City</label>
                          
                        </div>
                        <div class='six wide field'>
                            <label>पिन कोड</label>
                            <input type='text' />
                        </div>
                        <div class='six wide field'>
                            <label>आधार क्रमांक</label>
                            <input type='text'/>
                        </div>
                    </div>

                    <div class='three fields'>
                        <div class='six wide field'>
                            <label>प्रकार</label>
                            
                        </div>
                        <div class='six wide field'>
                            <label>उप-प्रकार</label>
                         
                        </div>
                        <div class='six wide field'>
                            <label>आई टी ऐक्ट धारा</label>
                            <input type='text' />
                        </div>
                    </div>

                    <div class='three fields'>
                        <div class='six wide field'>
                            <label>भा द वि धारा</label>
                            <input type='text' />
                        </div>
                        <div class='six wide field'>
                            <label>घटना का दिनांक</label>
                            <input type='date'/>
                        </div>
                        <div class='six wide field'>
                            <label>घटना का समय</label>
                            <input type='time'/>
                        </div>
                    </div>

                    <div class='three fields'>
                        <div class='eight wide field'>
                            <label>आवेदक की राशि</label>
                            <input type='text' />
                        </div>
                        <div class='eight wide field'>
                            <label>फ्रीज़ रुपये</label>
                            <input type='text' />
                        </div>
                        <div class='eight wide field'>
                            <label>जांचकर्ता का नाम</label>
                            <input type='text' />
                        </div>
                    </div>
                    <div class='field text-center'>
                        <button class='ui button  form-btn'  id='result-basic' type='submit' name='result'
                            value='Submit'>
                            Submit
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