<?php
error_reporting( 0 );
include '../session.php';
include '../config.php';

include 'analysis_get_viewCourse.php';
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
<link rel="stylesheet" href="../plugins/uplot/uPlot.min.css">

<style>
td.max-width-50 {
    max-width: 300px;
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

.scroll {
    max-height: 300px;
    overflow-y: auto;
}
</style>
</head>

<body class="hold-transition sidebar-mini">
<?php include 'header_lecturer.php'; ?>

<div class="content-wrapper" >
<section class="content-header">
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
    <div class="col">
      <div class="card"  style="height : 180px;">
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
                <th style="width: 5%"> Course </th>
                <th style="width: 20%"> </th>
                <th style="width: 5%"> Occurence </th>
				<th style="width: 5%; text-align:center"> Day </th>
				<th style="width: 20%; text-align:center"> Time </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $course_code; ?></td>
                <td><b><?php echo $course_name; ?><b></td>
                <td><i><?php echo $course_occurence; ?><i></td>
				<td><b><?php echo $course_day; ?><b></td>
				<td><b><?php echo $course_time; ?><b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
	
    <div class="col">
      <div class="card" style="height : 180px;">
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
                <td><a class="btn btn-primary" href="absence.php?course_id=<?php echo $course_id?>">Absence Management</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
	
  </div>
</section>

<section class="content">

<div class="container-fluid">
  <div class="row">
  
  <div class="col-7">
    <div id="chartContainer" style="height: 600px; width: 95%; border:10px black solid"></div>
  </div>

  <div class="col-5">
    <div class="row">
      <div class="card">	
		<div style="background-color:green; height:40px">
		<h6 style="font-family:Helvetica; font-weight:bold; color:white; padding-top:10px; padding-left:20px;">Good Attendance</h6>
		</div>
        <div class="card-body scroll">
          <table id="example1" class="table table-striped" cellspacing="0" cellpadding="0" >
            <thead class="thead-dark">
              <tr>
                <th style="width: 10%" >Matric ID</th>
                <th style="width: 30%" >Student Name</th>
				<th style="width: 30%" >Rate</th>
                <th style="width: 20%" >View</th>
              </tr>
            </thead>
            <tbody>
			  <?php
			  $sql = "SELECT DISTINCT student_uname FROM attendance_data WHERE course_id = '$course_id'";
			  $result = mysqli_query( $mysqli, $sql );

			  if ( mysqli_num_rows( $result ) > 0 ) {
				while ( $row = mysqli_fetch_array( $result ) ) {
				  $student_uname = $row[ 'student_uname' ];
				  
			  include 'analysis_get_goodAttendance.php';
			  ?>

				<?php
				 $percentage_attended = ($count/$total)*100;
				 $percentage_absent = (1-($count/$total))*100;

				if($percentage_attended >= 60)
				{
				
				?>
              <tr>
				<td>
				  <?php echo strtoupper($student_uname); ?>
				</td>
				
				<td>
                  <?php echo $acc_fullname;?>
				</td>
				
				<td class="project_progress">
				<div class="progress progress-sm">
					<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage_attended ?>%" aria-valuenow="<?php echo $percentage_attended ?>" aria-valuemin="0" aria-valuemax="100"></div>
					<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage_absent ?>%" aria-valuenow="<?php echo $percentage_absent ?>" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<small> <?php echo $count; ?> / <?php echo $total; ?> </small>
				</td>
				
                <td class="project-actions text-center"><a class="btn btn-primary btn-sm" href="attendance_studentView.php?course_id=<?php echo $course_id; ?>&student_uname=<?php echo $student_uname; ?>"> <i class="fas fa-folder"></i>View</a></td>
				
				<?php 
				}
				?>
              </tr>
              <?php
              }	} 
			  else {
				echo '0 results';
			  }
			  ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
	
	  <div class="row">
      <div class="card">	
		<div style="background-color:red; height:40px">
		<h6 style="font-family:Helvetica; font-weight:bold; color:white; padding-top:10px; padding-left:20px;">Poor Attendance</h6>
		</div>
        <div class="card-body scroll">
          <table id="example3" class="table table-striped" cellspacing="0" cellpadding="0" >
            <thead class="thead-dark">
              <tr>
                <th style="width: 10%" >Matric ID</th>
                <th style="width: 30%" >Student Name</th>
				<th style="width: 30%" >Rate</th>
                <th style="width: 20%" >View</th>
				<th style="width: 20%" >Warning</th>
              </tr>
            </thead>
            <tbody>
			   <?php
			  $sql = "SELECT DISTINCT student_uname FROM attendance_data WHERE course_id = '$course_id'";
			  $result = mysqli_query( $mysqli, $sql );

              if ( mysqli_num_rows( $result ) > 0 ) {
                while ( $row = mysqli_fetch_array( $result ) ) {
                  $student_uname = $row[ 'student_uname' ];
				  
			  include 'analysis_get_poorAttendance.php';
              ?>
			  
				<?php
				 $percentage_attended = ($count/$total)*100;
				 $percentage_absent = (1-($count/$total))*100;

				if($percentage_attended < 60)
				{
				
				?>
              <tr>
				<td>
				  <?php echo strtoupper($student_uname); ?>
				</td>
				
				<td>
                  <?php echo $acc_fullname;?>
				</td>
				
				<td class="project_progress">
				<div class="progress progress-sm">
					<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage_attended ?>%" aria-valuenow="<?php echo $percentage_attended ?>" aria-valuemin="0" aria-valuemax="100"></div>
					<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $percentage_absent ?>%" aria-valuenow="<?php echo $percentage_absent ?>" aria-valuemin="0" aria-valuemax="100"></div>
				</div>
				<small> <?php echo $count; ?> / <?php echo $total; ?> </small>
				</td>
				
                <td class="project-actions text-center"><a class="btn btn-primary btn-sm" href="attendance_studentView.php?course_id=<?php echo $course_id; ?>&student_uname=<?php echo $student_uname; ?>"> <i class=""></i>View</a></td>
				
				<td class="project-actions text-center"><a class="btn btn-warning btn-sm" href="analysis_warning.php?course_id=<?php echo $course_id;?>&student_uname=<?php echo $student_uname;?>&lecturer_uname=<?php echo $loggedin_session;?>&percentage_attended=<?php echo $percentage_attended;?>&count=<?php echo $count;?>&total=<?php echo $total;?>"><i class=""></i>Send</a></td>
				
				<?php 
				}
				?>
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
	</div>
    </section>
	
</div>
</body>

<footer class="main-footer" style="background-color: black; color:white;"> <strong>FCSIT ATTENDANCE &copy; 2021 </strong> FYP 1.
    <div class="float-right d-none d-sm-inline-block"> <b>University of Malaya</b> </div>
</footer>

<script src="../plugins/jquery/jquery.min.js"></script> 
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../dist/js/adminlte.min.js"></script> 
<script src="../dist/js/demo.js"></script> 
<script src="../plugins/datatables/jquery.dataTables.min.js"></script> 
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> 
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> 
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> 
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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

<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
	  
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    $('#example4').DataTable({
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


<script>
window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light",
	title:{
		text: "Attendance Graph"
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			{ y: 120 , indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
			{ y: 117 },
			{ y: 102 },
			{ y: 115 },
			{ y: 96  },
			{ y: 92  },
			{ y: 100 },
			{ y: 91  },
			{ y: 85  , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 88  },
			{ y: 95  },
			{ y: 118 }
		]
	}]
});
chart.render();
}
</script>
</html>