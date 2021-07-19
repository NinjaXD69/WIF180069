<?php
error_reporting( 0 );
include( "../session.php" );
?>
<?php
$queryview = "SELECT * FROM lecturer_profile WHERE acc_uname='" . $loggedin_session . "' ";
$resultview = mysqli_query( $mysqli, $queryview )or die( mysqli_error( $mysqli ) );
$rowview = mysqli_fetch_assoc( $resultview );
$profile_pic = $rowview[ "profile_pic" ];

?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-Attendance@UM | Dashboard</title>
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

<div class="wrapper">
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
    <li class="nav-item d-none d-sm-inline-block"> <a href="main2.php" class="nav-link">Home</a> </li>
    <li class="nav-item d-none d-sm-inline-block"> <a href="#" class="nav-link">Contact</a> </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown"> <a class="nav-link" href="../logout.php"> SignOut </a> </li>
    <li class="nav-item dropdown"> <a class="nav-link" data-toggle="dropdown" href="#"> <i class="far fa-bell"></i> <span class="badge badge-warning navbar-badge">15</span> </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item"> <i class="fas fa-envelope mr-2"></i> 4 new messages <span class="float-right text-muted text-sm">3 mins</span> </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item"> <i class="fas fa-users mr-2"></i> 8 friend requests <span class="float-right text-muted text-sm">12 hours</span> </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item"> <i class="fas fa-file mr-2"></i> 3 new reports <span class="float-right text-muted text-sm">2 days</span> </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> </div>
    </li>
    <li class="nav-item"> <a class="nav-link" data-widget="fullscreen" href="#" role="button"> <i class="fas fa-expand-arrows-alt"></i> </a> </li>
  </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4"> <a href="main2.php" class="brand-link"> <img src="../sources/um_logo_only.png" alt="UM~ Logo" class="brand-image " style="opacity: 8"> <span class="brand-text font-weight-light">E-Attendance@UM</span> </a>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image"> <img src="lecturer_profile/<?php echo $profile_pic; ?>" class="img-circle elevation-2" alt="User Image"> </div>
      <div class="info"> <a href="#" class="d-block"><?php echo $loggedin_session; ?> &nbsp; | &nbsp;LECTURER</a> </div>
    </div>
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar"> <i class="fas fa-search fa-fw"></i> </button>
        </div>
      </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item"> <a href="profile.php" class="nav-link"> <i class="nav-icon fa fa-user"></i>
          <p>Manage Profile</p>
          </a> </li>
        <li class="nav-item"> <a href="student_select_course.php" class="nav-link"> <i class="nav-icon fa fa-users"></i>
          <p>View Students Profile</p>
          </a> </li>
        <li class="nav-item"> <a href="feedback.php" class="nav-link"> <i class="nav-icon fa fa-comments"></i>
          <p>View Feedbacks</p>
          </a> </li>
        <li class="nav-item"> <a href="absence_select_course.php" class="nav-link"> <i class="nav-icon fa fa-hourglass"></i>
          <p>Manage Absence</p>
          </a> </li>
        <li class="nav-item"> <a href="attendance_select_course.php" class="nav-link"> <i class="nav-icon fa fa-check-square"></i>
          <p>Track Attendance</p>
          </a> </li>
        <li class="nav-item"> <a href="analysis_select_course.php" class="nav-link"> <i class="nav-icon fa fa-binoculars"></i>
          <p>Attendance Analysis</p>
          </a> </li>
      </ul>
    </nav>
  </div>
</aside>
