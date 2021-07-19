<?php
error_reporting( 0 );
include '../session.php';
include '../config.php';
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
<style>
td.max-width-50 {
    max-width: 250px;
    max-length : 50px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    color: black;
}
</style>
</head>

<body class="hold-transition sidebar-mini">
<?php include 'header_student.php'; ?>

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
  <div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-striped" cellspacing="0" cellpadding="0" >
            <thead class="thead-dark">
              <tr>
                <th>Course Code</th>
                <th>Occurence</th>
                <th>Lecturer</th>
                <th>Absence Date</th>
                <th>Week(No)</th>
                <th>Reason</th>
                <th>Date Submitted</th>
                <th>Approval</th>
                <th>View Letter</th>
                <th>Submit/ Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
			  <?php
			  $sql = "SELECT * FROM attendance_data WHERE student_uname ='$loggedin_session' AND attendance_status != 1";
			  $result = mysqli_query( $mysqli, $sql );

              if ( mysqli_num_rows( $result ) > 0 ) {
                while ( $row = mysqli_fetch_array( $result ) ) {

                  $attendance_id = $row[ 'attendance_id' ];
                  $course_id = $row[ 'course_id' ];
                  $lecturer_uname = $row[ 'lecturer_uname' ];
                  $date = $row[ 'date' ];
                  $week = $row[ 'week' ];
                  $attendance_status = $row[ 'attendance_status' ];
                  $absence_category = $row[ 'absence_category' ];
                  $absence_reason = $row[ 'absence_reason' ];
                  $absence_doc = $row[ 'absence_doc' ];
                  $absence_submit = $row[ 'absence_submit' ];
                  $absence_status = $row[ 'absence_status' ];
                  
				  include 'absence_get_listInfo.php'; ?>
              <tr>
                <td><b><?php echo $course_code; ?></b> - <?php echo $course_name; ?></td>
                <td><?php echo $course_occurence; ?></td>
                <td><?php echo $lecturer_name; ?></td>
                <td><?php echo $date; ?></td>
                <td>Week  - <?php echo $week; ?></td>
                <td><b><?php echo $absence_category; ?></b></td>
                <td><?php echo $absence_submit; ?></td>
                <td>
				<?php
                if ( $absence_status == 1 ) {
                  echo '<button class="btn btn-success">Approved</button>';
                } elseif ( $absence_status == 2 ) {
                  echo '<button class="btn btn-danger">Rejected</button>';
                } elseif ( $absence_status == 3 ) {
                  echo '<button class="btn btn-warning">Pending</button>';
                } elseif ( $absence_status == 0 ) {
                  echo '';
                }
                ?>
				</td>
                <td>
				<?php
                if ( $absence_status != 0 ) {
                  echo
                    '<a href="absence_view.php?attendance_id=' . $attendance_id . '"class="btn btn-outline-primary" title="Click to View Letter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16"><path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.313l6.709 3.933L8 8.928l1.291.717L16 5.715V5.4a2 2 0 0 0-1.059-1.765l-6-3.2zM16 6.873l-5.693 3.337L16 13.372v-6.5zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516zM0 13.373l5.693-3.163L0 6.873v6.5z"/></svg></a>';
                } elseif ( $absence_status == 0 ) {
                  echo '';
                }
                ?>
				</td>
                <td><a href="absence_add.php?attendance_id=<?php echo $attendance_id; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-file-earmark-arrow-up-fill" viewBox="0 0 16 16">
                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.354 9.854a.5.5 0 0 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 8.707V12.5a.5.5 0 0 1-1 0V8.707L6.354 9.854z"/>
                  </svg>
                  </a></td>
                <td>
				<?php
                if ( $absence_status != 0 ) {
                  echo
                    '<a href="absence_delete.php?attendance_id=' . $attendance_id . '" class="btn btn-danger">Delete</a>';
                } elseif ( $absence_status == 0 ) {
                  echo '';
                }
                ?>
				</td>
              </tr>
              <?php
              }
			  } else {
				echo '0 results';
			  }
			  ?>
            </tbody>
          </table>

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
