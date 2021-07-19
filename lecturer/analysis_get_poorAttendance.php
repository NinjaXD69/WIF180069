<?php
$sqlts = "SELECT * FROM student_profile WHERE acc_uname = '$student_uname'";
$resultts = mysqli_query( $mysqli, $sqlts );

if ( mysqli_num_rows( $resultts ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultts ) ) {
	$profile_pic = $row[ "profile_pic" ];
	$acc_fullname = $row[ "acc_fullname" ];
	$acc_email = $row[ "acc_email" ];
	$course = $row[ "course" ];
	$year_study = $row[ "year_study" ];
} }

$sqlap = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND student_uname = '$student_uname' AND (attendance_status = 1 OR attendance_status = 2)";
$resultap = mysqli_query( $mysqli, $sqlap );
$count = 0;
if ( mysqli_num_rows( $resultap ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultap ) ) {
	$count = $count + 1;
} }

$sqlav = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND student_uname = '$student_uname'";
$resultav = mysqli_query( $mysqli, $sqlav );
$total = 0;
if ( mysqli_num_rows( $resultav ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultav ) ) {
	$total = $total + 1;
} } ?>