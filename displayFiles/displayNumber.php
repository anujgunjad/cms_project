<?php
session_start();
include("../includes/config.php");
$database = new Database();
$conn = $database->getConnection();
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
                        <button type='submit' name='delete' value='1' href='#'
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
            echo "0 results";
            
        }
    }
    if(isset($_REQUEST['cdrdetailform']))
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
                         <button type='submit' name='delete' value='1' href='#'
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
             echo "0 results";
             
         }
    }
?>
