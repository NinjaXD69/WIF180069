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
          <h1 style="font-family:Helvetica; font-weight:bold;">PROFILE</h1>
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
          <div class="card card-primary">
            <div class="card-header p-3" style="background:black; color:white;">
              <h3 class="card-title">Profile Picture</h3>
            </div>
            <div class="card-body box-profile" style="">
              <div class="text-center"> <img class="img-thumbnail"
                        src="lecturer_profile/<?php echo $profile_pic; ?>"
                       alt="User profile picture" /> </div>
              <br>
              <h3 class="profile-username text-center"><?php echo $acc_fullname; ?></h3>
              <p class="text-active text-center"><?php echo $acc_uname; ?></p>
              <form enctype="multipart/form-data"  action="profile_set_profilePhoto.php" name="form" method="post">
                <div class="row">
                  <div class="input-group mt-1">
                    <div class="custom-file">
                      <input type="file" name="photo" accept="image/*" class="custom-file-input" id="customFile" required="required">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                  <div class="col"> <span class="btn">
                    <input type="reset" class="btn btn-danger"value="Reset">
                    </span> </div>
                  <div class="col"> <span class="btn">
                    <input type="submit" class="btn btn-success" name="profile">
                    </span> </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card card-primary">
            <div class="card-header p-3" style="background:black; color:white;">
              <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>Department</strong>
              <p class="text-active text-right"><?php echo $department; ?></p>
              <hr>
              <strong><i class="far fa-file-alt mr-1"></i>Notes</strong>
              <p class="text-active text-right"><?php echo $notes; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2" style="background: rgb(0,53,135); background: black; color:white;">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab" style="color:white">Details</a></li>
                <?php

                if ( is_null( $verifyfullname ) ) {
                  echo '<li class="nav-item"><a class="nav-link" href="#register" data-toggle="tab" style="color:white">Register</a></li>';
                } else if ( !( is_null( $verifyfullname ) ) ) {
                  echo '<li class="nav-item"><a class="nav-link" href="#update" data-toggle="tab" style="color:white">Update</a></li>';
                }
                ?>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="card card-primary">
                    <div class="card-header text-white bg-dark mb-3">
                      <h6 class="card-title text-white">Lecturer Details</h6>
                    </div>
                    <div class="card-body"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Siswamail</strong>
                      <p class="text-active"><?php echo $acc_email; ?></p>
                      <hr>
                      <div class="row">
                        <div class="col"> <strong><i class="fas fa-book mr-1"></i>Mobile</strong>
                          <p class="text-active"><?php echo $mobile; ?></p>
                        </div>
                        <hr>
                        <div class="col"> <strong><i class="far fa-file-alt mr-1"></i>Office Phone</strong>
                          <p class="text-active"><?php echo $mobile_office; ?></p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong>
                          <p class="text-active"><?php echo $location; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-header text-white bg-dark mb-3">
                      <h6 class="card-title text-white">My Classes</h6>
                    </div>
                    <div class="card-body">
                      <?php
                      $sqlcourse = "SELECT * FROM lecturer_course where acc_uname ='$loggedin_session' ORDER BY CourseCode ASC";
                      $resultcourse = mysqli_query( $mysqli, $sqlcourse );
                      ?>
                      <table id="example1" class="table table-striped" cellspacing="0" cellpadding="0">
                        <thead class="bg-primary">
                          <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Occurence</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>View</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if ( mysqli_num_rows( $resultcourse ) > 0 ) {
                            while ( $row = mysqli_fetch_array( $resultcourse ) ) {
                              $course_id = $row[ 'register_id_lecturer' ];
                              $course_code = $row[ 'CourseCode' ];
                              $course_name = $row[ 'CourseName' ];
                              $course_occurence = $row[ 'ClassDetail' ];
                              $course_day = $row[ 'ClassDay' ];
                              $course_time = $row[ 'ClassTime' ];
                              ?>
                          <tr>
                            <td><b><?php echo $course_code; ?></b></td>
                            <td><?php echo $course_name; ?></td>
                            <td><?php echo $course_occurence; ?></td>
                            <td><?php echo $course_day; ?></td>
                            <td><?php echo $course_time; ?></td>
                            <td><div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Choose </button>
                                <div class="dropdown-menu"> <a class="dropdown-item" href="student_browse.php?course_id=<?php echo $course_id; ?>" class="btn btn-secondary" title="Click to View More">Track Attendance</a> <a class="dropdown-item" href="student_browse.php?course_id=<?php echo $course_id; ?>" class="btn btn-secondary" title="Click to View More">Attendance Analysis</a> <a class="dropdown-item" href="absence.php?course_id=<?php echo $course_id; ?>" class="btn btn-secondary" title="Click to View More">View Absence Reasons</a> <a class="dropdown-item" href="student_browse.php?course_id=<?php echo $course_id; ?>" class="btn btn-secondary" title="Click to View More">View Students</a> </div>
                              </div></td>
                          </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                      </table>
                      <?php
                      } else {
                        echo '0 results';
                      }
                      ?>
                    </div>
                  </div>
                </div>
                
                <!-- ===================================================================================================================================== --> 
                
                <div class="tab-pane" id="register">
                  <form class="form-horizontal" action="profile_set_profileInfo.php" method="post">
                    <input type="hidden" name="new" value="1" />
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">About Me</h6>
                      </div>
                      <div class="card-body">
                        <label for="inputdepartment" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="inputdepartment">
                            <option>Choose Below</option>
                            <option>Software Engineering</option>
                            <option>Artificial Engineering</option>
                            <option>Computer System and Network</option>
                            <option>Multimedia</option>
                            <option>Information System</option>
                            <option>Data Science</option>
                          </select>
                        </div>
                        <label for="inputnotes" class="col-sm-2 col-form-label">Notes</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputnotes" name="inputnotes" placeholder="Description/quotes for your profile"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">Lecturer Details</h6>
                      </div>
                      <div class="card-body">
                        <label for="inputmobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputmobile" name="inputmobile" placeholder="Mobile number without any symbols">
                        </div>
                        <label for="inputmobile_office" class="col-sm-2 col-form-label">Office Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputmobile_office" name="inputmobile_office" placeholder="Phone number without any symbols">
                        </div>
                        <label for="inputlocation" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputlocation" name="inputlocation" placeholder="Office-room Location"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-10 col-sm-10">
                        <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                
                <!-- ===================================================================================================================================================== -->
                
                <div class="tab-pane" id="update">
                  <form class="form-horizontal" action="profile_update_profileInfo.php" method="post">
                    <input type="hidden" name="updatenew" value="2" />
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">About Me</h6>
                      </div>
                      <div class="card-body">
                        <label for="updatedepartment" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="updatedepartment">
                            <option><?php echo $department; ?></option>
                            <option>Software Engineering</option>
                            <option>Artificial Engineering</option>
                            <option>Computer System and Network</option>
                            <option>Multimedia</option>
                            <option>Information System</option>
                            <option>Data Science</option>
                          </select>
                        </div>
                        <label for="updatenotes" class="col-sm-2 col-form-label">Notes</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="updatenotes" name="updatenotes"><?php echo $notes; ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">Lecturer Details</h6>
                      </div>
                      <div class="card-body">
                        <label for="updatemobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updatemobile" name="updatemobile" value="<?php echo $mobile; ?>">
                        </div>
                        <label for="updatemobile_office" class="col-sm-5 col-form-label">Office Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updatemobile_office" name="updatemobile_office" value="<?php echo $mobile_office; ?>">
                        </div>
                        <label for="updatelocation" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="updatelocation" name="updatelocation"><?php echo $location; ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-10 col-sm-10">
                        <button type="submit" name="submitupdate" class="btn btn-danger">Update</button>
                      </div>
                    </div>
                  </form>
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
<!-- ==========================================================================================Footer Start=============================================== -->

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
