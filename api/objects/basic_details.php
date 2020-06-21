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
            $query = "Select * from $this->complainee_table";

            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // execute query
            $stmt->execute();
        
            return $stmt;
        }
        function read_suspect(){

            //Select Query
            $query = "Select c.complaint_no as complaint_number, s.suspect_id, s.suspect_name, s.suspect_address, s.email_id, s.domain_name, s.upi_phone_no, s.upivpa, s.software_name, s.complaint_action, s.pending_reason, s.remark from $this->suspect_table s LEFT JOIN $this->complainee_table c ON s.complaint_id = c.complaint_id WHERE s.complaint_id = ?";
            
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
            $query = "SELECT c.complaint_no as complaint_number, n.number_id, n.suspect_id, n.number_one, n.company, n.files, n.email_sent, n.email_received, n.suspect_name, n.suspect_address, n.city, n.state, n.retailer_name, n.uid_num, n.other_num, n.pdf, n.confirmation, n.remark, n.reminder, n.mail_id, n.caf_date from $this->suspect_number_table n INNER JOIN $this->suspect_table s ON s.suspect_id = n.suspect_id INNER JOIN $this->complainee_table c on c.complaint_id = s.complaint_id WHERE c.complaint_id = ? AND s.suspect_id = ? ";

            //Prepare query statement
            $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->suspect_id);
            //Execution
            $stmt->execute();

            return $stmt;
        }

        function read_suspect_mobile_cdr(){

            //select Query
            $query = "SELECT c.complaint_no as complaint_number, d.suspect_id, d.number_id, d.cdr_id, d.cdr, d.email_sent, d.email_received, d.imei, d.imsi, d.location, d.location_date, d.location_time, d.night_loc, d.service_name, d.suspect_number, d.cdr_pdf FROM $this->suspect_number_cdr_table d INNER JOIN $this->suspect_number_table n ON d.number_id = n.number_id INNER JOIN $this->suspect_table s ON s.suspect_id = n.suspect_id INNER JOIN $this->complainee_table c on c.complaint_id = s.complaint_id WHERE c.complaint_id = ? AND s.suspect_id = ? AND n.number_id = ?";
            
             //Prepare query statement
             $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->suspect_id);
            $stmt->bindParam(3, $this->number_id);

            //Execution
            $stmt->execute();

            return $stmt;
        }

        function read_suspect_mobile_ipdr() {

            //select Query
            $query = "SELECT c.complaint_no as complaint_number, d.suspect_id, d.number_id, d.ipdr_id, d.ipdr, d.email_sent, d.email_received, d.location, d.website FROM $this->suspect_number_ipdr_table d INNER JOIN $this->suspect_number_table n ON d.number_id = n.number_id INNER JOIN $this->suspect_table s ON s.suspect_id = n.suspect_id INNER JOIN $this->complainee_table c on c.complaint_id = s.complaint_id WHERE c.complaint_id = ? AND s.suspect_id = ? AND n.number_id = ?";
         
             //Prepare query statement
             $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->suspect_id);
            $stmt->bindParam(3, $this->number_id);

            //Execution
            $stmt->execute();

            return $stmt;
        }

        function read_suspect_mobile_upi(){
            
            //Select query
            $query = "SELECT c.complaint_no as complaint_number, d.suspect_id, d.number_id, d.upi_id, d.upi, d.upi_name , d.upi_link FROM $this->suspect_number_upi_table d INNER JOIN $this->suspect_number_table n ON d.number_id = n.number_id INNER JOIN $this->suspect_table s ON s.suspect_id = n.suspect_id INNER JOIN $this->complainee_table c on c.complaint_id = s.complaint_id WHERE c.complaint_id = ? AND s.suspect_id = ? AND n.number_id = ?";
   
             //Prepare query statement
             $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->suspect_id);
            $stmt->bindParam(3, $this->number_id);

            //Execution
            $stmt->execute();

            return $stmt;
        }
        
        function read_suspect_account(){

            //Select Query
            $query = "SELECT  c.complaint_no as complaint_number, a.suspect_id, a.acc_id, a.acc_number, a.bank_name, a.state, a.branch_name, a.mail_date, a.mail_received, a.freeze_amount, a.kyc_name, a.address, a.city, a.state_twice, a.alternate_number, a.profit_acc, a.internet_banking, a.bank_manager_name, a.bank_manager_number, a.kyc_pdf, a.bank_statement_file FROM $this->suspect_account_table a INNER JOIN $this->suspect_table s ON s.suspect_id = a.suspect_id INNER JOIN $this->complainee_table c on c.complaint_id = s.complaint_id WHERE c.complaint_id = ? AND s.suspect_id = ? ";

            //Prepare query statement
            $stmt = $this->conn->prepare($query);

            //bind ids
            $stmt->bindParam(1, $this->complaint_id);
            $stmt->bindParam(2, $this->suspect_id);
            
            //Execution
            $stmt->execute();
  
            return $stmt;
        }
        
        function read_suspect_account_pan(){

                //Select Query
                $query = "SELECT c.complaint_no as complaint_number, p.suspect_id, p.acc_id, p.pan_info_id, p.pan, p.pan_verified, p.pan_username, p.adhar_number, p.income_tax, p.gst_in, p.tin, p.sales_tax From $this->suspect_account_pan_table p INNER JOIN $this->suspect_account_table a ON a.acc_id = p.acc_id INNER JOIN $this->suspect_table s ON s.suspect_id = a.suspect_id INNER JOIN $this->complainee_table c on c.complaint_id = s.complaint_id WHERE c.complaint_id = ? AND s.suspect_id = ? AND a.acc_id = ?";
                //Prepare query statement
                $stmt = $this->conn->prepare($query);

                //bind ids
                $stmt->bindParam(1, $this->complaint_id);
                $stmt->bindParam(2, $this->suspect_id);
                $stmt->bindParam(3, $this->account_id);
    
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
?>