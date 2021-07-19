<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
?>

<?php

if ( isset( $_POST[ 'new' ] ) && $_POST[ 'new' ] == 1 ) {

  $acc_uname_reg = $loggedin_session;
  $acc_fullname_reg = $acc_fullname;
  $acc_email_reg = $acc_email;
  $department_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputdepartment' ] );
  $notes_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputnotes' ] );
  $mobile_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputmobile' ] );
  $mobile_office_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputmobile_office' ] );
  $location_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputlocation' ] );


  $sqlreg = "INSERT INTO lecturer_profile (acc_uname,acc_fullname,acc_email,department,notes,mobile,mobile_office,location) VALUES ('$acc_uname_reg','$acc_fullname','$acc_email','$department_reg','$notes_reg','$mobile_reg','$mobile_office_reg','$location_reg')";

  $resultreg = mysqli_query( $mysqli, $sqlreg );

  if ( $resultreg ) {
	header( "location: profile.php" );
  }
}

?>