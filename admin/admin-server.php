<?php 
 include("header.php");

   if (isset($_POST['insert_eid'])) {
    // receive all input values from the form
    $eid = mysqli_real_escape_string($db, $_POST['eid']);
    $role = mysqli_real_escape_string($db, $_POST['role']);
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM `verify_eid` WHERE `eid`='$eid' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['eid'] === $eid) {
        array_push($errors, "Employee ID already exists");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO `verify_eid` ( `eid`, `role`) 
                  VALUES('$eid', '$role')";
        mysqli_query($db, $query);
    }
    header("Location: accounts.php");
  }
  if(isset($_POST['delete_two'])) 
  {    
    $id = mysqli_real_escape_string($db, $_POST['delete_two']);
    $id=number_format($id);
    $query = "DELETE FROM `verify_eid` WHERE `id` = $id";
    mysqli_query($db, $query);
    header("Location: accounts.php");

  }  
  if(isset($_POST['delete_user'])) 
  {    
    $id = mysqli_real_escape_string($db, $_POST['delete_user']);
    $id = number_format($id);
    $query = "DELETE FROM `users` WHERE `id` = $id";
    mysqli_query($db, $query);
    header("Location: users.php");

  }  
?>