<?php
 //include Files
 include_once '../../includes/config.php';
 //initialize Database
 $database = new Database();
 $db = $database->getConnection();
    class Basic{
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

        //Objects Properties
        public $complaint_id;
        public $suspect_id;
        public $number_id;
        public $account_id;
        public $ewallet_id;
        public $website_id;
        
        //Update Number Variables 
        public $number_id_num;
        public $number_one_num;
        public $company_num;
        public $files_num;
        public $email_sent_num;
        public $email_received_num;
        public $suspect_name;
        public $suspect_address;
        public $city_num;
        public $state_num;
        public $retailer_name_num;
        public $uid_num_num;
        public $other_num_num;
        public $pdf_num;
        public $confirmation_num;
        public $remark_num;
        public $remainder_num;
        public $mail_id_num;
        public $caf_id_num;
        public $created_date_num;
        public $last_updated_num;

        //addree tables
        private $country = "countries";
        private $state = "states";
        private $city = "cities";
        private $gender_table = "genders";
        private $complaint_sub_type_table = "sub_complaint_type";
        private $complaint_type_table = "complaint_type";

        //Number Value 
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
      
    }
?>