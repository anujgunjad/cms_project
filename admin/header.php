<?php include('../server.php')?>
<?php 
//   Checking For logged in user
if (!isset($_SESSION['user_id'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: /cms_project/login.php');
}
if (isset($_GET['logout'])) {
    $flag = "hello";
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    unset($_SESSION['role']);
    header("location: /cms_project/login.php?logout=1");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../dependencies/bootstrap/dist/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="../dependencies/semantic/dist/semantic.min.css">
    <link rel="stylesheet" href="css/styles-admin.css">
    <link rel="stylesheet" href="../dependencies/fontawesome/css/all.min.css">
    <!--Montserrat Font-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

</head>
<body>
