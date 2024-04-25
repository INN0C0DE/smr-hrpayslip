<?php
include('function_mod.php');
include('../connection.php')
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

    <title>Casual Employee</title>

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

                    <h1 class="mt-3 mb-3 h3 text-gray-800"><b>Casual Employee</b></h1>

                    <span id="success_message"></span>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col col-md-6"></div>
                                <div class="col col-md-6" align="right">
                                    <button type="button" name="add_data" id="add_data" class="btn btn-primary btn-sm" ><i class="fa fa-plus" aria-hidden="true"></i> Add Casual</button>
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
                                            <th>Employee</th>
                                            <th>Date of Birth</th>
                                            <th>Sex</th>
                                            <th>Level of CS Eligibility</th>
                                            <th>Work Status</th>
                                            <th>Years of Service as JO/COS/MOA personnel</th>
                                            <th>Nature of Work</th>
                                            <th>Specified Work</th>
                                            <th>Status</th>
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

                                            <h5 class="modal-title" id="modal_title">Add Casual </h5>

                                            <button type="button" class="close" id="close_modal" data-bs-dismiss="modal" aria-label="Close">&times;</button>

                                        </div>

                                        <div class="modal-body">

                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <label for="employee">Employee:</label>
                                                <select name="employee" id="employee" class="form-control input-sm" required>
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
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="dob">Date of Birth:</label>
                                                <input name="dob" class="form-control input-sm" id="dob" type="date" required />
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="sex">Sex:</label>
                                                <select name="sex" id="sex" class="form-control input-sm" required>
                                                    <option value="" disabled selected>Select Sex</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="level_cs">Level of CS Eligibility:</label>
                                                <select name="level_cs" id="level_cs" class="form-control input-sm" required>
                                                    <option value="" disabled selected>Select Level of CS Eligibility</option>
                                                    <option value="1st Level">1st Level</option>
                                                    <option value="2nd Level">2nd Level</option>
                                                    <option value="3rd Level">3rd Level</option>
                                                    <option value="No Eligibility">No Eligibility</option>
                                                </select>
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="work_status">Work Status:</label>
                                                <select name="work_status" id="work_status" class="form-control input-sm" required>
                                                    <option value="" disabled selected>Select Work Status</option>
                                                    <option value="Job Order">Job Order</option>
                                                    <option value="Casual">Casual</option>
                                                </select>
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="year_service">Years of Service as JO/COS/MOA personnel:</label>
                                                <input name="year_service" class="form-control input-sm" id="year_service" type="number" required />
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="nature_work">Nature of Work:</label>
                                                <select name="nature_work" id="nature_work" class="form-control input-sm" required>
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
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="specified_work">Specified Work:</label>
                                                <input name="specified_work" class="form-control input-sm" id="specified_work" type="text" required />
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="active_status">Status:</label>
                                                <select name="active_status" id="active_status" class="form-control input-sm" required>
                                                    <option value="" disabled selected>Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                                <!-- <span class="text-danger" id="Plantilla_error"></span> -->
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
                                _('modal_title').innerHTML = 'Add Casual';
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

                                    _('employee').value = responseData.employee;

                                    _('dob').value = responseData.dob;

                                    _('sex').value = responseData.sex;

                                    _('level_cs').value = responseData.level_cs;

                                    _('work_status').value = responseData.work_status;

                                    _('year_service').value = responseData.year_service;

                                    _('nature_work').value = responseData.nature_work;

                                    _('specified_work').value = responseData.specified_work;

                                    _('active_status').value = responseData.active_status;

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
                                    _('employee').value = responseData.employee;
                                    _('dob').value = responseData.dob;
                                    _('sex').value = responseData.sex;
                                    _('level_cs').value = responseData.level_cs;
                                    _('work_status').value = responseData.work_status;
                                    _('year_service').value = responseData.year_service;
                                    _('nature_work').value = responseData.nature_work;
                                    _('specified_work').value = responseData.specified_work;
                                    _('active_status').value = responseData.active_status;
                                    _('oid').value = id;
                                    _('action').value = 'Update';
                                    _('modal_title').innerHTML = 'Edit Casual';
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
