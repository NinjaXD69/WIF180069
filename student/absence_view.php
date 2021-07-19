<?php
error_reporting( 0 );
include '../session.php';
include '../config.php';
?>

<?php include 'absence_get_absenceInfo.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>View Absence | E-Attendance@UM</title>
<link rel = "icon" href ="../sources/um_logo.png" type = "image/x-icon">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.2.1/css/searchPanes.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
<link rel="stylesheet" href="../dist/css/adminlte.min.css">
<style>
.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    margin-bottom: 30px;
    border: 1px solid black;
    border-radius: 5px;
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}
.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
}
.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}
.invoice-box table tr td:nth-child(2) {
    text-align: right;
}
.invoice-box table tr.top table td {
    padding-bottom: 20px;
}
.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}
.invoice-box table tr.information table td {
    padding-bottom: 40px;
}
.invoice-box table tr.heading td {
    background: black;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
    color : white;
}
.invoice-box table tr.details td {
    padding-bottom: 20px;
}
.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}
.invoice-box table tr.item.last td {
    border-bottom: none;
}
.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
.invoice-box table tr.top table td {
    width: 100%;
    display: block;
    text-align: center;
}
.invoice-box table tr.information table td {
    width: 100%;
    display: block;
    text-align: center;
}
}
/** RTL **/
.rtl {
    direction: rtl;
    font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
}
.rtl table {
    text-align: right;
}
.rtl table tr td:nth-child(2) {
    text-align: left;
}
</style>
</head>

<body class="hold-transition sidebar-mini" style="background-color:black;">
<?php include 'header_student.php'; ?>

  <div class="content-wrapper">
  
    <section class="content-header" style="background-color: black; color:white;">
      <div class="container-fluid">
        <div class="row mb-0">
          <div class="col-sm-6">
            <h5 style="font-family:Helvetica; font-weight:bold;">ABSENCE MANAGEMENT</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" style="color:white">View Absence</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
	
    <section class="content" style="background-color:black;">
      <div class="container-fluid">
        <div class="invoice-box" style="background-color:white;">
          <table cellpadding="0" cellspacing="0">
            <tr class="top">
            <td colspan="2">
            <table>
              <tr>
                <td class="title">
              <tr>
                <h1 style="display:block; text-align:center;"></span>
                  LETTER OF ABSENCE </h1>
              </tr>
              </td>
              </tr>
            </table>
            </td>
            </tr>
            
            <tr class="heading">
              <td style="color:gold; font-weight:bold;"> SECTION 1 </td>
              <td> Course Details </td>
            </tr>
            <tr class="item">
              <td> Course Code </td>
              <td><?php echo $course_code; ?></td>
            </tr>
            <tr class="item">
              <td> Course Name </td>
              <td><?php echo $course_name; ?></td>
            </tr>
            <tr class="item">
              <td> Occurence </td>
              <td><?php echo $course_occurence; ?></td>
            </tr>
            <tr class="item">
              <td> Lecturer </td>
              <td><?php echo $lecturer_name; ?></td>
            </tr>
            <tr class="heading">
              <td style="color:gold; font-weight:bold;"> SECTION 2 </td>
              <td> Absence Details </td>
            </tr>
            <tr class="item">
              <td> Class Date </td>
              <td><?php echo $date; ?></td>
            </tr>
            <tr class="item">
              <td> Week </td>
              <td><?php echo $week; ?></td>
            </tr>
            <tr class="heading">
              <td style="color:gold; font-weight:bold;"> SECTION 3 </td>
              <td> Reason </td>
            </tr>
            <tr class="item">
              <td> Subject </td>
              <td><?php echo $absence_category; ?></td>
            </tr>
            <tr class="details">
              <td> Explanation </td>
              <td style="max-width : 50px;"><?php echo preg_replace('/([^\s]{30})(?=[^\s])/', '$1'.'<wbr>', $absence_reason);?></td>
            </tr>
            <tr class="details">
              <td> Date Submitted </td>
              <td><?php echo $absence_submit; ?></td>
            </tr>
            <tr class="details">
              <td> Approval Status </td>
              <td><?php

              if ( $absence_status == 1 ) {
                echo '<button class="btn btn-success">Approved</button>';
              } elseif ( $absence_status == 2 ) {
                echo '<button class="btn btn-danger">Rejected</button>';
              } elseif ( $absence_status == 3 ) {
                echo '<button class="btn btn-warning">Pending</button>';
              } elseif ( $absence_status == 0 ) {
                echo '<button class="btn btn-warning">-</button>';
              }
              ?></td>
            </tr>
            <tr class="heading">
              <td style="color:gold; font-weight:bold;"> SECTION 4 </td>
              <td> Files </td>
            </tr>
            <tr class="details" >
              <td><a href="absence_download.php?filename=<?php echo $absence_doc; ?>" title="click to download"class="btn btn-secondary">Download</a> <a href="../lecturer/absence-files/<?php echo $absence_doc;?>" target="_blank" title="click to download" class="btn btn-primary">View</a></td>
              <td><br>
                <img src="../lecturer/absence-files/<?php echo $absence_doc; ?>" alt="<?php echo $absence_doc; ?>" style="width:400px;height:400px;"></td>
            </tr>
            <div style="text-align:right;">
              <span>
              <img src="../sources/logo_letter.jpg" style="height:100px; float:left;"> <a href="absence.php" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
              </svg>
              </a>
              <button class="btn btn-primary" onclick="window.print()">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
              </svg>
              </button>
            </div>
          </table>
        </div>
      </div>
    </section>

  </div>
</body>

<footer class="main-footer" style="background-color: black; color:white;"> <strong>FCSIT ATTENDANCE &copy; 2021 </strong> FYP 1.
    <div class="float-right d-none d-sm-inline-block"> <b>University of Malaya</b> </div>
</footer>
  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="../dist/js/adminlte.min.js"></script> 
<script src="../dist/js/demo.js"></script>
</html>
