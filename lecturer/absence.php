<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
?>
<?php
$course_id = $_REQUEST[ 'course_id' ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Absence | E-Attendance@UM</title>
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
        <div class="row mb-0">
          <div class="col-sm-6">
            <h5 style="font-family:Helvetica; font-weight:bold;">ABSENCE MANAGEMENT</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Absence</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <?php
        $sql = "SELECT * FROM attendance_data WHERE course_id ='$course_id' AND absence_status != 0";
        $result = mysqli_query( $mysqli, $sql );
        ?>
        <div class="card" style="background: white; color:black; border-radius: 25px;">
          <div class="card-body">
            <table id="example1" class="table table-striped" cellspacing="0" cellpadding="0" >
              <thead class="thead-dark">
                <tr>
                  <th>Course Code</th>
                  <th>Occurence</th>
                  <th>Student ID</th>
                  <th>Student Name</th>
                  <th>Absence Date</th>
                  <th>Week(No)</th>
                  <th>Reason</th>
                  <th>Date Submitted</th>
                  <th>Approval</th>
                  <th>View Letter</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ( mysqli_num_rows( $result ) > 0 ) {
                  while ( $row = mysqli_fetch_array( $result ) ) {

                    $attendance_id = $row[ 'attendance_id' ];
                    $course_id = $row[ 'course_id' ];
                    $student_uname = $row[ 'student_uname' ];
                    $date = $row[ 'date' ];
                    $week = $row[ 'week' ];
                    $attendance_status = $row[ 'attendance_status' ];
                    $absence_category = $row[ 'absence_category' ];
                    $absence_reason = $row[ 'absence_reason' ];
                    $absence_doc = $row[ 'absence_doc' ];
                    $absence_submit = $row[ 'absence_submit' ];
                    $absence_status = $row[ 'absence_status' ];
					
					include 'absence_get_absenceInfo.php';
                    ?>
                <tr>
                  <td><b><?php echo $course_code;?></b></td>
                  <td><?php echo $course_occurence;?></td>
                  <td><?php echo strtoupper($student_uname);?></td>
                  <td><?php echo $student_name;?></td>
                  <td><?php echo $date;?></td>
                  <td>Week <?php echo $week;?></td>
                  <td><b><?php echo $absence_category;?></b></td>
                  <td><?php echo $absence_submit;?></td>
                  <td ><?php

                  if ( $absence_status == 1 ) {
                    echo '<button class="btn btn-success">Approved</button>';
                  } elseif ( $absence_status == 2 ) {
                    echo '<button class="btn btn-danger">Rejected</button>';
                  }

                  elseif ( $absence_status == 3 ) {
                    echo '<button class="btn btn-warning">Pending</button>';
                  }

                  elseif ( $absence_status == 0 ) {
                    echo '';
                  }

                  ?></td>
                  <td><?php
                  if ( $absence_status != 0 ) {
                    echo
                      '<a href="absence_view.php?attendance_id=' . $attendance_id . '&course_id=' . $course_id . '" class="btn btn-outline-primary" title="Click to View Letter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16"><path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/></svg></a>';
                  } elseif ( $absence_status == 0 ) {
                    echo '';
                  }
                  ?></td>
                  <td><?php
                  if ( $absence_status != 0 ) {
                    echo
                      '<a href="absence_approve.php?attendance_id=' . $attendance_id . '&course_id=' . $course_id . '"class="btn btn-outline-success"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg></a>| 
						
                        <a href="absence_reject.php?attendance_id=' . $attendance_id . '&course_id=' . $course_id . '"class="btn btn-outline-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/><path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/></svg></a>';
                  } elseif ( $absence_status == 0 ) {
                    echo '';
                  }
                  ?></td>
                </tr>
                <?php }} 
				else {
				  echo "0 results";
				}
				?>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
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
	  
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</html>
