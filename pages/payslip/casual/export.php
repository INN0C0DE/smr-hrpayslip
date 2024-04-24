<?php
// Step 1: Include configuration file
require_once "../connection.php";
require_once "function_mod.php";

// Step 2: Check if the generate_report button is clicked
if(isset($_POST["generate_report"])) {
    // Step 2.1: Fetch data from the database with inner joins
    $query = "SELECT p.*, t.lname, t.fname, t.mname, n.nof
              FROM tbl_casual p
              INNER JOIN tbl_employee t ON p.employee = t.oid 
              INNER JOIN tbl_naturework n ON p.nature_work = n.oid
              ORDER BY p.oid DESC";

    $result = mysqli_query($con, $query);

    // Step 2.2: Create a file pointer
    $file = fopen("casual_employees_report.csv", "w");

    // Step 2.3: Write column headers to the CSV file
    fputcsv($file, array('Employee', 'Date of Birth', 'Sex', 'Level of CS Eligibility', 'Work Status', 'Years of Service as JO/COS/MOA personnel', 'Nature of Work', 'Specified Work', 'Status'));

    // Step 2.4: Write each row of the database result set to the CSV file
    while($row = mysqli_fetch_assoc($result)) {
        // Format date of birth
        $dob = date("m/d/Y", strtotime($row['dob']));

        // Write row to CSV file
        fputcsv($file, array(
            $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'],
            $dob,
            $row['sex'],
            $row['level_cs'],
            $row['work_status'],
            $row['year_service'],
            $row['nof'],
            $row['specified_work'],
            $row['active_status']
        ));
    }

    // Step 2.5: Close the file
    fclose($file);

    // Step 3: Download the generated CSV file
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename="casual_employees_report.csv"');
    readfile('casual_employees_report.csv');
    exit();
}
?>
