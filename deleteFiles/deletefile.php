<?php
session_start();
include_once "../includes/connection.php";
global $conn;
if(isset($_POST['cdr_id']))
{
    $cdr_id =$_POST['cdr_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_number_cdr_info WHERE cdr_id='$cdr_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['ipdr_id']))
{
    $ipdr_id =$_POST['ipdr_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_number_ipdr_info WHERE ipdr_id='$ipdr_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['upi_id']))
{
    $upi_id =$_POST['upi_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_number_upi_info WHERE upi_id='$upi_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['pan_id']))
{
    $pan_id =$_POST['pan_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_pan_info WHERE pan_info_id='$pan_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['atm_id']))
{
    $atm_id =$_POST['atm_id'];
    $stmt = $conn->prepare("DELETE FROM bank_accounts_atm WHERE atm_footage_id='$atm_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['iplog_id']))
{
    $iplog_id =$_POST['iplog_id'];
    $stmt = $conn->prepare("DELETE FROM bank_accounts_iplogs WHERE iplog_id='$iplog_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['num_id']))
{
    $num_id =$_POST['num_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_numbers WHERE number_id='$num_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo " Number Deleted Successfully!!!";
    }
    else {
        echo " Number Deletion Failed!!!";  
    }
    $stmt1 = $conn->prepare("DELETE FROM suspect_number_cdr_info WHERE number_id='$num_id'");
    $execution1 = $stmt1->execute();
    if($execution1 == true){
        echo " Cdr Deleted Successfully!!!";
    }
    else {
        echo " Cdr Deletion Failed!!!";  
    }
    $stmt2 = $conn->prepare("DELETE FROM suspect_number_ipdr_info WHERE number_id='$num_id'");
    $execution2 = $stmt2->execute();
    if($execution2 == true){
        echo " ipdr Deleted Successfully!!!";
    }
    else {
        echo " ipdr Deletion Failed!!!";  
    }
    $stmt3 = $conn->prepare("DELETE FROM suspect_number_upi_info WHERE number_id='$num_id'");
    $execution3 = $stmt3->execute();
    if($execution3 == true){
        echo " upi Deleted Successfully!!!";
    }
    else {
        echo " upi Deletion Failed!!!";  
    }
}
if(isset($_POST['acc_id']))
{
    $acc_id =$_POST['acc_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_bank_accounts WHERE acc_id='$acc_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo " Number Deleted Successfully!!!";
    }
    else {
        echo " Number Deletion Failed!!!";  
    }
    $stmt1 = $conn->prepare("DELETE FROM suspect_pan_info WHERE acc_id='$acc_id'");
    $execution1 = $stmt1->execute();
    if($execution1 == true){
        echo " pan Deleted Successfully!!!";
    }
    else {
        echo " pan Deletion Failed!!!";  
    }
    $stmt2 = $conn->prepare("DELETE FROM bank_accounts_atm WHERE acc_id='$acc_id'");
    $execution2 = $stmt2->execute();
    if($execution2 == true){
        echo " atm Deleted Successfully!!!";
    }
    else {
        echo " atm Deletion Failed!!!";  
    }
    $stmt3 = $conn->prepare("DELETE FROM bank_accounts_iplogs WHERE acc_id='$acc_id'");
    $execution3 = $stmt3->execute();
    if($execution3 == true){
        echo " iplog Deleted Successfully!!!";
    }
    else {
        echo " iplog Deletion Failed!!!";  
    }
}
if(isset($_POST['ewallet_id']))
{
    $ewallet_id =$_POST['ewallet_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_ewallet_info WHERE suspect_ewallet_id='$ewallet_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}
if(isset($_POST['website_id']))
{
    $website_id =$_POST['website_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_website_info WHERE website_id='$website_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}


?>