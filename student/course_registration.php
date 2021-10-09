<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
if(isset($_POST['submit']))
{
    if(!empty($_POST['FCC'])) 
    {
        $courseid = $_POST['FCC'];
    }
    elseif(!empty($_POST['PCC'])) 
    {
        $courseid = $_POST['PCC'];
    }
    elseif(!empty($_POST['FEC'])) 
    {
        $courseid = $_POST['FEC'];
    }
    elseif(!empty($_POST['SEC'])) 
    {
        $courseid = $_POST['SEC'];
    }
    $query = "SELECT * FROM course WHERE courseid = $courseid";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($result);
    $acc_id = $loggedin_id;
    $coursecode = $row[2];
    $coursename = $row[3];
    $classdetail = $row[4];
    $classday = $row[5];
    $classtime = $row[6];
    $queryf = "INSERT INTO student_course(register_id_student,acc_id,CourseCode,CourseName,ClassDetail,ClassDay,ClassTime) values('$courseid','$acc_id','$coursecode','$coursename','$classdetail','$classday','$classtime')";
    $resultf = mysqli_query($mysqli, $queryf);
}
if(isset($_GET['del']))
    {
        $courseid = $_GET['id'];
        $queryd = "DELETE from student_course where register_id_student = $courseid";
        $resultd = mysqli_query($mysqli, $queryd);
        $_SESSION['delmsg']="Course deleted !!";
    }
?>
<?php include 'profile_get_accessInfo.php'; ?>
<?php include 'profile_get_profileInfo.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Profile | E-Attendance@UM</title>
        <link rel ="icon" href ="../sources/um_logo.png" type = "image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
        <link rel="stylesheet" href="../dist/css/adminlte.min.css">
        <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <?php
        include( "header_student.php" );
        ?>
        <div class="content-wrapper">
            <section class="content-header" style="color:black;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 style="font-family:Helvetica; font-weight:bold;">Course Registration</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Course Registration</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <h5>Faculty Core Courses</h5>
                            <form action="" method="post">
                                <div class="row">
                                    <?php
                                    $query1 = "SELECT * FROM `course` WHERE CourseType = 1";
                                    $result1 = mysqli_query($mysqli, $query1);
                                    ?>
                                    <select name="FCC" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">                            
                                        <?php while($row1 = mysqli_fetch_array($result1)):;?>
                                        <option value="<?php echo $row1[0]; ?>"><?php echo $row1[2];?>&nbsp<?php echo $row1[3];?>&nbsp<?php echo $row1[4];?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <br>
                            <h5>Program Core Courses</h5>
                            <form action="" method="post">
                                <div class="row">
                                    <?php
                                    $query2 = "SELECT * FROM `course` WHERE CourseType = 2";
                                    $result2 = mysqli_query($mysqli, $query2);
                                    ?>
                                    <select name="PCC" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">                            
                                        <?php while($row2 = mysqli_fetch_array($result2)):;?>
                                        <option value="<?php echo $row2[0];?>"><?php echo $row2[2];?>&nbsp<?php echo $row2[3];?>&nbsp<?php echo $row2[4];?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <br>
                            <h5>Faculty Elective Courses</h5>
                            <form action="" method="post">
                                <div class="row">
                                    <?php
                                    $query3 = "SELECT * FROM `course` WHERE CourseType = 3";
                                    $result3 = mysqli_query($mysqli, $query3);
                                    ?>
                                    <select  name="FEC" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">                            
                                        <?php while($row3 = mysqli_fetch_array($result3)):;?>
                                        <option value="<?php echo $row3[0];?>"><?php echo $row3[2];?>&nbsp<?php echo $row3[3];?>&nbsp<?php echo $row3[4];?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <br>
                            <h5>Specialization Elective Courses</h5>
                            <form action="" method="post">
                                <div class="row">
                                    <?php
                                    $query4 = "SELECT * FROM `course` WHERE CourseType = 4";
                                    $result4 = mysqli_query($mysqli, $query4);
                                    ?>
                                    <select  name="SEC" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">                            
                                        <?php while($row4 = mysqli_fetch_array($result4)):;?>
                                        <option value="<?php echo $row4[0];?>"><?php echo $row4[2];?>&nbsp<?php echo $row4[3];?>&nbsp<?php echo $row4[4];?></option>
                                        <?php endwhile;?>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>     
                        <div class="col-md-8">
                            <table id="example1" class="table table-striped" style="background: white; color:black;">
                                <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Class Detail</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $queryt = "SELECT * FROM student_course WHERE acc_id=$loggedin_id";
                                    $resultt = mysqli_query($mysqli, $queryt);
                                    $i = 1;
                                    while($rows = mysqli_fetch_array($resultt)){ 
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $rows['CourseCode']; ?></td>
                                    <td><?php echo $rows['CourseName']; ?></td>
                                    <td><?php echo $rows['ClassDetail']; ?></td>
                                    <td>
                                    <a href="course_registration.php?id=<?php echo $rows['register_id_student']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><button class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                                <?php
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
    <script src="../plugins/jquery-ui/jquery-ui.min.js"></script> 
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> 
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
    
    <script src="../plugins/chart.js/Chart.min.js"></script> 
    <script src="../plugins/sparklines/sparkline.js"></script> 
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
    <script src="../plugins/jqvmap/jquery.vmap.min.js"></script> 
    <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script> 
    <script src="../plugins/jquery-knob/jquery.knob.min.js"></script> 
    <script src="../plugins/moment/moment.min.js"></script> 
    <script src="../plugins/daterangepicker/daterangepicker.js"></script> 
    <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> 
    <script src="../plugins/summernote/summernote-bs4.min.js"></script> 
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> 
    <script src="../dist/js/adminlte.js"></script> 
    <script src="../dist/js/demo.js"></script> 
    <script src="../dist/js/pages/dashboard.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true, "lengthChange": true, "autoWidth": false
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
