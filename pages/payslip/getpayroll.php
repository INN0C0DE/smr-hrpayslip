<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="path/to/select2.min.js"></script>
</head>
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
} else {
    ob_start();
    include('../head_css.php'); ?>

    <body class="skin-black">

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
                            Payslip
                        </h1>
                    </section>

    <div id="editpayroll">
        <form method="post">
            <div style="width:800px !important; margin: 0 auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="redirectToHome()">&times;</button>
                        <script>
                            function redirectToHome() {
                                window.location.href = 'newentry.php';
                            }
                        </script>
                        <h4 class="modal-title">Get Paylsip Info</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <?php
                                // Check if txt_employee, txt_month, and txt_daterange are set in the POST data
                                if (isset($_POST['txt_employee']) && isset($_POST['txt_month']) && isset($_POST['txt_daterange'])) {
                                    // Sanitize and store the values
                                    $employeeId = mysqli_real_escape_string($con, $_POST['txt_employee']);
                                    $month = mysqli_real_escape_string($con, $_POST['txt_month']);
                                    $daterangeId = mysqli_real_escape_string($con, $_POST['txt_daterange']);

                                    // Modify the query to include the WHERE clause with employee, month, and date range filter
                                    $squery = mysqli_query($con, "SELECT p.oid, p.employee, p.pera, p.rata, p.pagibig, p.month_, p.gsisprem, p.daterange, p.period, p.purpose, p.grosspay, p.esr, p.phihealth, p.wholdtax, p.mpl, p.mp2, p.gsismpl, p.gsisgfal, p.ploan, p.cloan, 
        p.eloan, p.comploan, p.educloan, p.consoloan, p.lbp, p.pnb, p.sss, p.phihealthtype, p.wholdtaxtype, p.pagibigtype, p.mpltype, p.mp2type, p.gsispremtype,
        p.gsismpltype, p.gsisgfaltype, p.ploantype, p.cloantype, p.eloantype, p.comploantype, p.educloantype, p.consoloantype, p.lbptype, p.pnbtype, p.ssstype, p.othersadd, p.othersless, p.othersaddvalue, p.otherstype, p.gsisecardtype, p.otherslessvalue, p.gsisecard_,
        e.fname, e.mname, e.lname, e.suffix, r.range_ 
    FROM tbl_payroll p
    INNER JOIN tbl_employee e ON p.employee = e.oid  
    INNER JOIN tbl_range r ON p.daterange = r.oid
    WHERE p.employee = '$employeeId' AND p.month_ = '$month' AND p.daterange = '$daterangeId'");

                                    while ($row = mysqli_fetch_array($squery)) {

                                        echo '
                        <input type="hidden" value="' . $row['oid'] . '" name="hidden_id" id="hidden_id"/>

                        <div class="box">
                        <!-- ========================= MODAL ======================= -->
                            <div class="row">
                                <div class="col-md-12">

                                <input type="hidden" name="txt_employee" id="txt_employee" value="' . $row['employee'] . '" />
                                        
                                <div class=" form-group">
                                <label>Month:</label>
                                <input name="txt_month" id="month" class="form-control input-sm" type="month" value="' . $row['month_'] . '" />
                            </div>

                            <div class="form-group">
                            <label>Range:</label>
                            <select name="txt_daterange" id="txt_daterange" class="form-control input-sm">
                                <option selected disabled>Select Range</option>';

                            // Fetch date ranges from database
                            $rangeResult = mysqli_query($con, "SELECT oid, range_ FROM tbl_range");
                            while ($rangeRow = mysqli_fetch_array($rangeResult)) {
                                echo '<option value="' . $rangeRow['oid'] . '"';
                                if ($rangeRow['oid'] == $daterangeId) {
                                    echo ' selected';
                                }
                                echo '>' . $rangeRow['range_'] . '</option>';
                            }

                            echo '</select>
                            <div class=" form-group">
                                <label>Purpose:</label>
                                <input name="txt_purpose" class="form-control input-sm" id="purpose" type="text" value="' . $row['purpose'] . '" />
                            </div>
           
               
            </div>

    
            <hr style="border: 1px solid black;">

            <div class="form-group col-md-4">
                                <label>Gross Pay: </label>
                                <input name="txt_gross" class="form-control input-sm" id="gross" type="number" step="0.01" value="' . $row['grosspay'] . '" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>PERA: </label>
                                <input name="txt_pera" class="form-control input-sm" id="pera" type="number" step="0.01" value="' . $row['pera'] . '" />
                            </div>

                            <div class="form-group col-md-4">
                                <label>RATA: </label>
                                <input name="txt_rata" class="form-control input-sm" id="rata" type="number" step="0.01" value="' . $row['rata'] . '" />
                            </div>

                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_othersadd" class="form-control input-sm" id="othersadd" type="text" value="' . $row['othersadd'] . '" />
                            </div>
                            <div class="form-group col-md-6">
                            <label>Value:</label>
                                <input name="txt_othersaddvalue" class="form-control input-sm" id="othersaddvalue" type="number" step="0.01" value="' . $row['othersaddvalue'] . '" />
                            </div>

            <hr style="border: 1px solid black;">

            <div class="form-group col-md-12">
            <label>Philhealth: </label>
                                <input name="chk_phihealth" id="chk_phihealth" class="form-check-input" type="checkbox" />
                                <input name="txt_phihealth" id="phihealth" class="form-control input-sm" type="number" step="0.01" value="' . $row['phihealth'] . '" />
                            </div>

            <div class="form-group col-md-12">
            <label>Withholding Tax: </label>
                                <input name="chk_wholdtax" id="chk_wholdtax" class="form-check-input" type="checkbox" />
                                <input name="txt_wholdtax" id="wholdtax" class="form-control input-sm" type="number" step="0.01" value="' . $row['wholdtax'] . '" />
                            </div>

            <hr style="border: 1px solid black;">

            <div class="form-group col-md-12">
            <label>Pag-Ibig: </label>
                                <input name="chk_pagibig" id="chk_pagibig" class="form-check-input" type="checkbox" />
                                <input name="txt_pagibig" id="pagibig" class="form-control input-sm" type="number" step="0.01" value="' . $row['pagibig'] . '" />
                            </div>

            <div class="form-group col-md-6">
            <label>MPL (Pag-ibig): </label>
                                <input name="chk_mpl" id="chk_mpl" class="form-check-input" type="checkbox" />
                                <input name="txt_mpl" id="mpl" class="form-control input-sm" type="number" step="0.01" value="' . $row['mpl'] . '" />
                            </div>

            <div class="form-group col-md-6">
            <label>MP2 (Pag-ibig): </label>
                                <input name="chk_mp2" id="chk_mp2" class="form-check-input" type="checkbox" />
                                <input name="txt_mp2" id="mp2" class="form-control input-sm" type="number" step="0.01" value="' . $row['mp2'] . '" />
                            </div>

            <hr style="border: 1px solid black;">

            <div class="form-group col-md-6">
            <label>GSIS Premium: </label>
                                <input name="chk_gsisprem" id="chk_gsisprem" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisprem" id="gsisprem" class="form-control input-sm" type="number" step="0.01" value="' . $row['gsisprem'] . '" />
                            </div>

            <div class="form-group col-md-6">
            <label>GSIS MPL: </label>
                                <input name="chk_gsismpl" id="chk_gsismpl" class="form-check-input" type="checkbox" />
                                <input name="txt_gsismpl" id="gsismpl" class="form-control input-sm" type="number" step="0.01" value="' . $row['gsismpl'] . '" />
                            </div>

            <div class="form-group col-md-6">
            <label>GSIS GFAL: </label>
                                <input name="chk_gsisgfal" id="chk_gsisgfal" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisgfal" id="gsisgfal" class="form-control input-sm" type="number" step="0.01" value="' . $row['gsisgfal'] . '" />
                            </div>

            <div class="form-group col-md-6">
            <label>GSIS E-CARD: </label>
                                <input name="chk_gsisecard" id="chk_gsisecard" class="form-check-input" type="checkbox" />
                                <input name="txt_gsisecard" id="gsisecard" class="form-control input-sm" type="number" step="0.01" value="' . $row['gsisecard_'] . '" />
                            </div>

            <hr style="border: 1px solid black;">

            <div class="form-group col-md-4">
            <label>POLICY LOAN: </label>
                                <input name="chk_ploan" id="chk_ploan" class="form-check-input" type="checkbox" />
                                <input name="txt_ploan" id="ploan" class="form-control input-sm" type="number" step="0.01" value="' . $row['ploan'] . '" />
                            </div>

            <div class="form-group col-md-4">
            <label>CALIMITY LOAN: </label>
                                <input name="chk_cloan" id="chk_cloan" class="form-check-input" type="checkbox" />
                                <input name="txt_cloan" id="cloan" class="form-control input-sm" type="number" step="0.01" value="' . $row['cloan'] . '" />
                            </div>

            <div class="form-group col-md-4">
            <label>EMERGENCY LOAN: </label>
                                <input name="chk_eloan" id="chk_eloan" class="form-check-input" type="checkbox" />
                                <input name="txt_eloan" id="eloan" class="form-control input-sm" type="number" step="0.01" value="' . $row['eloan'] . '" />
                            </div>

            <div class="form-group col-md-4">
            <label>COMP. LOAN: </label>
                                <input name="chk_comploan" id="chk_comploan" class="form-check-input" type="checkbox" />
                                <input name="txt_comploan" id="comploan" class="form-control input-sm" type="number" step="0.01" value="' . $row['comploan'] . '" />
                            </div>

            <div class="form-group col-md-4">
            <label>EDUCATION LOAN: </label>
                                <input name="chk_educloan" id="chk_educloan" class="form-check-input" type="checkbox" />
                                <input name="txt_educloan" id="educloan" class="form-control input-sm" type="number" step="0.01" value="' . $row['educloan'] . '" />
                            </div>

            <div class="form-group col-md-4">
            <label>CONSO. LOAN: </label>
                                <input name="chk_consoloan" id="chk_consoloan" class="form-check-input" type="checkbox" />
                                <input name="txt_consoloan" id="consoloan" class="form-control input-sm" type="number" step="0.01" value="' . $row['consoloan'] . '" />
                            </div>

            <div class="form-group col-md-12">
            <label>LBP: </label>
                                <input name="chk_lbp" id="chk_lbp" class="form-check-input" type="checkbox" />
                                <input name="txt_lbp" id="lbp" class="form-control input-sm" type="number" step="0.01" value="' . $row['lbp'] . '" />
                            </div>
            <hr style="border: 1px solid black;">
            <div class="form-group col-md-6">
            <label>Others: </label>
                                <input name="txt_othersless" id="othersless" class="form-control input-sm" type="text" value="' . $row['othersless'] . '" />
                            </div>

            <div class="form-group col-md-6">
            <label>Value: </label>
                                <input name="chk_lessvalue" id="chk_lessvalue" class="form-check-input" type="checkbox" />
                                <input name="txt_otherslessvalue" id="otherslessvalue" class="form-control input-sm" type="number" step="0.01" value="' . $row['otherslessvalue'] . '" />
                            </div>
            </div>
                            '; ?>
 <?php }
                    }
                }} ?>
                     <div class="modal-footer">
                <input type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#previewModal" value="Preview" />
                <input type="button" class="btn btn-danger btn-sm btn-block" onclick="clearForm()" value="Clear Form" />
                <input type="submit" class="btn btn-success btn-sm btn-block" name="btn_getpayroll" id="btn_getpayroll" value="Add Payslip" />

            </div>
            </form>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="previewModalLabel">Payslip Preview</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <iframe id="previewFrame" style="width: 100%; height: 700px; border: 0;"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    // Listen for the click event on the Preview button
                    $("#previewModal").on('show.bs.modal', function() {
                        // Get the form data
                        const formData = {
                            txt_employee: $("#txt_employee").val(),
                            txt_daterange: $("#txt_daterange").val(),
                            txt_purpose: $("#purpose").val(),
                            txt_pera: $("#pera").val(),
                            txt_month: $("#month").val(),
                            txt_gross: $("#gross").val(),
                            txt_rata: $("#rata").val(),
                            txt_othersadd: $("#othersadd").val(),
                            txt_othersaddvalue: $("#othersaddvalue").val(),
                            txt_phihealth: $("#phihealth").val(),
                            chk_phihealth: $("#chk_phihealth").prop('checked'),

                            txt_wholdtax: $("#wholdtax").val(),
                            chk_wholdtax: $("#chk_wholdtax").prop('checked'),

                            txt_pagibig: $("#pagibig").val(),
                            chk_pagibig: $("#chk_pagibig").prop('checked'),

                            txt_mpl: $("#mpl").val(),
                            chk_mpl: $("#chk_mpl").prop('checked'),

                            txt_mp2: $("#mp2").val(),
                            chk_mp2: $("#chk_mp2").prop('checked'),

                            txt_gsisprem: $("#gsisprem").val(),
                            chk_gsisprem: $("#chk_gsisprem").prop('checked'),

                            txt_gsismpl: $("#gsismpl").val(),
                            chk_gsismpl: $("#chk_gsismpl").prop('checked'),

                            txt_gsisgfal: $("#gsisgfal").val(),
                            chk_gsisgfal: $("#chk_gsisgfal").prop('checked'),

                            txt_gsisecard: $("#gsisecard").val(),
                            chk_gsisecard: $("#chk_gsisecard").prop('checked'),

                            txt_ploan: $("#ploan").val(),
                            chk_ploan: $("#chk_ploan").prop('checked'),

                            txt_cloan: $("#cloan").val(),
                            chk_cloan: $("#chk_cloan").prop('checked'),

                            txt_eloan: $("#eloan").val(),
                            chk_eloan: $("#chk_eloan").prop('checked'),

                            txt_comploan: $("#comploan").val(),
                            chk_comploan: $("#chk_comploan").prop('checked'),

                            txt_educloan: $("#educloan").val(),
                            chk_educloan: $("#chk_educloan").prop('checked'),

                            txt_consoloan: $("#consoloan").val(),
                            chk_consoloan: $("#chk_consoloan").prop('checked'),

                            txt_lbp: $("#lbp").val(),
                            chk_lbp: $("#chk_lbp").prop('checked'),

                            txt_othersless: $("#othersless").val(),

                            txt_otherslessvalue: $("#otherslessvalue").val(),
                            chk_lessvalue: $("#chk_lessvalue").prop('checked'),
                            // Add other form fields as needed
                        };

                        // Convert the form data to JSON
                        const jsonData = JSON.stringify(formData);

                        // Create the URL for the print6.php file with the form data as a query parameter
                        const url = "print6.php?data=" + encodeURIComponent(jsonData);

                        // Set the iframe source to the URL with the form data
                        $("#previewFrame").attr("src", url);
                    });
                });
            </script>

            <script>
                function clearForm() {
                    const form = document.getElementById('payslipForm');
                    form.reset();
                    // Show a prompt to confirm the action (optional)
                    if (confirm('Are you sure you want to clear all inputted text?')) {
                        form.reset();
                    }
                }

                // Rest of your JavaScript code...
            </script>

            <script>
                // Function to limit the number of decimal places to 2
                function limitDecimals(input) {
                    const value = input.value;
                    const parts = value.split('.');
                    if (parts.length > 1 && parts[1].length > 2) {
                        input.value = parseFloat(value).toFixed(2);
                    }
                }

                // Add event listeners to the input fields
                document.addEventListener('DOMContentLoaded', function() {
                    const inputFields = document.querySelectorAll('input[type="number"]');
                    inputFields.forEach(input => {
                        input.addEventListener('input', function() {
                            limitDecimals(this);
                        });
                        input.addEventListener('blur', function() {
                            limitDecimals(this);
                        });
                    });
                });

                //search
                $(document).ready(function() {
                    $('.select2').select2();
                });
            </script>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <form method="post">


                </form>
            </div><!-- /.box-body -->
            </div><!-- /.box -->

            <?php include "select.php"; ?>

            <?php include "function.php"; ?>

            </section><!-- /.content -->

            </div> <!-- /.row -->



<?php 

include "../footer.php"; ?>
<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0]
            }],
            "aaSorting": []
        });
    });
</script>


    </body>

</html>