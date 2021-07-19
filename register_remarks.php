<?php
$remarks = isset( $_GET[ 'remarks' ] ) ? $_GET[ 'remarks' ] : '';
if ( $remarks == null and $remarks == "" ) {
echo ' <div style="color:white;">Register Here</div> ';
}
if ( $remarks == 'success' ) {
echo ' <div style="color:green;">Registration Success<br><a class="btn btn-success" href="index.php">Login Now!</a></div> ';
}
if ( $remarks == 'failed' ) {
echo ' <div style="color:red;">Registration Failed! Email or Username exists</div> ';
}
if ( $remarks == 'error' ) {
echo ' <div style="color:red;">Registration Failed! <br> Error: ' . $_GET[ 'value' ] . ' </div> ';
} else {
?>

<?php
}
?>