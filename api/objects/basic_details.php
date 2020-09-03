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

        //Update Account Variables
        public $complaint_id_acc; 
        public $acc_id_acc;
        public $acc_number_acc;
        public $bank_name_acc;
        public $state_acc;
        public $branch_name_acc;
        public $mail_date_acc;
        public $mail_recieved_acc;
        public $freeze_amount_acc;
        public $kyc_name_acc;
        public $address_acc;
        public $city_acc;
        public $state_twice_acc;
        public $altername_number_acc;
        public $profit_acc_acc;
        public $internet_banking_acc;
        public $bank_manager_name_acc;
        public $bank_manager_number_acc;
        public $kyc_pdf_acc;
        public $bank_statement_file_acc;
        public $created_date_acc;
        public $last_updated_acc;
        
        //update account atm variables
        public $complaint_id_atm;
        public $acc_id_atm;
        public $atm_footage_id_atm;
        public $atm_footage_atm;
        public $email_sent_atm;
        public $email_received_atm;
        public $created_date_atm;
        public $last_updated_atm;
        
        //update account pan variables
        public $complaint_id_pan;
        public $acc_id_pan;
        public $pan_info_id_pan;
        public $pan_pan;
        public $pan_verified_pan;
        public $pan_username_pan;
        public $adhar_number_pan;
        public $income_tax_pan;
        public $gst_in_pan;
        public $tin_pan;
        public $sales_tax_pan;
        public $created_date_pan;
        public $last_updated_pan;
        
        //updated account iplog variables
        public $complaint_id_iplog;
        public $acc_id_iplog;
        public $iplog_id_iplog;
        public $iplog_iplog;
        public $email_sent_iplog;
        public $email_received_iplog;
        public $created_date_iplog;
        public $last_updated_iplog;

        //Update Number Variables 
         public $complaint_id_num;
         public $number_id_num;
         public $number_one_num;
         public $company_num;
         public $files_num;
         public $email_sent_num;
         public $email_received_num;
         public $suspect_name_num;
         public $suspect_address_num;
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

        //Update CDR Variable
        public $complaint_id_cdr;
        public $number_id_cdr;
        public $cdr_id_cdr;
        public $cdr_cdr;
        public $email_sent_cdr;
        public $email_received_cdr;
        public $imei_cdr;
        public $imsi_cdr;
        public $location_cdr;
        public $location_date_cdr;
        public $location_time_cdr;
        public $night_loc_cdr;
        public $service_name_cdr;
        public $suspect_number_cdr;
        public $cdr_pdf_cdr;
        public $created_date_cdr;
        public $last_updated_cdr;

        //ipdr Varibles
        public  $complaint_id_ipdr;
        public  $number_id_ipdr;
        public  $ipdr_id_ipdr;
        public  $ipdr_ipdr;
        public  $email_sent_ipdr;
        public  $email_received_ipdr;
        public  $location_ipdr;
        public  $website_ipdr;
        public  $created_date_ipdr;
        public  $last_updated_ipdr;

        //UPI Update
        public $complaint_id_upi;
        public $number_id_upi;
        public $upi_id_upi;
        public $upi_upi;
        public $upi_name_upi;
        public $upi_link_upi;
        public $created_date_upi;
        public $last_updated_upi;

        //Update Ewallet
        public    $complaint_id_e;
        public   $suspect_ewallet_e;
        public   $upi_name_e;
        public   $mob_number_e;
        public   $vpa_id_e;
        public   $statement_e;
        public   $email_sent_e;
        public   $email_received_e;
        public   $linked_account_e;
        public   $beneficiary_e;
        public   $ip_address_e;
        public   $ip_add_number_e;
        public   $device_id_e;
        public   $merchandise_e;
        public   $hold_amount_e;
        public   $number_e;
        public   $created_date_e;
        public   $last_updated_e;
            
        //Update Website
        public  $complaint_id_web;
        public  $website_id_web;
        public  $website_name_web;
        public  $website_domain_web;
        public  $mail_id_web;
        public  $website_mobile_number_web;
        public  $created_date_web;
        public  $last_updated_web;

        //Suspect Website
        public  $suspect_name_suspect;
        public  $suspect_address_suspect;
        public  $suspect_mob_suspect;
        public  $email_id_suspect;
        public  $domain_name_suspect;
        public  $upi_phone_no_suspect;
        public  $upivpa_suspect;
        public  $software_name_suspect;
        public  $complaint_action_suspect;
        public  $pending_reason_suspect;
        public  $remark_suspect;  
        public  $created_date_suspect;  
        public  $last_updated_suspect; 
        public  $complaint_id_suspect; 
        public  $suspect_id_suspect;

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
            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        }
         //Update Account Function
         function updateAcc() 
         {
             $query = "UPDATE $this->suspect_account_table SET acc_number = :acc_number_acc, bank_name= :bank_name_acc, state = :state_acc, branch_name = :branch_name_acc, mail_date = :mail_date_acc, mail_received = :mail_received_acc, freeze_amount = :freeze_amount_acc, kyc_name = :kyc_name_acc, address = :address_acc, city = :city_acc, state_twice = :state_twice_acc, alternate_number = :altername_number_acc, profit_acc = :profit_acc_acc, internet_banking = :internet_banking_acc, bank_manager_name = :bank_manager_name_acc , bank_manager_number = :bank_manager_number_acc, kyc_pdf =:kyc_pdf_acc, bank_statement_file = :bank_statement_file_acc , created_date = :created_date_acc, last_updated = :last_updated_acc WHERE complaint_id = :complaint_id_acc AND  acc_id = :acc_id_acc";
             
             $stmt = $this->conn->prepare($query);
             
             $this->acc_id_acc = htmlspecialchars(strip_tags($this->acc_id_acc));
             $this->acc_number_acc = htmlspecialchars(strip_tags( $this->acc_number_acc));
             $this->bank_name_acc = htmlspecialchars(strip_tags($this->bank_name_acc));
             $this->state_acc = htmlspecialchars(strip_tags($this->state_acc));
             $this->branch_name_acc = htmlspecialchars(strip_tags($this->branch_name_acc));
             $this->mail_date_acc = htmlspecialchars(strip_tags($this->mail_date_acc));
             $this->mail_received_acc = htmlspecialchars(strip_tags($this->mail_received_acc));
             $this->freeze_amount_acc = htmlspecialchars(strip_tags($this->freeze_amount_acc));
             $this->kyc_name_acc = htmlspecialchars(strip_tags($this->kyc_name_acc));
             $this->address_acc = htmlspecialchars(strip_tags($this->address_acc));
             $this->city_acc = htmlspecialchars(strip_tags($this->city_acc));
             $this->state_twice_acc = htmlspecialchars(strip_tags($this->state_twice_acc));
             $this->altername_number_acc = htmlspecialchars(strip_tags($this->altername_number_acc));
             $this->profit_acc_acc = htmlspecialchars(strip_tags($this->profit_acc_acc));
             $this->internet_banking_acc = htmlspecialchars(strip_tags($this->internet_banking_acc));
             $this->bank_manager_name_acc = htmlspecialchars(strip_tags($this->bank_manager_name_acc));
             $this->bank_manager_number_acc = htmlspecialchars(strip_tags($this->bank_manager_number_acc));
             $this->kyc_pdf_acc = htmlspecialchars(strip_tags($this->kyc_pdf_acc));
             $this->bank_statement_file_acc = htmlspecialchars(strip_tags($this->bank_statement_file_acc));
             $this->created_date_acc = htmlspecialchars(strip_tags($this->created_date_acc));
             $this->last_updated_acc = htmlspecialchars(strip_tags($this->last_updated_acc));
             $this->complaint_id_acc = htmlspecialchars(strip_tags($this->complaint_id_acc));
             $this->acc_id_acc = htmlspecialchars(strip_tags($this->acc_id_acc));

             $stmt->bindParam(':complaint_id_acc', $this->complaint_id_acc);
             $stmt->bindParam(':acc_id_acc', $this->acc_id_acc);
             $stmt->bindParam(':acc_number_acc', $this->acc_number_acc);
             $stmt->bindParam(':bank_name_acc', $this->bank_name_acc);
             $stmt->bindParam(':state_acc', $this->state_acc);
             $stmt->bindParam(':branch_name_acc', $this->branch_name_acc);
             $stmt->bindParam(':mail_date_acc', $this->mail_date_acc);
             $stmt->bindParam(':mail_received_acc', $this->mail_received_acc);
             $stmt->bindParam(':freeze_amount_acc', $this->freeze_amount_acc);
             $stmt->bindParam(':kyc_name_acc', $this->kyc_name_acc);
             $stmt->bindParam(':address_acc', $this->address_acc);
             $stmt->bindParam(':city_acc', $this->city_acc);
             $stmt->bindParam(':state_twice_acc', $this->state_twice_acc);
             $stmt->bindParam(':altername_number_acc', $this->altername_number_acc);
             $stmt->bindParam(':profit_acc_acc', $this->profit_acc_acc);
             $stmt->bindParam(':internet_banking_acc', $this->internet_banking_acc);
             $stmt->bindParam(':bank_manager_name_acc', $this->bank_manager_name_acc);
             $stmt->bindParam(':bank_manager_number_acc', $this->bank_manager_number_acc);
             $stmt->bindParam(':kyc_pdf_acc', $this->kyc_pdf_acc);
             $stmt->bindParam(':bank_statement_file_acc', $this->bank_statement_file_acc);
             $stmt->bindParam(':created_date_acc', $this->created_date_acc);
             $stmt->bindParam(':last_updated_acc', $this->last_updated_acc);

             $stmt->execute();
             $count = $stmt->rowCount(); 
           
             // execute the query
             if ( $count > 0 ) {
                 return true; 
            } else {
             return false;  
            }
         }
         //account atm function
        function updateAcc_atm(){
            $query = "UPDATE $this->suspect_account_atm_table SET complaint_id = :complaint_id_atm, acc_id= :acc_id_atm, atm_footage_id = :atm_footage_id_atm, atm_footage = :atm_footage_atm, email_sent = :email_sent_atm, email_received = :email_received_atm, created_date = :created_date_atm, last_updated = :last_updated_atm WHERE complaint_id = :complaint_id_atm AND  acc_id = :acc_id_atm AND atm_footage_id=:atm_footage_id_atm";
        
            $stmt = $this->conn->prepare($query);

            $this->complaint_id_atm = htmlspecialchars(strip_tags($this->complaint_id_atm));
            $this->acc_id_atm = htmlspecialchars(strip_tags($this->acc_id_atm));
            $this->atm_footage_id_atm = htmlspecialchars(strip_tags( $this->atm_footage_id_atm));
            $this->atm_footage_atm = htmlspecialchars(strip_tags($this->atm_footage_atm));
            $this->email_sent_atm = htmlspecialchars(strip_tags($this->email_sent_atm));
            $this->email_received_atm = htmlspecialchars(strip_tags($this->email_received_atm));
            $this->created_date_atm = htmlspecialchars(strip_tags($this->created_date_atm));
            $this->last_updated_atm = htmlspecialchars(strip_tags($this->last_updated_atm));

            $stmt->bindParam(':complaint_id_atm', $this->complaint_id_atm);
            $stmt->bindParam(':acc_id_atm', $this->acc_id_atm);
            $stmt->bindParam(':atm_footage_id_atm', $this->atm_footage_id_atm);
            $stmt->bindParam(':atm_footage_atm', $this->atm_footage_atm);
            $stmt->bindParam(':email_sent_atm', $this->email_sent_atm);
            $stmt->bindParam(':email_received_atm', $this->email_received_atm);
            $stmt->bindParam(':created_date_atm', $this->created_date_atm);
            $stmt->bindParam(':last_updated_atm', $this->last_updated_atm);

            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        }  
        function updateAcc_pan(){
            $query = "UPDATE $this->suspect_account_pan_table SET complaint_id=:complaint_id_pan,acc_id=:acc_id_pan,pan_info_id=:pan_info_id_pan,pan=:pan_pan,pan_verified=:pan_verified_pan,pan_username=:pan_username_pan,adhar_number=:adhar_number_pan,income_tax=:income_tax_pan,gst_in=:gst_in_pan,tin=:tin_pan,sales_tax=:sales_tax_pan,created_date=:created_date_pan,last_updated=:last_updated_pan WHERE complaint_id=:complaint_id_pan and acc_id=:acc_id_pan and pan_info_id=:pan_info_id_pan";
             
            $stmt = $this->conn->prepare($query);

            $this->complaint_id_pan = htmlspecialchars(strip_tags($this->complaint_id_pan));
            $this->acc_id_pan = htmlspecialchars(strip_tags($this->acc_id_pan));
            $this->pan_info_id_pan = htmlspecialchars(strip_tags( $this->pan_info_id_pan));
            $this->pan_pan = htmlspecialchars(strip_tags($this->pan_pan));
            $this->pan_verified_pan = htmlspecialchars(strip_tags($this->pan_verified_pan));
            $this->pan_username_pan = htmlspecialchars(strip_tags($this->pan_username_pan));
            $this->adhar_number_pan = htmlspecialchars(strip_tags($this->adhar_number_pan));
            $this->income_tax_pan = htmlspecialchars(strip_tags($this->income_tax_pan));
            $this->gst_in_pan = htmlspecialchars(strip_tags($this->gst_in_pan));
            $this->tin_pan = htmlspecialchars(strip_tags($this->tin_pan));
            $this->sales_tax_pan = htmlspecialchars(strip_tags($this->sales_tax_pan));
            $this->created_date_pan = htmlspecialchars(strip_tags($this->created_date_pan));
            $this->last_updated_pan = htmlspecialchars(strip_tags($this->last_updated_pan));
            $stmt->bindParam(':complaint_id_pan', $this->complaint_id_pan);
            $stmt->bindParam(':acc_id_pan', $this->acc_id_pan);
            $stmt->bindParam(':pan_info_id_pan', $this->pan_info_id_pan);
            $stmt->bindParam(':pan_pan', $this->pan_pan);
            $stmt->bindParam(':pan_verified_pan', $this->pan_verified_pan);
            $stmt->bindParam(':pan_username_pan', $this->pan_username_pan);
            $stmt->bindParam(':adhar_number_pan', $this->adhar_number_pan);
            $stmt->bindParam(':income_tax_pan', $this->income_tax_pan);
            $stmt->bindParam(':gst_in_pan', $this->gst_in_pan);
            $stmt->bindParam(':tin_pan', $this->tin_pan);
            $stmt->bindParam(':sales_tax_pan', $this->sales_tax_pan);
            $stmt->bindParam(':created_date_pan', $this->created_date_pan);
            $stmt->bindParam(':last_updated_pan', $this->last_updated_pan);
            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        } 
        function updateAcc_iplog(){
            $query = "UPDATE $this->suspect_account_iplogs_table SET complaint_id = :complaint_id_iplog, acc_id= :acc_id_iplog, iplog_id = :iplog_id_iplog, iplog = :iplog_iplog, email_sent = :email_sent_iplog, email_received = :email_received_iplog, created_date = :created_date_iplog, last_updated = :last_updated_iplog WHERE complaint_id = :complaint_id_iplog AND  acc_id = :acc_id_iplog And iplog_id = :iplog_id_iplog";
         
            $stmt = $this->conn->prepare($query);

            $this->complaint_id_iplog = htmlspecialchars(strip_tags($this->complaint_id_iplog));
            $this->acc_id_iplog = htmlspecialchars(strip_tags($this->acc_id_iplog));
            $this->iplog_id_iplog = htmlspecialchars(strip_tags( $this->iplog_id_iplog));
            $this->iplog_iplog = htmlspecialchars(strip_tags($this->iplog_iplog));
            $this->email_sent_iplog = htmlspecialchars(strip_tags($this->email_sent_iplog));
            $this->email_received_iplog = htmlspecialchars(strip_tags($this->email_received_iplog));
            $this->created_date_iplog = htmlspecialchars(strip_tags($this->created_date_iplog));
            $this->last_updated_iplog = htmlspecialchars(strip_tags($this->last_updated_iplog));

            $stmt->bindParam(':complaint_id_iplog', $this->complaint_id_iplog);
            $stmt->bindParam(':acc_id_iplog', $this->acc_id_iplog);
            $stmt->bindParam(':iplog_id_iplog', $this->iplog_id_iplog);
            $stmt->bindParam(':iplog_iplog', $this->iplog_iplog);
            $stmt->bindParam(':email_sent_iplog', $this->email_sent_iplog);
            $stmt->bindParam(':email_received_iplog', $this->email_received_iplog);
            $stmt->bindParam(':created_date_iplog', $this->created_date_iplog);
            $stmt->bindParam(':last_updated_iplog', $this->last_updated_iplog);

            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }

        } 

        function updateNumber(){
            //Query
            $query = "UPDATE $this->suspect_number_table SET  number_one = :number_one, company = :company, files = :files, email_sent = :email_sent, email_received = :email_received, suspect_name = :suspect_name, suspect_address = :suspect_address, city = :city, state = :state, retailer_name = :retailer_name, uid_num = :uid_num, other_num = :other_num, pdf = :pdf, confirmation = :confirmation, remark = :remark, reminder = :reminder, mail_id = :mail_id, caf_date = :caf_date, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND number_id = :number_id";

            $stmt = $this->conn->prepare($query);
            
        
            // $this->complaint_id_num = htmlspecialchars(strip_tags($this->complaint_id_num));
            // $this->number_id_num = htmlspecialchars(strip_tags($this->number_id_num));
            // $this->number_one_num = htmlspeialchars(strip_tags($this->number_one_num));
            // $this->company_num = htmlspecialchars(strip_tags( $this->company_num));
            // $this->files_num = htmlspecialchars(strip_tags($this->files_num));
            // $this->email_sent_num = htmlspecialchars(strip_tags($this->email_sent_num));
            // $this->email_received_num = htmlspecialchars(strip_tags($this->email_received_num));
            // $this->suspect_name_num = htmlspecialchars(strip_tags($this->suspect_name_num));
            // $this->suspect_address_num = htmlspecialchars(strip_tags($this->suspect_address_num));
            // $this->city_num = htmlspeialchars(strip_tags($this->city_num));
            // $this->state_num = htmlspecialchars(strip_tags( $this->state_num));
            // $this->retailer_name_num = htmlspecialchars(strip_tags($this->retailer_name_num));
            // $this->uid_num_num = htmlspecialchars(strip_tags($this->uid_num_num));
            // $this->other_num_num = htmlspecialchars(strip_tags($this->other_num_num));
            // $this->pdf_num = htmlspecialchars(strip_tags($this->pdf_num));
            // $this->confirmation_num = htmlspecialchars(strip_tags($this->confirmation_num));
            // $this->remark_num = htmlspecialchars(strip_tags( $this->remark_num));
            // $this->remainder_num = htmlspecialchars(strip_tags($this->remainder_num));
            // $this->mail_id_num = htmlspecialchars(strip_tags($this->mail_id_num));
            // $this->caf_id_num = htmlspecialchars(strip_tags($this->caf_id_num));
            // $this->created_date_num = htmlspecialchars(strip_tags($this->created_date_num));
            // $this->last_updated_num = htmlspecialchars(strip_tags($this->last_updated_num));

            $stmt->bindParam(':complaint_id', $this->complaint_id_num);
            $stmt->bindParam(':number_id', $this->number_id_num);
            $stmt->bindParam(':number_one', $this->number_one_num);
            $stmt->bindParam(':company', $this->company_num);
            $stmt->bindParam(':files', $this->files_num);
            $stmt->bindParam(':email_sent', $this->email_sent_num);
            $stmt->bindParam(':email_received', $this->email_received_num);
            $stmt->bindParam(':suspect_name', $this->suspect_name_num);
            $stmt->bindParam(':suspect_address', $this->suspect_address_num);
            $stmt->bindParam(':city', $this->city_num);
            $stmt->bindParam(':state', $this->state_num);
            $stmt->bindParam(':retailer_name', $this->retailer_name_num);
            $stmt->bindParam(':uid_num', $this->uid_num_num);
            $stmt->bindParam(':other_num', $this->other_num_num);
            $stmt->bindParam(':pdf', $this->pdf_num);
            $stmt->bindParam(':confirmation', $this->confirmation_num);
            $stmt->bindParam(':remark', $this->remark_num);
            $stmt->bindParam(':remainder', $this->remainder_num);
            $stmt->bindParam(':mail_id', $this->mail_id_num);
            $stmt->bindParam(':caf_id', $this->caf_id_num);
            $stmt->bindParam(':created_date', $this->created_date_num);
            $stmt->bindParam(':last_updated', $this->last_updated_num);
            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        }
        function updateNumberCDR(){
            //Select ALl Query
            $query = "UPDATE $this->suspect_number_cdr_table SET cdr = :cdr, email_sent = :email_sent, email_received = :email_received, imei = :imei, imsi = :imsi, location = :location, location_date = :location_date, location_time = :location_time, night_loc = :night_loc, service_name = :service_name, suspect_number = :suspect_number, cdr_pdf = :cdr_pdf, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND number_id = :number_id AND cdr_id = :cdr_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':cdr', $this->cdr_cdr);
            $stmt->bindParam(':email_sent', $this->email_sent_cdr);
            $stmt->bindParam(':email_received', $this->email_received_cdr);
            $stmt->bindParam(':imei', $this->imei_cdr);
            $stmt->bindParam(':imsi', $this->imsi_cdr);
            $stmt->bindParam(':location', $this->location_cdr);
            $stmt->bindParam(':location_date', $this->location_date_cdr);
            $stmt->bindParam(':location_time', $this->location_time_cdr);
            $stmt->bindParam(':night_loc', $this->night_loc_cdr);
            $stmt->bindParam(':service_name', $this->service_name_cdr);
            $stmt->bindParam(':suspect_number', $this->suspect_number_cdr);
            $stmt->bindParam(':cdr_pdf', $this->cdr_pdf_cdr);
            $stmt->bindParam(':created_date', $this->created_date_cdr);
            $stmt->bindParam(':last_updated', $this->last_updated_cdr);
            $stmt->bindParam(':complaint_id', $this->complaint_id_cdr);
            $stmt->bindParam(':number_id', $this->number_id_cdr);
            $stmt->bindParam(':cdr_id', $this->cdr_id_cdr);
            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        }

        function updateNumberIPDR() {
            //Select ALl Query
            $query = "UPDATE $this->suspect_number_ipdr_table SET ipdr = :ipdr, email_sent = :email_sent, email_received = :email_received, location = :location, website = :website, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND number_id = :number_id AND ipdr_id = :ipdr_id";
                
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':ipdr', $this->ipdr_ipdr);
            $stmt->bindParam(':email_sent', $this->email_sent_ipdr);
            $stmt->bindParam(':email_received', $this->email_received_ipdr);
            $stmt->bindParam(':location', $this->location_ipdr);
            $stmt->bindParam(':website', $this->website_ipdr);
            $stmt->bindParam(':created_date', $this->created_date_ipdr);
            $stmt->bindParam(':last_updated', $this->last_updated_ipdr);
            $stmt->bindParam(':complaint_id', $this->complaint_id_ipdr);
            $stmt->bindParam(':number_id', $this->number_id_ipdr);
            $stmt->bindParam(':ipdr_id', $this->ipdr_id_ipdr);
            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        }

        function updateNumberUPI() {
            //Select ALl Query
            $query = "UPDATE  $this->suspect_number_upi_table  SET upi = :upi, upi_name = :upi_name, upi_link = :upi_link, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND number_id = :number_id AND upi_id = :upi_id";
                
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':upi', $this->upi_upi);
            $stmt->bindParam(':upi_name', $this->upi_name_upi);
            $stmt->bindParam(':upi_link', $this->upi_link_upi);
            $stmt->bindParam(':created_date', $this->created_date_upi);
            $stmt->bindParam(':last_updated', $this->last_updated_upi);
            $stmt->bindParam(':complaint_id', $this->complaint_id_upi);
            $stmt->bindParam(':number_id', $this->number_id_upi);
            $stmt->bindParam(':upi_id', $this->upi_id_upi);
            $stmt->execute();
            $count = $stmt->rowCount(); 
          
            // execute the query
            if ( $count > 0 ) {
                return true; 
           } else {
            return false;  
           }
        }
        function updateEwallet() {
             //Select ALl Query
             $query = "UPDATE $this->suspect_ewallet_table SET upi_name = :upi_name, mob_number = :mob_number, vpa_id = :vpa_id, statement = :statement, email_sent = :email_sent, email_received  = :email_received, linked_account = :linked_account, beneficiary = :beneficiary, ip_address = :ip_address, ip_add_number = :ip_add_number, device_id = :device_id, merchandise = :merchandise, hold_amount  = :hold_amount, number = :number, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND suspect_ewallet_id = :suspect_ewallet_id";

             $stmt = $this->conn->prepare($query);

             $stmt->bindParam(':complaint_id', $this->complaint_id_e);
             $stmt->bindParam(':suspect_ewallet_id', $this->suspect_ewallet_e);
             $stmt->bindParam(':upi_name', $this->upi_name_e);
             $stmt->bindParam(':mob_number', $this->mob_number_e);
             $stmt->bindParam(':vpa_id', $this->vpa_id_e);
             $stmt->bindParam(':statement', $this->statement_e);
             $stmt->bindParam(':email_sent', $this->email_sent_e);
             $stmt->bindParam(':email_received', $this->email_received_e);
             $stmt->bindParam(':linked_account', $this->linked_account_e);
             $stmt->bindParam(':beneficiary', $this->beneficiary_e);
             $stmt->bindParam(':ip_address', $this->ip_address_e);
             $stmt->bindParam(':ip_add_number', $this->ip_add_number_e);
             $stmt->bindParam(':device_id', $this->device_id_e);
             $stmt->bindParam(':merchandise', $this->merchandise_e);
             $stmt->bindParam(':hold_amount', $this->hold_amount_e);
             $stmt->bindParam(':number', $this->number_e);
             $stmt->bindParam(':created_date', $this->created_date_e);
             $stmt->bindParam(':last_updated', $this->last_updated_e);

             $stmt->execute();
             $count = $stmt->rowCount(); 
           
             // execute the query
             if ( $count > 0 ) {
                 return true; 
            } else {
             return false;  
            }
        } 

        function updateWebsite(){
             //Select ALl Query
             $query = "UPDATE $this->suspect_website_table SET website_name = :website_name, website_domain = :website_domain, mail_id = :mail_id, website_mobile_number = :website_mobile_number, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND website_id = :website_id";

             $stmt = $this->conn->prepare($query);

             $stmt->bindParam(':complaint_id', $this->complaint_id_web);
             $stmt->bindParam(':website_id', $this->website_id_web);
             $stmt->bindParam(':website_name', $this->website_name_web);
             $stmt->bindParam(':website_domain', $this->website_domain_web);
             $stmt->bindParam(':mail_id', $this->mail_id_web);
             $stmt->bindParam(':website_mobile_number', $this->website_mobile_number);
             $stmt->bindParam(':created_date', $this->created_date_web);
             $stmt->bindParam(':last_updated', $this->last_updated_web);
            
             $stmt->execute();
             $count = $stmt->rowCount(); 
           
             // execute the query
            if ( $count > 0 ) {
                 return true; 
            } else {
             return false;  
            }
        }
        
        function updateSuspect(){
            //Select ALl Query
            $query = "UPDATE $this->suspect_table SET suspect_name = :suspect_name, suspect_address = :suspect_address, suspect_mob = :suspect_mob, email_id = :email_id, domain_name = :domain_name, upi_phone_no = :upi_phone_no, upivpa = :upivpa, software_name = :software_name, complaint_action = :complaint_action, pending_reason = :pending_reason, remark = :remark, created_date = :created_date, last_updated = :last_updated WHERE complaint_id = :complaint_id AND suspect_id = :suspect_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':suspect_name', $this->suspect_name_suspect);
            $stmt->bindParam(':suspect_address', $this->suspect_address_suspect);
            $stmt->bindParam(':suspect_mob', $this->suspect_mob_suspect);
            $stmt->bindParam(':email_id', $this->email_id_suspect);
            $stmt->bindParam(':domain_name', $this->domain_name_suspect);
            $stmt->bindParam(':upi_phone_no', $this->upi_phone_no_suspect);
            $stmt->bindParam(':upivpa', $this->upivpa_suspect);
            $stmt->bindParam(':software_name', $this->software_name_suspect);
            $stmt->bindParam(':complaint_action', $this->complaint_action_suspect);
            $stmt->bindParam(':pending_reason', $this->pending_reason_suspect);
            $stmt->bindParam(':remark', $this->remark_suspect);  
            $stmt->bindParam(':created_date', $this->created_date_suspect);  
            $stmt->bindParam(':last_updated', $this->last_updated_suspect); 
            $stmt->bindParam(':complaint_id', $this->complaint_id_suspect); 
            $stmt->bindParam(':suspect_id', $this->suspect_id_suspect);   
            
            $stmt->execute();
            $count = $stmt->rowCount(); 
           
            //execute the query
            if ( $count > 0 ) {
                return true; 
            } else {
                return false;  
            }
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
            $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, g.id as gender_id, c.ap_mob, c.ap_address, co.name as ap_country, co.id as country_id, s.name as ap_state, s.id as state_id, ci.name as ap_city, ci.id as city_id, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, ct.type_id as complaint_type_id, cst.sub_type as sub_complaint_type, cst.sub_complaint_type_id as sub_complaint_type_id, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' AND c.complaint_id = ? OR c.complaint_no = ?";

            //prepare query statement
            $stmt = $this->conn->prepare($query);
         
            //bind ids
            $stmt->bindParam(1, $this->complaint_id); 
            //bind ids
            $stmt->bindParam(2, $this->complaint_no); 

            //execute query
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
    
    // SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, g.id as gender_id, c.ap_mob, c.ap_address, co.name as ap_country, co.id as country_id, s.name as ap_state, s.id as state_id, ci.name as ap_city, ci.id as city_id, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, ct.type_id as complaint_type_id, cst.sub_type as sub_complaint_type, cst.sub_complaint_type_id as sub_complaint_type_id, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from basic_details c INNER JOIN genders as g ON g.id = c.ap_gender INNER JOIN countries co ON co.id = c.ap_country INNER JOIN states s ON s.id = c.ap_state INNER JOIN cities ci ON ci.id = c.ap_city INNER JOIN complaint_type ct ON ct.type_id = c.complaint_type INNER JOIN sub_complaint_type cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' AND c.complaint_id = '104'
?>