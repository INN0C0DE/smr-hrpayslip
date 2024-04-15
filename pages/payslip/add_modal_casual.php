<!-- -- .- -.. . ....... -... -.-- ---... ....... .-. .-.-.- .- .-.-.- ... .-.-.- -.-. .-.-.- ....... -....- ....... .. -.-. - --- ....... .. -. - . .-. -. ....... ..--- ----- ..--- ....-  -->
<!-- ========================= MODAL ======================= -->
<div id="addpayslip" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-lg"> <!-- Changed modal size to large -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Casual Employee</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="txt_employee">Employee:</label>
                                <select name="txt_employee" id="txt_employee" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Employee</option>
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
                                <label for="txt_dob">Date of Birth:</label>
                                <input name="txt_dob" class="form-control input-sm" id="txt_dob" type="date" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_sex">Sex:</label>
                                <select name="txt_sex" id="txt_sex" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_cs_eligibility">Level of CS Eligibility:</label>
                                <select name="txt_cs_eligibility" id="txt_cs_eligibility" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Level of CS Eligibility</option>
                                    <option value="1st Level">1st Level</option>
                                    <option value="2nd Level">2nd Level</option>
                                    <option value="3rd Level">3rd Level</option>
                                    <option value="No Eligibility">No Eligibility</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_work_status">Work Status:</label>
                                <select name="txt_work_status" id="txt_work_status" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Work Status</option>
                                    <option value="Job Order">Job Order</option>
                                    <option value="Casual">Casual</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_years_of_service">Years of Service as JO/COS/MOA personnel:</label>
                                <input name="txt_years_of_service" class="form-control input-sm" id="txt_years_of_service" type="number" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_nature_of_work">Nature of Work:</label>
                                <select name="txt_nature_of_work" id="txt_nature_of_work" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Nature of Work</option>
                                    <?php
                                    // Assuming $con is the MySQLi database connection variable
                                    $result = mysqli_query($con, "SELECT oid, nof FROM tbl_naturework");
                                    while ($row = mysqli_fetch_array($result)) {
                                        $naturework = $row['nof'];
                                        echo '<option value="' . $row['oid'] . '">' . $naturework . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_specified_work">Specified Work:</label>
                                <input name="txt_specified_work" class="form-control input-sm" id="txt_specified_work" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_status">Status:</label>
                                <select name="txt_status" id="txt_status" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_casualemp" id="btn_casualemp" value="Add Casual Employee" />
                </div>
            </div>
        </div>
    </form>
</div>

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
</script>