<!-- ========================= MODAL ======================= -->
<div id="addpayslip" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Permanent Employee</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txt_organizational_unit">Organizational Unit:</label>
                                <input name="txt_organizational_unit" class="form-control input-sm" id="txt_organizational_unit" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_item_number">Item Number:</label>
                                <input name="txt_item_number" class="form-control input-sm" id="txt_item_number" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_position_title">Position Title:</label>
                                <input name="txt_position_title" class="form-control input-sm" id="txt_position_title" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_salary_grade">Salary Grade:</label>
                                <input name="txt_salary_grade" class="form-control input-sm" id="txt_salary_grade" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_authorized_annual_salary">Authorized Annual Salary:</label>
                                <input name="txt_authorized_annual_salary" class="form-control input-sm" id="txt_authorized_annual_salary" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_actual_annual_salary">Actual Annual Salary:</label>
                                <input name="txt_actual_annual_salary" class="form-control input-sm" id="txt_actual_annual_salary" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_step">Step:</label>
                                <input name="txt_step" class="form-control input-sm" id="txt_step" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_area_code">Area Code:</label>
                                <input name="txt_area_code" class="form-control input-sm" id="txt_area_code" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_area_type">Area Type:</label>
                                <input name="txt_area_type" class="form-control input-sm" id="txt_area_type" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_level">Level:</label>
                                <input name="txt_level" class="form-control input-sm" id="txt_level" type="text" required />
                            </div>

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
                                <label for="txt_sex">Sex:</label>
                                <select name="txt_sex" id="txt_sex" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_dob">Date of Birth:</label>
                                <input name="txt_dob" class="form-control input-sm" id="txt_dob" type="date" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_tin">TIN:</label>
                                <input name="txt_tin" class="form-control input-sm" id="txt_tin" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_date_of_original_appointment">Date of Original Appointment:</label>
                                <input name="txt_date_of_original_appointment" class="form-control input-sm" id="txt_date_of_original_appointment" type="date" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_date_of_last_promotion">Date of Last Promotion/ Appointment:</label>
                                <input name="txt_date_of_last_promotion" class="form-control input-sm" id="txt_date_of_last_promotion" type="date" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_status">Status:</label>
                                <select name="txt_status" id="txt_status" class="form-control input-sm" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="txt_civil_service_eligibility">Civil Service Eligibility:</label>
                                <input name="txt_civil_service_eligibility" class="form-control input-sm" id="txt_civil_service_eligibility" type="text" required />
                            </div>

                            <div class="form-group">
                                <label for="txt_comment">Comment/ Annotation:</label>
                                <textarea name="txt_comment" class="form-control input-sm" id="txt_comment" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add_permanent_employee" id="btn_add_permanent_employee" value="Add Permanent Employee" />
                </div>
            </div>
        </div>
    </form>
</div>
