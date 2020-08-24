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
        $msg = " Number Deleted Successfully!!!";
    }
    else {
        $msg = " Number Deletion Failed!!!";  
    }
    $stmt1 = $conn->prepare("DELETE FROM suspect_number_cdr_info WHERE number_id='$num_id'");
    $execution1 = $stmt1->execute();
    if($execution1 == true){
        $msg .= " Cdr Deleted Successfully!!!";
    }
    else {
        $msg .= " Cdr Deletion Failed!!!";  
    }
    $stmt2 = $conn->prepare("DELETE FROM suspect_number_ipdr_info WHERE number_id='$num_id'");
    $execution2 = $stmt2->execute();
    if($execution2 == true){
        $msg .= " ipdr Deleted Successfully!!!";
    }
    else {
        $msg .= " ipdr Deletion Failed!!!";  
    }
    $stmt3 = $conn->prepare("DELETE FROM suspect_number_upi_info WHERE number_id='$num_id'");
    $execution3 = $stmt3->execute();
    if($execution3 == true){
        $msg .= " upi Deleted Successfully!!!";
    }
    else {
        $msg .= " upi Deletion Failed!!!";  
    } 
    if($num_id == $_SESSION['numberkey'])
    {
        unset($_SESSION['numberkey']);
        $sessiondata = 2;
    }
    else{
        $sessiondata = 0;
    }
    $resetcdr = "<table class='table table-bordered p-0 m-0'>
    <thead>
        <tr id='table-head'>
            <th scope='col'>S.No</th>
            <th scope='col'>CDR number</th>
            <th scope='col'>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
    </tr>
    </tbody>
    </table>";
    $resetipdr = "<table class='table table-bordered p-0 m-0'>
    <thead>
        <tr id='table-head'>
            <th scope='col'>S.No</th>
            <th scope='col'>IPDR number</th>
            <th scope='col'>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
    </tr>
    </tbody>
    </table>";
    $resetupi = "<table class='table table-bordered p-0 m-0'>
    <thead>
        <tr id='table-head'>
            <th scope='col'>S.No</th>
            <th scope='col'>UPI number</th>
            <th scope='col'>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
    </tr>
    </tbody>
    </table>";
    $data['resetcdr'] = $resetcdr;
    $data['resetipdr'] =$resetipdr;
    $data['resetupi'] = $resetupi;
    $data['msg'] = $msg;
    $data['sessiondata'] = $sessiondata;
    echo json_encode($data);
}
if(isset($_POST['acc_id']))
{
    $acc_id =$_POST['acc_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_bank_accounts WHERE acc_id='$acc_id'");
    $execution = $stmt->execute();
    if($execution == true){
        $msg= " account number Deleted Successfully!!!";
    }
    else {
        $msg= "account number Deletion Failed!!!";  
    }
    $stmt1 = $conn->prepare("DELETE FROM suspect_pan_info WHERE acc_id='$acc_id'");
    $execution1 = $stmt1->execute();
    if($execution1 == true){
        $msg .= " pan Deleted Successfully!!!";
    }
    else {
        $msg .= " pan Deletion Failed!!!";  
    }
    $stmt2 = $conn->prepare("DELETE FROM bank_accounts_atm WHERE acc_id='$acc_id'");
    $execution2 = $stmt2->execute();
    if($execution2 == true){
        $msg .= " atm Deleted Successfully!!!";
    }
    else {
        $msg .= " atm Deletion Failed!!!";  
    }
    $stmt3 = $conn->prepare("DELETE FROM bank_accounts_iplogs WHERE acc_id='$acc_id'");
    $execution3 = $stmt3->execute();
    if($execution3 == true){
        $msg .= " iplog Deleted Successfully!!!";
    }
    else {
        $msg .= " iplog Deletion Failed!!!";  
    }
    if($acc_id == $_SESSION['acckey'])
    {
        unset($_SESSION['acckey']);
        $sessiondata = "2";
    }
    else{
        $sessiondata ="0";
    }
    $resetpan = "<table class='table table-bordered p-0 m-0'>
    <thead>
        <tr id='table-head'>
            <th scope='col'>S.No</th>
            <th scope='col'>PAN number</th>
            <th scope='col'>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
    </tr>
    </tbody>
    </table>";
    $resetatm = "<table class='table table-bordered p-0 m-0'>
    <thead>
        <tr id='table-head'>
            <th scope='col'>S.No</th>
            <th scope='col'>ATM footage</th>
            <th scope='col'>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
    </tr>
    </tbody>
    </table>";
    $resetiplog = "<table class='table table-bordered p-0 m-0'>
    <thead>
        <tr id='table-head'>
            <th scope='col'>S.No</th>
            <th scope='col'>IPLOG footage</th>
            <th scope='col'>Update/Delete</th>
        </tr>
    </thead>
    <tbody>
    <tr>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
         <td>No Number Added Yet</td>
    </tr>
    </tbody>
    </table>";
    $data['resetpan'] = $resetpan;
    $data['resetatm'] =$resetatm;
    $data['resetiplog'] = $resetiplog;
    $data['msg'] = $msg;
    $data['sessiondata'] = $sessiondata;
    echo json_encode($data);
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
if(isset($_POST['suspect_id']))
{
    $suspect_id =$_POST['suspect_id'];
    $stmt = $conn->prepare("DELETE FROM suspect_details WHERE suspect_id='$suspect_id'");
    $execution = $stmt->execute();
    if($execution == true){
        echo "Deleted Successfully!!!";
    }
    else {
        echo "Deletion Failed!!!";  
    }
}

?>