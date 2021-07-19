<?php
include( "../config.php" );
date_default_timezone_set( 'Asia/Kuala_Lumpur' );

$course_id = $_REQUEST[ 'course_id' ];
$student_uname = $_REQUEST[ 'student_uname' ];
$lecturer_uname = $_REQUEST[ 'lecturer_uname' ];
$percentage_attended = $_REQUEST[ 'percentage_attended' ];
$count = $_REQUEST[ 'count' ];
$total = $_REQUEST[ 'total' ];
$date = date( 'd/m/Y' );

$remaining = ceil(14*0.6)-$count;

$warning_message = "You are being listed in the poor attendance record with only $percentage_attended% attendance clocked for the past $total sessions. You need to attend another $remaining sessions to maintain your attendance above the limit of 9/14 sessions.";


$sqlwarning = "INSERT INTO warning (course_id, student_uname, lecturer_uname, warning_message,warning_date) VALUES ('$course_id','$student_uname','$lecturer_uname','$warning_message','$date')";

$resultwarning = mysqli_query( $mysqli, $sqlwarning );


if ( $resultwarning) {
  header( "location: analysis_view.php?course_id=$course_id" );
}

?>