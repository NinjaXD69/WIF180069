<?php 
	include("../dbaconfig.php");
	$dba = new Dba();
	$id = $_REQUEST['id'];
	$delete = $dba->delete($id);
	if ($delete) {
		echo "<script>alert('delete successfully');</script>";
		echo "<script>window.location.href = 'keyincourse.php';</script>";
	}
 ?>