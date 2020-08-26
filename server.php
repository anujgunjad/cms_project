<?php
session_start();
// error_reporting(0);
error_reporting(0);
// initializing variables
$servername = "127.0.0.1";
$username = "root";
$password = "";
$errors = array(); 

// Create connection
$conn = $db = mysqli_connect('127.0.0.1', 'root', '','cms_project');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
}

//REGISTER USER
if (isset($_POST['reg_user'])) {
    $name = $_POST['name'];
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if (empty($user_id)) { array_push($errors, "User ID is required"); }
    if (empty($role)) { array_push($errors, "User Role is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
  
        $query = "INSERT INTO users (`name`, `userid`, `role`,`password`) 
                  VALUES('$name', '$user_id', '$role', '$password')";
        mysqli_query($conn, $query);
        header('location: login.php');
    }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($user_id)) {
        array_push($errors, "User ID is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE userid='$user_id' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $row = $results-> fetch_assoc();
          $name = $row['name'];
          $_SESSION['user_id'] = $row['userid'];
          $_SESSION['name'] = strtoupper($name);
          $_SESSION['role'] = $row['role'];
          $_SESSION['msg'] = "";
          if($_SESSION['role']== "0")
            {
              header('location: admin/dashboard.php');
            }
            else 
            {
                header('location: user/user-dashboard.php');
            }
         
        }else {
            array_push($errors, "Incorrect User ID or Password");
        }
    }
  }

// VERIFY ID
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
    header('location: accounts.php');
  }
?>











