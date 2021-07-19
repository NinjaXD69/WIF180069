<?php

require( '../config.php' );
$feedback_id = $_REQUEST[ 'feedback_id' ];
$feedbackdel = "DELETE FROM feedback WHERE id='$feedback_id'";
$result = mysqli_query( $mysqli, $feedbackdel )or die( mysqli_error( $mysqli ) );

header( "Location: feedback.php" );

?>