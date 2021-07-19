<?php
error_reporting( 0 );
include '../session.php';

date_default_timezone_set( 'Asia/Kuala_Lumpur' );
?>

<?php
  if ( isset( $_POST[ 'new' ] ) && $_POST[ 'new' ] == 1 ) {

    $student_uname = $loggedin_session;
    $course_name = mysqli_real_escape_string( $mysqli, $_POST[ 'inputcourse' ] );
    $course_occurence = mysqli_real_escape_string( $mysqli, $_POST[ 'inputoccurence' ] );
    $rating = mysqli_real_escape_string( $mysqli, $_POST[ 'inputrating' ] );
    $topic = mysqli_real_escape_string( $mysqli, $_POST[ 'inputtopic' ] );
    $feedback = mysqli_real_escape_string( $mysqli, $_POST[ 'text' ] );
    $feedback_date = date( 'd-M-Y' );
    ?>
  <?php
  $sqlcd = "SELECT * FROM course WHERE CourseName = '$course_name' AND ClassDetail = '$course_occurence'";
  $resultcd = mysqli_query( $mysqli, $sqlcd );

  if ( mysqli_num_rows( $resultcd ) > 0 ) {
    while ( $row = mysqli_fetch_array( $resultcd ) ) {
      $course_id = $row[ "courseid" ];
      $course_code = $row[ "CourseCode" ];
      ?>
  <?php } } ?>
  <?php
  $sqltd = "SELECT * FROM lecturer_course WHERE register_id_lecturer = '$course_id'";
  $resulttd = mysqli_query( $mysqli, $sqltd );

  if ( mysqli_num_rows( $resulttd ) > 0 ) {
    while ( $row = mysqli_fetch_array( $resulttd ) ) {
      $lecturer_id = $row[ "acc_uname" ];
      ?>
  <?php
  $sqlts = "SELECT * FROM lecturer_profile WHERE acc_uname = '$lecturer_id'";
  $resultts = mysqli_query( $mysqli, $sqlts );

  if ( mysqli_num_rows( $resultts ) > 0 ) {
    while ( $row = mysqli_fetch_array( $resultts ) ) {
      $lecturer_name = $row[ "acc_fullname" ];
      ?>
  <?php ?>
  <?php } } ?>
  <?php } } ?>
  <?php
  $sqlreg = "INSERT INTO feedback (student_uname,lecturer_uname,lecturer_name,course_name,course_code,course_occurence,rating,subject,feedback,date) VALUES ('$student_uname','$lecturer_id','$lecturer_name','$course_name','$course_code','$course_occurence','$rating','$topic','$feedback','$feedback_date')";

  $resultreg = mysqli_query( $mysqli, $sqlreg );

  header( 'location: feedback.php' );
  }
?>