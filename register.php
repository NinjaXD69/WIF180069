<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register | E-Attendance@UM</title>
<link rel = "icon" href ="sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<style>
body {
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
</style>

<body background="sources/universiti-malaya.jpg" class="hold-transition login-page">
<div class="login-box"> 
  <div class="card">
    <div class="card-body login-card-body" style="border-radius:25px;">
      <h4 class="login-box-msg" style="font-family:Helvetica; font-weight:bold;"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/6/63/University_of_Malaya_coat_of_arms.svg/1200px-University_of_Malaya_coat_of_arms.svg.png" style="height:40px;;">&nbsp;&nbsp;UM-ATTENDANCE</h4>
      <h5 class="login-box-msg" style="font-family:Helvetica; font-weight:bold;">Register!</h5>
	  
      <?php include 'register_remarks.php';?>
	  
      <form action="register_execute.php" method="post" name="reg" onsubmit="return validateForm()">
        <div class="input-group mb-3">
          <input name="fname" type="text" class="form-control" placeholder="Full Name" required>
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-user"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="uname" type="text" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-user"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="email" type="text" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="pass" type="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select id="inputStatus" class="form-control custom-select" name="role" required>
            <option disabled>Select one</option>
            <option value="1">Student</option>
            <option value="2">Lecturer</option>
          </select>
        </div>
        <div class="row" >
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <div class="col"> <a href="index.php" class="btn btn-primary btn-block">Sign In</a> </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script> 
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
