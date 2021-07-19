<?php
$course_id = $_REQUEST[ 'course_id' ];

$sqlcourse = "SELECT * FROM course where courseid = '$course_id'";
$resultcourse = mysqli_query( $mysqli, $sqlcourse );
$rowcourse = mysqli_fetch_array( $resultcourse );

$course_id = $rowcourse[ 'courseid' ];
$course_code = $rowcourse[ 'CourseCode' ];
$course_name = $rowcourse[ 'CourseName' ];
$course_occurence = $rowcourse[ 'ClassDetail' ];
$course_day = $rowcourse[ 'ClassDay' ];
$course_time = $rowcourse[ 'ClassTime' ];
?>