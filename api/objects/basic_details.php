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
        
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function readAll_complainee(){

            //Select All Query
            $query = "SELECT `c.complaint_id`, `c.complaint_no`, `c.ap_name`, `c.ap_age`, `c.ap_gender`, `c.ap_mob`, `c.ap_address`, `countries.ap_country`, `states.ap_state`, `cities.ap_city`, `c.ap_pin_code`, `c.ap_adhar`, `.complaint_type`, `c.sub_complaint_type`, `it_act`, `bh_dv`, `crime_date`, `crime_time`, `amount`, `checker_name`, `created_date`, `last_updated`, `complaint_status` from $this->complainee_table";

            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // execute query
            $stmt->execute();
        
            return $stmt;
        }
        function read_suspect(){

            //Select Query
            $query = "Select c.complaint_no as complaint_number, s.suspect_id, s.suspect_name, s.suspect_address, s.email_id, s.domain_name, s.upi_phone_no, s.upivpa, s.software_name, s.complaint_action, s.pending_reason, s.remark, s.created_date, s.last_updated from $this->suspect_table s LEFT JOIN $this->complainee_table c ON s.complaint_id = c.complaint_id WHERE s.complaint_id = ?";
            
            //Prepare query statement
            $stmt = $this->conn->prepare($query);
           
            // bind id of suspects to be updated
           $stmt->bindParam(1, $this->complaint_id);

            //Execute query
            $stmt->execute();

            return $stmt;
        }

            
        function read_suspect_mobile(){

            //select Query
            $query = "SELECT c.complaint_no as complaint_number, n.number_id, n.number_one, n.company, n.files, n.email_sent, n.email_received, n.suspect_name, n.suspect_address, n.city, n.state, n.retailer_name, n.uid_num, n.other_num, n.pdf, n.confirmation, n.remark, n.reminder, n.mail_id, n.caf_date, n.created_date, n.last_updated from $this->suspect_number_table n INNER JOIN $this->complainee_table c on c.complaint_id = n.complaint_id WHERE c.complaint_id = ?";

            //Prepare query statement
            $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id); 
            
            //Execution
            $stmt->execute();

            return $stmt;
        }

        function read_suspect_mobile_cdr(){

            //select Query
            $query = "SELECT c.complaint_no as complaint_number, d.number_id,  d.cdr_id, d.cdr, d.email_sent, d.email_received, d.imei, d.imsi, d.location, d.location_date, d.location_time, d.night_loc, d.service_name, d.suspect_number, d.cdr_pdf, d.created_date, d.last_updated FROM $this->suspect_number_cdr_table d INNER JOIN $this->suspect_number_table n ON n.number_id = d.number_id INNER JOIN $this->complainee_table c on c.complaint_id = n.complaint_id WHERE c.complaint_id = ?  AND  n.number_id = ?";
            
            //Prepare query statement
            $stmt = $this->conn->prepare($query);
             
            //bind ids
           
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->number_id);
            
            //Execution
            $stmt->execute();

            return $stmt;
        }

        function read_suspect_mobile_ipdr() {

            //select Query
            $query = "SELECT c.complaint_no as complaint_number, d.number_id, d.ipdr_id, d.ipdr, d.email_sent, d.email_received, d.location, d.website, d.created_date, d.last_updated FROM $this->suspect_number_ipdr_table d INNER JOIN $this->suspect_number_table n ON d.number_id = n.number_id  INNER JOIN $this->complainee_table c on c.complaint_id = n.complaint_id WHERE c.complaint_id = ? AND n.number_id = ?";
         
             //Prepare query statement
             $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->number_id);

            //Execution
            $stmt->execute();

            return $stmt;
        }

        function read_suspect_mobile_upi(){
            
            //Select query
            $query = "SELECT c.complaint_no as complaint_number, d.number_id, d.upi_id, d.upi, d.upi_name , d.upi_link, d.created_date, d.last_updated FROM $this->suspect_number_upi_table d INNER JOIN $this->suspect_number_table n ON d.number_id = n.number_id INNER JOIN $this->complainee_table c on c.complaint_id = n.complaint_id WHERE c.complaint_id = ? AND n.number_id = ?";
   
             //Prepare query statement
             $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->number_id);

            //Execution
            $stmt->execute();

            return $stmt;
        }
        
        function read_suspect_account(){

            //Select Query
            $query = "SELECT  c.complaint_no as complaint_number, a.acc_id, a.acc_number, a.bank_name, a.state, a.branch_name, a.mail_date, a.mail_received, a.freeze_amount, a.kyc_name, a.address, a.city, a.state_twice, a.alternate_number, a.profit_acc, a.internet_banking, a.bank_manager_name, a.bank_manager_number, a.kyc_pdf, a.bank_statement_file, a.created_date, a.last_updated FROM $this->suspect_account_table a INNER JOIN $this->complainee_table c on c.complaint_id = a.complaint_id WHERE c.complaint_id = ?";

            //Prepare query statement
            $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            
            //Execution
            $stmt->execute();
  
            return $stmt;
        }
        
        function read_suspect_account_pan(){

                //Select Query
                $query = "SELECT c.complaint_no as complaint_number, p.acc_id, p.pan_info_id, p.pan, p.pan_verified, p.pan_username, p.adhar_number, p.income_tax, p.gst_in, p.tin, p.sales_tax, p.created_date, p.last_updated From $this->suspect_account_pan_table p INNER JOIN $this->suspect_account_table a ON  a.acc_id = p.acc_id INNER JOIN $this->complainee_table c on c.complaint_id = a.complaint_id WHERE c.complaint_id = ? AND a.acc_id = ?";
                //Prepare query statement
                $stmt = $this->conn->prepare($query);

                //bind ids
                $stmt->bindParam(1, $this->complaint_id);
                $stmt->bindParam(2, $this->account_id);
    
                //Execution
                $stmt->execute();
    
                return $stmt;
        }
        
        function read_suspect_account_atm(){

            //Select Query
            $query = "SELECT c.complaint_no as complaint_number, p.acc_id, p.atm_footage_id, p.atm_footage, p.email_sent, p.email_received, p.created_date, p.last_updated FROM $this->suspect_account_atm_table p INNER JOIN $this->suspect_account_table a ON a.acc_id = p.acc_id INNER JOIN $this->complainee_table c on c.complaint_id = p.complaint_id WHERE c.complaint_id = ? AND a.acc_id = ?";
              //Prepare query statement
              $stmt = $this->conn->prepare($query);

              //bind ids
              $stmt->bindParam(1, $this->complaint_id);
              $stmt->bindParam(2, $this->account_id);
  
              //Execution
              $stmt->execute();
  
              return $stmt;
         }

        function read_suspect_account_iplogs(){

            //Select Query
            $query = "SELECT c.complaint_no as complaint_number, p.acc_id, p.iplog_id, p.iplog, p.email_sent, p.email_received, p.created_date, p.last_updated FROM $this->suspect_account_iplogs_table p INNER JOIN $this->suspect_account_table a ON a.acc_id = p.acc_id INNER JOIN $this->complainee_table c on c.complaint_id = p.complaint_id WHERE c.complaint_id = ? AND a.acc_id = ?";
              //Prepare query statement
              $stmt = $this->conn->prepare($query);

              //bind ids
              $stmt->bindParam(1, $this->complaint_id);
              $stmt->bindParam(2, $this->account_id);
  
              //Execution
              $stmt->execute();
  
              return $stmt;
         }

         function read_suspect_ewallet(){
            //Select Query
            $query = "SELECT c.complaint_no as complaint_number, e.suspect_ewallet_id, e.upi_name, e.mob_number, e.vpa_id, e.statement, e.email_sent, e.email_received, e.linked_account, e.ip_address, e.ip_add_number, e.device_id, e.merchandise, e.hold_amount, e.number, e.created_date, e.last_updated FROM $this->suspect_ewallet_table e INNER JOIN $this->complainee_table c on c.complaint_id = e.complaint_id WHERE c.complaint_id = ?";

            //Prepare query statement
            $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
         
            //Execution
            $stmt->execute();
  
            return $stmt;
            
        }
    
        function read_suspect_website() {
            //Select Query
            $query = "SELECT c.complaint_no as complaint_number, w.website_id, w.website_name, w.website_domain, w.mail_id, w.website_mobile_number, w.created_date, w.last_updated FROM $this->suspect_website_table w INNER JOIN $this->complainee_table c on c.complaint_id = w.complaint_id WHERE c.complaint_id = ?";

             //Prepare query statement
             $stmt = $this->conn->prepare($query);

             //bind ids
             $stmt->bindParam(1, $this->complaint_id);
            
             //Execution
             $stmt->execute();
   
             return $stmt;
        }
     }

       
    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_mobile();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_mobile_cdr();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_mobile_upi();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_account();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_account_pan();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_account_atm();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_ewallet();
    // echo $stmt->rowCount();

    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect_website();
    // echo $stmt->rowCount();
?>