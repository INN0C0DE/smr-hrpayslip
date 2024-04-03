<script src="path/to/select2.min.js"></script>
<Style>
    .select2-container .select2-selection--single {
        width: 766px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 26px;
        position: absolute;
        top: 4px;
        /* right: -705px; */
        left: 743px;
        width: -312px;
    }

    .select2-container {
        box-sizing: border-box;
        display: block !important;
        margin: 0;
        position: relative;
        /* vertical-align: middle; */
        width: 690px;
    }

    .selection {
        width: 690px !important;
    }

    .select2 {
        width: 700px !important;
    }
</Style>
<!-- ========================= MODAL ======================= -->
<div id="selectprint" class="modal fade">
    <form method="post" action="printmonthprint.php"> <!-- Updated the action attribute -->
        <div class="modal-dialog modal-sm" style="width:800px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Payslip</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">



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

                            <div class="form-group">
                                <label>Month:</label>
                                <input name="txt_month" class="form-control input-sm" id="month" type="month" placeholder="Month" />
                            </div>



                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm" name="btn_payslip" id="btn_payslip" onclick="submitFormmonth()">Print</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                </div>
    </form>
    <script>
    // JavaScript function to handle form submission and redirect to print4.php
    function submitFormmonth() {
        // Get the form element
        const form = document.querySelector("#selectprint form");

        // Set the form action to print4.php
        form.action = "printmonthprint.php";

        // Submit the form
        form.submit();
    }


    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
</div>

