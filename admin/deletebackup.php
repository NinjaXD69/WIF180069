
<?php
require('../config.php');

$mykey1=$_REQUEST['iddel'];

unlink('backup/'.$mykey1.'  attendanceum.sql');

$backupdel = "DELETE FROM backup WHERE name='$mykey1'"; 
$result = mysqli_query($mysqli,$backupdel) or die ( mysqli_error($mysqli));

header('Location: scheduler.php');
?>