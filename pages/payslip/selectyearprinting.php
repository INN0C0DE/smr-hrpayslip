<!-- ========================= MODAL ======================= -->
<div id="forprintingyear" class="modal fade">
<form method="post" action="printyear2.php"> <!-- Updated the action attribute -->
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
                                <label>Year:</label>
                                <input name="txt_year" class="form-control input-sm" id="year" type="number" placeholder="Year" />
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-sm" name="btn_payslip" id="btn_payslip" onclick="submitForm()">Print</button>
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
        form.action = "printyear2.php";

        // Submit the form
        form.submit();
    }
</script>