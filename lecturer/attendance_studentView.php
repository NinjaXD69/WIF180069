<?php
error_reporting( 0 );
include '../session.php';
include '../config.php';

include 'attendance_get_studentViewInfo.php';
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


<body class="hold-transition sidebar-mini" >
<?php include 'header_lecturer.php'; ?>
<div class="content-wrapper" >
<section class="content-header" >
  <div class="container-fluid">
    <div class="row mb-0">
      <div class="col-sm-6">
        <h5 style="font-family:Helvetica; font-weight:bold;">TRACK ATTENDANCE</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" >Track Attendance</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col" >
      <div class="card"  style="height : 220px;">
        <div class="card-header" style="background-color:black; color:white;">
          <h3 class="card-title">Class Detail</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i class="fas fa-minus"></i> </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"> <i class="fas fa-times"></i> </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table projects">
            <thead class="thead-dark">
              <tr>
                <th style="width: 10%"> Course </th>
                <th style="width: 30%"> </th>
                <th style="width: 10%"> Occurence </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $course_code; ?></td>
                <td><b><?php echo $course_name; ?><b></td>
                <td><i><?php echo $course_occurence; ?><i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card"   style="height : 220px;">
        <div class="card-header" style="background-color:black; color:white;">
          <h3 class="card-title">Attendance</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i class="fas fa-minus"></i> </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"> <i class="fas fa-times"></i> </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table projects">
            <thead  class="thead-dark">
              <tr>
                <th> Progress </th>
                <th style="width: 10%"> </th>
                <th style="width: 10%" class="text-center"> Status </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="project_progress">
				<div class="progress progress-sm">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="<?php echo ($count/$total)*100; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($count/$total)*100; ?>%"> </div>
                </div>
                  <small> <?php echo $count; ?> / <?php echo $total; ?> </small></td>
				  
                <td class="project_progress"><?php echo round((($count/$total)*100),0); ?>% </td>
                <td class="project-state"><?php
                $percentage = ( $count / $total ) * 100;;
                if ( $percentage >= 80 ) {
                  echo '<span class="badge badge-success">Good</span>';
                } elseif ( $percentage >= 60 && $percentage < 80 ) {
                  echo '<span class="badge badge-warning">Warning</span>';
                }
                elseif ( $percentage < 60 ) {
                  echo '<span class="badge badge-danger">Critical</span>';
                }
                ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card" style="height : 220px;">
        <div class="card-header" style="background-color:black; color:white;">
          <h3 class="card-title">Action</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i class="fas fa-minus"></i> </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"> <i class="fas fa-times"></i> </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table projects">
            <tbody>
              <tr>
                <td><a class="btn btn-success" href="attendance_studentReport.php?course_id=<?php echo $course_id;?>&student_uname=<?php echo $student_check; ?>">Download Report</a></td>
                <td><a class="btn btn-primary" href="absence.php?course_id=<?php echo $course_id?>">Absence Management</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-header" style="background-color:black; color:white;">
          <h3 class="card-title">Student Detail</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"> <i class="fas fa-minus"></i> </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove"> <i class="fas fa-times"></i> </button>
          </div>
        </div>
        <div class="card-body box-profile" style="padding-top : 6px;">
          <div class="text-center"> <img class="img-thumbnail" src="../student/student_profile/<?php echo $student_picturecheck; ?>" alt="User profile picture" style="height:80px;"/>
            <h6 class="text-center"><b><?php echo $student_namecheck; ?></b></h6>
            <a href="student_view.php?acc_uname=<?php echo $student_check; ?>" class="btn btn-primary" title="Click to View More">View Profile</a> </div>
        </div>
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
                <th style="width: 20%" >Week(No)</th>
                <th style="width: 20%" >Date</th>
                <th style="width: 20%" >Attendance Status</th>
                <th style="width: 20%" >Absence Approval Status</th>
              </tr>
            </thead>
            <tbody>
			  <?php
			  $sql = "SELECT * FROM attendance_data WHERE course_id = '$course_id' AND student_uname='$student_check'";
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
                  ?>
              <tr>
                <td>Week : <b><?php echo $week; ?></b></td>
                <td><?php echo $date; ?></td>
                <td><?php
                if ( $attendance_status == 1 ) {
                  echo '<button class="btn btn-success">Present</button>';
                } elseif ( $attendance_status == 2 ) {
                  echo '<button class="btn btn-warning">Approved</button>';
                } elseif ( $attendance_status == 0 ) {
                  echo '<button class="btn btn-danger">Absent</button>';
                }
                ?></td>
                <td><?php
                if ( $absence_status == 1 ) {
                  echo '<button class="btn btn-success">Approved</button>';
                } elseif ( $absence_status == 2 ) {
                  echo '<button class="btn btn-danger">Rejected</button>';
                } elseif ( $absence_status == 3 ) {
                  echo '<button class="btn btn-warning">Pending</button>';
                } elseif ( $absence_status == 0 ) {
                  echo '';
                }
                ?></td>
              </tr>
              <?php
              }} 
			  else {
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
