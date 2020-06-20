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
        private $suspect_number_table = "suspect_numbers";
        //Objects Properties
        public $complaint_id;
        public $suspect_id;
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
           
            // bind id of product to be updated
           $stmt->bindParam(1, $this->complaint_id);

            //Execute query
            $stmt->execute();

            return $stmt;
        }
    }
    // $read_suspect = new Basic($db);
    // $stmt = $read_suspect->read_suspect();
    // echo $stmt->rowCount();
?>