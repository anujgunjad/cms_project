<?php
session_start();
// error_reporting(0);
// error_reporting(0);
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
          if($_SESSION['role']=="Admin")
            {
              header('location: admin/dashboard.php');
            }
            else 
            {
                header('location: user/user-dashboard.php');
            }
         
        }else {
            array_push($errors, "Incorrect Username or Password");
        }
    }
  }
?>










