<?php

require( '../config.php' );
$attendance_id = $_REQUEST[ 'attendance_id' ];

$sqlfile = "SELECT * FROM attendance_data WHERE attendance_id = '$attendance_id'";
$resultfile = mysqli_query( $mysqli, $sqlfile );
$row = mysqli_fetch_array( $resultfile );

unlink( "../lecturer/absence-files/$row[absence_doc]" );

mysqli_query( $mysqli, "UPDATE attendance_data SET absence_category='', absence_reason='', absence_doc='', absence_submit='', absence_status='0' WHERE attendance_id='$attendance_id' " );

header( "Location: absence.php" );

?>