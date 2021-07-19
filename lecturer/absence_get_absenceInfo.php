<?php
$sqlts = "SELECT * FROM student_profile WHERE acc_uname = '$student_uname'";
$resultts = mysqli_query( $mysqli, $sqlts );
if ( mysqli_num_rows( $resultts ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultts ) ) {
	$student_name = $row[ "acc_fullname" ];
} }

$sqlcd = "SELECT * FROM course WHERE courseid = '$course_id'";
$resultcd = mysqli_query( $mysqli, $sqlcd );
if ( mysqli_num_rows( $resultcd ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultcd ) ) {
	$course_code = $row[ "CourseCode" ];
	$course_name = $row[ "CourseName" ];
	$course_occurence = $row[ "ClassDetail" ];
} } ?>