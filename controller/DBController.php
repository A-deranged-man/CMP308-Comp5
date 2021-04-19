<?php
class DBController {
    public $host = "lochnagar.abertay.ac.uk";
    public $user = "sqlcmp311g20c05";
    public $password = "G5R9qBwI3JBx";
    public $database = "sqlcmp311g20c05";
    public $conn;

    public function getConnstring() {
        $con = mysqli_connect($this->host, $this->user, $this->password, $this->database) ;
        // check connection
        if (mysqli_connect_errno()) {
            echo "Connect failed: ".  mysqli_connect_error();
            exit();
        } else {
            $this->conn = $con;
        }
        return $this->conn;
    }


    public function __construct() {
        $this->conn = $this->connectDB();
    }


    public function connectDB() {
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }


    public function runQuery($query) {
        $result = mysqli_query($this->conn,$query);
        if(!empty($result)) {
            return $result;
        }
    }
    

}
