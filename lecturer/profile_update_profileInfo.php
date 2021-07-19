<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
?>
<?php

if ( isset( $_POST[ 'updatenew' ] ) && $_POST[ 'updatenew' ] == 2 ) {
  $department_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatedepartment' ] );
  $notes_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatenotes' ] );
  $mobile_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatemobile' ] );
  $mobile_office_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatemobile_office' ] );
  $location_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatelocation' ] );

  $sqlupdate = "UPDATE lecturer_profile SET department='$department_update', notes='$notes_update', mobile='$mobile_update', mobile_office='$mobile_office_update', location='$location_update' WHERE acc_uname='$loggedin_session'";

  $resultupdate = mysqli_query( $mysqli, $sqlupdate );

  if ( $resultupdate ) {
	header( "location: profile.php" );
  }
}

?>