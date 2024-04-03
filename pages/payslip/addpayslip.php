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
                    <!-- left column -->
                    <div class="box">
                        <!-- ========================= MODAL ======================= -->
                        <form method="post" style="background-color:rgba(192,192,192,0.3);" id="payslipForm">
                            <div class="row">
                                <div class="col-md-12">


                                <div class="form-group col-md-6 ">
                                        <div class="form-group">
                                        <label>Employee:</label>
                                        <select name="txt_employee" id="txt_employee" class="form-control input-sm select2">
                                            <option value="" disabled selected> Select Employee</option>
                                            <?php
                                            // Assuming $con is the MySQLi database connection variable
                                            $result = mysqli_query($con, "SELECT oid, fname, mname, lname, suffix FROM tbl_employee");
                                            while ($row = mysqli_fetch_array($result)) {
                                                $fullName = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname'];
                                                echo '<option value="' . $row['oid'] . '">' . $fullName . '</option>';
                                            }
                                            ?>
                                        </select>
                                        </div>
                                        
                                        <div class="form-group ">
                                        <label>Month:</label>
                                        <input name="txt_month" class="form-control input-sm" id="month" type="month" placeholder="Month" />
                                    </div>

                                    <div class="form-group ">
                                        <label>Range:</label>
                                        <select name="txt_daterange" id="txt_daterange" class="form-control input-sm">
                                            <option selected="" disabled="">Select Range</option>
                                            <?php
                                            $result = mysqli_query($con, "SELECT oid, range_ FROM tbl_range");
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="' . $row['oid'] . '">' . $row['range_'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group ">
                                        <label>Purpose:</label>
                                        <input name="txt_purpose" class="form-control input-sm" id="purpose" type="text" placeholder="Purpose" />
                                    </div>
                                    </div>

                                    
<div class="form-group col-md-6">
    <label>Image:</label>
    <div  class="text-center" id="employee_image_container">
        <!-- The selected employee's image will be displayed here -->
    </div>
    
</div>

<script>
    // Assuming jQuery is available
    $(document).ready(function() {
        $('#txt_employee').on('change', function() {
            var selectedEmployeeId = $(this).val();
            if (selectedEmployeeId) {
                // Load the selected employee's image using AJAX
                $.ajax({
                    type: 'POST',
                    url: 'get_employee_image.php', // Create a PHP script to fetch the employee image
                    data: { oid: selectedEmployeeId },
                    success: function(response) {
                        $('#employee_image_container').html(response);
                    }
                });
            } else {
                // Display default image
                var defaultImage = '<img src="picture/default.jpg" style="width:2.5in;height:4in;" />';
                $('#employee_image_container').html(defaultImage);
            }
        });
        
        // Trigger the change event to display the default image initially
        $('#txt_employee').trigger('change');
    });
</script>

 


                                   

                                    <hr style="border: 1px solid black;">

                                    <div class="form-group col-md-4">
                                        <label>Gross Pay:</label>
                                        <input name="txt_gross" class="form-control input-sm " id="gross" type="number" step="0.01" placeholder="Gross Pay" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>RATA:</label>
                                        <input name="txt_rata" class="form-control input-sm " id="rata" type="number" step="0.01" placeholder="RATA" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>PERA:</label>
                                        <input name="txt_pera" class="form-control input-sm" id="pera" type="number" step="0.01" placeholder="PERA" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Others:</label>
                                        <input name="txt_othersadd" class="form-control input-sm" id="othersadd" type="text" placeholder="Others" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Value:</label>
                                        <input name="txt_othersaddvalue" class="form-control input-sm" id="othersaddvalue" type="number" step="0.01" placeholder="Value" />
                                    </div>

                                    <hr style="border: 1px solid black;">

                                    <div class="form-group col-md-12">
                                        <label>Philhealth:</label>
                                        <input name="chk_phihealth" id="chk_phihealth" class="form-check-input" type="checkbox" />
                                        <input name="txt_phihealth" class="form-control input-sm" id="phihealth" type="number" step="0.01" placeholder="Philhealth" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Withholding Tax:</label>
                                        <input name="chk_wholdtax" id="chk_wholdtax" class="form-check-input" type="checkbox" />
                                        <input name="txt_wholdtax" class="form-control input-sm" id="wholdtax" type="number" step="0.01" placeholder="Withholding Tax" />
                                    </div>

                                    <hr style="border: 1px solid black;">

                                    <div class="form-group col-md-12">
                                        <label>Pag-Ibig:</label>
                                        <input name="chk_pagibig" id="chk_pagibig" class="form-check-input" type="checkbox" />
                                        <input name="txt_pagibig" class="form-control input-sm" id="pagibig" type="number" step="0.01" placeholder="Pag-Ibig" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>MPL (Pag-ibig):</label>
                                        <input name="chk_mpl" id="chk_mpl" class="form-check-input" type="checkbox" />
                                        <input name="txt_mpl" class="form-control input-sm" id="mpl" type="number" step="0.01" placeholder="MPL (Pag-ibig)" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>MP2 (Pag-ibig):</label>
                                        <input name="chk_mp2" id="chk_mp2" class="form-check-input" type="checkbox" />
                                        <input name="txt_mp2" class="form-control input-sm" id="mp2" type="number" step="0.01" placeholder="MP2 (Pag-ibig)" />
                                    </div>

                                    <hr style="border: 1px solid black;">

                                    <div class="form-group col-md-6">
                                        <label>GSIS Premium:</label>
                                        <input name="chk_gsisprem" id="chk_gsisprem" class="form-check-input" type="checkbox" />
                                        <input name="txt_gsisprem" class="form-control input-sm" id="gsisprem" type="number" step="0.01" placeholder="GSIS Premium" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>GSIS MPL:</label>
                                        <input name="chk_gsismpl" id="chk_gsismpl" class="form-check-input" type="checkbox" />
                                        <input name="txt_gsismpl" class="form-control input-sm" id="gsismpl" type="number" step="0.01" placeholder="GSIS MPL" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>GSIS GFAL:</label>
                                        <input name="chk_gsisgfal" id="chk_gsisgfal" class="form-check-input" type="checkbox" />
                                        <input name="txt_gsisgfal" class="form-control input-sm" id="gsisgfal" type="number" step="0.01" placeholder="GSIS GFAL" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>GSIS E-Card:</label>
                                        <input name="chk_gsisecard" id="chk_gsisecard" class="form-check-input" type="checkbox" />
                                        <input name="txt_gsisecard" class="form-control input-sm" id="gsisecard" type="number" step="0.01" placeholder="GSIS E-Card" />
                                    </div>

                                    <hr style="border: 1px solid black;">

                                    <div class="form-group col-md-4">
                                        <label>POLICY LOAN:</label>
                                        <input name="chk_ploan" id="chk_ploan" class="form-check-input" type="checkbox" />
                                        <input name="txt_ploan" class="form-control input-sm" id="ploan" type="number" step="0.01" placeholder="POLICY LOAN" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>CALIMITY LOAN:</label>
                                        <input name="chk_cloan" id="chk_cloan" class="form-check-input" type="checkbox" />
                                        <input name="txt_cloan" class="form-control input-sm" id="cloan" type="number" step="0.01" placeholder="CALIMITY LOAN" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>EMERGENCY LOAN:</label>
                                        <input name="chk_eloan" id="chk_eloan" class="form-check-input" type="checkbox" />
                                        <input name="txt_eloan" class="form-control input-sm" id="eloan" type="number" step="0.01" placeholder="EMERGENCY LOAN" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>COMP. LOAN:</label>
                                        <input name="chk_comploan" id="chk_comploan" class="form-check-input" type="checkbox" />
                                        <input name="txt_comploan" class="form-control input-sm" id="comploan" type="number" step="0.01" placeholder="COMP. LOAN" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>EDUCATION LOAN:</label>
                                        <input name="chk_educloan" id="chk_educloan" class="form-check-input" type="checkbox" />
                                        <input name="txt_educloan" class="form-control input-sm" id="educloan" type="number" step="0.01" placeholder="EDUCATION LOAN" />
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>CONSO. LOAN:</label>
                                        <input name="chk_consoloan" id="chk_consoloan" class="form-check-input" type="checkbox" />
                                        <input name="txt_consoloan" class="form-control input-sm" id="consoloan" type="number" step="0.01" placeholder="CONSO. LOAN" />
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>LBP:</label>
                                        <input name="chk_lbp" id="chk_lbp" class="form-check-input" type="checkbox" />
                                        <input name="txt_lbp" class="form-control input-sm" id="lbp" type="number" step="0.01" placeholder="LBP" />
                                    </div>
                                    <hr style="border: 1px solid black;">
                                    <div class="form-group col-md-6">
                                        <label>Others:</label>
                                        <input name="txt_othersless" class="form-control input-sm" id="othersless" type="text" placeholder="Others" />
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Value:</label>
                                        <input name="chk_lessvalue" id="chk_lessvalue" class="form-check-input" type="checkbox" />
                                        <input name="txt_otherslessvalue" class="form-control input-sm" id="otherslessvalue" type="number" step="0.01" placeholder="Value" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <input type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#previewModal" value="Preview" />
                                    <input type="button" class="btn btn-danger btn-sm btn-block" onclick="clearForm()" value="Clear Form" />
                                    <input type="submit" class="btn btn-success btn-sm btn-block" name="btn_payslip" id="btn_payslip" value="Add Payslip" />

                                </div>
                        </form>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" >
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


        <?php } ?>

    <?php }







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