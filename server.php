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
    $eid = $_POST['eid'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($eid)) { array_push($errors, "Employ ID is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
  
        $query = "INSERT INTO users (`name`, `eid`, `username`,`password`) 
                  VALUES('$name', '$eid', '$username', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['username'] = $username;
        header('location: mainForm.php');
    }
}
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $row = $results-> fetch_assoc();
          $name = $row['name'];
          $_SESSION['username'] = $username;
          $_SESSION['name'] = strtoupper($name);
          header('location: mainForm.php');
         
        }else {
            array_push($errors, "Incorrect Username or Password");
        }
    }
  }
?>










