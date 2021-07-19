<?php
include( "config.php" );
session_start();
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" )

{
  $uname = mysqli_real_escape_string( $mysqli, $_POST[ 'uname' ] );
  $pass = mysqli_real_escape_string( $mysqli, $_POST[ 'pass' ] );

  $result = mysqli_query( $mysqli, "SELECT * FROM access" );
  $c_rows = mysqli_num_rows( $result );
  if ( $c_rows != $uname ) {
    header( "location: index.php?remark_login=failed" );
  }

  $sql = "SELECT * FROM access WHERE acc_uname='$uname' and acc_pass='" . md5( $pass ) . "'";
  $result = mysqli_query( $mysqli, $sql );

  $row = mysqli_fetch_array( $result );
  $count = mysqli_num_rows( $result );
  $myStr = $row[ 'acc_role' ];
  $myUname = $row[ 'acc_uname' ];
  $uip = $_SERVER[ 'REMOTE_ADDR' ];

  date_default_timezone_set( "Asia/Kuala_Lumpur" );
  $date = date( 'Y-m-d' );
  $time = date( 'H:i:s' );

  if ( $count == 1 ) {
    $_SESSION[ 'login_user' ] = $uname;
    if ( $myStr == '1' ) {
      header( "location: student/main.php" );
    } else if ( $myStr == '2' ) {
      header( "location: lecturer/main2.php" );
    } else if ( $myStr == '3' ) {
      header( "location: admin/main3.php" );
    }

  }

}
?>
