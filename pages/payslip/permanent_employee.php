 <!-- -- .- -.. . ....... -... -.-- ---... ....... .-. .-.-.- .- .-.-.- ... .-.-.- -.-. .-.-.- ....... -....- ....... .. -.-. - --- ....... .. -. - . .-. -. ....... ..--- ----- ..--- ....-  -->
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
                            Permanent Employee
                        </h1>
                    </section>
                    <!-- left column -->
                    <div class="box">
                        <div class="box-header">
                            <div style="padding:10px;">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addpayslip"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Permanent Employee</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletepermanent"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                <button class="btn btn-success btn-sm hideBTN generate-report-btn"><i class="fa fa-print" aria-hidden="true"></i> Generate Report</button>
                                <!-- <span style="float: right;">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectrows"><i class="fa fa-print" aria-hidden="true"></i> Print Selected</button>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectprint"><i class="fa fa-print" aria-hidden="true"></i> Print Monthly</button>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectprintyear"><i class="fa fa-print" aria-hidden="true"></i> Print Year</button>

                                </span> -->
                            </div>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                        <form method="post">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                        <th>Organizational Unit</th>
                                        <th>Item Number</th>
                                        <th>Position Title</th>
                                        <th>Salary Grade</th>
                                        <th>Authorized Annual Salary</th>
                                        <th>Actual Annual Salary</th>
                                        <th>Step</th>
                                        <th>Area Code</th>
                                        <th>Area Type</th>
                                        <th>Level</th>
                                        <th>Employee</th>
                                        <th>Sex</th>
                                        <th>Date of Birth</th>
                                        <th>TIN</th>
                                        <th>Date of Original Appointment</th>
                                        <th>Date of Last Promotion/ Appointment</th>
                                        <th>Status</th>
                                        <th>Civil Service Eligibility</th>
                                        <th>Comment/ Annotation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Fetching data from the database
                                $squery = mysqli_query($connect, "SELECT c.*, e.fname, e.mname, e.lname, e.suffix
                                            FROM tbl_permanent c 
                                            INNER JOIN tbl_employee e ON c.employee_name = e.oid");
                                
                                if (!$squery) {
                                    // Error handling
                                    echo "Error: " . mysqli_error($connect);
                                } else {
                                    while ($row = mysqli_fetch_assoc($squery)) {
                                        // Sanitize output
                                        $organizationalUnit = htmlspecialchars($row['organizational_unit']);
                                        $itemNumber = htmlspecialchars($row['item_number']);
                                        $positionTitle = htmlspecialchars($row['position_title']);
                                        $salaryGrade = htmlspecialchars($row['salary_grade']);
                                        $authorizedAnnualSalary = htmlspecialchars($row['authorized_annual_salary']);
                                        $actualAnnualSalary = htmlspecialchars($row['actual_annual_salary']);
                                        $step = htmlspecialchars($row['step']);
                                        $areaCode = htmlspecialchars($row['area_code']);
                                        $areaType = htmlspecialchars($row['area_type']);
                                        $level = htmlspecialchars($row['level']);
                                        $employeeName = htmlspecialchars($row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname']);
                                        $sex = htmlspecialchars($row['permanent_sex']);
                                        $dob = htmlspecialchars($row['permanent_dob']);
                                        $formatted_dob = date("F j, Y", strtotime($dob));
                                        $tin = htmlspecialchars($row['tin']);
                                        $dateOfOriginalAppointment = htmlspecialchars($row['date_original_appointment']);
                                        $formatted_dooa = date("F j, Y", strtotime($dateOfOriginalAppointment));
                                        $dateOfLastPromotion = htmlspecialchars($row['date_last_promotion']);
                                        $formatted_dolp = date("F j, Y", strtotime($dateOfLastPromotion));
                                        $status = htmlspecialchars($row['permanent_status']);
                                        $civilServiceEligibility = htmlspecialchars($row['cs_eligibility']);
                                        $comment = htmlspecialchars($row['permanent_comment']);

                                        echo '<tr>
                                            <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['oid'] . '"  /></td>
                                            <td>' . $organizationalUnit . '</td>
                                            <td>' . $itemNumber . '</td>
                                            <td>' . $positionTitle . '</td>
                                            <td>' . $salaryGrade . '</td>
                                            <td>' . $authorizedAnnualSalary . '</td>
                                            <td>' . $actualAnnualSalary . '</td>
                                            <td>' . $step . '</td>
                                            <td>' . $areaCode . '</td>
                                            <td>' . $areaType . '</td>
                                            <td>' . $level . '</td>
                                            <td>' . $employeeName . '</td>
                                            <td>' . $sex . '</td>
                                            <td>' . $formatted_dob . '</td>
                                            <td>' . $tin . '</td>
                                            <td>' . $formatted_dooa . '</td>
                                            <td>' . $formatted_dolp . '</td>
                                            <td>' . $status . '</td>
                                            <td>' . $civilServiceEligibility . '</td>
                                            <td>' . $comment . '</td>
                                        </tr>';
                                    }
                                }
                                ?>
                            </tbody>

                            </table>
                            <?php include "delete_permanent.php"; ?>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                    <?php include "add_modal_permanent.php"; ?>


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
                            font-family: Arial, sans-serif;
                        }
                        th {
                            background-color: #f2f2f2;
                            font-family: Arial, sans-serif;
                        }
                        h1 {
                            font-family: Arial, sans-serif; /* Change the font here */
                            text-align: center;
                        }
                    </style>`;
                    var newWindow = window.open('', '_blank');
                    newWindow.document.open();
                    newWindow.document.write('<html><head><title>Casual Employee Report</title>' + styles + '</head><body>');
                    newWindow.document.write('<h1 style="text-align: center;">Permanent Employee Report</h1>');
                    newWindow.document.write(content); // Write the modified table
                    newWindow.document.write('</body></html>');
                    newWindow.document.close();
                    newWindow.print();
                });
            });
        </script>
    </body>

</html>