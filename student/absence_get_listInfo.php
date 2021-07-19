<?php
$sqlts = "SELECT * FROM lecturer_profile WHERE acc_uname = '$lecturer_uname'";
$resultts = mysqli_query( $mysqli, $sqlts );

if ( mysqli_num_rows( $resultts ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultts ) ) {
  $lecturer_name = $row[ "acc_fullname" ];
  ?>
<?php } } ?>

<?php
$sqlcd = "SELECT * FROM course WHERE courseid = '$course_id'";
$resultcd = mysqli_query( $mysqli, $sqlcd );

if ( mysqli_num_rows( $resultcd ) > 0 ) {
while ( $row = mysqli_fetch_array( $resultcd ) ) {
  $course_code = $row[ "CourseCode" ];
  $course_name = $row[ "CourseName" ];
  $course_occurence = $row[ "ClassDetail" ];
  ?>
<?php } } ?>