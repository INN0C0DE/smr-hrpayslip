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
              window.location.href = 'editpayslippage.php';
            }
          </script>

                    <h4 class="modal-title">Edit Paylsip Info</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                        // Check if txt_employee, txt_month, and txt_daterange are set in the POST data
                        if (isset($_POST['txt_employee'])   && isset($_POST['txt_daterange'])) {
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

                        <input type="hidden" name="txt_edit_employee" value="' . $row['employee']. '" />

                            <div class=" form-group">
                                <label>Month:</label>
                                <input name="txt_edit_month" class="form-control input-sm" type="month" value="' . $row['month_'] . '" />
                            </div>

                            
                            <div class="form-group">
                            <label>Range:</label>
                            <select name="txt_edit_daterange" id="txt_daterange" class="form-control input-sm">
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
                                <input name="txt_edit_purpose" class="form-control input-sm" type="text" value="' . $row['purpose'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>Gross Pay: </label>
                                <input name="txt_edit_gross" class="form-control input-sm" type="number" value="' . $row['grosspay'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>PERA: </label>
                                <input name="txt_edit_pera" class="form-control input-sm" type="number" value="' . $row['pera'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>RATA: </label>
                                <input name="txt_edit_rata" class="form-control input-sm" type="number" value="' . $row['rata'] . '" />
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Others:</label>
                                <input name="txt_edit_othersadd" class="form-control input-sm" type="text" value="' . $row['othersadd'] . '" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Value:</label>
                                <input name="txt_edit_othersaddvalue" class="form-control input-sm" type="number" value="' . $row['othersaddvalue'] . '" />
                            </div>


                            <div class=" form-group">
                                <label>Philhealth: </label>
                                <input name="txt_edit_phihealth" class="form-control input-sm" type="number" value="' . $row['phihealth'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>With holding Tax: </label>
                                <input name="txt_edit_wholdtax" class="form-control input-sm" type="number" value="' . $row['wholdtax'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>Pag-Ibig: </label>
                                <input name="txt_edit_pagibig" class="form-control input-sm" type="number" value="' . $row['pagibig'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>MPL (Pag-ibig): </label>
                                <input name="txt_edit_mpl" class="form-control input-sm" type="number" value="' . $row['mpl'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>MP2 (Pag-ibig): </label>
                                <input name="txt_edit_mp2" class="form-control input-sm" type="number" value="' . $row['mp2'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS Premium: </label>
                                <input name="txt_edit_gsisprem" class="form-control input-sm" type="number" value="' . $row['gsisprem'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS MPL: </label>
                                <input name="txt_edit_gsismpl" class="form-control input-sm" type="number" value="' . $row['gsismpl'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS GFAL: </label>
                                <input name="txt_edit_gsisgfal" class="form-control input-sm" type="number" value="' . $row['gsisgfal'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>GSIS E-CARD: </label>
                                <input name="txt_edit_gsisecard" class="form-control input-sm" type="number" value="' . $row['gsisecard_'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>POLICY LOAN: </label>
                                <input name="txt_edit_ploan" class="form-control input-sm" type="number" value="' . $row['ploan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>CALIMITY LOAN: </label>
                                <input name="txt_edit_cloan" class="form-control input-sm" type="number" value="' . $row['cloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>EMERGENCY LOAN: </label>
                                <input name="txt_edit_eloan" class="form-control input-sm" type="number" value="' . $row['eloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>COMP. LOAN: </label>
                                <input name="txt_edit_comploan" class="form-control input-sm" type="number" value="' . $row['comploan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>EDUCATION LOAN: </label>
                                <input name="txt_edit_educloan" class="form-control input-sm" type="number" value="' . $row['educloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>CONSO. LOAN: </label>
                                <input name="txt_edit_consoloan" class="form-control input-sm" type="number" value="' . $row['consoloan'] . '" />
                            </div>

                            <div class=" form-group">
                                <label>LBP: </label>
                                <input name="txt_edit_lbp" class="form-control input-sm" type="number" value="' . $row['lbp'] . '" />
                            </div>

                            <div class=" form-group form-group col-md-6">
                                <label>Others: </label>
                                <input name="txt_edit_othersless" class="form-control input-sm" type="text" value="' . $row['othersless'] . '" />
                            </div>

                            <div class=" form-group form-group col-md-6">
                                <label>Value: </label>
                                <input name="txt_edit_otherslessvalue" class="form-control input-sm" type="number" value="' . $row['otherslessvalue'] . '" />
                            </div>

                            
                            '; ?>
                                     
                  <?php
                  }
                }}}
                  ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" onclick="redirectToHome()">Cancel</button>
          <script>
            function redirectToHome() {
              window.location.href = 'editpayslippage.php';
            }
          </script>
                    <button type="submit" class="btn btn-primary btn-sm" name="btn_editpayroll">Save</button>
               </div>
            </div>
        </div>
    </form>
</div>


<?php include "function.php"; ?>

        
        <script src="" async defer></script>
    </body>
</html>

