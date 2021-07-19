<?php
error_reporting( 0 );
include( '../session.php' );
include( '../config.php' );
?>


<?php
    $sql = "SELECT * FROM warning WHERE student_uname='$loggedin_session'";
    $result = mysqli_query($mysqli, $sql);
?>

<?php
    if (isset($_POST["get_data"]))
    {
        $id = $_POST["id"];

        $sql = "SELECT * FROM warning WHERE warning_id='$id'";
        $result = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_object($result);
        echo json_encode($row);
        exit();
    }
?>


<link rel="stylesheet" href="bootstrap.css" />
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap.js"></script>

<div class="container">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>CourseID</th>
            <th>Lecturer</th>
            <th>Date</th>
			<th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_object($result)) { ?>
            <tr>
                <td><?php echo $row->warning_id; ?></td>
                <td><?php echo $row->course_id; ?></td>
                <td><?php echo $row->lecturer_uname; ?></td>
				<td><?php echo $row->warning_date; ?></td>
        <td>
            <button class = "btn btn-primary" onclick="loadData(this.getAttribute('data-id'));" data-id="<?php echo $row->warning_id; ?>">
                Details
            </button>
        </td>
            </tr>
        <?php } ?>
    </table>
</div>


<script>
    function loadData(id) {
        console.log(id);
        $.ajax({
            url: "index.php",
            method: "POST",
            data: {get_data: 1, id: id},
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);
                var html = "";
                html += "<div class='row'>";
                    html += "<div class='col-md-6'>Warning</div>";
                    html += "<div class='col-md-6'>" + response.warning_message + "</div>";
                html += "</div>";
                $("#modal-body").html(html);

                $("#myModal").modal();
            }
        });
    }
</script>



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