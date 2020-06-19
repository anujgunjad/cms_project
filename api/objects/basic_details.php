<?php
    class Basic{
        private $conn;
        private $complainee_table = "basic_details";
        private $suspect_table = "suspect_details";
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
        function readAll_suspect(){

            //Select All Query
            $query = "Select * from $this->suspect_table";

            //Prepare query statement
            $stmt = $this->conn->prepare($query);

            //Execute query
            $stmt->execute();

            return $stmt;
        }
    }
?>