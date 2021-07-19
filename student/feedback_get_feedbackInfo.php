<?php
$feedback_id = $_REQUEST[ 'feedback_id' ];

$query = "SELECT * FROM feedback WHERE id='" . $feedback_id . "' ";
( $result = mysqli_query( $mysqli, $query ) )or die( mysqli_error( $mysqli ) );
$row = mysqli_fetch_assoc( $result );

$feedback_id = $row[ 'id' ];
$lecturer_name = $row[ 'lecturer_name' ];
$course_code = $row[ 'course_code' ];
$course_name = $row[ 'course_name' ];
$course_occurence = $row[ 'course_occurence' ];
$rating = $row[ 'rating' ];
$subject = $row[ 'subject' ];
$feedback = $row[ 'feedback' ];
$date = $row[ 'date' ];
?>