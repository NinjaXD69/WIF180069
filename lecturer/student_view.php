<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
?>
<?php
$acc_uname = $_REQUEST[ 'acc_uname' ];

$queryview = "SELECT * FROM student_profile WHERE acc_uname='" . $acc_uname . "' ";
$resultview = mysqli_query( $mysqli, $queryview )or die( mysqli_error( $mysqli ) );
$rowview = mysqli_fetch_assoc( $resultview );

$acc_fullname = $rowview[ "acc_fullname" ];
$acc_email = $rowview[ "acc_email" ];
$profile_pic_student = $rowview[ "profile_pic" ];
$course = $rowview[ "course" ];
$year_study = $rowview[ "year_study" ];
$notes = $rowview[ "notes" ];
$mobile = $rowview[ "mobile" ];
$priv_email = $rowview[ "priv_email" ];
$address = $rowview[ "address" ];
$postcode = $rowview[ "postcode" ];
$city = $rowview[ "city" ];
$state = $rowview[ "state" ];
$parent_name = $rowview[ "parent_name" ];
$parent_mobile = $rowview[ "parent_mobile" ];
$parent_email = $rowview[ "parent_email" ];
$parent_address = $rowview[ "parent_address" ];
$parent_postcode = $rowview[ "parent_postcode" ];
$parent_city = $rowview[ "parent_city" ];
$parent_state = $rowview[ "parent_state" ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Student Profile | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
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
include( "header_lecturer.php" );
?>
<div class="content-wrapper">
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 style="font-family:Helvetica; font-weight:bold;">STUDENT PROFILE</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">User Profile</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center"> <img class="img-thumbnail" src="../student/student_profile/<?php echo $profile_pic_student; ?>" alt="User profile picture" /> </div>
            <br>
            <h3 class="profile-username text-center"><?php echo $acc_fullname; ?></h3>
            <p class="text-active text-center"><?php echo strtoupper($acc_uname); ?></p>
          </div>
        </div>
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About</h3>
          </div>
          <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>Course</strong>
            <p class="text-active"><?php echo $course; ?></p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i>Year of Study</strong>
            <p class="text-active"><?php echo $year_study; ?></p>
            <hr>
            <strong><i class="far fa-file-alt mr-1"></i>Notes</strong>
            <p class="text-active"><?php echo $notes; ?></p>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Details</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <div class="card card-primary">
                  <div class="card-header text-white bg-dark mb-3">
                    <h6 class="card-title text-white">Student Details</h6>
                  </div>
                  <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>Mobile</strong>
                    <p class="text-muted"><?php echo $mobile; ?></p>
                    <hr>
                    <div class="row">
                      <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Siswamail</strong>
                        <p class="text-muted"><?php echo $acc_email; ?></p>
                      </div>
                      <hr>
                      <div class="col"> <strong><i class="far fa-file-alt mr-1"></i>Secondary Email</strong>
                        <p class="text-muted"><?php echo $priv_email; ?></p>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
                        <p class="text-muted"><?php echo $address; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <p class="text-bold">Postcode</p>
                        <p class="text-muted"><?php echo $postcode; ?></p>
                      </div>
                      <div class="col">
                        <p class="text-bold">City</p>
                        <p class="text-muted"><?php echo $city; ?></p>
                      </div>
                      <div class="col">
                        <p class="text-bold">State</p>
                        <p class="text-muted"><?php echo $state; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-primary">
                  <div class="card-header text-white bg-dark mb-3">
                    <h6 class="card-title text-white">Parents/Guardian Details</h6>
                  </div>
                  <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>Name</strong>
                    <p class="text-muted"><?php echo $parent_name; ?></p>
                    <hr>
                    <strong><i class="fas fa-book mr-1"></i>Mobile</strong>
                    <p class="text-muted"><?php echo $parent_mobile; ?></p>
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>E-mail</strong>
                    <p class="text-muted"><?php echo $parent_email; ?></p>
                    <hr>
                    <div class="row">
                      <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
                        <p class="text-muted"><?php echo $parent_address; ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <p class="text-bold">Postcode</p>
                        <p class="text-muted"><?php echo $parent_postcode; ?></p>
                      </div>
                      <div class="col">
                        <p class="text-bold">City</p>
                        <p class="text-muted"><?php echo $parent_city; ?></p>
                      </div>
                      <div class="col">
                        <p class="text-bold">State</p>
                        <p class="text-muted"><?php echo $parent_state; ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script> 
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script> 
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../plugins/chart.js/Chart.min.js"></script> 
<script src="../plugins/sparklines/sparkline.js"></script> 
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

</html>
