<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Browse Students | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<?php
include( "header_lecturer.php" );
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-family:Helvetica; font-weight:bold;">MY CLASSES</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Students List</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php
        $sqlcourse = "SELECT * FROM lecturer_course where acc_uname ='$loggedin_session' ORDER BY CourseCode ASC";
        $resultcourse = mysqli_query( $mysqli, $sqlcourse );
        ?>
        <div class="card" style="background: white; color:black; border-radius: 15px;">
          <div class="card-body" >
            <table id="example1" class="table table-striped" style="background: white; color:black;">
              <thead class="thead-dark">
                <tr>
                  <th>Course Code</th>
                  <th>Course Name</th>
                  <th>Occurence</th>
                  <th>Day</th>
                  <th>Time</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ( mysqli_num_rows( $resultcourse ) > 0 ) {
                  while ( $row = mysqli_fetch_array( $resultcourse ) ) {
                    $course_id = $row[ 'register_id_lecturer' ];
                    $course_code = $row[ 'CourseCode' ];
                    $course_name = $row[ 'CourseName' ];
                    $course_occurence = $row[ 'ClassDetail' ];
                    $course_day = $row[ 'ClassDay' ];
                    $course_time = $row[ 'ClassTime' ];
                    ?>
                <?php
                $sqltd = "SELECT * FROM lecturer_course WHERE register_id_lecturer = '$course_id'";
                $resulttd = mysqli_query( $mysqli, $sqltd );
                ?>
                <?php
                if ( mysqli_num_rows( $resulttd ) > 0 ) {
                  while ( $row = mysqli_fetch_array( $resulttd ) ) {
                    $lecturer_id = $row[ "acc_uname" ];
                    ?>
                <?php
                $sqlts = "SELECT * FROM lecturer_profile WHERE acc_uname = '$lecturer_id'";
                $resultts = mysqli_query( $mysqli, $sqlts );
                ?>
                <?php
                if ( mysqli_num_rows( $resultts ) > 0 ) {
                  while ( $row = mysqli_fetch_array( $resultts ) ) {
                    $lecturer_name = $row[ "acc_fullname" ];
                    ?>
                <?php ?>
                <?php } } ?>
                <?php } } ?>
                <tr>
                  <td><b><?php echo $course_code; ?></b></td>
                  <td><?php echo $course_name; ?></td>
                  <td><?php echo $course_occurence; ?></td>
                  <td><?php echo $course_day; ?></td>
                  <td><?php echo $course_time; ?></td>
                  <td><a class="btn btn-primary" href="student_browse.php?course_id=<?php echo $course_id; ?>" class="btn btn-secondary" title="Click to View More">View List</a></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
            <?php
            } else {
              echo '0 results';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
	</div>
    </section>
  </div>
</body>

<footer class="main-footer" style="background-color: black; color:white;"> <strong>FCSIT ATTENDANCE &copy; 2021 </strong> FYP 1.
<div class="float-right d-none d-sm-inline-block"> <b>University of Malaya</b> </div>
</footer>

<script src="../plugins/jquery/jquery.min.js"></script> 
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> 
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> 
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> 
<script src="../plugins/jszip/jszip.min.js"></script> 
<script src="../plugins/pdfmake/pdfmake.min.js"></script> 
<script src="../plugins/pdfmake/vfs_fonts.js"></script> 
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script> 
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script> 
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> 
<script src="../dist/js/adminlte.min.js"></script> 
<script src="../dist/js/demo.js"></script> 
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</html>