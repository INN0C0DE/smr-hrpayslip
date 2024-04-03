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

                    <div id="editemployee2">
                        <form method="post">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="redirectToHome()">&times;</button>
                                    <script>
                                        function redirectToHome() {
                                            window.location.href = 'editpayslippage.php';
                                        }
                                    </script>

 <?php
                                            // Check if txt_employee, txt_month, and txt_daterange are set in the POST data
                                            if (isset($_POST['txt_employee'])) {
                                                // Sanitize and store the values
                                                $employeeId = mysqli_real_escape_string($con, $_POST['txt_employee']);
                                              
                                                
                                                // Modify the query to include the WHERE clause with employee, month, and date range filter
                                                $squery = mysqli_query($con, "SELECT oid,fname,mname,lname,suffix,image, bdate, pbirth, sex, cstatus, height, weight, 
                                                        btype, cship, raddress, gsisno, pagibigno, philhealthno, sssno, tinno, mobileno, email, spouselname, spousefname, spousemname, child1, child2, child3, 
                                                        child4, child5, empno, empstatus, emeaddress, emecontact, editdate FROM tbl_employee 
                                                        WHERE oid = '$employeeId'");

                                                while ($row = mysqli_fetch_array($squery)) {
                                                    $originalDate = $row['editdate'];
                                                    if ($originalDate !== null) {
                                                        $newDateFormat = date('F j, Y g:ia', strtotime($originalDate));
                                                    } else {
                                                        $newDateFormat = 'N/A';
                                                    }    
                                                    echo '


                                        <div>
                                        <h4 class="modal-title">Edit Paylsip Info</h4> <span style="float: right; color: green;">Last Update: ' . $newDateFormat . '</span>
                                        </div>
                                    

                                </div>
                                <div class="modal-body">
                               

                                                    <div class="row">
                                                    <div class="col-md-12">
                                                
                                                        <input type="hidden" value="' . $row['oid'] . '" name="hidden_id" id="hidden_id" />
                                                
                                                        <div class="row">
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Employee #: </label>
                                                                    <input name="txt_edit_empno" class="form-control input-sm" type="text" value="' . $row['empno'] . '" />
                                                                </div>
                                                            </div>
                                                          

                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Employee Status:</label>
                                                                    <select name="txt_edit_empstatus" class="form-control input-sm">
                                                                        <option value="' . $row['empstatus'] . '" selected>' . $row['empstatus'] . '</option>
                                                                        <option value="CASUAL">CASUAL</option>
                                                                        <option value="PERMANENT">PERMANENT</option>
                                                                        <option value="COTERMINOUS">COTERMINOUS</option>
                                                                        <option value="TEMPORARY">TEMPORARY</option>
                                                                        <option value="INACTIVE">INACTIVE</option>

                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                
                                                        <div class="row">
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Last Name: </label>
                                                                    <input name="txt_edit_lname" class="form-control input-sm" type="text" value="' . $row['lname'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Date of Birth: </label>
                                                                    <input name="txt_edit_bdate" class="form-control input-sm" type="date" value="' . $row['bdate'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                        </div>
                                                
                                                        <div class="row">
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>First Name: </label>
                                                                    <input name="txt_edit_fname" class="form-control input-sm" type="text" value="' . $row['fname'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Place of Birth: </label>
                                                                    <input name="txt_edit_pbirth" class="form-control input-sm" type="text" value="' . $row['pbirth'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                        </div>
                                                
                                                
                                                        <div class="row">
                                                
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Middle Name: </label>
                                                                    <input name="txt_edit_mname" class="form-control input-sm" type="text" value="' . $row['mname'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Sex:</label>
                                                                    <select name="txt_edit_sex" class="form-control input-sm">
                                                                        <option value="' . $row['sex'] . '" selected>' . $row['sex'] . '</option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                
                                                        </div>
                                                
                                                        <div class="row">
                                                
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Suffix: </label>
                                                                    <input name="txt_edit_suffix" class="form-control input-sm" type="text" value="' . $row['suffix'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Civil Status:</label>
                                                                    <select name="txt_edit_cstatus" id="civil_status" class="form-control input-sm">
                                                                        <option value="' . $row['cstatus'] . '" selected>' . $row['cstatus'] . '</option>
                                                                        <option value="Single">Single</option>
                                                                        <option value="Widowed">Widowed</option>
                                                                        <option value="Married">Married</option>
                                                                        <option value="Separated">Separated</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                
                                                        </div>
                                                
                                                        <div class="form-group" id="other_cstatus" style="display: none;">
                                                            <label>Other Civil Status:</label>
                                                            <input type="text" name="txt_edit_other_cstatus" class="form-control input-sm">
                                                        </div>
                                                
                                                        <div class="row">
                                                            <!-- 1st row -->
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Height: </label>
                                                                    <input name="txt_edit_height" class="form-control input-sm" type="float" value="' . $row['height'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Weight: </label>
                                                                    <input name="txt_edit_weight" class="form-control input-sm" type="number" value="' . $row['weight'] . '" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Blood Type: </label>
                                                                    <input name="txt_edit_btype" class="form-control input-sm" type="text" value="' . $row['btype'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>Citizenship: </label>
                                                                    <input name="txt_edit_cship" class="form-control input-sm" type="text" value="' . $row['cship'] . '" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class=" form-group">
                                                            <label>Residental Address: </label>
                                                            <input name="txt_edit_raddress" class="form-control input-sm" type="text" value="' . $row['raddress'] . '" />
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class=" form-group">
                                                                    <label>GSIS ID No.: </label>
                                                                    <input name="txt_edit_gsisno" class="form-control input-sm" type="number" value="' . $row['gsisno'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                <div class=" form-group">
                                                                    <label>PAG-IBIG ID No.: </label>
                                                                    <input name="txt_edit_pagibigno" class="form-control input-sm" type="number" value="' . $row['pagibigno'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                <div class=" form-group">
                                                                    <label>PHILHEALTH ID No.: </label>
                                                                    <input name="txt_edit_philhealthno" class="form-control input-sm" type="number" value="' . $row['philhealthno'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                <div class=" form-group">
                                                                    <label>SSS ID No.: </label>
                                                                    <input name="txt_edit_sssno" class="form-control input-sm" type="number" value="' . $row['sssno'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                <div class=" form-group">
                                                                    <label>TIN ID No.: </label>
                                                                    <input name="txt_edit_tinno" class="form-control input-sm" type="number" value="' . $row['tinno'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-3">
                                                                <div class=" form-group">
                                                                    <label>Mobile No.: </label>
                                                                    <input name="txt_edit_mobileno" class="form-control input-sm" type="number" value="' . $row['mobileno'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-6">
                                                                <div class=" form-group">
                                                                    <label>E-Mail No.: </label>
                                                                    <input name="txt_edit_email" class="form-control input-sm" type="text" value="' . $row['email'] . '" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h2 style="text-align:center; color: red; font-weight: bold;"> Person Incase of Emergency </h2>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class=" form-group">
                                                                    <label>Surname: </label>
                                                                    <input name="txt_edit_spouselname" class="form-control input-sm" type="text" value="' . $row['spouselname'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-4">
                                                                <div class=" form-group">
                                                                    <label>First Name: </label>
                                                                    <input name="txt_edit_spousefname" class="form-control input-sm" type="text" value="' . $row['spousefname'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                            <div class="col-md-4">
                                                                <div class=" form-group">
                                                                    <label>Middle Name: </label>
                                                                    <input name="txt_edit_spousemname" class="form-control input-sm" type="text" value="' . $row['spousemname'] . '" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Email: </label>
                                                                <div class=" form-group">
                                                                    <input name="txt_edit_emeaddress" placeholder="@gmail.com" class="form-control input-sm" type="text" value="' . $row['emeaddress'] . '" />
                                                                </div>
                                                            </div>
                                                
                                                
                                                            <div class="col-md-6">
                                                                <label>Contact Number: </label>
                                                                <div class=" form-group">
                                                                    <input name="txt_edit_emecontact" placeholder="09*********" class="form-control input-sm" type="text" value="' . $row['emecontact'] . '" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        '; ?>

                                                    <script>
                                                        document.getElementById('civil_status').addEventListener('change', function() {
                                                            var selectedOption = this.value;
                                                            var otherCStatusField = document.getElementById('other_cstatus');

                                                            if (selectedOption === 'Others') {
                                                                otherCStatusField.style.display = 'block';
                                                            } else {
                                                                otherCStatusField.style.display = 'none';
                                                            }
                                                        });
                                                    </script>

                                    <?php
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                        </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-sm" onclick="redirectToHome()">Cancel</button>
                                    <script>
                                        function redirectToHome() {
                                            window.location.href = 'employee2.php';
                                        }
                                    </script>
                                    <button type="submit" class="btn btn-primary btn-sm" name="btn_save">Save</button>
                                </div>
                                    </div>
                                </div>
                               
                            </div>
                        </form>
                    </div>
                    <?php include "function2.php"; ?>
                    <script src="" async defer></script>
    </body>

</html>