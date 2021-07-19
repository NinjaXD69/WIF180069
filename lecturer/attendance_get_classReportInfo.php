<?php
$course_id = $_REQUEST[ 'course_id' ];
$weekcount = $_REQUEST[ 'weekcount' ];

$sqlcourse = "SELECT * FROM course where courseid = '$course_id'";
$resultcourse = mysqli_query( $mysqli, $sqlcourse );
$rowcourse = mysqli_fetch_array( $resultcourse );
$course_id = $rowcourse[ 'courseid' ];
$course_code = $rowcourse[ 'CourseCode' ];
$course_name = $rowcourse[ 'CourseName' ];
$course_occurence = $rowcourse[ 'ClassDetail' ];
$course_day = $rowcourse[ 'ClassDay' ];
$course_time = $rowcourse[ 'ClassTime' ];

$sqltd = "SELECT * FROM lecturer_course WHERE register_id_lecturer = '$course_id'";
$resulttd = mysqli_query( $mysqli, $sqltd );
$rowtd = mysqli_fetch_array( $resulttd );
$lecturer_id = $rowtd[ "acc_uname" ];

$sqlts = "SELECT * FROM lecturer_profile WHERE acc_uname = '$lecturer_id'";
$resultts = mysqli_query( $mysqli, $sqlts );
$rowts = mysqli_fetch_array( $resultts );
$lecturer_name = $rowts[ "acc_fullname" ];
$lecturer_dept = $rowts[ "department" ];
$lecturer_picture = $rowts[ "profile_pic" ];

$sqlap = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND week = '$weekcount' AND (attendance_status = 1 OR attendance_status = 2)";
$resultap = mysqli_query( $mysqli, $sqlap );
$count = 0;
if ( mysqli_num_rows( $resultap ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultap ) ) {
    $count = $count + 1;
} } 

$sqlav = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND week = '$weekcount'";
$resultav = mysqli_query( $mysqli, $sqlav );
$total = 0;
if ( mysqli_num_rows( $resultav ) > 0 ) {
  while ( $row = mysqli_fetch_array( $resultav ) ) {
    $total = $total + 1;
} } ?>

			
			