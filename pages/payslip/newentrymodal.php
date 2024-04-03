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
<div id="foreditingpayslip" class="modal fade">
<form method="post" action="getpayroll.php"> <!-- Updated the action attribute -->
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

                            <div class="form-group">
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

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-sm">Get</button>
    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
</div>

    </form>
</div>



<script>
    // JavaScript function to handle form submission and redirect to print4.php
    function submitForm() {
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