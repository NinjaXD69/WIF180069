<?php
$sqltd = "SELECT * FROM lecturer_course WHERE register_id_lecturer = '$course_id'";
$resulttd = mysqli_query( $mysqli, $sqltd );
?>
<?php
if ( mysqli_num_rows( $resulttd ) > 0 ) {
while ( $row = mysqli_fetch_array( $resulttd ) ) {
  $lecturer_id = $row[ "acc_uname" ];
  ?>
<?php
$sqlts = "SELECT * FROM lecturer_profile WHERE acc_uname = '$lecturer_id'";
$resultts = mysqli_query( $mysqli, $sqlts );
?>
<?php
if ( mysqli_num_rows( $resultts ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultts ) ) {
  $lecturer_name = $row[ "acc_fullname" ];
  ?>
<?php ?>
<?php } } ?>
<?php } } ?>

<?php
$acc_uname = $_REQUEST[ 'acc_uname' ];
$queryview = "SELECT * FROM lecturer_profile WHERE acc_uname='" . $lecturer_id . "' ";
( $resultview = mysqli_query( $mysqli, $queryview ) )or die( mysqli_error( $mysqli ) );
$rowview = mysqli_fetch_assoc( $resultview );
$profile_pic_lecturer = $rowview[ 'profile_pic' ];
?>