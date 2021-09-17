<?php
error_reporting(0);
include("../../session.php");
include('../../config.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Key In Course Data | E-Attendance@UM</title>
    <link rel = "icon" href ="../../sources/um_logo.png" type = "image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
    thead input 
    {
      width: 100%;
    }
    </style>
    <script language ="javascript" >
          var tmp;
          function f1() {
              tmp = setTimeout("callitrept()", 1000000);
          }
          function callitrept() {
              document.getElementById("testbutton").click();
          }
    </script>
  </head>
  <body onload="f1()"; class="hold-transition sidebar-mini" style="background-color:black;">
    <?php
    include("header-kic.php");
    ?>
    <div class="content-wrapper" style="background-color: black;">
      <section class="content-header" style="background-color: black; color:white;">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 style="font-family:Helvetica; font-weight:bold;">Insert New Course</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" style="color:white">Insert New Course</li>
              </ol>
            </div>
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card" style="background: white; color:black; border-radius: 15px;">
                <div class="card-body">
                    <div class="col-md-4 mx-auto">
                        <?php
                            include("../dbaconfig.php");
                            $dba = new Dba();
                            $insert = $dba->insert();
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Course ID</label>
                                <input type="number" name="courseid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Course Type</label>
                                <input type="number" name="coursetype" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Course Code</label>
                                <input type="text" name="coursecode" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Course Name</label>
                                <input type="text" name="coursename" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Class Detail</label>
                                <input type="text" name="classdetail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Class Day</label>
                                <input type="text" name="classday" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Class Time</label>
                                <input type="text" name="classtime" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer" style="background-color: black; color:white;">
      <strong>FCSIT ATTENDANCE &copy; 2021 </strong>
      FYP 1.
      <div class="float-right d-none d-sm-inline-block">
        <b>University of Malaya</b>
      </div>
    </footer>
    <script src="../../plugins/jquery/jquery.min.js"></script> 
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script> 
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script> 
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> 
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> 
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script> 
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> 
    <script src="../../plugins/jszip/jszip.min.js"></script> 
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script> 
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script> 
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script> 
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script> 
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script> 
    <script src="../../dist/js/adminlte.min.js"></script> 
    <script src="../../dist/js/demo.js"></script>
    <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
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
  </body>
</html>