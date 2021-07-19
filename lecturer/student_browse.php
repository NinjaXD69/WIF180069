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
<title>Browse Students | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini" style="background-color: black;">
<?php
include( "header_lecturer.php" );
?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family:Helvetica; font-weight:bold;">BROWSE STUDENTS</h1>
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
            $sql = "SELECT * FROM student_course WHERE courseid ='$course_id'";
            $result = mysqli_query( $mysqli, $sql );
            ?>
            <div class="card" style="background: white; color:black; border-radius: 15px;">
              <div class="card-body" >
                <table id="example1" class="table table-striped" style="background: white; color:black;">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th>Matric ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Course</th>
                      <th>Year of Study</th>
                      <th>View Profile</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ( mysqli_num_rows( $result ) > 0 ) {
                      while ( $row = mysqli_fetch_array( $result ) ) {

                        $acc_uname = $row[ 'acc_uname' ];
                        $course_code = $row[ 'CourseCode' ];
                        $course_name = $row[ 'CourseName' ];
                        $course_occurence = $row[ 'ClassDetail' ];
                        ?>
                    <?php
                    $sqlts = "SELECT * FROM student_profile WHERE acc_uname = '$acc_uname'";
                    $resultts = mysqli_query( $mysqli, $sqlts );
                    ?>
                    <?php
                    if ( mysqli_num_rows( $resultts ) > 0 ) {
                      while ( $row = mysqli_fetch_array( $resultts ) ) {
                        $profile_pic = $row[ "profile_pic" ];
                        $acc_fullname = $row[ "acc_fullname" ];
                        $acc_email = $row[ "acc_email" ];
                        $course = $row[ "course" ];
                        $year_study = $row[ "year_study" ];
                        ?>
                    <?php ?>
                    <?php } } ?>
                    <tr>
                      <td><img src="../student/student_profile/<?php echo $profile_pic; ?>" style="width:50;height:50px;"></td>
                      <td><?php echo $acc_uname;?></td>
                      <td><?php echo $acc_fullname;?></td>
                      <td><?php echo $acc_email;?></td>
                      <td><?php echo $course;?></td>
                      <td><?php echo $year_study;?></td>
                      <td align="center" style="width: 10%"><a href="student_view.php?acc_uname=<?php echo $acc_uname; ?>" class="btn btn-warning" title="Click to View More">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="white" xmlns="http://www.w3.org/2000/svg">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                        </a></td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
                <?php
                } else {
                  echo "0 results";
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