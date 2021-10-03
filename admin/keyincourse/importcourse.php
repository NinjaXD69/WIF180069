<?php
// Load the database configuration file
include("../dbaconfig.php");

if(isset($_POST['import'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $courseid   = $line[0];
                $coursetype  = $line[1];
                $coursecode  = $line[2];
                $coursename = $line[3];
                $classdetail = $line[4];
                $classday = $line[5];
                $classtime = $line[6];
                // Check whether member already exists in the database with the same email
                $dba = new Dba();
                $check = $dba->check($courseid);
                if(mysqli_num_rows($check)) {
                // Update if record already exists
                    $updatecsv = $dba->updatecsv($courseid, $coursetype, $coursecode, $coursename, $classdetail, $classday, $classtime);
                } else{
                    $insertcsv = $dba->insertcsv($courseid, $coursetype, $coursecode, $coursename, $classdetail, $classday, $classtime);
                }
            }
            // Close opened CSV file
            fclose($csvFile);
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
// Redirect to the listing page
header("Location: keyincourse.php".$qstring);