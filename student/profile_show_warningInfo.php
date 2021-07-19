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
				html += "<div class='col' style='text-align:center;'>" + response.warning_message + "</div>";
				html += "</div>";
			$("#modal-body").html(html);

			$("#myModal").modal();
		}
	});
}
</script>





							