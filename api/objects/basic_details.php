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
        
        //addree tables
        private $country = "countries";
        private $state = "states";
        private $city = "cities";
        private $gender_table = "genders";

        private $complaint_sub_type_table = "sub_complaint_type";
        private $complaint_type_table = "complaint_type";


        //Update Basic Variables
        public $complaint_id_basic; 
        public $complaint_no_basic;
        public $ap_name_basic;
        public $ap_age_basic;
        public $ap_gender_basic;
        public $ap_mob_basic;
        public $ap_address_basic;
        public $ap_country_basic;
        public $ap_state_basic;
        public $ap_city_basic;
        public $ap_pin_code_basic;
        public $ap_adhar_basic;
        public $complaint_type_basic;
        public $sub_complaint_type_basic;
        public $it_act_basic;
        public $bh_dv_basic;
        public $crime_date_basic;
        public $crime_time_basic;
        public $amount_basic;
        public $freeze_amount_basic;
        public $checker_name_basic;
        public $created_date_basic; 
        public $last_update_basic; 
        public $complaint_status_basic;

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function updateBasic() {
            $query = "UPDATE $this->complainee_table SET complaint_no = :complaint_no_basic, ap_name= :ap_name_basic, ap_age = :ap_age_basic,ap_gender= :ap_gender_basic,ap_mob = :ap_mob_basic,ap_address = :ap_address_basic,ap_country = :ap_country_basic,ap_state = :ap_state_basic, ap_city = :ap_city_basic, ap_pin_code = :ap_pin_code_basic, ap_adhar = :ap_adhar_basic, complaint_type = :complaint_type_basic, sub_complaint_type = :sub_complaint_type_basic, it_act = :it_act_basic, bh_dv = :bh_dv_basic, crime_date = :crime_date_basic, crime_time = :crime_time_basic , amount = :amount_basic, freeze_amount = :freeze_amount_basic, checker_name = :checker_name_basic, created_date = :created_date_basic, last_updated = :last_update_basic, complaint_status = :complaint_status_basic, user_id = 'user123' WHERE complaint_id = :complaint_id_basic";

            $stmt = $this->conn->prepare($query);

            $this->complaint_no_basic = htmlspecialchars(strip_tags($this->complaint_no_basic));
            $this->ap_name_basic = htmlspecialchars(strip_tags($this->ap_name_basic));
            $this->ap_age_basic = htmlspecialchars(strip_tags( $this->ap_age_basic));
            $this->ap_gender_basic = htmlspecialchars(strip_tags($this->ap_gender_basic));
            $this->ap_mob_basic = htmlspecialchars(strip_tags($this->ap_mob_basic));
            $this->ap_address_basic = htmlspecialchars(strip_tags($this->ap_address_basic));
            $this->ap_country_basic = htmlspecialchars(strip_tags($this->ap_country_basic));
            $this->ap_state_basic = htmlspecialchars(strip_tags($this->ap_state_basic));
            $this->ap_city_basic = htmlspecialchars(strip_tags($this->ap_city_basic));
            $this->ap_pin_code_basic = htmlspecialchars(strip_tags($this->ap_pin_code_basic));
            $this->ap_adhar_basic = htmlspecialchars(strip_tags($this->ap_adhar_basic));
            $this->complaint_type_basic = htmlspecialchars(strip_tags($this->complaint_type_basic));
            $this->sub_complaint_type_basic = htmlspecialchars(strip_tags($this->sub_complaint_type_basic));
            $this->it_act_basic = htmlspecialchars(strip_tags($this->it_act_basic));
            $this->bh_dv_basic = htmlspecialchars(strip_tags($this->bh_dv_basic));
            $this->crime_date_basic = htmlspecialchars(strip_tags($this->crime_date_basic));
            $this->crime_time_basic = htmlspecialchars(strip_tags($this->crime_time_basic));
            $this->amount_basic = htmlspecialchars(strip_tags($this->amount_basic));
            $this->freeze_amount_basic = htmlspecialchars(strip_tags($this->freeze_amount_basic));
            $this->checker_name_basic = htmlspecialchars(strip_tags($this->checker_name_basic));
            $this->complaint_id_basic = htmlspecialchars(strip_tags($this->complaint_id_basic));
            $this->created_date_basic = htmlspecialchars(strip_tags($this->created_date_basic));
            $this->last_update_basic = htmlspecialchars(strip_tags($this->last_update_basic));
            $this->complaint_status_basic = htmlspecialchars(strip_tags($this->complaint_status_basic));

            $stmt->bindParam(':complaint_id_basic', $this->complaint_id_basic);
            $stmt->bindParam(':complaint_no_basic', $this->complaint_no_basic);
            $stmt->bindParam(':ap_name_basic', $this->ap_name_basic);
            $stmt->bindParam(':ap_age_basic', $this->ap_age_basic);
            $stmt->bindParam(':ap_gender_basic', $this->ap_gender_basic);
            $stmt->bindParam(':ap_mob_basic', $this->ap_mob_basic);
            $stmt->bindParam(':ap_address_basic', $this->ap_address_basic);
            $stmt->bindParam(':ap_country_basic', $this->ap_country_basic);
            $stmt->bindParam(':ap_state_basic', $this->ap_state_basic);
            $stmt->bindParam(':ap_city_basic', $this->ap_city_basic);
            $stmt->bindParam(':ap_pin_code_basic', $this->ap_pin_code_basic);
            $stmt->bindParam(':ap_adhar_basic', $this->ap_adhar_basic);
            $stmt->bindParam(':complaint_type_basic', $this->complaint_type_basic);
            $stmt->bindParam(':sub_complaint_type_basic', $this->sub_complaint_type_basic);
            $stmt->bindParam(':it_act_basic', $this->it_act_basic);
            $stmt->bindParam(':bh_dv_basic', $this->bh_dv_basic);
            $stmt->bindParam(':crime_date_basic', $this->crime_date_basic);
            $stmt->bindParam(':crime_time_basic', $this->crime_time_basic);
            $stmt->bindParam(':amount_basic', $this->amount_basic);
            $stmt->bindParam(':freeze_amount_basic', $this->freeze_amount_basic);
            $stmt->bindParam(':checker_name_basic',  $this->checker_name_basic);
            $stmt->bindParam(':created_date_basic', $this->created_date_basic);
            $stmt->bindParam(':last_update_basic', $this->last_update_basic);
            $stmt->bindParam(':complaint_status_basic', $this->complaint_status_basic);

            // execute the query
            if($stmt->execute()){
                return true;
            }
  
            return false;
        }

        function readAll_complainee(){

            //Select All Query
            $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1'";

            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // execute query
            $stmt->execute();
        
            return $stmt;
        }

        function read_complainee(){

             //Select All Query
             $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' AND c.complaint_id = ?";

             // prepare query statement
             $stmt = $this->conn->prepare($query);
         
            //bind ids
            $stmt->bindParam(1, $this->complaint_id); 
             // execute query
             $stmt->execute();
         
             return $stmt;

        }

        function readAll_complainee_by_date($created_date){
            $created_date ="$created_date%";
            //Select All Query
            $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' and c.created_date LIKE '$created_date' ";

            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // execute query
            $stmt->execute();
            
            return $stmt;
        }
        function readMax_Amount() {
           //Select All Query
            $query = "SELECT MAX(amount) AS max_amount FROM $this->complainee_table";

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
    // $stmt = $read_suspect->readMax_Amount();
    // echo $stmt->rowCount();
    
?>