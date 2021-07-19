<?php
include( "../config.php" );

$attendance_id = $_REQUEST[ 'attendance_id' ];
$course_id = $_REQUEST[ 'course_id' ];

$query = $mysqli->query( "UPDATE attendance_data SET attendance_status = '0', absence_status = '2' WHERE attendance_id = $attendance_id " );

if ( $query ) {
  header( "location: absence.php?course_id=$course_id" );
}

?>