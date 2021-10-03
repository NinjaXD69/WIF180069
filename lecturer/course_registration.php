<?php
error_reporting( 0 );
include( "../session.php" );
include( '../config.php' );
?>
<?php include 'profile_get_accessInfo.php'; ?>
<?php include 'profile_get_profileInfo.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Profile | E-Attendance@UM</title>
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
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">                            
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
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
