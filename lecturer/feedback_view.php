<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );

include 'feedback_get_feedbackInfo.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Feedback | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini" style="background-color:black;">
<?php
include( "header_lecturer.php" );
?>
  <div class="content-wrapper">
  
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family:Helvetica; font-weight:bold;">VIEW FEEDBACK</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Feedback</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card card-primary card-outline">
              <div class="card-header"> <a href="feedback.php" class="btn btn-primary">Back to My Feedbacks</a>
                <div class="card-tools"> <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a> <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a> </div>
              </div>
              <div class="card-body p-0">
                <div class="mailbox-read-info row">
                  <div class="col-sm">
                    <h6><b><?php echo $course_code; ?></b> - <?php echo $course_name; ?></h6>
                  </div>
                  <div class="col-sm">
                    <h6><b><?php echo $course_occurence; ?></b></h6>
                  </div>
                  <div class="col-sm">
                    <h6><b><?php echo $lecturer_name; ?></b></h6>
                  </div>
                  <div class="col-sm">
                    <h6><b>
                      <?php
                      for ( $count = 0; $count < $rating; $count++ ) {
                        echo "<i class=\"fas fa-star text-warning\"></i>";
                      }
                      ?>
                      </b></h6>
                  </div>
                </div>
                <div class="mailbox-read-message">
                  <h5><b><?php echo $subject?></b></h5>
                  <h6><span class="mailbox-read-time float-right"><?php echo $date?></span></h6>
                </div>
                <div class="mailbox-read-message">
                  <p><?php echo $feedback?></p>
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

</html>
