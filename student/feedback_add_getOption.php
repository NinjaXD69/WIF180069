<?php
$getsubjects = mysqli_query( $mysqli, "SELECT DISTINCT CourseName FROM student_course WHERE acc_uname = '$loggedin_session' ORDER BY CourseName ASC" );
$optionsubjects = '';
while ( $rowsubjects = mysqli_fetch_assoc( $getsubjects ) ) {
$optionsubjects .= '<option value = "' . $rowsubjects[ 'CourseName' ] . '">' . $rowsubjects[ 'CourseName' ] . '</option>';
}
?>

<?php
$get = mysqli_query( $mysqli, "SELECT DISTINCT ClassDetail FROM student_course WHERE acc_uname ='$loggedin_session' ORDER BY ClassDetail ASC" );
$option = '';
while ( $row = mysqli_fetch_assoc( $get ) ) {
$option .= '<option value = "' . $row[ 'ClassDetail' ] . '">' . $row[ 'ClassDetail' ] . '</option>';
}
?>