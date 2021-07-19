<?php
error_reporting( 0 );
include '../session.php';
include '../config.php';
?>
<?php
$attendance_id = $_REQUEST[ 'attendance_id' ];

date_default_timezone_set( 'Asia/Kuala_Lumpur' );

if ( isset( $_POST[ 'submit' ] ) != '' ) {
  $date = date( 'd/m/Y' );
  $category = mysqli_real_escape_string( $mysqli, $_POST[ 'category' ] );
  $reason = mysqli_real_escape_string( $mysqli, $_POST[ 'reason' ] );
  $name = $_FILES[ 'photo' ][ 'name' ];
  $size = $_FILES[ 'photo' ][ 'size' ];
  $type = $_FILES[ 'photo' ][ 'type' ];
  $temp = $_FILES[ 'photo' ][ 'tmp_name' ];
  $newfilename = $attendance_id . $name;
  $checkuser = $loggedin_session;
  move_uploaded_file( $temp, '../lecturer/absence-files/' . $newfilename );

  $query = $mysqli->query(
    "UPDATE attendance_data SET absence_category = '$category', absence_reason = '$reason', absence_doc = '$newfilename', absence_submit = '$date', absence_status = 3 WHERE attendance_id = '$attendance_id' "
  );
  if ( $query ) {
    header( 'location:absence.php' );
  } else {
    die( mysql_error() );
  }
}
?>

