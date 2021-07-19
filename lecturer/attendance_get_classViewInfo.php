<?php
$weekcount = $_REQUEST[ 'weekcount' ];
$course_id = $_REQUEST[ 'course_id' ];

$sqlcourse = "SELECT * FROM course where courseid = '$course_id'";
$resultcourse = mysqli_query( $mysqli, $sqlcourse );
$rowcourse = mysqli_fetch_array( $resultcourse );
$course_id = $rowcourse[ 'courseid' ];
$course_code = $rowcourse[ 'CourseCode' ];
$course_name = $rowcourse[ 'CourseName' ];
$course_occurence = $rowcourse[ 'ClassDetail' ];
$course_day = $rowcourse[ 'ClassDay' ];
$course_time = $rowcourse[ 'ClassTime' ];

$sqldate = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND week = '$weekcount'";
$resultdate = mysqli_query( $mysqli, $sqldate );

if ( mysqli_num_rows( $resultdate ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultdate ) ) {
    $dateofinstance = $row[ 'date' ];
} } 

$sqlap = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND week = '$weekcount' AND (attendance_status = 1 OR attendance_status = 2)";
$resultap = mysqli_query( $mysqli, $sqlap );

$count = 0;
if ( mysqli_num_rows( $resultap ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultap ) ) {
    $count = $count + 1;
} } 

$sqlcs = "SELECT DISTINCT student_uname FROM attendance_data WHERE course_id = '$course_id' AND week = '$weekcount'";
$resultcs = mysqli_query( $mysqli, $sqlcs );

$headcount = 0;
if ( mysqli_num_rows( $resultcs ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultcs ) ) {
    $headcount = $headcount + 1;
} } ?>