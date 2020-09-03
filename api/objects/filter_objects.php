<?php
    //including Files
    include_once '../../includes/config.php';
    include_once 'basic_details.php';
    $database = new Database();
    $db = $database->getConnection();

    //initialize Object
    $data = new Basic($db);
    $all = $data->readAll_complainee();

    class Filter{
        
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
        
        function searchApplicant($keyword, $category_id){

            if($category_id == 1){
                 //query
                $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.ap_name LIKE ?";
            }
            else if($category_id == 2){
                //query
                 $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type  WHERE c.complaint_no LIKE ?";
            }
            else if($category_id == 3){
                //query
                $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.ap_mob LIKE ?";
            }
          
            $stmt = $this->conn->prepare($query);
            
            $keyword = "%$keyword%";

            // bind
            $stmt->bindParam(1, $keyword);
           
            // execute query
            $stmt->execute();
        
            return $stmt;
        }

        function searchSuspect($keyword, $category_id){

             if($category_id == 4){
                 //query
                 $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type INNER JOIN $this->suspect_number_table n ON n.complaint_id = c.complaint_id WHERE n.suspect_name LIKE ? UNION ALL SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, st.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from basic_details c INNER JOIN genders as g ON g.id = c.ap_gender INNER JOIN countries co ON co.id = c.ap_country INNER JOIN states st ON st.id = c.ap_state INNER JOIN cities ci ON ci.id = c.ap_city INNER JOIN complaint_type ct ON ct.type_id = c.complaint_type INNER JOIN sub_complaint_type cst ON cst.sub_complaint_type_id = c.sub_complaint_type INNER JOIN suspect_details s ON s.complaint_id = c.complaint_id WHERE s.suspect_name LIKE ? UNION ALL SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type INNER JOIN $this->suspect_account_table a ON a.complaint_id = c.complaint_id WHERE a.kyc_name LIKE ? ";
             }

             $stmt = $this->conn->prepare($query);
            
             $keyword = "%$keyword%";
             
             // bind
             $stmt->bindParam(1, $keyword);
             $stmt->bindParam(2, $keyword);
             $stmt->bindParam(3, $keyword);

             // execute query
             $stmt->execute();
        
             return $stmt;
         }

         function getMainFilter($min_amount, $max_amount, $compalint_type, $sub_complaint_type, $applicant_gender, $applicant_age){
             
            
            $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, g.gender as ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.freeze_amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c  INNER JOIN $this->gender_table as g ON g.id = c.ap_gender  INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1'";
            
            if(isset($min_amount, $max_amount) && !empty($min_amount) && !empty($max_amount)){
                $query .= "AND c.amount >= $min_amount AND c.amount <= $max_amount ";
            }
            if(!empty($compalint_type)){
                
                $query .= " AND complaint_type IN($compalint_type)";
            }
            if(!empty($sub_complaint_type)){
                $query .= " AND sub_complaint_type IN($sub_complaint_type) ";
            }
            if(!empty($applicant_gender)){
                $query .= " AND ap_gender IN($applicant_gender) ";
            }
            if(!empty($applicant_age)){
               if($applicant_age ==  1) {
                   $query .= " AND c.ap_age <= '18' ";
               }
               else if($applicant_age == 2) {
                $query .= " AND c.ap_age > '18' ";
               }
            }
            
            // if($applicant_age == 1){
            //      //query
            //      $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, c.ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' AND c.amount BETWEEN ? AND ? AND complaint_type = ? AND sub_complaint_type = ? AND c.ap_gender = ?";
            // }
            // else if($applicant_age == 2){
            //      //query
            //      $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, c.ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' AND c.amount BETWEEN ? AND ? AND complaint_type = ? AND sub_complaint_type = ? AND c.ap_gender = ? AND c.ap_age <= '18'";
            // }
            // else if($applicant_age == 3){
            //      //query
            //      $query = "SELECT c.complaint_id, c.complaint_no, c.ap_name, c.ap_age, c.ap_gender, c.ap_mob, c.ap_address, co.name as ap_country, s.name as ap_state, ci.name as ap_city, c.ap_pin_code, c.ap_adhar, ct.type as complaint_type, cst.sub_type as sub_complaint_type, c.it_act, c.bh_dv, c.crime_date, c.crime_time, c.amount, c.checker_name, c.created_date, c.last_updated, c.complaint_status from $this->complainee_table c INNER JOIN $this->country co  ON co.id = c.ap_country INNER JOIN $this->state s  ON s.id = c.ap_state INNER JOIN $this->city ci ON ci.id = c.ap_city INNER JOIN $this->complaint_type_table ct ON ct.type_id = c.complaint_type INNER JOIN $this->complaint_sub_type_table cst ON cst.sub_complaint_type_id = c.sub_complaint_type WHERE c.complaint_status = '1' AND c.amount BETWEEN ? AND ? AND complaint_type = ? AND sub_complaint_type = ? AND c.ap_gender = ? AND c.ap_age > '18'";
            // }
               $stmt = $this->conn->prepare($query);

            //     // bind
            //     $stmt->bindParam(1, $min_amount);
            //     $stmt->bindParam(2, $max_amount);
            //     $stmt->bindParam(3, $compalint_type);
            //     $stmt->bindParam(4, $sub_complaint_type);
            //     $stmt->bindParam(5, $applicant_gender);        
                
            //     // execute query
                 $stmt->execute();
                
                 return $stmt;
        }  
    }
    // $read_suspect = new Filter($db);
    // $stmt = $read_suspect->getMainFilter(500000, 1000,  2, 2,'पुरुष',40);
    // echo $stmt->rowCount();
?>