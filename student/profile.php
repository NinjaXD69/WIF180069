<?php
error_reporting( 0 );
include( '../session.php' );
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
<link rel="stylesheet" href="../src/css/bootstrap.css" />
<script src="../src/js/jquery-3.3.1.min.js"></script>
<script src="../src/js/bootstrap.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<?php include 'header_student.php'; ?>
<div class="content-wrapper">
  <section class="content-header" >
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-family:Helvetica; font-weight:bold;">My Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" >User Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="content" >
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <div class="card card-primary">
            <div class="card-header p-3" style="background:black; color:white;">
              <h3 class="card-title">Profile Picture</h3>
            </div>
            <div class="card-body box-profile" style="">
              <div class="text-center"><img class="img-thumbnail" src="student_profile/<?php echo $profile_pic; ?>" alt="User profile picture" /></div>
              <br>
              <h3 class="profile-username text-center"><?php echo $acc_fullname; ?></h3>
              <p class="text-center"><?php echo strtoupper ($loggedin_session);?></p>
              <form enctype="multipart/form-data"  action="profile_set_profilePhoto.php" name="form" method="post">
                <div class="row">
                  <div class="input-group mt-1">
                    <div class="custom-file">
                      <input type="file" name="photo" accept="image/*" class="custom-file-input" id="customFile" required="required">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                  </div>
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
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
            <div class="card-header p-3" style="background: black; color:white;">
              <h3 class="card-title">About Me</h3>
            </div>
            <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>Course</strong>
              <p class="text-active text-right"><?php echo $course; ?></p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i>Year of Study</strong>
              <p class="text-active text-right"><?php echo $year_study; ?></p>
              <hr>
              <strong><i class="far fa-file-alt mr-1"></i>Notes</strong>
              <p class="text-active text-right"><?php echo $notes; ?></p>
            </div>
          </div>


          <?php include 'profile_get_warningInfo.php'; ?>

          <div class="card card-primary">
            <div class="card-header p-3" style="background:black; color:white;">
              <h3 class="card-title">Warnings</h3>
            </div>
            <div class="card-body">

                  <table class="table table-striped">
					<tr>
						<th>Course</th>
						<th>Occurence</th>
						<th>Action</th>
					</tr>

					  <?php 
					  while ($row = mysqli_fetch_object($resultwarning)) { 
						$course_id = $row->course_id; 
						$sqlcw = "SELECT * FROM course WHERE courseid = '$course_id'";
						$resultcw = mysqli_query( $mysqli, $sqlcw );
						$rowcw = mysqli_fetch_array( $resultcw );
						$course_name = $rowcw['CourseName'];
						$course_occurence = $rowcw['ClassDetail'];
					  ?>
						<tr>
							<td><?php echo $course_name;?></td>
							<td><?php echo $course_occurence;?></td>
					<td>
						<button class="btn btn-primary" onclick="loadData(this.getAttribute('data-id'));" data-id="<?php echo $row->warning_id; ?>">
							View
						</button>
					</td>
						</tr>
					<?php } ?>
				</table>
			</div>
          </div>
		  <?php include 'profile_show_warningInfo.php'; ?>

			<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-hidden = "true">
			   <div class = "modal-dialog">
				  <div class = "modal-content">
					 <div class = "modal-header">
						<h4 class = "modal-title">
						   Warning Detail
						</h4>
						<button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
						   ×
						</button>
					 </div>
					 <div id = "modal-body">
						Press ESC button to exit.
					 </div>
					 <div class = "modal-footer">
						<button type = "button" class = "btn btn-default" data-dismiss = "modal">
						   OK
						</button>
					 </div>
				  </div>
			   </div>
			</div>

        </div>
        
        <!--=====================================================================================================================================--> 

        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2" style="background: black; color:white;">
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
                      <h6 class="card-title text-white">Student Details</h6>
                    </div>
                    <div class="card-body"> <strong><i class="fas fa-book mr-1" ></i>Mobile</strong>
                      <p class="text-active"><?php echo $mobile; ?></p>
                      <hr>
                      <div class="row">
                        <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Siswamail</strong>
                          <p class="text-active"><?php echo $acc_email; ?></p>
                        </div>
                        <hr>
                        <div class="col"> <strong><i class="far fa-file-alt mr-1"></i>Secondary Email</strong>
                          <p class="text-active"><?php echo $priv_email; ?></p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
                          <p class="text-active"><?php echo $address; ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <p class="text-bold">Postcode</p>
                          <p class="text-active"><?php echo $postcode; ?></p>
                        </div>
                        <div class="col">
                          <p class="text-bold">City</p>
                          <p class="text-active"><?php echo $city; ?></p>
                        </div>
                        <div class="col">
                          <p class="text-bold">State</p>
                          <p class="text-active"><?php echo $state; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card card-primary">
                    <div class="card-header text-white bg-dark mb-3" >
                      <h6 class="card-title text-white">Parents/Guardian Details</h6>
                    </div>
                    <div class="card-body"> <strong><i class="fas fa-book mr-1"></i>Name</strong>
                      <p class="text-active"><?php echo $parent_name; ?></p>
                      <hr>
                      <strong><i class="fas fa-book mr-1"></i>Mobile</strong>
                      <p class="text-active"><?php echo $parent_mobile; ?></p>
                      <hr>
                      <strong><i class="fas fa-map-marker-alt mr-1"></i>E-mail</strong>
                      <p class="text-active"><?php echo $parent_email; ?></p>
                      <hr>
                      <div class="row">
                        <div class="col"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Address</strong>
                          <p class="text-active"><?php echo $parent_address; ?></p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <p class="text-bold">Postcode</p>
                          <p class="text-active"><?php echo $parent_postcode; ?></p>
                        </div>
                        <div class="col">
                          <p class="text-bold">City</p>
                          <p class="text-active"><?php echo $parent_city; ?></p>
                        </div>
                        <div class="col">
                          <p class="text-bold">State</p>
                          <p class="text-active"><?php echo $parent_state; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid">
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title text-white">Registered Classes</h6>
                      </div>
                      <div class="card-body">
                        <table id="example1" class="table table-striped" cellspacing="0" cellpadding="0">
                          <thead class="bg-primary">
                            <tr>
                              <th>Course Code</th>
                              <th>Course Name</th>
                              <th>Occurence</th>
                              <th>Day</th>
                              <th>Time</th>
                              <th>Lecturer Name</th>
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
							?>
                            <tr>
                              <td><b><?php echo $course_code; ?></b></td>
                              <td><?php echo $course_name; ?></td>
                              <td><?php echo $course_occurence; ?></td>
                              <td><?php echo $course_day; ?></td>
                              <td><?php echo $course_time; ?></td>
                              <td><?php include 'profile_get_courseLecturer.php'; ?></td>
                              <td><div class="btn-group">
                                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Choose </button>
                                  <div class="dropdown-menu"> <a class="dropdown-item" href="lecturer_view.php?acc_uname=<?php echo $lecturer_id; ?>" class="btn btn-secondary" title="Click to View More">Track Attendance</a> <a class="dropdown-item" href="lecturer_view.php?acc_uname=<?php echo $lecturer_id; ?>" class="btn btn-secondary" title="Click to View More">Attendance Analysis</a> <a class="dropdown-item" href="lecturer_view.php?acc_uname=<?php echo $lecturer_id; ?>" class="btn btn-secondary" title="Click to View More">View Lecturer</a> </div>
                                </div></td>
                            </tr>
                            <?php
                            }
                            } else 
							{
                              echo '0 results';
                            }
                            ?>
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>

                      </div>
                    </div>
                  </div>
                </div>
                
                <!--=====================================================================================================================================--> 

                <div class="tab-pane" id="register">
                  <form class="form-horizontal" action="profile_set_profileInfo.php" method="post">
                    <input type="hidden" name="new" value="1" />
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">About Me</h6>
                      </div>
                      <div class="card-body">
                        <label for="inputcourse" class="col-sm-2 col-form-label">Course</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="inputcourse">
                            <option>Choose Below</option>
                            <option>Software Engineering</option>
                            <option>Artificial Engineering</option>
                            <option>Computer System and Network</option>
                            <option>Multimedia</option>
                            <option>Information System</option>
                            <option>Data Science</option>
                          </select>
                        </div>
                        <label for="inputyear" class="col-sm-2 col-form-label">Year of Study</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="inputyear">
                            <option>Choose Below</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
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
                        <h6 class="card-title">Student Details</h6>
                      </div>
                      <div class="card-body">
                        <label for="inputmobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputmobile" name="inputmobile" placeholder="Mobile number without any symbols">
                        </div>
                        <label for="inputpriv_email" class="col-sm-5 col-form-label">Secondary Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputpriv_email" name="inputpriv_email" placeholder="Personal E-email address">
                        </div>
                        <label for="inputaddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputaddress" name="inputaddress" placeholder="Address"></textarea>
                        </div>
                        <label for="inputpostcode" class="col-sm-2 col-form-label">Postcode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputpostcode" name="inputpostcode" placeholder="Postcode">
                        </div>
                        <label for="inputcity" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputcity" name="inputcity" placeholder="City">
                        </div>
                        <label for="inputstate" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputstate" name="inputstate" placeholder="State">
                        </div>
                      </div>
                    </div>
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">Parents/Guardian Details</h6>
                      </div>
                      <div class="card-body">
                        <label for="inputparent_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputparent_name" name="inputparent_name" placeholder="Name">
                        </div>
                        <label for="inputparent_mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputparent_mobile" name="inputparent_mobile" placeholder="Mobile">
                        </div>
                        <label for="inputparent_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputparent_email" name="inputparent_email" placeholder="Email">
                        </div>
                        <label for="inputparent_address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputparent_address" name="inputparent_address" placeholder="Address"></textarea>
                        </div>
                        <label for="inputparent_postcode" class="col-sm-2 col-form-label">Postcode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputparent_postcode" name="inputparent_postcode" placeholder="Postcode">
                        </div>
                        <label for="inputparent_city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputparent_city" name="inputparent_city" placeholder="City">
                        </div>
                        <label for="inputparent_state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputparent_state" name="inputparent_state" placeholder="State">
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
				
				<!--=====================================================================================================================================-->
				
                <div class="tab-pane" id="update">
                  <form class="form-horizontal" action="profile_update_profileInfo.php" method="post">
                    <input type="hidden" name="updatenew" value="2" />
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">About Me</h6>
                      </div>
                      <div class="card-body">
                        <label for="updatecourse" class="col-sm-2 col-form-label">Course</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="updatecourse">
                            <option><?php echo $course; ?></option>
                            <option>Software Engineering</option>
                            <option>Artificial Engineering</option>
                            <option>Computer System and Network</option>
                            <option>Multimedia</option>
                            <option>Information System</option>
                            <option>Data Science</option>
                          </select>
                        </div>
                        <label for="updateyear" class="col-sm-2 col-form-label">Year of Study</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="updateyear">
                            <option><?php echo $year_study; ?></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
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
                        <h6 class="card-title">Student Details</h6>
                      </div>
                      <div class="card-body">
                        <label for="updatemobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updatemobile" name="updatemobile" value="<?php echo $mobile; ?>">
                        </div>
                        <label for="updatepriv_email" class="col-sm-5 col-form-label">Secondary Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="updatepriv_email" name="updatepriv_email" value="<?php echo $priv_email; ?>">
                        </div>
                        <label for="updateaddress" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="updateaddress" name="updateaddress"><?php echo $address; ?></textarea>
                        </div>
                        <label for="updatepostcode" class="col-sm-2 col-form-label">Postcode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updatepostcode" name="updatepostcode" value=<?php echo $postcode; ?>>
                        </div>
                        <label for="updatecity" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updatecity" name="updatecity" value="<?php echo $city; ?>">
                        </div>
                        <label for="updatestate" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updatestate" name="updatestate" value="<?php echo $state; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="card card-primary">
                      <div class="card-header text-white bg-dark mb-3">
                        <h6 class="card-title">Parents/Guardian Details</h6>
                      </div>
                      <div class="card-body">
                        <label for="updateparent_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updateparent_name" name="updateparent_name" value="<?php echo $parent_name; ?>">
                        </div>
                        <label for="updateparent_mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updateparent_mobile" name="updateparent_mobile" value="<?php echo $parent_mobile; ?>">
                        </div>
                        <label for="updateparent_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="updateparent_email" name="updateparent_email" value="<?php echo $parent_email; ?>">
                        </div>
                        <label for="updateparent_address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="updateparent_address" name="updateparent_address" ><?php echo $parent_address; ?></textarea>
                        </div>
                        <label for="updateparent_postcode" class="col-sm-2 col-form-label">Postcode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updateparent_postcode" name="updateparent_postcode" value="<?php echo $parent_postcode; ?>">
                        </div>
                        <label for="updateparent_city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updateparent_city" name="updateparent_city" value="<?php echo $parent_city; ?>">
                        </div>
                        <label for="updateparent_state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="updateparent_state" name="updateparent_state" value="<?php echo $parent_state; ?>">
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
</html>

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

