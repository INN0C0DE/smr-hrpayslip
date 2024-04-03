<!-- ========================= MODAL ======================= -->
<div id="addprint" class="modal fade">
  <form method="post">
    <div class="modal-dialog modal-sm" style="width:800px !important;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Payslip</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <!-- Certificate contents here -->
              <div id="printContent">

              <?php
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if any checkboxes are selected
                if (isset($_POST['chk_delete']) && is_array($_POST['chk_delete']) && count($_POST['chk_delete']) > 0) {
                  // Get the selected checkboxes
                  $selectedOids = $_POST['chk_delete'];

                  // Convert the array of selected OIDs to a comma-separated string for the SQL query
                  $selectedOidsString = implode(',', $selectedOids);

                  // Construct the SQL query with the WHERE clause to filter the selected OIDs
                  $squery = mysqli_query($con, "SELECT p.oid, p.employee, p.pera, p.pagibig, p.gsisprem, p.month_, p.daterange, p.period, p.purpose, p.grosspay, p.esr, p.phihealth, p.wholdtax, p.mpl, p.mp2, p.gsismpl, p.gsisgfal, p.ploan, p.cloan, 
                                        p.eloan, p.comploan, p.educloan, p.consoloan, p.lbp, p.pnb, p.sss, p.phihealthtype, p.wholdtaxtype, p.pagibigtype, p.mpltype, p.mp2type, p.gsispremtype,
                                        p.gsismpltype, p.gsisgfaltype, p.ploantype, p.cloantype, p.eloantype, p.comploantype, p.educloantype, p.consoloantype, p.lbptype, p.pnbtype, p.ssstype,
                                        e.fname, e.mname, e.lname, r.range_ 
                                      FROM tbl_payroll p
                                      INNER JOIN tbl_employee e ON p.employee = e.oid  
                                      INNER JOIN tbl_range r ON p.daterange = r.oid WHERE p.oid IN ($selectedOidsString)");

                  while ($row = mysqli_fetch_array($squery)) {
                  // Calculate the total and total deduction for each row
  
           // Calculate the total
           $total = $row['grosspay'] + $row['esr'] + $row['pera'];
           $totaldeduction = 0;
           $totalAddDeduction = 0;
 
           if ($row['phihealthtype'] !== 'add') {
             $totaldeduction += $row['phihealth'];
           } else {
             $totalAddDeduction += $row['phihealth'];
           }
 
           if ($row['wholdtaxtype'] !== 'add') {
             $totaldeduction += $row['wholdtax'];
           } else {
             $totalAddDeduction += $row['wholdtax'];
           }
 
           if ($row['pagibigtype'] !== 'add') {
             $totaldeduction += $row['pagibig'];
           } else {
             $totalAddDeduction += $row['pagibig'];
           }
 
 
           if ($row['mpltype'] !== 'add') {
             $totaldeduction += $row['mpl'];
           } else {
             $totalAddDeduction += $row['mpl'];
           }
 
           if ($row['mp2type'] !== 'add') {
             $totaldeduction += $row['mp2'];
           } else {
             $totalAddDeduction += $row['mp2'];
           }
 
           if ($row['gsispremtype'] !== 'add') {
             $totaldeduction += $row['gsisprem'];
           } else {
             $totalAddDeduction += $row['gsisprem'];
           }
 
           if ($row['gsismpltype'] !== 'add') {
             $totaldeduction += $row['gsismpl'];
           } else {
             $totalAddDeduction += $row['gsismpl'];
           }
 
           if ($row['gsisgfaltype'] !== 'add') {
             $totaldeduction += $row['gsisgfal'];
           } else {
             $totalAddDeduction += $row['gsisgfal'];
           }
 
           if ($row['ploantype'] !== 'add') {
             $totaldeduction += $row['ploan'];
           } else {
             $totalAddDeduction += $row['ploan'];
           }
 
           if ($row['cloantype'] !== 'add') {
             $totaldeduction += $row['cloan'];
           } else {
             $totalAddDeduction += $row['cloan'];
           }
 
           if ($row['eloantype'] !== 'add') {
             $totaldeduction += $row['eloan'];
           } else {
             $totalAddDeduction += $row['eloan'];
           }
 
           if ($row['comploantype'] !== 'add') {
             $totaldeduction += $row['comploan'];
           } else {
             $totalAddDeduction += $row['comploan'];
           }
 
           if ($row['educloantype'] !== 'add') {
             $totaldeduction += $row['educloan'];
           } else {
             $totalAddDeduction += $row['educloan'];
           }
 
           if ($row['consoloantype'] !== 'add') {
             $totaldeduction += $row['consoloan'];
           } else {
             $totalAddDeduction += $row['consoloan'];
           }
 
           if ($row['lbptype'] !== 'add') {
             $totaldeduction += $row['lbp'];
           } else {
             $totalAddDeduction += $row['lbp'];
           }
 
           if ($row['pnbtype'] !== 'add') {
             $totaldeduction += $row['pnb'];
           } else {
             $totalAddDeduction += $row['pnb'];
           }
 
           if ($row['ssstype'] !== 'add') {
             $totaldeduction += $row['sss'];
           } else {
             $totalAddDeduction += $row['sss'];
           }
 
           $netsalary = $total - $totaldeduction + $totalAddDeduction;
          ?>

          <!-- Certificate contents here -->


          <body style="font-family:Arial, Helvetica, sans-serif">
            <div>
              <div style="position: relative; border: 3px solid rgba(0, 0, 0, 1); border-radius: 0.25rem; width: 4in; height: 6.5in;  z-index:1">
                <img src="../../assets/Images/payslipcenter20.png" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                <h1 style="text-align: center; font-weight: 600; font-size: 12px;margin-top: 0;">Municipality of San Mateo</h1>
                <h2 style="text-align: center; font-weight: 600; font-size: 12px; margin-top: -10px; margin-bottom: 2;">Province of Rizal</h2>
                <h3 style="text-align: center; font-weight: 600; margin: 0; letter-spacing: 3px; margin-top: 0; font-size: 12px;">PAYSLIP</h3>

                <div style="margin:0.5rem; flex: 1 1 auto;">
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Name: <span style="border-bottom: 1px solid black; height: 12px;; width: 130px; text-align: center; font-weight:bolder;"><?php echo $row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname'] . ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0; ">Period Covered: <span style="border-bottom: 1px solid black; height: 12px;; width: 130px; text-align: center;"> <?php 
                  // Extracting the start and end days from the range_
list($start_day, $end_day) = explode('-', $row['range_']);

// Formatting the month in 'M' format (e.g., 'June' to 'Jun')
$month_short = date('F', strtotime($row['month_']));

// Formatting the date
$formatted_date = $month_short . ' ' . $start_day . '-' . $end_day . ', ' . date('Y', strtotime($row['month_']));

// Output the formatted date
echo $formatted_date;
?> </span> </p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Purpose: <span style="border-bottom: 1px solid black; height: 12px;; width: 130px; text-align: center;"> <?php echo $row['purpose']; ?> </span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0; margin-top: 5px;">Gross Pay: <span style="float: right"> <?php echo !empty($row['grosspay']) ? number_format($row['grosspay'], 2, '.', ',') : ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Extra Service Rendered: <span style="float: right"> <?php echo !empty($row['esr']) ? number_format($row['esr'], 2, '.', ',') : ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0;">PERA: <span style="float: right"> <?php echo !empty($row['pera']) ? number_format($row['pera'], 2, '.', ',') : ''; ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0;"> <span style="float: right; padding:0;  border-top: 1px solid black; width: 100px; text-align: right; font-weight:bold;"> <strong>Total:</strong> <?php echo number_format($total, 2, '.', ','); ?></span></p>
                  <br />
                  <!-- DEDUCTIONS -->
                  <div style="display: flex; flex-wrap: wrap;">
                    <div style="flex: 0 0 70%; max-width: 70%;">
                      <p style="font-size: 12px; border-spacing: 20px; margin: 0; margin-bottom: 10px;">Less Deduction:</p>
                      <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details"><strong>PHILHEALTH:</strong><span style="float: right; <?php echo ($row['phihealthtype'] === 'add') ? 'color: black;' : 'color: rgb(255, 0, 0) !important;'; ?> padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;"><?php echo !empty($row['phihealth']) ? number_format($row['phihealth'], 2, '.', ',') : ''; ?> </span></p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                        <strong>Withholding Tax:</strong>
                        <span style="float: right; <?php echo ($row['wholdtaxtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                          <?php echo !empty($row['wholdtax']) ? number_format($row['wholdtax'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                        <strong>Pagibig:</strong>
                        <span style="float: right; <?php echo ($row['pagibigtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                          <?php echo !empty($row['pagibig']) ? number_format($row['pagibig'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>
                       <ul style="list-style-type: circle; margin-left: 20px; padding-left: 10px; font-size: 12px;">
                       <li style="display: flex; justify-content: space-between; align-items: center;">
                          MPL: <span style="<?php echo ($row['mpltype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['mpl']) ? number_format($row['mpl'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>
                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          MP2: <span style="<?php echo ($row['mp2type'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['mp2']) ? number_format($row['mp2'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>
                        </ul>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                        <strong>GSIS - Premium:</strong>
                        <span style="<?php echo ($row['gsispremtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                          <?php echo !empty($row['gsisprem']) ? number_format($row['gsisprem'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>
                      <ul style="list-style-type: circle; margin-left: 20px; padding-left: 10px; font-size: 12px;">
                      <li style="display: flex; justify-content: space-between; align-items: center;">
                          GSIS MPL: <span style="<?php echo ($row['gsismpltype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['gsismpl']) ? number_format($row['gsismpl'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          GSIS GFAL: <span style="<?php echo ($row['gsisgfaltype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['gsisgfal']) ? number_format($row['gsisgfal'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Policy Loan: <span style="<?php echo ($row['ploantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['ploan']) ? number_format($row['ploan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Calamity Loan: <span style="<?php echo ($row['cloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['cloan']) ? number_format($row['cloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Emergency Loan: <span style="<?php echo ($row['eloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['eloan']) ? number_format($row['eloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Comp. Loan: <span style="<?php echo ($row['comploantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['comploan']) ? number_format($row['comploan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Education Loan: <span style="<?php echo ($row['educloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['educloan']) ? number_format($row['educloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>

                        <li style="display: flex; justify-content: space-between; align-items: center;">
                          Conso. Loan: <span style="<?php echo ($row['consoloantype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                            <?php echo !empty($row['consoloan']) ? number_format($row['consoloan'], 2, '.', ',') : ''; ?>
                          </span>
                        </li>
                       </ul>
                       <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                        <strong>LBP:</strong>
                        <span style="<?php echo ($row['lbptype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                          <?php echo !empty($row['lbp']) ? number_format($row['lbp'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                        <strong>PNB:</strong>
                        <span style="<?php echo ($row['pnbtype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                          <?php echo !empty($row['pnb']) ? number_format($row['pnb'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>

                      <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                        <strong>SSS:</strong>
                        <span style="<?php echo ($row['ssstype'] === 'add') ? 'color: black;' : 'color: red !important;'; ?> float: right; padding: 0; border-bottom: 1px solid black; height: 17px; width: 130px; text-align: center;">
                          <?php echo !empty($row['sss']) ? number_format($row['sss'], 2, '.', ',') : ''; ?>
                        </span>
                      </p>
                      </div>
                    <!-- Inline CSS for col-2 -->
                    <div style="flex: 0 0 30%; max-width: 30%;">
                      <p style="transform: rotate(-90deg); width: 200px; height: 100px; height: 100px; top: 80px; font-weight: 600; position: relative; ">CRISTINA F. CABUSAY</p>
                      <p style="transform: rotate(-90deg); width: 250px; height: 100px; height: 100px; top: -100px; position: relative;">Head-HRMO</p>
                    </div>
                  </div>
                  <!-- END ROW -->
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Total Deduction: <span style="float: right; border-bottom: 1px solid black; height: 17px;; width: 100px; text-align: right; color:red !important"> <?php echo number_format($totaldeduction, 2, '.', ','); ?></span></p>
                  <p style="font-size: 12px; border-spacing: 20px; margin: 0; margin-top: 10px;" class="fw-bold details"><strong>NET SALARY:</strong> <span style="float: right;border-bottom: 1px solid black; height: 17px;; width: 100px; text-align: right; font-weight: bold;"> <?php echo number_format($netsalary, 2, '.', ','); ?></span></p>
                </div>
                <p style="font-size: 12px; text-align: center; font-weight: 600;  color: red !important; margin-top: -5px; display: none; ">FOR FILING PURPOSES ONLY</p>
              </div>
            </div>
                <?php
                  }}}
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
  </form>
</div>

<script>
  function printPayslip() {
    // Hide the print button before printing to prevent it from being included on the printed output
    const printButton = document.querySelector(".btn-success");
    printButton.style.display = "none";

    // Get the content you want to print
    const contentToPrint = document.getElementById("printContent").innerHTML;

    // Open a new window and write the content to it for printing
    const printWindow = window.open('', '', 'height=600,width=800');
    printWindow.document.write('<html><head><title>Payslip</title></head><body>');
    printWindow.document.write(contentToPrint);
    printWindow.document.write('</body></html>');

    // Call window.print() to initiate the printing process in the new window
    printWindow.print();
    printWindow.close();

    // Show the print button again after printing is done
    printButton.style.display = "block";
  }
</script>