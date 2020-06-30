<?php
    //including Files
    include_once '../../includes/config.php';

    $database = new Database();
    $db = $database->getConnection();

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

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function searchApplicant($keyword, $category_id){

            if($category_id == 1){
                 //query
                 $query = "SELECT * FROM $this->complainee_table WHERE ap_name LIKE ?";
            }
            else if($category_id == 2){
                //query
                $query = "SELECT * FROM $this->complainee_table WHERE complaint_no LIKE ?";
            }
            else if($category_id == 3){
                //query
                $query = "SELECT * FROM $this->complainee_table WHERE ap_mob LIKE ?";
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
                 $query = "SELECT c.complaint_id,c.complaint_no, c.ap_name FROM $this->complainee_table c INNER JOIN $this->suspect_number_table n ON n.complaint_id = c.complaint_id WHERE n.suspect_name LIKE ? UNION ALL SELECT c.complaint_id,c.complaint_no, c.ap_name FROM $this->complainee_table c INNER JOIN $this->suspect_table s ON s.complaint_id = c.complaint_id WHERE s.suspect_name LIKE ? UNION ALL SELECT c.complaint_id,c.complaint_no, c.ap_name FROM $this->complainee_table c INNER JOIN $this->suspect_account_table a ON a.complaint_id = c.complaint_id WHERE a.kyc_name LIKE ? ";
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

         function getMainFilter($min_amount, $max_amount, $compalint_type, $sub_complaint_type,$applicant_gender,$applicant_age){
            //query
            $query = "SELECT * FROM $this->complainee_table c WHERE c.complaint_status = '1' AND c.amount BETWEEN ? AND ? AND c.complaint_type = ? AND c.sub_complaint_type = ? AND c.ap_gender = ? AND c.ap_age <= ?";

            $stmt = $this->conn->prepare($query);

            // bind

            $stmt->bindParam(1, $min_amount);
            $stmt->bindParam(2, $max_amount);
            $stmt->bindParam(3, $compalint_type);
            $stmt->bindParam(4, $sub_complaint_type);
            $stmt->bindParam(5, $applicant_gender);
            $stmt->bindParam(6, $applicant_age);
            
            // execute query
            $stmt->execute();
       
            return $stmt;
         }
    }
    // $read_suspect = new Filter($db);
    // $stmt = $read_suspect->getMainFilter(500000, 1000,  2, 2,'पुरुष',40);
    // echo $stmt->rowCount();
?>