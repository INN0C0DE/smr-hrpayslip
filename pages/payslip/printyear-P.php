<!-- ========================= MODAL ======================= -->
<div id="addprint" class="modal fade">
  <form method="post">
    <div class="modal-dialog modal-sm" style="width:800px !important;">
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="redirectToHome()">&times;</button>
          <script>
            function redirectToHome() {
              window.location.href = 'printing-P.php';
            }
          </script>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <!-- Certificate contents here -->
              <div id="printContent"  style="  display: grid !important;
grid-template-columns: 1fr 1fr !important; 
grid-template-rows: 1fr 1fr !important; 
gap: 10px !important; ">

                <?php
                include "connection.php";
                ?>
                <?php
                // Check if txt_employee and txt_month are set in the POST data
                if (isset($_POST['txt_employee']) && (isset($_POST['txt_year']))) {
                  // Sanitize and store the values
                  $employeeId = mysqli_real_escape_string($con, $_POST['txt_employee']);
                  $year = mysqli_real_escape_string($con, $_POST['txt_year']);

                  // Modify the query to include the WHERE clause with employee and year filter
                  $squery = mysqli_query($con, "SELECT p.oid, p.employee, p.pera, p.rata, p.pagibig, p.month_, p.gsisprem, p.daterange, p.period, p.purpose, p.grosspay, p.esr, p.phihealth, p.wholdtax, p.mpl, p.mp2, p.gsismpl, p.gsisgfal, p.ploan, p.cloan, 
    p.eloan, p.comploan, p.educloan, p.consoloan, p.lbp, p.pnb, p.sss, p.phihealthtype, p.wholdtaxtype, p.pagibigtype, p.mpltype, p.mp2type, p.gsispremtype,
    p.gsismpltype, p.gsisgfaltype, p.ploantype, p.cloantype, p.eloantype, p.comploantype, p.educloantype, p.consoloantype, p.lbptype, p.pnbtype, p.ssstype, p.othersadd, p.othersless, p.othersaddvalue, p.otherstype, p.gsisecardtype, p.otherslessvalue, p.gsisecard_,
    e.fname, e.mname, e.lname, e.suffix, r.range_ 
  FROM tbl_payroll p
  INNER JOIN tbl_employee e ON p.employee = e.oid  
  INNER JOIN tbl_range r ON p.daterange = r.oid
                                WHERE p.employee = '$employeeId' AND SUBSTRING(p.month_, 1, 4) = '$year' ORDER BY month_, range_");
                  while ($row = mysqli_fetch_array($squery)) {
                    // Calculate the total and total deduction for each row
                    // Assuming you have fetched data from the database and stored it in $row variable
          
                    // Calculate the total
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
                    ?>
          

                    <!-- Certificate contents here -->


                    <body style="font-family:Arial, Helvetica, sans-serif">

                    <div>
              <div style="position: relative; border: 3px solid rgba(0, 0, 0, 1); border-radius: 0.25rem; width: 4in; height: 6.3 in;  z-index:1">
                <img src="../../assets/Images/payslipcenter20.png" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                <h1 style="text-align: center; font-weight: 600; font-size: 12px;margin-top: 0;">Municipality of San Mateo</h1>
                <h2 style="text-align: center; font-weight: 600; font-size: 12px; margin-top: -10px; margin-bottom: 2;">Province of Rizal</h2>
                <h3 style="text-align: center; font-weight: 600; margin: 5 0 5 0; letter-spacing: 3px; margin-top: 0; font-size: 12px;">PAYSLIP</h3>
                <div style="margin:0.5rem; flex: 1 1 auto;">
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;">Name: <span style="border-bottom: 1px solid black; height: 12px;; width: 75px; text-align: center; font-weight:bolder;"><?php
echo htmlentities($row['lname'], ENT_QUOTES, 'UTF-8') . ', ' .
     htmlentities($row['fname'], ENT_QUOTES, 'UTF-8') . ' ' .
     htmlentities($row['suffix'], ENT_QUOTES, 'UTF-8') . ' ' .
     htmlentities($row['mname'], ENT_QUOTES, 'UTF-8') . '';
?>

</span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0; ">Period Covered: <span style="border-bottom: 1px solid black; height: 12px;; width: 75px; text-align: center;"> <?php
                                                                                                                                                                                                // Extracting the start and end days from the range_
                                                                                                                                                                                                list($start_day, $end_day) = explode('-', $row['range_']);

                                                                                                                                                                                                // Formatting the month in 'M' format (e.g., 'June' to 'Jun')
                                                                                                                                                                                                $month_short = date('F', strtotime($row['month_']));

                                                                                                                                                                                                // Formatting the date
                                                                                                                                                                                                $formatted_date = $month_short . ' ' . $start_day . '-' . $end_day . ', ' . date('Y', strtotime($row['month_']));

                                                                                                                                                                                                // Output the formatted date
                                                                                                                                                                                                echo $formatted_date;
                                                                                                                                                                                                ?>
                    </span> </p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;">Purpose: <span style="border-bottom: 1px solid black; height: 12px;; width: 75px; text-align: center;"> <?php echo $row['purpose']; ?> </span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0; margin-top: 5px;">Gross Pay: <span style="float: right"> <?php echo !empty($row['grosspay']) ? number_format($row['grosspay'], 2, '.', ',') : ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;">PERA: <span style="float: right"> <?php echo !empty($row['pera']) ? number_format($row['pera'], 2, '.', ',') : ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;">RATA: <span style="float: right"> <?php echo !empty($row['rata']) ? number_format($row['rata'], 2, '.', ',') : ''; ?> </span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;">Others: <strong><?php echo $row['othersadd']; ?></strong> <span style="float: right"> <?php echo !empty($row['othersaddvalue']) ? number_format($row['othersaddvalue'], 2, '.', ',') : ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0; border-top: 1px solid black; float: right; font-weight: bold;"> Total: <?php echo number_format($total, 2, '.', ','); ?></p>
                  <br />
                  <!-- DEDUCTIONS -->
                  <div style="display: flex; flex-wrap: wrap;">
                    <div style="flex: 0 0 70%; max-width: 70%;">
                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0; font-weight:bolder;">Less Deduction:</p>
                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;" class="fw-bold details"><strong>PHILHEALTH:</strong><span style="float: right; <?php echo ($row['phihealthtype'] === 'add') ? 'color: black;' : 'color: rgb(255, 0, 0) !important;'; ?> padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;"><?php echo !empty($row['phihealth']) ? number_format($row['phihealth'], 2, '.', ',') : ''; ?> </span></p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;" class="fw-bold details">
                        <strong>Withholding Tax:</strong>
                        <span style="float: right; <?php echo ($row['wholdtaxtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                          <?php echo !empty($row['wholdtax']) ? number_format($row['wholdtax'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;" class="fw-bold details">
                        <strong>Pagibig:</strong>
                        <span style="float: right; <?php echo ($row['pagibigtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                          <?php echo !empty($row['pagibig']) ? number_format($row['pagibig'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>
                      <ul style="list-style-type: circle; margin-left: 20px; padding-left: 10px; font-size: 12px; margin: 5 0 5 0;">
                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          MPL: <span style="<?php echo ($row['mpltype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['mpl']) ? number_format($row['mpl'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>
                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          MP2: <span style="<?php echo ($row['mp2type'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['mp2']) ? number_format($row['mp2'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>
                      </ul>
                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;" class="fw-bold details">
                        <strong>GSIS - Premium:</strong>
                        <span style="<?php echo ($row['gsispremtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                          <?php echo !empty($row['gsisprem']) ? number_format($row['gsisprem'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>
                      <ul style="list-style-type: circle; margin-left: 20px; padding-left: 10px; font-size: 12px; margin: 5 0 5 0;">
                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          GSIS MPL: <span style="<?php echo ($row['gsismpltype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['gsismpl']) ? number_format($row['gsismpl'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          GSIS GFAL: <span style="<?php echo ($row['gsisgfaltype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['gsisgfal']) ? number_format($row['gsisgfal'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          GSIS E-Card: <span style="<?php echo ($row['gsisecardtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['gsisecard_']) ? number_format($row['gsisecard_'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Policy Loan: <span style="<?php echo ($row['ploantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['ploan']) ? number_format($row['ploan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Calamity Loan: <span style="<?php echo ($row['cloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['cloan']) ? number_format($row['cloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Emergency Loan: <span style="<?php echo ($row['eloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['eloan']) ? number_format($row['eloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Comp. Loan: <span style="<?php echo ($row['comploantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['comploan']) ? number_format($row['comploan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Education Loan: <span style="<?php echo ($row['educloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['educloan']) ? number_format($row['educloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Conso. Loan: <span style="<?php echo ($row['consoloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                            <?php echo !empty($row['consoloan']) ? number_format($row['consoloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>
                      </ul>
                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;" class="fw-bold details">
                        <strong>LBP:</strong>
                        <span style="<?php echo ($row['lbptype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                          <?php echo !empty($row['lbp']) ? number_format($row['lbp'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;" class="fw-bold details">
                        Others: <strong> <?php echo $row['othersless']; ?></strong>
                        <span style="<?php echo ($row['otherstype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 75px; text-align: center;">
                          <?php echo !empty($row['otherslessvalue']) ? number_format($row['otherslessvalue'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>

                    </div>
                    <!-- Inline CSS for col-2 -->
                    <div style="flex: 0 0 30%; max-width: 30%;">
                      <p style="transform: rotate(-90deg); width: 200px; height: 100px; right: -70px; top: 80px; font-weight: 600; position: relative; ">CRISTINA F. CABUSAY</p>
                      <p style="transform: rotate(-90deg); width: 250px; height: 100px; top: -100px; right: -60; position: relative;">Head-HRMO</p>
                    </div>
                  </div>
                  <!-- END ROW -->
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0;">Total Deduction: <span style="float: right; border-bottom: 1px solid black; height: 17px;; width: 100px; text-align: right; color:red !important"> <?php echo number_format($totaldeduction, 2, '.', ','); ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 5 0 5 0; margin-top: 10px;" class="fw-bold details"><strong>NET SALARY:</strong> <span style="float: right;border-bottom: 1px solid black; height: 17px;; width: 100px; text-align: right; font-weight: bolder; font-size: 14px;
    letter-spacing: 2px;"> <?php echo number_format($netsalary, 2, '.', ','); ?></span></p>
                </div>
                <p style="font-size: 12px; text-align: center; font-weight: 600;  color: red !important; margin-top: -5px; display:none;">FOR FILING PURPOSES ONLY</p>
              </div>
            </div>
         

                  <?php
                  }
                }
                  ?>

                    </body>
              </div>

              <!-- END -->
            </div>
          </div>
          <div class="modal-footer">
            <!-- Update the button for printing -->
            <button type="button" class="btn btn-success" onclick="printPayslip()">Print</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
function printPayslip() {
    // Get the buttons you want to hide during printing
    const buttonsToHide = document.querySelectorAll(".btn, .close");
    buttonsToHide.forEach((button) => {
      button.style.display = "none";
    });

    // Get the content you want to print
    const contentToPrint = document.getElementById("printContent").innerHTML;

    // Create a new element to hold the content to be printed
    const printContainer = document.createElement("div");
    printContainer.innerHTML = contentToPrint;
    printContainer.style.visibility = "hidden";
    document.body.appendChild(printContainer);

    // Call window.print() to initiate the printing process
    window.print();

    // Remove the temporary print container after printing is done
    document.body.removeChild(printContainer);

    // Show the hidden buttons again after printing is done
    buttonsToHide.forEach((button) => {
      button.style.display = "block";
    });
  }
</script>