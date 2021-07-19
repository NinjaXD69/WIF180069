<?php
$frequencies = array();
$resultchart = mysqli_query( $mysqli, "SELECT course_name,rating, COUNT(*) AS frequencies FROM feedback WHERE lecturer_name = '$loggedin_name' GROUP BY course_name" );

if ( mysqli_num_rows( $resultchart ) > 0 ) {
  while ( $rowchart = mysqli_fetch_array( $resultchart ) ) {

    $subject_chart[] = $rowchart[ "course_name" ];
    $frequencies[] = $rowchart[ "frequencies" ];
    $rating_chart[] = $rowchart[ "rating" ];
  }
}
?>