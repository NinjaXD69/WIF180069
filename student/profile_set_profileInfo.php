<?php
error_reporting( 0 );
include( '../session.php' );
include( '../config.php' );
?>

<?php
if ( isset( $_POST[ 'new' ] ) && $_POST[ 'new' ] == 1 ) {
  $acc_uname_reg = $loggedin_session;
  $acc_fullname_reg = $acc_fullname;
  $acc_email_reg = $acc_email;
  $course_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputcourse' ] );
  $year_study_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputyear' ] );
  $notes_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputnotes' ] );
  $mobile_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputmobile' ] );
  $priv_email_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputpriv_email' ] );
  $address_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputaddress' ] );
  $postcode_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputpostcode' ] );
  $city_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputcity' ] );
  $state_reg = mysqli_real_escape_string( $mysqli, $_POST[ 'inputstate' ] );
  $parent_name_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_name' ]
  );
  $parent_mobile_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_mobile' ]
  );
  $parent_email_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_email' ]
  );
  $parent_address_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_address' ]
  );
  $parent_postcode_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_postcode' ]
  );
  $parent_city_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_city' ]
  );
  $parent_state_reg = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'inputparent_state' ]
  );

  $sqlreg = "INSERT INTO student_profile (acc_uname,acc_fullname,acc_email,course,year_study,notes,mobile,priv_email,address,postcode,city,state,parent_name,parent_mobile,parent_email,parent_address,parent_postcode,parent_city,parent_state) VALUES ('$acc_uname_reg','$acc_fullname_reg','$acc_email_reg','$course_reg','$year_study_reg','$notes_reg','$mobile_reg','$priv_email_reg','$address_reg','$postcode_reg','$city_reg','$state_reg','$parent_name_reg','$parent_mobile_reg','$parent_email_reg','$parent_address_reg','$parent_postcode_reg','$parent_city_reg','$parent_state_reg')";

  $resultreg = mysqli_query( $mysqli, $sqlreg );

  if ( $resultreg ) {
	header( 'location: profile.php' );
  }
}
?>