<?php
error_reporting( 0 );
include '../session.php';
include '../config.php';

$attendance_id = $_REQUEST[ 'attendance_id' ];
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Submit Absence Reason | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
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
              <li class="breadcrumb-item active">Submit Absence Reason</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Submit Absence Reason</h3>
      </div>
      <form enctype="multipart/form-data"  action="absence_set_newAbsence.php?attendance_id=<?php echo $attendance_id?>" name="form" method="post">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Reason</label>
            <input type="text" name="category" class="form-control" id="exampleInputEmail1" placeholder="Subject">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Explanation</label>
            <textarea name="reason" class="form-control" id="exampleInputPassword1" placeholder="Description (if any)"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Supporting Document</label>
            <div class="input-group mt-1">
              <div class="custom-file">
                <input type="file" name="photo" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</body>

<footer class="main-footer" style="background-color: black; color:white;"> <strong>FCSIT ATTENDANCE &copy; 2021 </strong> FYP 1.
<div class="float-right d-none d-sm-inline-block"> <b>University of Malaya</b> </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="../dist/js/adminlte.min.js"></script> 
<script src="../dist/js/demo.js"></script>

</html>
