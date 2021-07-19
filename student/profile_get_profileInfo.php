<?php
$queryview = "SELECT * FROM student_profile WHERE acc_uname='" . $loggedin_session . "'";
( $resultview = mysqli_query( $mysqli, $queryview ) )or die( mysqli_error( $mysqli ) );

$rowview = mysqli_fetch_assoc( $resultview );
$verifyfullname = $rowview[ 'acc_fullname' ];
$profile_pic = $rowview[ 'profile_pic' ];
$course = $rowview[ 'course' ];
$year_study = $rowview[ 'year_study' ];
$notes = $rowview[ 'notes' ];
$mobile = $rowview[ 'mobile' ];
$priv_email = $rowview[ 'priv_email' ];
$address = $rowview[ 'address' ];
$postcode = $rowview[ 'postcode' ];
$city = $rowview[ 'city' ];
$state = $rowview[ 'state' ];
$parent_name = $rowview[ 'parent_name' ];
$parent_mobile = $rowview[ 'parent_mobile' ];
$parent_email = $rowview[ 'parent_email' ];
$parent_address = $rowview[ 'parent_address' ];
$parent_postcode = $rowview[ 'parent_postcode' ];
$parent_city = $rowview[ 'parent_city' ];
$parent_state = $rowview[ 'parent_state' ];
?>