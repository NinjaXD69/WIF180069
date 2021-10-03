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

        public function insert(){
			if (isset($_POST['submit'])) {
				if (isset($_POST['courseid']) && isset($_POST['coursetype']) && isset($_POST['coursecode']) && isset($_POST['coursename']) && isset($_POST['classdetail']) && isset($_POST['classday']) && isset($_POST['classtime'])) {
					if (!empty($_POST['courseid']) && !empty($_POST['coursetype']) && !empty($_POST['coursecode']) && !empty($_POST['coursename']) && !empty($_POST['classdetail']) && !empty($_POST['classday']) && !empty($_POST['classtime'])) {
						$courseid = $_POST['courseid'];
						$coursetype = $_POST['coursetype'];
						$coursecode = $_POST['coursecode'];
						$coursename = $_POST['coursename'];
                        $classdetail = $_POST['classdetail'];
                        $classday = $_POST['classday'];
                        $classtime = $_POST['classtime'];
						$query = "INSERT INTO course (courseid,CourseType,CourseCode,CourseName,ClassDetail,ClassDay,ClassTime) VALUES ('$courseid','$coursetype','$coursecode','$coursename','$classdetail','$classday','$classtime')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'keyincourse.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'keyincourse.php';</script>";
						}
					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'insertcourse.php';</script>";
					}
				}
			}
		}

        public function fetch(){
			$data = null;
			$query = "SELECT * FROM course";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function edit($id){
			$data = null;
			$query = "SELECT * FROM course WHERE courseid = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){
			if (isset($_POST['update'])) {
				if (isset($_POST['courseid']) && isset($_POST['coursetype']) && isset($_POST['coursecode']) && isset($_POST['coursename']) && isset($_POST['classdetail']) && isset($_POST['classday']) && isset($_POST['classtime'])) {
					if (!empty($_POST['courseid']) && !empty($_POST['coursetype']) && !empty($_POST['coursecode']) && !empty($_POST['coursename']) && !empty($_POST['classdetail']) && !empty($_POST['classday']) && !empty($_POST['classtime'])) {
						$courseid = $_POST['courseid'];
						$coursetype = $_POST['coursetype'];
						$coursecode = $_POST['coursecode'];
						$coursename = $_POST['coursename'];
                        $classdetail = $_POST['classdetail'];
                        $classday = $_POST['classday'];
                        $classtime = $_POST['classtime'];
						$query = "UPDATE course SET courseid='$courseid', CourseType='$coursetype', CourseCode='$coursecode', CourseName='$coursename', ClassDetail='$classdetail', ClassDay='$classday', ClassTime='$classtime' WHERE courseid='$courseid '";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('records added successfully');</script>";
							echo "<script>window.location.href = 'keyincourse.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'keyincourse.php';</script>";
						}
					}	else{
							echo "<script>alert('empty');</script>";
							echo "<script>window.location.href = 'insertcourse.php';</script>";
						}
    			}
			}
		}

		public function check($id){
			$query = "SELECT * FROM course WHERE courseid = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function delete($id){
			$query = "DELETE FROM course where courseid = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function insertcsv($courseid, $coursetype, $coursecode, $coursename, $classdetail, $classday, $classtime){
			$query = "INSERT INTO course (courseid,CourseType,CourseCode,CourseName,ClassDetail,ClassDay,ClassTime) VALUES ('$courseid','$coursetype','$coursecode','$coursename','$classdetail','$classday','$classtime')";
			if ($sql = $this->conn->query($query)) {
				echo "<script>alert('records added successfully');</script>";
				echo "<script>window.location.href = 'keyincourse.php';</script>";
			}else{
				echo "<script>alert('failed');</script>";
				echo "<script>window.location.href = 'keyincourse.php';</script>";
			}
		}

		public function updatecsv($courseid, $coursetype, $coursecode, $coursename, $classdetail, $classday, $classtime){
			$query = "UPDATE course SET courseid = '$courseid', CourseType = '$coursetype', CourseCode = '$coursecode', CourseName = '$coursename', ClassDetail = '$classdetail', ClassDay = '$classday', ClassTime = '$classtime' WHERE courseid='$courseid '";
			if ($sql = $this->conn->query($query)) {
				echo "<script>alert('records added successfully');</script>";
				echo "<script>window.location.href = 'keyincourse.php';</script>";
			}else{
				echo "<script>alert('failed');</script>";
				echo "<script>window.location.href = 'keyincourse.php';</script>";
			}
		}
	}
?>