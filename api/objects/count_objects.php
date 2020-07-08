<?php
    //including Files
    include_once '../../includes/config.php';
    include_once 'basic_details.php';
    $database = new Database();
    $db = $database->getConnection();

    //initialize Object
    $data = new Basic($db);
    $all = $data->readAll_complainee();

    class Count{
        
        //Database and table names
        private $conn;
        private $complainee_table = "basic_details";
        private $suspect_table = "suspect_details";

        //Suspect Number Info Tables
        private $suspect_number_table = "suspect_numbers";
        private $suspect_number_cdr_table = "suspect_number_cdr_info";
        private $suspect_number_ipdr_table = "suspect_number_ipdr_info";
        private $suspect_number_upi_table = "suspect_number_upi_info";

            //Suspect Account Info Tables
        private $suspect_account_table = "suspect_bank_accounts";
        private $suspect_account_atm_table = "bank_accounts_atm";
        private $suspect_account_iplogs_table = "bank_accounts_iplogs";
        private $suspect_account_pan_table = "suspect_pan_info";

            //Suspect E-wallet table
        private $suspect_ewallet_table = "suspect_ewallet_info";

            //Suspect Website table
        private $suspect_website_table = "suspect_website_info";

        
        //addree tables
        private $country = "countries";
        private $state = "states";
        private $city = "cities";
        private $gender_table = "genders";

        private $complaint_sub_type_table = "sub_complaint_type";
        private $complaint_type_table = "complaint_type";
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }

        function genderCount() {
            //query
            $query_male = "SELECT * from $this->complainee_table where ap_gender = '1'";
            //Prepare query statement
            $stmt_male = $this->conn->prepare($query_male);
              
            //Execution
            $stmt_male->execute();
            $male = $stmt_male->rowCount();

             //query
             $query_female = "SELECT * from $this->complainee_table where ap_gender = '2'";
             //Prepare query statement
             $stmt_female = $this->conn->prepare($query_female);
               
             //Execution
             $stmt_female->execute();
             $female = $stmt_female->rowCount();


            //query
            $query_other = "SELECT * from $this->complainee_table where ap_gender = '3'";
            //Prepare query statement
            $stmt_other = $this->conn->prepare($query_other);
              
            //Execution
            $stmt_other->execute();
            $other = $stmt_other->rowCount();

            $gender = array(
                "male" => $male, 
                "female" => $female, 
                "other" => $other
            );
            
            return $gender;
        }

        function complaintCount() {
            $count = 4;
            $complaint_type = array();
            for($i = 1; $i <= $count; $i++){

                //query
                $type_query = "SELECT type from $this->complaint_type_table WHERE type_id = $i";
                //Prepare query statement
                $stmt_type = $this->conn->prepare($type_query);
                //Execution
                $stmt_type->execute();

                $data = $stmt_type->fetch(PDO::FETCH_ASSOC);
                foreach($data as $x => $value){
                    $value;
                }
               

                 //query
                 $query = "SELECT * from $this->complainee_table  where complaint_type = '$i'";
                 //Prepare query statement
                 $stmt = $this->conn->prepare($query);
              
                 //Execution
                 $stmt->execute();
                 $num = $stmt->rowCount();

                 $complaint_type += array(
                     $value => $num
                 );
            }      
            
            return $complaint_type;    
        }

        function subComplaintType() {
            $count = 17;
            $sub_complaint_type = array();
            for($i = 1; $i <= $count; $i++){

                //query
                $type_query = "SELECT sub_type from $this->complaint_sub_type_table WHERE sub_complaint_type_id = $i";
                //Prepare query statement
                $stmt_type = $this->conn->prepare($type_query);
                //Execution
                $stmt_type->execute();

                $data = $stmt_type->fetch(PDO::FETCH_ASSOC);
                
                foreach($data as $x => $value){
                    $value;
                }
               
                 //query
                 $query = "SELECT * from $this->complainee_table  where sub_complaint_type = '$i'";
                 //Prepare query statement
                 $stmt = $this->conn->prepare($query);
              
                 //Execution
                 $stmt->execute();
                 $num = $stmt->rowCount();

                 $sub_complaint_type += array(
                     $value => $num
                 );
            }      
            
            return $sub_complaint_type;   
        }
    }
    // $read_suspect = new Count($db);
    // $stmt = $read_suspect->subComplaintType();
    // echo print_r($stmt);
?>