<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<style>
        .highlighted {
            background-color: yellow; /* Change this to your desired highlight color */
        }
        </style>


<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: login.php");
} else {
    ob_start();
    include('../head_css.php'); ?>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
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
                        <div class="box-header">
                            <div style="padding:10px;">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addpayslip"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Payslip</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletepayslip"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                <!-- <span style="float: right;">
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectrows"><i class="fa fa-print" aria-hidden="true"></i> Print Selected</button>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectprint"><i class="fa fa-print" aria-hidden="true"></i> Print Monthly</button>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#selectprintyear"><i class="fa fa-print" aria-hidden="true"></i> Print Year</button>

                                </span> -->
                            </div>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <form method="post">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="width:100% !important;" >
                                        <th style="width: 20px !important;" ><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                                                                <!-- <th>Edit</th>

                                                                                <th>Option</th>-->
                                            <!-- <th>Get row</th>   -->
                                            <th >Employee</th>
                                            <th >Date Range</th>
                                            <th >Purpose</th>
                                            <th >Gross Pay</th>
                                            <th >RATA</th>
                                            <th >Others</th>
                                            <th >Others Value</th>
                                            <th >PERA</th>
                                            <th >Philhealth</th>
                                            <th >With holding Tax</th>
                                            <th >Pag-Ibig</th>
                                            <th >MPL (Pag-ibig)</th>
                                            <th >MP2 (Pag-ibig)</th>
                                            <th >GSIS Premium</th>
                                            <th >GSIS MPL</th>
                                            <th >GSIS GFAL</th>
                                            <th >GSIS E-Card</th>
                                            <th >POLICY LOAN</th>
                                            <th >CALIMITY LOAN</th>
                                            <th >EMERGENCY LOAN</th>
                                            <th >COMP. LOAN</th>
                                            <th >EDUCATION LOAN</th>
                                            <th >CONSO. LOAN</th>
                                            <th >LBP</th>
                                            <th >PNB</th>
                                            <th >SSS</th>
                                            <th >Other Less</th>
                                            <th >Other Less Value</th>
                                            <th >Total</th>
                                            <th >Total Deduction</th>
                                            <th >Net Salary</th>
                                            <!-- <th>SSS</th> -->

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // include "selectrows.php";
                                        $squery = mysqli_query($con, "SELECT p.oid, p.employee, p.pera, p.rata, p.pagibig, p.month_, p.gsisprem, p.daterange, p.period, p.purpose, p.grosspay, p.esr, p.phihealth, p.wholdtax, p.mpl, p.mp2, p.gsismpl, p.gsisgfal, p.ploan, p.cloan, 
                                        p.eloan, p.comploan, p.educloan, p.consoloan, p.lbp, p.pnb, p.sss, p.phihealthtype, p.wholdtaxtype, p.pagibigtype, p.mpltype, p.mp2type, p.gsispremtype,
                                        p.gsismpltype, p.gsisgfaltype, p.ploantype, p.cloantype, p.eloantype, p.comploantype, p.educloantype, p.consoloantype, p.lbptype, p.pnbtype, p.ssstype, p.othersadd, p.othersless, p.othersaddvalue, p.otherstype, p.gsisecardtype, p.otherslessvalue, p.gsisecard_,
                                        e.fname, e.mname, e.lname, e.suffix, r.range_ 
                                      FROM tbl_payroll p
                                      INNER JOIN tbl_employee e ON p.employee = e.oid  
                                      INNER JOIN tbl_range r ON p.daterange = r.oid");
                                        while ($row = mysqli_fetch_array($squery)) {
                                            $total = $row['grosspay'] + $row['othersaddvalue'] + $row['pera'] + $row['rata'];
                                            $totaldeduction = 0;
                                            $totalAddDeduction = 0;
                                  
                                            if ($row['phihealthtype'] !== 'add') {
                                              $totaldeduction += $row['phihealth'];
                                            } else {
                                              $totaldeduction -= $row['phihealth'];
                                              $totalAddDeduction += $row['phihealth'];
                                            }
                                  
                                            if ($row['wholdtaxtype'] !== 'add') {
                                              $totaldeduction += $row['wholdtax'];
                                            } else {
                                              $totaldeduction -= $row['wholdtax']; // Subtract the amount for 'add' type from $totaldeduction
                                              $totalAddDeduction += $row['wholdtax'];
                                            }
                                  
                                            if ($row['pagibigtype'] !== 'add') {
                                              $totaldeduction += $row['pagibig'];
                                            } else {
                                              $totaldeduction -= $row['pagibig'];
                                              $totalAddDeduction += $row['pagibig'];
                                            }
                                  
                                  
                                            if ($row['mpltype'] !== 'add') {
                                              $totaldeduction += $row['mpl'];
                                            } else {
                                              $totaldeduction -= $row['mpl'];
                                              $totalAddDeduction += $row['mpl'];
                                            }
                                  
                                            if ($row['mp2type'] !== 'add') {
                                              $totaldeduction += $row['mp2'];
                                            } else {
                                              $totaldeduction -= $row['mp2'];
                                              $totalAddDeduction += $row['mp2'];
                                            }
                                  
                                            if ($row['gsispremtype'] !== 'add') {
                                              $totaldeduction += $row['gsisprem'];
                                            } else {
                                              $totaldeduction -= $row['gsisprem'];
                                              $totalAddDeduction += $row['gsisprem'];
                                            }
                                  
                                            if ($row['gsismpltype'] !== 'add') {
                                              $totaldeduction += $row['gsismpl'];
                                            } else {
                                              $totaldeduction -= $row['gsismpl'];
                                              $totalAddDeduction += $row['gsismpl'];
                                            }
                                  
                                            if ($row['gsisgfaltype'] !== 'add') {
                                              $totaldeduction += $row['gsisgfal'];
                                            } else {
                                              $totaldeduction -= $row['gsisgfal'];
                                              $totalAddDeduction += $row['gsisgfal'];
                                            }
                                  
                                            if ($row['gsisecardtype'] !== 'add') {
                                              $totaldeduction += $row['gsisecard_'];
                                            } else {
                                              $totaldeduction -= $row['gsisecard_'];
                                              $totalAddDeduction += $row['gsisecard_'];
                                            }
                                  
                                            if ($row['ploantype'] !== 'add') {
                                              $totaldeduction += $row['ploan'];
                                            } else {
                                              $totaldeduction -= $row['ploan'];
                                              $totalAddDeduction += $row['ploan'];
                                            }
                                  
                                            if ($row['cloantype'] !== 'add') {
                                              $totaldeduction += $row['cloan'];
                                            } else {
                                              $totaldeduction -= $row['cloan'];
                                              $totalAddDeduction += $row['cloan'];
                                            }
                                  
                                            if ($row['eloantype'] !== 'add') {
                                              $totaldeduction += $row['eloan'];
                                            } else {
                                              $totaldeduction -= $row['eloan'];
                                              $totalAddDeduction += $row['eloan'];
                                            }
                                  
                                            if ($row['comploantype'] !== 'add') {
                                              $totaldeduction += $row['comploan'];
                                            } else {
                                              $totaldeduction -= $row['comploan'];
                                              $totalAddDeduction += $row['comploan'];
                                            }
                                  
                                            if ($row['educloantype'] !== 'add') {
                                              $totaldeduction += $row['educloan'];
                                            } else {
                                              $totaldeduction -= $row['educloan'];
                                              $totalAddDeduction += $row['educloan'];
                                            }
                                  
                                            if ($row['consoloantype'] !== 'add') {
                                              $totaldeduction += $row['consoloan'];
                                            } else {
                                              $totaldeduction -= $row['consoloan'];
                                              $totalAddDeduction += $row['consoloan'];
                                            }
                                  
                                            if ($row['lbptype'] !== 'add') {
                                              $totaldeduction += $row['lbp'];
                                            } else {
                                              $totaldeduction -= $row['lbp']; // Subtract the amount for 'add' type from $totaldeduction
                                              $totalAddDeduction += $row['lbp'];
                                            }
                                  
                                            if ($row['pnbtype'] !== 'add') {
                                              $totaldeduction += $row['pnb'];
                                            } else {
                                              $totaldeduction -= $row['pnb'];
                                              $totalAddDeduction += $row['pnb'];
                                            }
                                  
                                            if ($row['ssstype'] !== 'add') {
                                              $totaldeduction += $row['sss'];
                                            } else {
                                              $totaldeduction -= $row['sss'];
                                              $totalAddDeduction += $row['sss'];
                                            }
                                  
                                            if ($row['otherstype'] !== 'add') {
                                              $totaldeduction += $row['otherslessvalue'];
                                            } else {
                                              $totaldeduction -= $row['otherslessvalue'];
                                              $totalAddDeduction += $row['otherslessvalue'];
                                            }
                                  
                                            $netsalary = $total - $totaldeduction;

                                            // Extracting the start and end days from the range_
                                            list($start_day, $end_day) = explode('-', $row['range_']);

                                            // Formatting the month in 'M' format (e.g., 'June' to 'Jun')
                                            $month_short = date('F', strtotime($row['month_']));

                                            // Formatting the date
                                            $formatted_date = $month_short . ' ' . $start_day . '-' . $end_day . ', ' . date('Y', strtotime($row['month_']));

                                            echo '
                                            <tr>
                                                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['oid'] . '"  /></td>
                                          
                                                <td>' . $row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname'] . '</td>
                                                <td>' . $formatted_date . '</td>
                                                <td>' . $row['purpose'] . '</td>
                                                <td>' . (!empty($row['grosspay']) ? number_format($row['grosspay'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['rata']) ? number_format($row['rata'], 2, '.', ',') : '') . '</td>
                                                <td>' . $row['othersadd'] . '</td>
                                                <td>' . (!empty($row['othersaddvalue']) ? number_format($row['othersaddvalue'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['pera']) ? number_format($row['pera'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['phihealth']) ? number_format($row['phihealth'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['wholdtax']) ? number_format($row['wholdtax'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['pagibig']) ? number_format($row['pagibig'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['mpl']) ? number_format($row['mpl'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['mp2']) ? number_format($row['mp2'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['gsisprem']) ? number_format($row['gsisprem'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['gsismpl']) ? number_format($row['gsismpl'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['gsisgfal']) ? number_format($row['gsisgfal'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['gsisecard_']) ? number_format($row['gsisecard_'], 2, '.', ',') : '') . '</td>

                                                <td>' . (!empty($row['ploan']) ? number_format($row['ploan'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['cloan']) ? number_format($row['cloan'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['eloan']) ? number_format($row['eloan'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['comploan']) ? number_format($row['comploan'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['educloan']) ? number_format($row['educloan'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['consoloan']) ? number_format($row['consoloan'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['lbp']) ? number_format($row['lbp'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['pnb']) ? number_format($row['pnb'], 2, '.', ',') : '') . '</td>
                                                <td>' . (!empty($row['sss']) ? number_format($row['sss'], 2, '.', ',') : '') . '</td>
                                                <td>' . $row['othersless'] . '</td>
                                                <td>' . (!empty($row['otherslessvalue']) ? number_format($row['otherslessvalue'], 2, '.', ',') : '') . '</td>
                                                <td>' . $total . '</td>
                                                <td>' . $totaldeduction . '</td>
                                                <td>' . $netsalary . '</td>
                                            </tr>
                                                ';
                                            // include "print.php";
                                            // include "getrow.php";
                                            // include "editpayslip.php";

                                        }
                                        ?>
                                    </tbody>
                                </table>

                               

                                <?php include "payrolldelete.php"; ?>

                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <?php include "add_modal.php"; ?>


                    <?php include "function.php"; ?>

                </section><!-- /.content -->

            </div> <!-- /.row -->


        <?php } ?>

    <?php }
include "../footer.php"; ?>

<script type="text/javascript">
    $(function() {
        $("#table").dataTable({
            "deferRender": true,
            "paging": true,
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0]
            }],
            "aaSorting": [],
        });
    });

  
</script>
    </body>

</html>