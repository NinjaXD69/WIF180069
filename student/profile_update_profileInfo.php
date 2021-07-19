<?php
error_reporting( 0 );
include( '../session.php' );
include( '../config.php' );
?>

<?php
if ( isset( $_POST[ 'updatenew' ] ) && $_POST[ 'updatenew' ] == 2 ) {
  $course_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatecourse' ] );
  $year_study_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateyear' ]
  );
  $notes_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatenotes' ] );
  $mobile_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatemobile' ] );
  $priv_email_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updatepriv_email' ]
  );
  $address_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateaddress' ]
  );
  $postcode_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updatepostcode' ]
  );
  $city_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatecity' ] );
  $state_update = mysqli_real_escape_string( $mysqli, $_POST[ 'updatestate' ] );
  $parent_name_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_name' ]
  );
  $parent_mobile_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_mobile' ]
  );
  $parent_email_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_email' ]
  );
  $parent_address_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_address' ]
  );
  $parent_postcode_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_postcode' ]
  );
  $parent_city_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_city' ]
  );
  $parent_state_update = mysqli_real_escape_string(
	$mysqli,
	$_POST[ 'updateparent_state' ]
  );

  $sqlupdate = "UPDATE student_profile SET course='$course_update', year_study='$year_study_update', notes='$notes_update', mobile='$mobile_update', priv_email='$priv_email_update', address='$address_update', postcode='$postcode_update', city='$city_update', state='$state_update', parent_name='$parent_name_update', parent_mobile='$parent_mobile_update', parent_email='$parent_email_update', parent_address='$parent_address_update', parent_postcode='$parent_postcode_update', parent_city='$parent_city_update', parent_state='$parent_state_update' WHERE acc_uname='$loggedin_session'";

  $resultupdate = mysqli_query( $mysqli, $sqlupdate );

  if ( $resultupdate ) {
	header( 'location: profile.php' );
  }
}
?>