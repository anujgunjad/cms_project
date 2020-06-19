<?php
session_start();
include("../includes/config.php");
global $conn;
    $query = "select * from numbers where 	
    complaint_id = '".$_SESSION['key']."'";
    $result = $conn->query($query);
    $i = 1;
    if($result ->num_rows > 0){
        while($row = $result->fetch_assoc()) {
         
            echo "<tr>
            <td>".$i."</td>
            <td>".$row['number_one']."</td>
            <td><a class='ui mini button green' href='#'>Update</a>
                <button type='submit' name='delete' value='1' href='#'
                    class='ui mini red button delete'>
                    Delete
                </button>
            </td>
        </tr>"; 
            $i=$i+1;
          }
        } else {
          echo "0 results";
    }
?>