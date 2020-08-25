<?php
class Database{
    private $servername = "localhost"; 
    private $username = "root";
    private $password = "";
    // changind database name from 'cms' to 'cms_project'
    private $database = "cms_project";

    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>