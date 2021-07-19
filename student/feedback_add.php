<?php
error_reporting( 0 );
include '../session.php';

date_default_timezone_set( 'Asia/Kuala_Lumpur' );

include 'feedback_add_getOption.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Feedback | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<style>
* {
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position: absolute;
    top: -9999px;
}
.rate:not(:checked) > label {
    float: right;
    width: 1em;
    overflow: hidden;
    white-space: nowrap;
    cursor: pointer;
    font-size: 30px;
    color: #ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;
}
.rate:not(:checked) > label:hover, .rate:not(:checked) > label:hover ~ label {
    color: #deb217;
}
.rate > input:checked + label:hover, .rate > input:checked + label:hover ~ label, .rate > input:checked ~ label:hover, .rate > input:checked ~ label:hover ~ label, .rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
</head>

<body class="hold-transition sidebar-mini">
<?php include 'header_student.php'; ?>
  <div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="font-family:Helvetica; font-weight:bold;">ADD FEEDBACK</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Manage Feedbacks</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-9">
          <div class="card card-primary card-outline">
          <div class="card-header"> <a href="feedback.php" class="btn btn-primary">Back to My Feedbacks</a> </div>
          <div class="card-body">
          <form name="form1" action="feedback_set_newFeedback.php" method="post">
            <input type="hidden" name="new" value="1" />
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="inputStatus">Course</label>
                  <select id="inputStatus" class="form-control custom-select" name="inputcourse">
                    <option disabled>Select one</option>
                    <?php echo $optionsubjects; ?>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="inputStatus">Occurence</label>
                  <select id="inputStatus" class="form-control custom-select" name="inputoccurence">
                    <option disabled>Select one</option>
                    <?php echo $option; ?>
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="inputStatus">Rating (Stars)</label>
                  <br>
                  <div class="rate" class="form-control custom-select">
                  <input type="radio" id="star5" name="inputrating" value="5" />
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" id="star4" name="inputrating" value="4" />
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" name="inputrating" value="3" />
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" name="inputrating" value="2" />
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" name="inputrating" value="1" />
                  <label for="star1" title="text">1 star</label>
                </div>
              </div>
            </div>
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Subject:" id="inputtopic" name="inputtopic">
            </div>
            <div class="form-group">
              <textarea  class="form-control" id="inputfeedback" name="text"></textarea>
            </div>
            </div>
            <div class="card-footer">
              <div class="float-right">
                <input class="btn btn-primary" type="button" value="Submit" onClick="validate_text();">
              </div>
            </div>
          </form>
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

</div>
<script src="../plugins/jquery/jquery.min.js"></script> 
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="../dist/js/adminlte.min.js"></script> 
<script src="../plugins/summernote/summernote-bs4.min.js"></script> 
<script src="../dist/js/demo.js"></script> 
<script src="../src/js/profanities.js"></script> 
<?php include 'feedback_add_profanityScript.php'; ?>
<script>
  $(function () {
    $('#inputfeedback').summernote
	({
	  toolbar: 
		[
		  ['style', ['style']],
		  ['font', ['bold', 'underline', 'clear']],
		  ['fontname', ['fontname']],
		  ['color', ['color']],
		  ['para', ['ul', 'ol', 'paragraph']],
		  ['table', ['table']],
		  ['insert', ['link']],
		  ['view', ['fullscreen', 'codeview', 'help']],
		],
	});
  })
</script>
</html>
