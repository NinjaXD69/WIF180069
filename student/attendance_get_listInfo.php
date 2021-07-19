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
<?php
$sqlap = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND student_uname = '$loggedin_session' AND (attendance_status = 1 OR attendance_status = 2)";
$resultap = mysqli_query( $mysqli, $sqlap );
?>
<?php
$count = 0;
if ( mysqli_num_rows( $resultap ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultap ) ) {
  $count = $count + 1;
  ?>
<?php
$sqlav = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND student_uname = '$loggedin_session'";
$resultav = mysqli_query( $mysqli, $sqlav );
?>
<?php
$total = 0;
if ( mysqli_num_rows( $resultav ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultav ) ) {
  $total = $total + 1;
  ?>
<?php } } ?>
<?php } } ?>
<?php } } ?>
<?php } } ?>