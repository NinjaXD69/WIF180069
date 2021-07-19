<?php
$queryaccess = "SELECT * FROM access WHERE acc_uname='" . $loggedin_session . "' ";
$resultaccess = mysqli_query( $mysqli, $queryaccess )or die( mysqli_error( $mysqli ) );
$rowaccess = mysqli_fetch_assoc( $resultaccess );
$acc_uname = $rowaccess[ "acc_uname" ];
$acc_fullname = $rowaccess[ "acc_fullname" ];
$acc_email = $rowaccess[ "acc_email" ];
?>