<div id="printContent">

    <?php
    include "connection.php";
    ?>

    <?php
    if (isset($_GET['data'])) {
        $formData = json_decode($_GET['data'], true);

    // Check if the date range is selected
    $dateRange = '';
    $dateRangeId = isset($formData['txt_daterange']) ? $formData['txt_daterange'] : '';
    if ($dateRangeId) {
        $dateRangeQuery = mysqli_query($con, "SELECT range_ FROM tbl_range WHERE oid = '$dateRangeId'");
        $dateRangeRow = mysqli_fetch_assoc($dateRangeQuery);
        if ($dateRangeRow) {
            $dateRange = $dateRangeRow['range_'];
        }
    }

    // Check if the month is selected
    $formatted_date = '';
    if ($dateRange && isset($formData['txt_month'])) {
        list($start_day, $end_day) = explode('-', $dateRange);
        $month_short = date('F', strtotime($formData['txt_month']));
        // Formatting the date
        $formatted_date = $month_short . ' ' . $start_day . '-' . $end_day . ', ' . date('Y', strtotime($formData['txt_month']));
    } else {
        $formatted_date = 'None'; // Set to "None" if either date range or month is not selected
    }

// Calculate the total deductions
$totaldeduction = $formData['txt_phihealth'] + $formData['txt_wholdtax'] + $formData['txt_pagibig'] + $formData['txt_mpl'] + $formData['txt_mp2']
    + $formData['txt_gsisprem'] + $formData['txt_gsismpl'] + $formData['txt_gsisgfal'] + $formData['txt_gsisecard']
    + $formData['txt_ploan'] + $formData['txt_cloan'] + $formData['txt_eloan'] + $formData['txt_comploan']
    + $formData['txt_educloan'] + $formData['txt_consoloan'] + $formData['txt_lbp'] + $formData['txt_otherslessvalue'];

// // Check if checkbox is clicked and subtract the corresponding value from the total
// if (isset($formData['chk_phihealth'])) {
//     $totaldeduction -= $formData['txt_phihealth'];
// }
// if (isset($formData['chk_wholdtax'])) {
//     $totaldeduction -= $formData['txt_wholdtax'];
// }
// if (isset($formData['chk_pagibig'])) {
//     $totaldeduction -= $formData['txt_pagibig'];
// }
// if (isset($formData['chk_mpl'])) {
//     $totaldeduction -= $formData['txt_mpl'];
// }
// if (isset($formData['chk_mp2'])) {
//     $totaldeduction -= $formData['txt_mp2'];
// }
// if (isset($formData['chk_gsisprem'])) {
//     $totaldeduction -= $formData['txt_gsisprem'];
// }
// if (isset($formData['chk_gsismpl'])) {
//     $totaldeduction -= $formData['txt_gsismpl'];
// }
// if (isset($formData['chk_gsisgfal'])) {
//     $totaldeduction -= $formData['txt_gsisgfal'];
// }
// if (isset($formData['chk_gsisecard'])) {
//     $totaldeduction -= $formData['txt_gsisecard'];
// }
// if (isset($formData['chk_ploan'])) {
//     $totaldeduction -= $formData['txt_ploan'];
// }
// if (isset($formData['chk_cloan'])) {
//     $totaldeduction -= $formData['txt_cloan'];
// }
// if (isset($formData['chk_eloan'])) {
//     $totaldeduction -= $formData['txt_eloan'];
// }
// if (isset($formData['chk_comploan'])) {
//     $totaldeduction -= $formData['txt_comploan'];
// }
// if (isset($formData['chk_educloan'])) {
//     $totaldeduction -= $formData['txt_educloan'];
// }
// if (isset($formData['chk_consoloan'])) {
//     $totaldeduction -= $formData['txt_consoloan'];
// }
// if (isset($formData['chk_lbp'])) {
//     $totaldeduction -= $formData['txt_lbp'];
// }

        $totalAddDeduction = 0;
        $total = $formData['txt_gross'] + $formData['txt_othersaddvalue'] + $formData['txt_pera'] + $formData['txt_rata'];

        // Perform similar calculations for other deductions
        // Calculate the net salary
        $netsalary =  $total - $totaldeduction;

        // Display the calculated values in the preview
        // Fetch the employee name from the database
        $employeeName = '';
        $employeeId = isset($formData['txt_employee']) ? $formData['txt_employee'] : '';
        if ($employeeId) {
            $employeeQuery = mysqli_query($con, "SELECT lname, fname, mname, suffix FROM tbl_employee WHERE oid = '$employeeId'");
            $employeeRow = mysqli_fetch_assoc($employeeQuery);
            if ($employeeRow) {
                $employeeName = $employeeRow['lname'] . ', ' . $employeeRow['fname'] . ' ' . $employeeRow['suffix'] . ' ' . $employeeRow['mname'];
            }
        }
    ?>

        <body style="font-family:Arial, Helvetica, sans-serif">
            <div>
                <div style="position: relative; border: 3px solid rgba(0, 0, 0, 1); border-radius: 0.25rem; width: 4in; height: 6.3in;  z-index:1">
                    <img src="../../assets/Images/payslipcenter20.png" alt="" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: -1;">
                    <h1 style="text-align: center; font-weight: 600; font-size: 12px;margin-top: 0;">Municipality of San Mateo</h1>
                    <h2 style="text-align: center; font-weight: 600; font-size: 12px; margin-top: -10px; margin-bottom: 2;">Province of Rizal</h2>
                    <h3 style="text-align: center; font-weight: 600; margin: 0; letter-spacing: 3px; margin-top: 0; font-size: 12px;">PAYSLIP</h3>

                    <div style="margin:0.5rem; flex: 1 1 auto;">
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Name: <span style="border-bottom: 1px solid black; height: 12px;; width: 75px; text-align: center; font-weight:bolder;"><?php echo $employeeName; ?></span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0; ">Period Covered: <span style="border-bottom: 1px solid black; height: 12px;; width: 75px; text-align: center;"> <?php echo $formatted_date; ?> </span> </p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Purpose: <span style="border-bottom: 1px solid black; height: 12px;; width: 75px; text-align: center;"> <?php echo isset($formData['txt_purpose']) ? $formData['txt_purpose'] : ''; ?> </span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0; margin-top: 5px;">Gross Pay: <span style="float: right"> <?php echo !empty($formData['txt_gross']) ? number_format($formData['txt_gross'], 2, '.', ',') : ''; ?></span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0;">PERA: <span style="float: right"> <?php echo !empty($formData['txt_pera']) ? number_format($formData['txt_pera'], 2, '.', ',') : ''; ?></span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0;">RATA: <span style="float: right"> <?php echo !empty($formData['txt_rata']) ? number_format($formData['txt_rata'], 2, '.', ',') : ''; ?> </span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Others: <strong><?php echo $formData['txt_othersadd']; ?></strong> <span style="float: right"> <?php echo !empty($formData['txt_othersaddvalue']) ? number_format($formData['txt_othersaddvalue'], 2, '.', ',') : ''; ?></span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0; border-top: 1px solid black; float: right; font-weight: bold;"> Total: <?php
                                                                                                                                                            echo !empty($total) ? number_format($total, 2, '.', ',') : '';
                                                                                                                                                            ?></p>
                        <br />
                        <!-- DEDUCTIONS -->
                        <div style="display: flex; flex-wrap: wrap;">
                            <div style="flex: 0 0 70%; max-width: 70%;">
                                <p style="font-size: 12px; border-spacing: 20px; margin: 0; font-weight:bolder;">Less Deduction:</p>
                                <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details"><strong>PHILHEALTH:</strong>
                                    <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                        <?php echo !empty($formData['txt_phihealth']) ? number_format($formData['txt_phihealth'], 2, '.', ',') : ''; ?> </span>
                                </p>

                                <p style="font-size: 12px; border-spacing: 20px;" class="fw-bold details">
                                    <strong>Withholding Tax:</strong>
                                    <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                        <?php echo !empty($formData['txt_wholdtax']) ? number_format($formData['txt_wholdtax'], 2, '.', ',') : ''; ?>
                                    </span>
                                </p>

                                <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                                    <strong>Pagibig:</strong>
                                    <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                        <?php echo !empty($formData['txt_pagibig']) ? number_format($formData['txt_pagibig'], 2, '.', ',') : ''; ?>
                                    </span>
                                </p>
                                <ul style="list-style-type: circle; margin-left: 20px; padding-left: 10px; font-size: 12px;">
                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        MPL: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_mpl']) ? number_format($formData['txt_mpl'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>
                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        MP2: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_mp2']) ? number_format($formData['txt_mp2'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>
                                </ul>
                                <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                                    <strong>GSIS - Premium:</strong>
                                    <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                        <?php echo !empty($formData['txt_gsisprem']) ? number_format($formData['txt_gsisprem'], 2, '.', ',') : ''; ?>
                                    </span>
                                </p>
                                <ul style="list-style-type: circle; margin-left: 20px; padding-left: 10px; font-size: 12px;">
                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        GSIS MPL: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_gsismpl']) ? number_format($formData['txt_gsismpl'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        GSIS GFAL: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_gsisgfal']) ? number_format($formData['txt_gsisgfal'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        GSIS E-CARD: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_gsisecard']) ? number_format($formData['txt_gsisecard'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        Policy Loan: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_ploan']) ? number_format($formData['txt_ploan'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        Calamity Loan: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_cloan']) ? number_format($formData['txt_cloan'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        Emergency Loan: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_eloan']) ? number_format($formData['txt_eloan'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        Comp. Loan: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_comploan']) ? number_format($formData['txt_comploan'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        Education Loan: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_educloan']) ? number_format($formData['txt_educloan'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>

                                    <li style="display: flex; justify-content: space-between; align-items: center;">
                                        Conso. Loan: <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                            <?php echo !empty($formData['txt_consoloan']) ? number_format($formData['txt_consoloan'], 2, '.', ',') : ''; ?>
                                        </span>
                                    </li>
                                </ul>
                                <p style="font-size: 12px; border-spacing: 20px; margin: 1px;" class="fw-bold details">
                                    <strong>LBP:</strong>
                                    <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                        <?php echo !empty($formData['txt_lbp']) ? number_format($formData['txt_lbp'], 2, '.', ',') : ''; ?>
                                    </span>
                                </p>

                                <p style="font-size: 12px; border-spacing: 20px;" class="fw-bold details">
                                    Others: <strong> <?php echo $formData['txt_othersless']; ?></strong>
                                    <span style="float: right; padding: 0; border-bottom: 1px solid black; color: red; height: 17px; width: 75px; text-align: center;">
                                        <?php echo !empty($formData['txt_otherslessvalue']) ? number_format($formData['txt_otherslessvalue'], 2, '.', ',') : ''; ?>
                                    </span>
                                </p>

                            </div>
                            <!-- Inline CSS for col-2 -->
                            <div style="flex: 0 0 30%; max-width: 30%;">
                                <p style="transform: rotate(-90deg); width: 200px; height: 100px; height: 100px; top: 80px; font-weight: 600; position: relative; display:none;">CRISTINA F. CABUSAY</p>
                                <p style="transform: rotate(-90deg); width: 250px; height: 100px; top: -43px; right: 3px; position: relative; display:none;">Head-HRMO</p>
                            </div>
                        </div>
                        <!-- END ROW -->
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0;">Total Deduction: <span style="float: right; border-bottom: 1px solid black; height: 17px;; width: 100px; color:red !important; text-align: right;"> <?php echo number_format($totaldeduction, 2, '.', ','); ?></span></p>
                        <p style="font-size: 12px; border-spacing: 20px; margin: 0; margin-top: 10px;" class="fw-bold details"><strong>NET SALARY:</strong> <span style="float: right;border-bottom: 1px solid black; height: 17px;; width: 100px; font-weight: bolder; text-align: right; font-size: 14px;
    letter-spacing: 2px;"> <?php echo number_format($netsalary, 2, '.', ','); ?></span></p>
                    </div>
                    <p style="font-size: 12px; text-align: center; font-weight: 600;  color: red !important; margin-top: -5px; display: none; ">FOR FILING PURPOSES ONLY</p>
                </div>
            </div>

        </body>

    <?php
    }
    ?>
</div>