<?php
$queryview = "SELECT * FROM lecturer_profile WHERE acc_uname='" . $loggedin_session . "' ";
$resultview = mysqli_query( $mysqli, $queryview )or die( mysqli_error( $mysqli ) );
$rowview = mysqli_fetch_assoc( $resultview );
$verifyfullname = $rowview[ "acc_fullname" ];
$profile_pic = $rowview[ "profile_pic" ];
$department = $rowview[ "department" ];
$notes = $rowview[ "notes" ];
$mobile = $rowview[ "mobile" ];
$mobile_office = $rowview[ "mobile_office" ];
$location = $rowview[ "location" ];
?>
