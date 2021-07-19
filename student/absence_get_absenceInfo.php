<?php
$attendance_id = $_REQUEST[ 'attendance_id' ];
$sql = "SELECT * FROM attendance_data WHERE attendance_id = '$attendance_id'";
$result = mysqli_query( $mysqli, $sql );
?>
<?php
if ( mysqli_num_rows( $result ) > 0 ) {
  while ( $row = mysqli_fetch_array( $result ) ) {

    $attendance_id = $row[ 'attendance_id' ];
    $course_id = $row[ 'course_id' ];
    $lecturer_uname = $row[ 'lecturer_uname' ];
    $date = $row[ 'date' ];
    $week = $row[ 'week' ];
    $attendance_status = $row[ 'attendance_status' ];
    $absence_category = $row[ 'absence_category' ];
    $absence_reason = $row[ 'absence_reason' ];
    $absence_doc = $row[ 'absence_doc' ];
    $absence_submit = $row[ 'absence_submit' ];
    $absence_status = $row[ 'absence_status' ];
    ?>
<?php
$sqlts = "SELECT * FROM lecturer_profile WHERE acc_uname = '$lecturer_uname'";
$resultts = mysqli_query( $mysqli, $sqlts );
?>
<?php
if ( mysqli_num_rows( $resultts ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultts ) ) {
    $lecturer_name = $row[ "acc_fullname" ];
    ?>
<?php ?>
<?php } } ?>
<?php
$sqlcd = "SELECT * FROM course WHERE courseid = '$course_id'";
$resultcd = mysqli_query( $mysqli, $sqlcd );
?>
<?php
if ( mysqli_num_rows( $resultcd ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultcd ) ) {
    $course_code = $row[ "CourseCode" ];
    $course_name = $row[ "CourseName" ];
    $course_occurence = $row[ "ClassDetail" ];
?>
	
<?php 
}}}} 
else {
  echo '0 results';
}
?>