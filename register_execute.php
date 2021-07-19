<?php
session_start();
include( 'config.php' );

$fname = $_POST[ 'fname' ];
$uname = $_POST[ 'uname' ];
$email = $_POST[ 'email' ];
$pass = $_POST[ 'pass' ];
$newpass = md5( $pass );
$role = $_POST[ 'role' ];


$result = mysqli_query( $mysqli, "SELECT * FROM access WHERE acc_uname='$uname' OR acc_email='$email'" );

$num_rows = mysqli_num_rows( $result );

if ( $num_rows ) {
  header( "location: register.php?remarks=failed" );
} else {
  if ( mysqli_query( $mysqli, "INSERT INTO access(acc_uname, acc_email, acc_pass, acc_role, acc_fullname)VALUES('$uname', '$email','$newpass', '$role', '$fname')" ) ) {
    header( "location: register.php?remarks=success" );
  } else {
    $e = mysqli_error( $mysqli );
    header( "location: register.php?remarks=error&value=$e" );
  }
}
?>