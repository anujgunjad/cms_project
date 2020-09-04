<?php
    include("../includes/connection.php");
      //Database and table names
        $conn;
        $complainee_table = "basic_details";
        $suspect_table = "suspect_details";

      //Suspect Number Info Tables
        $suspect_number_table = "suspect_numbers";
        $suspect_number_cdr_table = "suspect_number_cdr_info";
        $suspect_number_ipdr_table = "suspect_number_ipdr_info";
        $suspect_number_upi_table = "suspect_number_upi_info";

      //Suspect Account Info Tables
        $suspect_account_table = "suspect_bank_accounts";
        $suspect_account_atm_table = "bank_accounts_atm";
        $suspect_account_iplogs_table = "bank_accounts_iplogs";
        $suspect_account_pan_table = "suspect_pan_info";

      //Suspect E-wallet table
        $suspect_ewallet_table = "suspect_ewallet_info";

      //Suspect Website table
        $suspect_website_table = "suspect_website_info";
        
    $id = isset($_GET['complaint_id']) ?  $_GET['complaint_id'] : die();
    //
    $tables = array($complainee_table,$suspect_table ,$suspect_number_table,$suspect_number_cdr_table,$suspect_number_ipdr_table, $suspect_number_upi_table, $suspect_account_table,$suspect_account_atm_table, $suspect_account_iplogs_table, $suspect_account_pan_table, $suspect_ewallet_table, $suspect_website_table);
    foreach($tables as $table) {
      $query = "DELETE FROM $table WHERE complaint_id = '$id'";
      mysqli_query($conn, $query);
    }
   
    header("Location: user-dashboard.php");
?>