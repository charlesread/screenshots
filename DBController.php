<?php
class DBController {
	 private $host = "den1.mysql2.gear.host";
	 private $user = "carusers";
    private $password = "Marlboro27!";
	 private $database = "carusers";
	       private $conn;

        function __construct() {
        $this->conn = $this->connectDB();
	}	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
        function runQuery($query) {
                $result = mysqli_query($this->conn,$query);
                while($row=mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
                }		
                if(!empty($resultset))
                return $resultset;
	}
}
?>
