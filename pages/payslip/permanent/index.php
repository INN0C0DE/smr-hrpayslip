<?php
include('function_mod.php');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="../assets/images/seal.png">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Permanent Employee</title>

    <link rel="stylesheet" type="text/css" href="../../library/jstable.css" />
    <script src="../../library/jstable.min.js"></script>
    <link rel="stylesheet" href="../../../assets/css/sb-admin-2.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="mt-3 mb-3 h3 text-gray-800"><b>Permanent Employee</b></h1>

                    <span id="success_message"></span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col col-md-6"></div>
                                <div class="col col-md-6" align="right">
                                    <button type="button" name="add_data" id="add_data" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Add Permanent</button>
                                    <!-- Modify the form for generating report -->
                                    <form method="post" action="export.php">
                                        <button type="submit" name="generate_report" class="btn btn-success btn-sm generate-report-btn"><i class="fa fa-download" aria-hidden="true"></i> Generate Report</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="casual_table" class="table table-bordered table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo fetch_top_five_data($connect); ?>
                                    </tbody>


                                </table>
                            </div>
                        </div>

                        <!-- MODAL -->
                        <div class="modal" id="customer_modal" tabindex="-1">
                            <form method="post" id="customer_form">

                                <div class="modal-dialog modal-lg">

                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h5 class="modal-title" id="modal_title">Add Permanent </h5>

                                            <button type="button" class="close" id="close_modal" data-bs-dismiss="modal" aria-label="Close">&times;</button>

                                        </div>

                                        <div class="modal-body">

                                            <div class="row">

                                                <div class="mb-3 col-md-6">
                                                    <label for="organizational_unit">Organizational Unit:</label>
                                                    <input name="organizational_unit" class="form-control input-sm" id="organizational_unit" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="item_number">Item Number:</label>
                                                    <input name="item_number" class="form-control input-sm" id="item_number" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="position_title">Position Title:</label>
                                                    <input name="position_title" class="form-control input-sm" id="position_title" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="salary_grade">Salary Grade:</label>
                                                    <select name="salary_grade" id="salary_grade" class="form-control input-sm" required>
                                                        <option value="" disabled selected>Select Salary Grade</option>
                                                        <option value="SG 1">SG 1</option>
                                                        <option value="SG 2">SG 2</option>
                                                        <option value="SG 3">SG 3</option>
                                                        <option value="SG 4">SG 4</option>
                                                        <option value="SG 5">SG 5</option>
                                                        <option value="SG 6">SG 6</option>
                                                        <option value="SG 7">SG 7</option>
                                                        <option value="SG 8">SG 8</option>
                                                        <option value="SG 9">SG 9</option>
                                                        <option value="SG 10">SG 10</option>
                                                        <option value="SG 11">SG 11</option>
                                                        <option value="SG 12">SG 12</option>
                                                        <option value="SG 13">SG 13</option>
                                                        <option value="SG 14">SG 14</option>
                                                        <option value="SG 15">SG 15</option>
                                                        <option value="SG 16">SG 16</option>
                                                        <option value="SG 17">SG 17</option>
                                                        <option value="SG 18">SG 18</option>
                                                        <option value="SG 19">SG 19</option>
                                                        <option value="SG 20">SG 20</option>
                                                        <option value="SG 21">SG 21</option>
                                                        <option value="SG 22">SG 22</option>
                                                        <option value="SG 23">SG 23</option>
                                                        <option value="SG 24">SG 24</option>
                                                        <option value="SG 25">SG 25</option>
                                                        <option value="SG 26">SG 26</option>
                                                        <option value="SG 27">SG 27</option>
                                                        <option value="SG 28">SG 28</option>
                                                        <option value="SG 29">SG 29</option>
                                                        <option value="SG 30">SG 30</option>
                                                        <option value="SG 31">SG 31</option>
                                                        <option value="SG 32">SG 32</option>
                                                        <option value="SG 33">SG 33</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="authorized_annual_salary">Authorized Annual Salary:</label>
                                                    <input name="authorized_annual_salary" class="form-control input-sm" id="authorized_annual_salary" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="actual_annual_salary">Actual Annual Salary:</label>
                                                    <input name="actual_annual_salary" class="form-control input-sm" id="actual_annual_salary" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="step">Step:</label>
                                                    <select name="step" id="step" class="form-control input-sm" required>
                                                        <option value="" disabled selected>Select Step</option>
                                                        <option value="Step 1">Step 1</option>
                                                        <option value="Step 2">Step 2</option>
                                                        <option value="Step 3">Step 3</option>
                                                        <option value="Step 4">Step 4</option>
                                                        <option value="Step 5">Step 5</option>
                                                        <option value="Step 6">Step 6</option>
                                                        <option value="Step 7">Step 7</option>
                                                        <option value="Steps">Steps</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="area_code">Area Code:</label>
                                                    <input name="area_code" class="form-control input-sm" id="area_code" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="area_type">Area Type:</label>
                                                    <input name="area_type" class="form-control input-sm" id="area_type" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="level">Level:</label>
                                                    <input name="level" class="form-control input-sm" id="level" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="employee_name">Employee:</label>
                                                    <select name="employee_name" id="employee_name" class="form-control input-sm" required>
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

                                                <div class="mb-3 col-md-6">
                                                    <label for="permanent_sex">Sex:</label>
                                                    <select name="permanent_sex" id="permanent_sex" class="form-control input-sm" required>
                                                        <option value="" disabled selected>Select Sex</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="permanent_dob">Date of Birth:</label>
                                                    <input name="permanent_dob" class="form-control input-sm" id="permanent_dob" type="date" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="tin">TIN:</label>
                                                    <input name="tin" class="form-control input-sm" id="tin" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="date_original_appointment">Date of Original Appointment:</label>
                                                    <input name="date_original_appointment" class="form-control input-sm" id="date_original_appointment" type="date" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="date_last_promotion">Date of Last Promotion/ Appointment:</label>
                                                    <input name="date_last_promotion" class="form-control input-sm" id="date_last_promotion" type="date" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="permanent_status">Status:</label>
                                                    <select name="permanent_status" id="permanent_status" class="form-control input-sm" required>
                                                        <option value="" disabled selected>Select Status</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="cs_eligibility">Civil Service Eligibility:</label>
                                                    <input name="cs_eligibility" class="form-control input-sm" id="cs_eligibility" type="text" required />
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label for="permanent_comment">Comment/ Annotation:</label>
                                                    <textarea name="permanent_comment" class="form-control input-sm" id="permanent_comment" required></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <input type="hidden" name="oid" id="oid" />
                                            <input type="hidden" name="action" id="action" value="Add" />
                                            <button type="button" class="btn btn-primary" id="action_button">Add</button>
                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="modal-backdrop fade show" id="modal_backdrop" style="display:none;"></div>
                        <!-- END OF MODAL -->

                        <script>
                            // Function to check if any required fields are empty
                            document.addEventListener('DOMContentLoaded', function() {
                                // Function to check if any required fields are empty
                                function checkForm() {
                                    // Get all required input elements
                                    var requiredInputs = document.querySelectorAll('input[required], select[required]');
                                    var isEmpty = false;

                                    // Check if any required field is empty
                                    requiredInputs.forEach(function(input) {
                                        if (input.value.trim() === '') {
                                            isEmpty = true;
                                        }
                                    });

                                    // If any required field is empty, show an alert and prevent form submission
                                    if (isEmpty) {
                                        alert('Please fill in all required fields.');
                                        return false; // Prevent form submission
                                    }

                                    return true; // Allow form submission
                                }

                                // Add event listener to the form submit button
                                document.getElementById('action_button').addEventListener('click', function(event) {
                                    if (!checkForm()) {
                                        event.preventDefault(); // Prevent default form submission
                                    }
                                });
                            });
                            
                            // 

                            var table = new JSTable("#casual_table", {
                                serverSide: true,
                                deferLoading: <?php echo count_all_data($connect); ?>,
                                ajax: "fetch_mod.php"
                            });

                            function _(element) {
                                return document.getElementById(element);
                            }

                            function open_modal() {
                                _('modal_backdrop').style.display = 'block';
                                _('customer_modal').style.display = 'block';
                                _('customer_modal').classList.add('show');
                            }

                            function close_modal() {
                                _('modal_backdrop').style.display = 'none';
                                _('customer_modal').style.display = 'none';
                                _('customer_modal').classList.remove('show');
                            }

                            function reset_data() {
                                _('customer_form').reset();
                                _('action').value = 'Add';
                                _('Plantilla_error').innerHTML = '';
                                _('modal_title').innerHTML = 'Add Permanent';
                                _('action_button').innerHTML = '<i class="fa fa-save" aria-hidden="true"></i> Save';
                            }

                            _('add_data').onclick = function() {
                                open_modal();
                                reset_data();
                            }

                            _('close_modal').onclick = function() {
                                close_modal();
                            }

                            _('action_button').onclick = function() {

                                var form_data = new FormData(_('customer_form'));

                                _('action_button').disabled = true;

                                fetch('action.php', {

                                    method: "POST",

                                    body: form_data

                                }).then(function(response) {

                                    return response.json();

                                }).then(function(responseData) {

                                    _('action_button').disabled = false;

                                    if (responseData.success) {
                                        _('success_message').innerHTML = responseData.success;

                                        close_modal();

                                        table.update();
                                    } else {
                                        if (responseData.Plantilla_error) {
                                            _('Plantilla_error').innerHTML = responseData.Plantilla_error;
                                        } else {
                                            _('Plantilla_error').innerHTML = '';
                                        }

                                    }

                                });

                            }
                            // add employee
                            function fetch_data(id) {
                                var form_data = new FormData();

                                form_data.append('id', id);

                                form_data.append('action', 'fetch');

                                fetch('action.php', {

                                    method: "POST",

                                    body: form_data

                                }).then(function(response) {

                                    return response.json();

                                }).then(function(responseData) {

                                    _('organizational_unit').value = responseData.organizational_unit;

                                    _('item_number').value = responseData.item_number;

                                    _('position_title').value = responseData.position_title;

                                    _('salary_grade').value = responseData.salary_grade;

                                    _('authorized_annual_salary').value = responseData.authorized_annual_salary;

                                    _('actual_annual_salary').value = responseData.actual_annual_salary;

                                    _('step').value = responseData.step;

                                    _('area_code').value = responseData.area_code;

                                    _('area_type').value = responseData.area_type;

                                    _('level').value = responseData.level;

                                    _('employee_name').value = responseData.employee_name;

                                    _('permanent_sex').value = responseData.permanent_sex;

                                    _('permanent_dob').value = responseData.permanent_dob;

                                    _('tin').value = responseData.tin;

                                    _('date_original_appointment').value = responseData.date_original_appointment;

                                    _('date_last_promotion').value = responseData.date_last_promotion;

                                    _('permanent_status').value = responseData.permanent_status;

                                    _('cs_eligibility').value = responseData.cs_eligibility;

                                    _('permanent_comment').value = responseData.permanent_comment;

                                    _('oid').value = id;

                                    _('action').value = 'Update';

                                    _('modal_title').innerHTML = 'Edit Casual';

                                    _('action_button').innerHTML = '<i class="fa fa-save" aria-hidden="true"></i> Save';

                                    open_modal();

                                });
                            }

                            // update employee
                            function fetch_edit_data(id) {
                                var form_data = new FormData();

                                form_data.append('id', id);

                                form_data.append('action', 'fetch');

                                fetch('action.php', {
                                    method: "POST",
                                    body: form_data
                                }).then(function(response) {
                                    return response.json();
                                }).then(function(responseData) {
                                    _('organizational_unit').value = responseData.organizational_unit;

                                    _('item_number').value = responseData.item_number;

                                    _('position_title').value = responseData.position_title;

                                    _('salary_grade').value = responseData.salary_grade;

                                    _('authorized_annual_salary').value = responseData.authorized_annual_salary;

                                    _('actual_annual_salary').value = responseData.actual_annual_salary;

                                    _('step').value = responseData.step;

                                    _('area_code').value = responseData.area_code;

                                    _('area_type').value = responseData.area_type;

                                    _('level').value = responseData.level;

                                    _('employee_name').value = responseData.employee_name;

                                    _('permanent_sex').value = responseData.permanent_sex;

                                    _('permanent_dob').value = responseData.permanent_dob;

                                    _('tin').value = responseData.tin;

                                    _('date_original_appointment').value = responseData.date_original_appointment;

                                    _('date_last_promotion').value = responseData.date_last_promotion;

                                    _('permanent_status').value = responseData.permanent_status;

                                    _('cs_eligibility').value = responseData.cs_eligibility;

                                    _('permanent_comment').value = responseData.permanent_comment;
                                    _('oid').value = id;
                                    _('action').value = 'Update';
                                    _('modal_title').innerHTML = 'Edit Permanent';
                                    _('action_button').innerHTML = '<i class="fa fa-save" aria-hidden="true"></i> Update';
                                    open_modal();
                                });
                            }

                            // delete employee
                            function delete_data(id) {
                                if (confirm("Are you sure you want to delete this data?")) {
                                    var form_data = new FormData();
                                    form_data.append('id', id);
                                    form_data.append('action', 'delete');
                                    fetch('action.php', {
                                        method: "POST",
                                        body: form_data
                                    }).then(function(response) {
                                        return response.json();
                                    }).then(function(responseData) {
                                        if (responseData.success) {
                                            _('success_message').innerHTML = responseData.success;
                                            table.update();
                                        }
                                    });
                                }
                            }
                        </script>

</body>

</html>