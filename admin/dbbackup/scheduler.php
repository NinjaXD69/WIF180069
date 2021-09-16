<?php
error_reporting(0);
include("../../session.php");
include('../../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Manage Backups | E-Attendance@UM</title>
  <link rel = "icon" href ="../../sources/um_logo.png" type = "image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.dataTables.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  
  <style>
  thead input 
  {
    width: 100%;
  }
  </style>
  
  <script language ="javascript" >
        var tmp;
        function f1() {
            tmp = setTimeout("callitrept()", 1000000);
        }
        function callitrept() {
            document.getElementById("testbutton").click();
        }
</script>


</head>
<body onload="f1()"; class="hold-transition sidebar-mini" style="background-color:black;">

<?php
include("header-backup.php");
?>
  <div class="content-wrapper" style="background-color:black;">
    <section class="content-header" style="background-color: black; color:white;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family:Helvetica; font-weight:bold;">BACKUP/RESTORE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" style="color:white">Backup/Restore</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content" style="background-color:black;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
			<div align="left">
                <a class="btn btn-primary" id="testbutton" href="backup.php" role="button">Backup Now</a>
            </div>
			<br>
			<?php
			  $sql = "SELECT * FROM backup";
			  $result = mysqli_query( $mysqli, $sql );
			?>
			
            <div class="card" style="border-radius: 25px;">
              <div class="card-body">
                <table id="example" class="hover" style="width:100%">
                  <thead>
                  <tr>
					<th><strong>Date</strong></th>
					<th><strong>Year</strong></th>
					<th><strong>Time</strong></th>
                    <th><strong>Restore</strong></th>
					<th><strong>Delete</strong></th>
                  </tr>
                  </thead>
                  <tbody>
				  
				  <?php
                    if ( mysqli_num_rows( $result ) > 0 ) {
                    while ( $row = mysqli_fetch_array( $result ) ) 
					{ 
					    $name = $row["name"];
						$date = $row["date"];
						$year = $row["year"];
						$time = $row["time"];
			       ?>

                  <tr>
					<td align="center"><?php echo date("Y-m-d  (D)", strtotime($date));?></td>
					<td align="center"><?php echo $year;?></td>
					<td align="center"><?php echo $time;?></td>
					<td align="center">
                        <a href="restore.php?id=<?php echo $name ?> "><img width="30em" height="30em" src="https://img.icons8.com/fluent/48/000000/settings-backup-restore.png"/></a>
                    </td>
					<td align="center">
                        <a href="deletebackup.php?iddel=<?php echo $name ?> "><img width="30em" height="30em" fill="red" src="https://img.icons8.com/nolan/64/delete-forever.png"/></a>
                    </td>
                  </tr>
				  
				  <?php  }   ?>
				  
                  </tbody>           
                </table>
				<?php
            } else {
                echo "No Backups Found";
            } ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <footer class="main-footer" style="background-color: black; color:white;">
    <strong>FCSIT ATTENDANCE &copy; 2021 </strong>
    FYP 1.
    <div class="float-right d-none d-sm-inline-block">
      <b>University of Malaya</b>
    </div>
  </footer>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>

<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>

<script>
  $(document).ready(function() {
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#example').DataTable( {
        orderCellsTop: true,
        fixedHeader: true
    } );
} );
</script>
</body>
</html>