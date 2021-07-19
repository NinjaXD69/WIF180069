<?php
$acc_uname = $_REQUEST[ 'acc_uname' ];

$queryview = "SELECT * FROM lecturer_profile WHERE acc_uname='" . $acc_uname . "' ";
( $resultview = mysqli_query( $mysqli, $queryview ) )or
die( mysqli_error( $mysqli ) );
$rowview = mysqli_fetch_assoc( $resultview );

$acc_fullname = $rowview[ 'acc_fullname' ];
$acc_email = $rowview[ 'acc_email' ];
$profile_pic_lecturer = $rowview[ 'profile_pic' ];
$department = $rowview[ 'department' ];
$notes = $rowview[ 'notes' ];
$mobile = $rowview[ 'mobile' ];
$mobile_office = $rowview[ 'mobile_office' ];
$location = $rowview[ 'location' ];
?>
					  
					  