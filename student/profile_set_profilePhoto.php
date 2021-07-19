<?php
error_reporting( 0 );
include( '../session.php' );
include( '../config.php' );
?>


<?php
if ( isset( $_POST[ 'profile' ] ) != '' ) {
$name = $_FILES[ 'photo' ][ 'name' ];
$size = $_FILES[ 'photo' ][ 'size' ];
$type = $_FILES[ 'photo' ][ 'type' ];
$temp = $_FILES[ 'photo' ][ 'tmp_name' ];
$newfilename = $loggedin_session . '_' . $name;
move_uploaded_file( $temp, 'student_profile/' . $newfilename );

$query = $mysqli->query(
  "UPDATE student_profile SET profile_pic = '$newfilename' WHERE acc_uname = '$loggedin_session'"
);
if ( $query ) {
  header( 'location:profile.php' );
} else {
  die( mysql_error() );
}
}
?>

