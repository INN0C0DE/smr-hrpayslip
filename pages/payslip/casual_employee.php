<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
    .highlighted {
        background-color: yellow;
        /* Change this to your desired highlight color */
    }
</style>

<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
} else {
    ob_start();
    include('../head_css.php'); ?>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php
        include "connection.php";
        ?>

        <?php
        if ($_SESSION['role'] == "Admin") {
        ?>
            <nav class="admin__nav">
                <figure class="admin__img--wrapper">
                    <img src="../../assets/Images/SAN MAT WHITE.png" class="admin__img" alt="">
                </figure>
                <ul class="admin__lists">
                    <li class="admin__list"><i class="glyphicon glyphicon-user"></i><?php echo '' . $_SESSION['role'] . ''; ?> <i class="fa fa-caret-down" aria-hidden="true"></i>
                        <ul class="dropdown">
                            <li><a href="logout.php" class="logout">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
            <link rel="stylesheet" href="style.css" />

            <?php include "sidebar.php"; ?>
            <div class="content">
                <!-- encoder content -->
                <section class="content">
                    <br>
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Casual Employee
                        </h1>
                    </section>
                    <!-- left column -->
                    <div class="box">
                        <div class="box-header">
                            <div style="padding:10px;">
                                <button class="btn btn-primary btn-sm hideBTN" data-toggle="modal" data-target="#addpayslip"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Casual Employee</button>
                                <button class="btn btn-danger btn-sm hideBTN" data-toggle="modal" data-target="#deletecasual"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                <button class="btn btn-success btn-sm hideBTN generate-report-btn"><i class="fa fa-print" aria-hidden="true"></i> Generate Report</button>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="table" class="table table-bordered table-striped tbPrint">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                        <th>Employee</th>
                                        <th>Date of Birth</th>
                                        <th>Sex</th>
                                        <th>Level of CS Eligibility</th>
                                        <th>Work Status</th>
                                        <th>Years of Service as JO/COS/MOA personnel</th>
                                        <th>Nature of Work</th>
                                        <th>Specified Work</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Fetching data from the database
                                    $squery = mysqli_query($con, "SELECT c.*, e.fname, e.mname, e.lname, e.suffix, nw.nof AS nature_of_work 
                                                    FROM tbl_casual c 
                                                    INNER JOIN tbl_employee e ON c.employee = e.oid
                                                    LEFT JOIN tbl_naturework nw ON c.nature_work = nw.oid");

                                    if (!$squery) {
                                        // Error handling
                                        echo "Error: " . mysqli_error($con);
                                    } else {
                                        while ($row = mysqli_fetch_assoc($squery)) {
                                            // Sanitize output
                                            $employeeName = htmlspecialchars($row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname']);
                                            $dob = htmlspecialchars($row['dob']);
                                            $formatted_dob = date("F j, Y", strtotime($dob));
                                            $sex = htmlspecialchars($row['sex']);
                                            $csEligibility = htmlspecialchars($row['level_cs']);
                                            $workStatus = htmlspecialchars($row['work_status']);
                                            $yearsOfService = htmlspecialchars($row['year_service']);
                                            $specifiedWork = htmlspecialchars($row['specified_work']);
                                            $activestatus = htmlspecialchars($row['active_status']);
                                            $natureOfWork = isset($row['nature_of_work']) ? htmlspecialchars($row['nature_of_work']) : "N/A";

                                            echo '<tr>
                                    <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['oid'] . '"  /></td>
                                    <td>' . $employeeName . '</td>
                                    <td>' . $formatted_dob . '</td>
                                    <td>' . $sex . '</td>
                                    <td>' . $csEligibility . '</td>
                                    <td>' . $workStatus . '</td>
                                    <td>' . $yearsOfService . '</td>
                                    <td>' . $natureOfWork . '</td>
                                    <td>' . $specifiedWork . '</td>
                                    <td>' . $activestatus . '</td>
                                </tr>';
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php include "delete_casual.php"; ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <?php include "add_modal_casual.php"; ?>
                    <?php include "function.php"; ?>
                </section><!-- /.content -->
            </div> <!-- /.row -->
        <?php } ?>
    <?php }
include "../footer.php"; ?>

<script type="text/javascript">
        $(function() {
    var table = $("#table").DataTable({
        "deferRender": true,
        "paging": true,
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": [0]
        }],
        "aaSorting": [],
        "language": { // Customize the language options
            "lengthMenu": "Show _MENU_ entries", // Show the "Records per page" dropdown
            "info": "", // Remove the "Showing x to y of z entries" text
        }
    });

    // Print only the table and its data
    $('.generate-report-btn').on('click', function() {
        // Disable pagination
        table.page.len(-1).draw();

        // Hide DataTables elements
        $('.dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate').hide();

        // Remove delete confirmation dialog from the DOM
        $('#deletecasual').remove();

        // Clone the table
        var clonedTable = $('#table').clone();

        // Remove the first column (index 0) from each row
        clonedTable.find('tr').each(function() {
            $(this).find('td:first').remove();
            $(this).find('th:first').remove();
        });

        // Generate HTML content for the modified table
        var content = clonedTable.prop('outerHTML');

        var styles = `
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>`;
        var newWindow = window.open('', '_blank');
        newWindow.document.open();
        newWindow.document.write('<html><head><title>Casual Employee Report</title>' + styles + '</head><body>');
        newWindow.document.write(content); // Write the modified table
        newWindow.document.write('</body></html>');
        newWindow.document.close();
        newWindow.print();
    });
});
    </script>

    </body>

</html>
