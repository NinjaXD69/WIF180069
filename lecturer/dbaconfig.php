<?php 
	Class Dba{
		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "attendanceum";
		private $conn;

		public function __construct(){
			try {	
			  $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function Select1(){
			$query = "SELECT * FROM course WHERE CourseType = 1";
			if ($sql = $this->conn->query($query)) {
				while ($row1 = mysqli_fetch_assoc($sql)) {
					$data[] = $row1;
				}
			}
			return $data;
		}
    }
?>
