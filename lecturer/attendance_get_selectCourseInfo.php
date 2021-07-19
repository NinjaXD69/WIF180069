<?php
$sqlav = "SELECT DISTINCT week FROM attendance_data WHERE course_id = '$course_id'";
$resultav = mysqli_query( $mysqli, $sqlav );

$total = 0;
if ( mysqli_num_rows( $resultav ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultav ) ) {
  $total = $total + 1;
} } 

$sqlap = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND week = '$total' AND (attendance_status = 1 OR attendance_status = 2)";
$resultap = mysqli_query( $mysqli, $sqlap );

$count = 0;
if ( mysqli_num_rows( $resultap ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultap ) ) {
  $count = $count + 1;
} } 

$sqlcs = "SELECT DISTINCT student_uname FROM attendance_data WHERE course_id = '$course_id' AND week = '$total'";
$resultcs = mysqli_query( $mysqli, $sqlcs );

$headcount = 0;
if ( mysqli_num_rows( $resultcs ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultcs ) ) {
  $headcount = $headcount + 1;
} } ?>