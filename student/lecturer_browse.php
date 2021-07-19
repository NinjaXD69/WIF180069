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
<title>Browse Lecturers | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
<?php include 'header_student.php'; ?>
  <div class="content-wrapper" >
    <section class="content-header">
      <div class="container-fluid" >
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family:Helvetica; font-weight:bold;">MY LECTURERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lecturers List</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-12">
            <div class="card" style="background: white; color:black; border-radius: 15px;">
              <div class="card-body" >
                <table id="example1" class="table table-striped" style="background: white; color:black;">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th>Lecturer Name</th>
                      <th>Course Code</th>
                      <th>Course Name</th>
                      <th>Occurence</th>
                      <th>View</th>
                    </tr>
                  </thead>
                  <tbody>
				    <?php
					$sqlcourse = "SELECT * FROM student_course where acc_uname ='$loggedin_session' ORDER BY CourseCode ASC";
					$resultcourse = mysqli_query( $mysqli, $sqlcourse );

                    if ( mysqli_num_rows( $resultcourse ) > 0 ) {
                      while ( $row = mysqli_fetch_array( $resultcourse ) ) {
                        $course_id = $row[ 'courseid' ];
                        $course_code = $row[ 'CourseCode' ];
                        $course_name = $row[ 'CourseName' ];
                        $course_occurence = $row[ 'ClassDetail' ];
                        $course_day = $row[ 'ClassDay' ];
                        $course_time = $row[ 'ClassTime' ];
						
						include 'lecturer_get_Info.php';
                        ?>
                    <tr>
                      <td><img src="../lecturer/lecturer_profile/<?php echo $profile_pic_lecturer; ?>" style="width:100;height:100px;"></td>
                      <td><?php echo $lecturer_name; ?></td>
                      <td><b><?php echo $course_code; ?></b></td>
                      <td><?php echo $course_name; ?></td>
                      <td><?php echo $course_occurence; ?></td>
                      <td><a href="lecturer_view.php?acc_uname=<?php echo $lecturer_id; ?>" class="btn btn-primary" title="Click to View More">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        </a></td>
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
      "responsive": false, "lengthChange": true, "autoWidth": true,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

</html>
