<?php
if (isset($_POST['btn_addemployee'])) {
    // Your database connection setup

    $txt_fname = $_POST['txt_fname'];
    $txt_mname = $_POST['txt_mname'];
    $txt_lname = $_POST['txt_lname'];
    $txt_suffix = $_POST['txt_suffix'];

    // Image upload handling
    $target_dir = "picture/";
    $target_file = $target_dir . basename($_FILES['txt_image']['name']);
    move_uploaded_file($_FILES['txt_image']['tmp_name'], $target_file);

    // Prepare the query using prepared statements
    $query = "INSERT INTO tbl_employee (fname, mname, lname, suffix, image) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssss", $txt_fname, $txt_mname, $txt_lname, $txt_suffix, $target_file);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['duplicateuser'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }
}



if (isset($_POST['btn_payslip'])) {
    $txt_employee = $_POST['txt_employee'];
    $txt_daterange = $_POST['txt_daterange'];
    $txt_purpose = $_POST['txt_purpose'];
    $txt_month = $_POST['txt_month'];
    $txt_gross = $_POST['txt_gross'];
    $txt_esr = $_POST['txt_esr'];
    $txt_rata = $_POST['txt_rata'];
    $txt_pera = $_POST['txt_pera'];

    $txt_othersadd = $_POST['txt_othersadd'];
    $txt_othersaddvalue = $_POST['txt_othersaddvalue'];

    $txt_phihealth = $_POST['txt_phihealth'];
    $phihealthtype = isset($_POST['chk_phihealth']) ? 'add' : '';

    $txt_wholdtax = $_POST['txt_wholdtax'];
    $wholdtaxtype = isset($_POST['chk_wholdtax']) ? 'add' : '';

    $txt_pagibig = $_POST['txt_pagibig'];
    $pagibigtype = isset($_POST['chk_pagibig']) ? 'add' : '';

    $txt_mpl = $_POST['txt_mpl'];
    $mpltype = isset($_POST['chk_mpl']) ? 'add' : '';

    $txt_mp2 = $_POST['txt_mp2'];
    $mp2type = isset($_POST['chk_mp2']) ? 'add' : '';

    $txt_gsisprem = $_POST['txt_gsisprem'];
    $gsispremtype = isset($_POST['chk_gsisprem']) ? 'add' : '';

    $txt_gsismpl = $_POST['txt_gsismpl'];
    $gsismpltype = isset($_POST['chk_gsismpl']) ? 'add' : '';

    $txt_gsisgfal = $_POST['txt_gsisgfal'];
    $gsisgfaltype = isset($_POST['chk_gsisgfal']) ? 'add' : '';

    $txt_gsisecard = $_POST['txt_gsisecard'];
    $gsisecardtype = isset($_POST['chk_gsisecard']) ? 'add' : '';

    $txt_ploan = $_POST['txt_ploan'];
    $ploantype = isset($_POST['chk_ploan']) ? 'add' : '';

    $txt_cloan = $_POST['txt_cloan'];
    $cloantype = isset($_POST['chk_cloan']) ? 'add' : '';

    $txt_eloan = $_POST['txt_eloan'];
    $eloantype = isset($_POST['chk_eloan']) ? 'add' : '';

    $txt_comploan = $_POST['txt_comploan'];
    $comploantype = isset($_POST['chk_comploan']) ? 'add' : '';

    $txt_educloan = $_POST['txt_educloan'];
    $educloantype = isset($_POST['chk_educloan']) ? 'add' : '';

    $txt_consoloan = $_POST['txt_consoloan'];
    $consoloantype = isset($_POST['chk_consoloan']) ? 'add' : '';

    $txt_lbp = $_POST['txt_lbp'];
    $lbptype = isset($_POST['chk_lbp']) ? 'add' : '';

    $txt_pnb = $_POST['txt_pnb'];
    $pnbtype = isset($_POST['chk_pnb']) ? 'add' : '';

    $txt_sss = $_POST['txt_sss'];
    $ssstype = isset($_POST['chk_sss']) ? 'add' : '';

    $txt_othersless = $_POST['txt_othersless'];

    $txt_otherslessvalue = $_POST['txt_otherslessvalue'];
    $otherstype = isset($_POST['chk_lessvalue']) ? 'add' : '';

    // Prepare the query using prepared statements
    $query = "INSERT INTO tbl_payroll (employee, daterange, month_, purpose, grosspay, rata, esr, pera, phihealth, wholdtax, pagibig, mpl, mp2, gsisprem, gsismpl, gsisgfal, ploan, cloan, eloan, comploan, educloan, consoloan, lbp, pnb, sss
    , phihealthtype, wholdtaxtype, pagibigtype, mpltype, mp2type, gsispremtype, gsismpltype, gsisgfaltype, ploantype, cloantype, eloantype, comploantype, 
    educloantype, consoloantype, lbptype, pnbtype, ssstype, othersadd, othersless, othersaddvalue, otherstype, otherslessvalue, gsisecard_, gsisecardtype) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssssssss", $txt_employee, $txt_daterange, $txt_month, $txt_purpose, $txt_gross, $txt_rata, $txt_esr, $txt_pera, $txt_phihealth, $txt_wholdtax, $txt_pagibig, $txt_mpl, $txt_mp2, $txt_gsisprem, 
        $txt_gsismpl, $txt_gsisgfal, $txt_ploan, $txt_cloan, $txt_eloan, $txt_comploan, $txt_educloan, $txt_consoloan, $txt_lbp, $txt_pnb, $txt_sss, $phihealthtype, $wholdtaxtype, $pagibigtype
        , $mpltype, $mp2type, $gsispremtype, $gsismpltype, $gsisgfaltype, $ploantype, $cloantype, $eloantype, $comploantype, $educloantype, $consoloantype
        , $lbptype, $pnbtype, $ssstype, $txt_othersadd, $txt_othersless, $txt_othersaddvalue, $otherstype, $txt_otherslessvalue, $txt_gsisecard, $gsisecardtype);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['duplicateuser'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }
}


if (isset($_POST['btn_getpayroll'])) {
    $txt_employee = $_POST['txt_employee'];
    $txt_daterange = $_POST['txt_daterange'];
    $txt_purpose = $_POST['txt_purpose'];
    $txt_month = $_POST['txt_month'];
    $txt_gross = $_POST['txt_gross'];
    $txt_esr = $_POST['txt_esr'];
    $txt_rata = $_POST['txt_rata'];
    $txt_pera = $_POST['txt_pera'];

    $txt_othersadd = $_POST['txt_othersadd'];
    $txt_othersaddvalue = $_POST['txt_othersaddvalue'];

    $txt_phihealth = $_POST['txt_phihealth'];
    $phihealthtype = isset($_POST['chk_phihealth']) ? 'add' : '';

    $txt_wholdtax = $_POST['txt_wholdtax'];
    $wholdtaxtype = isset($_POST['chk_wholdtax']) ? 'add' : '';

    $txt_pagibig = $_POST['txt_pagibig'];
    $pagibigtype = isset($_POST['chk_pagibig']) ? 'add' : '';

    $txt_mpl = $_POST['txt_mpl'];
    $mpltype = isset($_POST['chk_mpl']) ? 'add' : '';

    $txt_mp2 = $_POST['txt_mp2'];
    $mp2type = isset($_POST['chk_mp2']) ? 'add' : '';

    $txt_gsisprem = $_POST['txt_gsisprem'];
    $gsispremtype = isset($_POST['chk_gsisprem']) ? 'add' : '';

    $txt_gsismpl = $_POST['txt_gsismpl'];
    $gsismpltype = isset($_POST['chk_gsismpl']) ? 'add' : '';

    $txt_gsisgfal = $_POST['txt_gsisgfal'];
    $gsisgfaltype = isset($_POST['chk_gsisgfal']) ? 'add' : '';

    $txt_gsisecard = $_POST['txt_gsisecard'];
    $gsisecardtype = isset($_POST['chk_gsisecard']) ? 'add' : '';

    $txt_ploan = $_POST['txt_ploan'];
    $ploantype = isset($_POST['chk_ploan']) ? 'add' : '';

    $txt_cloan = $_POST['txt_cloan'];
    $cloantype = isset($_POST['chk_cloan']) ? 'add' : '';

    $txt_eloan = $_POST['txt_eloan'];
    $eloantype = isset($_POST['chk_eloan']) ? 'add' : '';

    $txt_comploan = $_POST['txt_comploan'];
    $comploantype = isset($_POST['chk_comploan']) ? 'add' : '';

    $txt_educloan = $_POST['txt_educloan'];
    $educloantype = isset($_POST['chk_educloan']) ? 'add' : '';

    $txt_consoloan = $_POST['txt_consoloan'];
    $consoloantype = isset($_POST['chk_consoloan']) ? 'add' : '';

    $txt_lbp = $_POST['txt_lbp'];
    $lbptype = isset($_POST['chk_lbp']) ? 'add' : '';

    $txt_pnb = $_POST['txt_pnb'];
    $pnbtype = isset($_POST['chk_pnb']) ? 'add' : '';

    $txt_sss = $_POST['txt_sss'];
    $ssstype = isset($_POST['chk_sss']) ? 'add' : '';

    $txt_othersless = $_POST['txt_othersless'];

    $txt_otherslessvalue = $_POST['txt_otherslessvalue'];
    $otherstype = isset($_POST['chk_lessvalue']) ? 'add' : '';

    // Prepare the query using prepared statements
    $query = "INSERT INTO tbl_payroll (employee, daterange, month_, purpose, grosspay, rata, esr, pera, phihealth, wholdtax, pagibig, mpl, mp2, gsisprem, gsismpl, gsisgfal, ploan, cloan, eloan, comploan, educloan, consoloan, lbp, pnb, sss
    , phihealthtype, wholdtaxtype, pagibigtype, mpltype, mp2type, gsispremtype, gsismpltype, gsisgfaltype, ploantype, cloantype, eloantype, comploantype, 
    educloantype, consoloantype, lbptype, pnbtype, ssstype, othersadd, othersless, othersaddvalue, otherstype, otherslessvalue, gsisecard_, gsisecardtype) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssssssss", $txt_employee, $txt_daterange, $txt_month, $txt_purpose, $txt_gross, $txt_rata, $txt_esr, $txt_pera, $txt_phihealth, $txt_wholdtax, $txt_pagibig, $txt_mpl, $txt_mp2, $txt_gsisprem, 
        $txt_gsismpl, $txt_gsisgfal, $txt_ploan, $txt_cloan, $txt_eloan, $txt_comploan, $txt_educloan, $txt_consoloan, $txt_lbp, $txt_pnb, $txt_sss, $phihealthtype, $wholdtaxtype, $pagibigtype
        , $mpltype, $mp2type, $gsispremtype, $gsismpltype, $gsisgfaltype, $ploantype, $cloantype, $eloantype, $comploantype, $educloantype, $consoloantype
        , $lbptype, $pnbtype, $ssstype, $txt_othersadd, $txt_othersless, $txt_othersaddvalue, $otherstype, $txt_otherslessvalue, $txt_gsisecard, $gsisecardtype);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            // Output JavaScript to show the alert and redirect
            echo '<script>alert("Successfully added!"); window.location.href = "newentry.php";</script>';
            exit();
        } else {
            $_SESSION['duplicateuser'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }
}


// if (isset($_POST['btn_newpayslip'])) {
//     // Get the form data
//     $employee = $_POST['txt_employee'];
//     $daterange = $_POST['txt_daterange'];
//     $purpose = $_POST['txt_purpose'];
//     $month = $_POST['txt_month'];
//     $grosspay = $_POST['txt_gross'];
//     $esr = $_POST['txt_esr'];
//     $pera = $_POST['txt_pera'];
//     $phihealth = $_POST['txt_phihealth'];
//     $wholdtax = $_POST['txt_wholdtax'];
//     $pagibig = $_POST['txt_pagibig'];
//     $mpl = $_POST['txt_mpl'];
//     $mp2 = $_POST['txt_mp2'];
//     $gsisprem = $_POST['txt_gsisprem'];
//     $gsismpl = $_POST['txt_gsismpl'];
//     $gsisgfal = $_POST['txt_gsisgfal'];
//     $ploan = $_POST['txt_ploan'];
//     $cloan = $_POST['txt_cloan'];
//     $eloan = $_POST['txt_eloan'];
//     $comploan = $_POST['txt_comploan'];
//     $educloan = $_POST['txt_educloan'];
//     $consoloan = $_POST['txt_consoloan'];
//     $lbp = $_POST['txt_lbp'];
//     $pnb = $_POST['txt_pnb'];
//     $sss = $_POST['txt_sss'];

//     // Perform any necessary validation here
//     // Assuming you have already established a database connection
//     // and have a variable $conn representing the connection
//     // Replace 'your_table_name' with the actual table name in your database

//     $sql = "INSERT INTO tbl_payroll (employee, daterange, purpose, month_, grosspay, esr, pera, phihealth, wholdtax, pagibig, mpl, mp2, gsisprem, gsismpl, gsisgfal, ploan, cloan, eloan, comploan, educloan, consoloan, lbp, pnb, sss, phihealthtype, wholdtaxtype, pagibigtype, mpltype, mp2type, gsispremtype, gsismpltype, gsisgfaltype, ploantype, cloantype, eloantype, comploantype, 
//     educloantype, consoloantype, lbptype, pnbtype, ssstype) 
//     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

//     $stmt = $con->prepare($sql);

//     // Bind parameters to prevent SQL injection
//     $stmt->bind_param(
//         "ssssssssssssssssssssssssssssssssssssssssss",
//         $employee,
//         $daterange,
//         $purpose,
//         $month,
//         $grosspay,
//         $esr,
//         $pera,
//         $phihealth,
//         $wholdtax,
//         $pagibig,
//         $mpl,
//         $mp2,
//         $gsisprem,
//         $gsismpl,
//         $gsisgfal,
//         $ploan,
//         $cloan,
//         $eloan,
//         $comploan,
//         $educloan,
//         $consoloan,
//         $lbp,
//         $pnb,
//         $sss
//     );
//     // Execute the prepared statement
//     if ($stmt->execute()) {
//         // Insertion successful
//         $_SESSION['added'] = 1;
//         header("location: " . $_SERVER['REQUEST_URI']);
//         exit();
//         } else {
//         // Insertion failed
//         echo "Error: " . $stmt->error;
//     }

//     // Close the statement and connection
//     $stmt->close();
//     $con->close();
// }
if (isset($_POST['btn_newpayslip'])) {
    $txt_employee = $_POST['txt_employee'];
    $txt_daterange = $_POST['txt_daterange'];
    $txt_purpose = $_POST['txt_purpose'];
    $txt_month = $_POST['txt_month'];
    $txt_gross = $_POST['txt_gross'];
    $txt_esr = $_POST['txt_esr'];
    $txt_rata = $_POST['txt_rata'];
    $txt_pera = $_POST['txt_pera'];

    $txt_othersadd = $_POST['txt_othersadd'];
    $txt_othersaddvalue = $_POST['txt_othersaddvalue'];

    $txt_phihealth = $_POST['txt_phihealth'];
    $phihealthtype = isset($_POST['chk_phihealth']) ? 'add' : '';

    $txt_wholdtax = $_POST['txt_wholdtax'];
    $wholdtaxtype = isset($_POST['chk_wholdtax']) ? 'add' : '';

    $txt_pagibig = $_POST['txt_pagibig'];
    $pagibigtype = isset($_POST['chk_pagibig']) ? 'add' : '';

    $txt_mpl = $_POST['txt_mpl'];
    $mpltype = isset($_POST['chk_mpl']) ? 'add' : '';

    $txt_mp2 = $_POST['txt_mp2'];
    $mp2type = isset($_POST['chk_mp2']) ? 'add' : '';

    $txt_gsisprem = $_POST['txt_gsisprem'];
    $gsispremtype = isset($_POST['chk_gsisprem']) ? 'add' : '';

    $txt_gsismpl = $_POST['txt_gsismpl'];
    $gsismpltype = isset($_POST['chk_gsismpl']) ? 'add' : '';

    $txt_gsisgfal = $_POST['txt_gsisgfal'];
    $gsisgfaltype = isset($_POST['chk_gsisgfal']) ? 'add' : '';

    $txt_gsisecard = $_POST['txt_gsisecard'];
    $gsisecardtype = isset($_POST['chk_gsisecard']) ? 'add' : '';

    $txt_ploan = $_POST['txt_ploan'];
    $ploantype = isset($_POST['chk_ploan']) ? 'add' : '';

    $txt_cloan = $_POST['txt_cloan'];
    $cloantype = isset($_POST['chk_cloan']) ? 'add' : '';

    $txt_eloan = $_POST['txt_eloan'];
    $eloantype = isset($_POST['chk_eloan']) ? 'add' : '';

    $txt_comploan = $_POST['txt_comploan'];
    $comploantype = isset($_POST['chk_comploan']) ? 'add' : '';

    $txt_educloan = $_POST['txt_educloan'];
    $educloantype = isset($_POST['chk_educloan']) ? 'add' : '';

    $txt_consoloan = $_POST['txt_consoloan'];
    $consoloantype = isset($_POST['chk_consoloan']) ? 'add' : '';

    $txt_lbp = $_POST['txt_lbp'];
    $lbptype = isset($_POST['chk_lbp']) ? 'add' : '';

    $txt_pnb = $_POST['txt_pnb'];
    $pnbtype = isset($_POST['chk_pnb']) ? 'add' : '';

    $txt_sss = $_POST['txt_sss'];
    $ssstype = isset($_POST['chk_sss']) ? 'add' : '';

    $txt_othersless = $_POST['txt_othersless'];

    $txt_otherslessvalue = $_POST['txt_otherslessvalue'];
    $otherstype = isset($_POST['chk_lessvalue']) ? 'add' : '';

    // Prepare the query using prepared statements
    $query = "INSERT INTO tbl_payroll (employee, daterange, month_, purpose, grosspay, rata, esr, pera, phihealth, wholdtax, pagibig, mpl, mp2, gsisprem, gsismpl, gsisgfal, ploan, cloan, eloan, comploan, educloan, consoloan, lbp, pnb, sss
    , phihealthtype, wholdtaxtype, pagibigtype, mpltype, mp2type, gsispremtype, gsismpltype, gsisgfaltype, ploantype, cloantype, eloantype, comploantype, 
    educloantype, consoloantype, lbptype, pnbtype, ssstype, othersadd, othersless, othersaddvalue, otherstype, otherslessvalue, gsisecard_, gsisecardtype) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssssssssssssssssssssssssss", $txt_employee, $txt_daterange, $txt_month, $txt_purpose, $txt_gross, $txt_rata, $txt_esr, $txt_pera, $txt_phihealth, $txt_wholdtax, $txt_pagibig, $txt_mpl, $txt_mp2, $txt_gsisprem, 
        $txt_gsismpl, $txt_gsisgfal, $txt_ploan, $txt_cloan, $txt_eloan, $txt_comploan, $txt_educloan, $txt_consoloan, $txt_lbp, $txt_pnb, $txt_sss, $phihealthtype, $wholdtaxtype, $pagibigtype
        , $mpltype, $mp2type, $gsispremtype, $gsismpltype, $gsisgfaltype, $ploantype, $cloantype, $eloantype, $comploantype, $educloantype, $consoloantype
        , $lbptype, $pnbtype, $ssstype, $txt_othersadd, $txt_othersless, $txt_othersaddvalue, $otherstype, $txt_otherslessvalue, $txt_gsisecard, $gsisecardtype);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['duplicateuser'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }
}

if (isset($_POST['btn_addrange'])) {
    $txt_range = $_POST['txt_range'];

    // Prepare the query using prepared statements
    $query = "INSERT INTO tbl_range (range_) 
              VALUES (?)";
    $stmt = mysqli_prepare($con, $query);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "s", $txt_range);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['duplicateuser'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }
}


if(isset($_POST['btn_save'])){
    // Get and sanitize the values from the form
    $id = mysqli_real_escape_string($con, $_POST['hidden_id']);
    $txt_edit_fname = mysqli_real_escape_string($con, $_POST['txt_edit_fname']);
    $txt_edit_mname = mysqli_real_escape_string($con, $_POST['txt_edit_mname']);
    $txt_edit_lname = mysqli_real_escape_string($con, $_POST['txt_edit_lname']);
    $txt_edit_suffix = mysqli_real_escape_string($con, $_POST['txt_edit_suffix']);
    $txt_edit_bdate = mysqli_real_escape_string($con, $_POST['txt_edit_bdate']);
    $txt_edit_pbirth = mysqli_real_escape_string($con, $_POST['txt_edit_pbirth']);
    $txt_edit_sex = mysqli_real_escape_string($con, $_POST['txt_edit_sex']);
    $txt_edit_cstatus = mysqli_real_escape_string($con, $_POST['txt_edit_cstatus']);
    $txt_edit_height = mysqli_real_escape_string($con, $_POST['txt_edit_height']);
    $txt_edit_weight = mysqli_real_escape_string($con, $_POST['txt_edit_weight']);
    $txt_edit_btype = mysqli_real_escape_string($con, $_POST['txt_edit_btype']);
    $txt_edit_cship = mysqli_real_escape_string($con, $_POST['txt_edit_cship']);
    $txt_edit_raddress = mysqli_real_escape_string($con, $_POST['txt_edit_raddress']);
    $txt_edit_gsisno = mysqli_real_escape_string($con, $_POST['txt_edit_gsisno']);
    $txt_edit_pagibigno = mysqli_real_escape_string($con, $_POST['txt_edit_pagibigno']);
    $txt_edit_philhealthno = mysqli_real_escape_string($con, $_POST['txt_edit_philhealthno']);
    $txt_edit_sssno = mysqli_real_escape_string($con, $_POST['txt_edit_sssno']);
    $txt_edit_tinno = mysqli_real_escape_string($con, $_POST['txt_edit_tinno']);
    $txt_edit_mobileno = mysqli_real_escape_string($con, $_POST['txt_edit_mobileno']);
    $txt_edit_email = mysqli_real_escape_string($con, $_POST['txt_edit_email']);
    $txt_edit_spouselname = mysqli_real_escape_string($con, $_POST['txt_edit_spouselname']);
    $txt_edit_spousefname = mysqli_real_escape_string($con, $_POST['txt_edit_spousefname']);
    $txt_edit_spousemname = mysqli_real_escape_string($con, $_POST['txt_edit_spousemname']);
    $txt_edit_child1 = mysqli_real_escape_string($con, $_POST['txt_edit_child1']);
    $txt_edit_child2 = mysqli_real_escape_string($con, $_POST['txt_edit_child2']);
    $txt_edit_child3 = mysqli_real_escape_string($con, $_POST['txt_edit_child3']);
    $txt_edit_child4 = mysqli_real_escape_string($con, $_POST['txt_edit_child4']);
    $txt_edit_child5 = mysqli_real_escape_string($con, $_POST['txt_edit_child5']);

    // // Image upload handling
    // $txt_edit_image = $_FILES['txt_edit_image']['name'];
    // $target_dir = "picture/";
    // $target_file = $target_dir . basename($_FILES['txt_edit_image']['name']);
    // move_uploaded_file($_FILES['txt_edit_image']['tmp_name'], $target_file);

    // Validate and sanitize the values
    // ...

    // Update the record in the database using prepared statements
    $query = "UPDATE tbl_employee SET fname=?, mname=?, lname=?, suffix=?, bdate=?, pbirth=?, sex=?, cstatus=?, height=?, weight=?, btype=?, cship=?, 
    raddress=?, gsisno=?, pagibigno=?, philhealthno=?, sssno=?, tinno=?, mobileno=?, email=?, spouselname=?, spousefname=?, spousemname=?, child1=?,
    child2=?, child3=?, child4=?, child5=? WHERE oid=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssi", $txt_edit_fname, $txt_edit_mname, $txt_edit_lname, $txt_edit_suffix, $txt_edit_bdate,
     $txt_edit_pbirth, $txt_edit_sex, $txt_edit_cstatus,  $txt_edit_height,  $txt_edit_weight, $txt_edit_btype, $txt_edit_cship, $txt_edit_raddress, $txt_edit_gsisno,
     $txt_edit_pagibigno, $txt_edit_philhealthno, $txt_edit_sssno, $txt_edit_tinno, $txt_edit_mobileno, $txt_edit_email,  $txt_edit_spouselname, 
     $txt_edit_spousefname, $txt_edit_spousemname, $txt_edit_child1, $txt_edit_child2, $txt_edit_child3, $txt_edit_child4, $txt_edit_child5, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['added'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_savepicture'])){
    // Get and sanitize the values from the form
    $id = mysqli_real_escape_string($con, $_POST['hidden_id']);
   

    // Image upload handling
    $txt_edit_image = $_FILES['txt_edit_image']['name'];
    $target_dir = "picture/";
    $target_file = $target_dir . basename($_FILES['txt_edit_image']['name']);
    move_uploaded_file($_FILES['txt_edit_image']['tmp_name'], $target_file);

    // Validate and sanitize the values
    // ...

    // Update the record in the database using prepared statements
    $query = "UPDATE tbl_employee SET image=? WHERE oid=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "si", $txt_edit_image, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $_SESSION['added'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    } else {
        $_SESSION['duplicateuser'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}


if(isset($_POST['btn_editpayslip'])){
    // get the values from the form
    $id = $_POST['hidden_id'];
    $txt_edit_month = $_POST['txt_edit_month'];
    $txt_edit_purpose = $_POST['txt_edit_purpose'];
    $txt_edit_gross = $_POST['txt_edit_gross'];
    $txt_edit_rata = $_POST['txt_edit_rata'];
    $txt_edit_pera = $_POST['txt_edit_pera'];

    $txt_edit_othersadd = $_POST['txt_edit_othersadd'];
    $txt_edit_othersaddvalue = $_POST['txt_edit_othersaddvalue'];

    $txt_edit_phihealth = $_POST['txt_edit_phihealth'];
    $txt_edit_wholdtax = $_POST['txt_edit_wholdtax'];
    $txt_edit_pagibig = $_POST['txt_edit_pagibig'];
    $txt_edit_mpl = $_POST['txt_edit_mpl'];
    $txt_edit_mp2 = $_POST['txt_edit_mp2'];
    $txt_edit_gsisprem = $_POST['txt_edit_gsisprem'];
    $txt_edit_gsismpl = $_POST['txt_edit_gsismpl'];
    $txt_edit_gsisgfal = $_POST['txt_edit_gsisgfal'];

    $txt_edit_gsisecard = $_POST['txt_edit_gsisecard'];

    $txt_edit_ploan = $_POST['txt_edit_ploan'];
    $txt_edit_cloan = $_POST['txt_edit_cloan'];
    $txt_edit_eloan = $_POST['txt_edit_eloan'];
    $txt_edit_comploan = $_POST['txt_edit_comploan'];
    $txt_edit_educloan = $_POST['txt_edit_educloan'];
    $txt_edit_consoloan = $_POST['txt_edit_consoloan'];
    $txt_edit_lbp = $_POST['txt_edit_lbp'];
    $txt_edit_pnb = $_POST['txt_edit_pnb'];
    $txt_edit_sss = $_POST['txt_edit_sss'];
    
    $txt_edit_othersless = $_POST['txt_edit_othersless'];
    $txt_edit_otherslessvalue = $_POST['txt_edit_otherslessvalue'];

    $txt_edit_employee = $_POST['txt_edit_employee'];
    $txt_edit_daterange = $_POST['txt_edit_daterange'];
 
    // update the record in the database
    $query = "UPDATE tbl_payroll SET 
    employee='$txt_edit_employee',
    month_='$txt_edit_month',
    purpose='$txt_edit_purpose',
    daterange='$txt_edit_daterange',
    grosspay='$txt_edit_gross',
    rata='$txt_edit_rata',
    pera='$txt_edit_pera',
    othersadd='$txt_edit_othersadd',
    othersaddvalue='$txt_edit_othersaddvalue',
    phihealth='$txt_edit_phihealth',
    wholdtax='$txt_edit_wholdtax',
    pagibig='$txt_edit_pagibig',
    mpl='$txt_edit_mpl',
    mp2='$txt_edit_mp2',
    gsisprem='$txt_edit_gsisprem',
    gsismpl='$txt_edit_gsismpl',
    gsisgfal='$txt_edit_gsisgfal',
    gsisecard_='$txt_edit_gsisecard',
    ploan='$txt_edit_ploan',
    cloan='$txt_edit_cloan',
    eloan='$txt_edit_eloan',
    comploan='$txt_edit_comploan',
    educloan='$txt_edit_educloan',
    consoloan='$txt_edit_consoloan',
    lbp='$txt_edit_lbp',
    pnb='$txt_edit_pnb',
    sss='$txt_edit_sss',
    othersless='$txt_edit_othersless',
    otherslessvalue='$txt_edit_otherslessvalue'
WHERE oid='$id'";

$result = mysqli_query($con, $query);

if ($result == true) {
    $_SESSION['added'] = 1;
    header("location: " . $_SERVER['REQUEST_URI']);
} else {
    $_SESSION['duplicateuser'] = 1;
    header("location: " . $_SERVER['REQUEST_URI']);
}
}



if(isset($_POST['btn_editpayroll'])){
    // get the values from the form
    $id = $_POST['hidden_id'];
    $txt_edit_month = $_POST['txt_edit_month'];
    $txt_edit_purpose = $_POST['txt_edit_purpose'];
    $txt_edit_gross = $_POST['txt_edit_gross'];
    $txt_edit_rata = $_POST['txt_edit_rata'];
    $txt_edit_pera = $_POST['txt_edit_pera'];

    $txt_edit_othersadd = $_POST['txt_edit_othersadd'];
    $txt_edit_othersaddvalue = $_POST['txt_edit_othersaddvalue'];

    $txt_edit_phihealth = $_POST['txt_edit_phihealth'];
    $txt_edit_wholdtax = $_POST['txt_edit_wholdtax'];
    $txt_edit_pagibig = $_POST['txt_edit_pagibig'];
    $txt_edit_mpl = $_POST['txt_edit_mpl'];
    $txt_edit_mp2 = $_POST['txt_edit_mp2'];
    $txt_edit_gsisprem = $_POST['txt_edit_gsisprem'];
    $txt_edit_gsismpl = $_POST['txt_edit_gsismpl'];
    $txt_edit_gsisgfal = $_POST['txt_edit_gsisgfal'];

    $txt_edit_gsisecard = $_POST['txt_edit_gsisecard'];

    $txt_edit_ploan = $_POST['txt_edit_ploan'];
    $txt_edit_cloan = $_POST['txt_edit_cloan'];
    $txt_edit_eloan = $_POST['txt_edit_eloan'];
    $txt_edit_comploan = $_POST['txt_edit_comploan'];
    $txt_edit_educloan = $_POST['txt_edit_educloan'];
    $txt_edit_consoloan = $_POST['txt_edit_consoloan'];
    $txt_edit_lbp = $_POST['txt_edit_lbp'];
    $txt_edit_pnb = $_POST['txt_edit_pnb'];
    
    $txt_edit_othersless = $_POST['txt_edit_othersless'];
    $txt_edit_otherslessvalue = $_POST['txt_edit_otherslessvalue'];

    $txt_edit_employee = $_POST['txt_edit_employee'];
    $txt_edit_daterange = $_POST['txt_edit_daterange'];
 
    // update the record in the database
    $query = "UPDATE tbl_payroll SET 
    employee='$txt_edit_employee',
    month_='$txt_edit_month',
    purpose='$txt_edit_purpose',
    daterange='$txt_edit_daterange',
    grosspay='$txt_edit_gross',
    rata='$txt_edit_rata',
    pera='$txt_edit_pera',
    othersadd='$txt_edit_othersadd',
    othersaddvalue='$txt_edit_othersaddvalue',
    phihealth='$txt_edit_phihealth',
    wholdtax='$txt_edit_wholdtax',
    pagibig='$txt_edit_pagibig',
    mpl='$txt_edit_mpl',
    mp2='$txt_edit_mp2',
    gsisprem='$txt_edit_gsisprem',
    gsismpl='$txt_edit_gsismpl',
    gsisgfal='$txt_edit_gsisgfal',
    gsisecard_='$txt_edit_gsisecard',
    ploan='$txt_edit_ploan',
    cloan='$txt_edit_cloan',
    eloan='$txt_edit_eloan',
    comploan='$txt_edit_comploan',
    educloan='$txt_edit_educloan',
    consoloan='$txt_edit_consoloan',
    lbp='$txt_edit_lbp',
    pnb='$txt_edit_pnb',
    othersless='$txt_edit_othersless',
    otherslessvalue='$txt_edit_otherslessvalue'
WHERE oid='$id'";

$result = mysqli_query($con, $query);

if ($result == true) {
    $_SESSION['added'] = 1;
    echo "<script>
            alert('Payslip information updated successfully.');
            window.location.href = 'editpayslippage.php';
          </script>";
} else {
    $_SESSION['duplicateuser'] = 1;
    header("location: " . $_SERVER['REQUEST_URI']);
}
}




if(isset($_POST['btn_range'])){
    // get the values from the form
    $id = $_POST['hidden_id'];
    $txt_edit_range = $_POST['txt_edit_range'];
    // validate the values
    // ...
    // update the record in the database
    $query = "UPDATE tbl_range SET range_='$txt_edit_range' WHERE oid='$id'";
    $result = mysqli_query($con, $query);

    if ($result == true) {
        $_SESSION['added'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
 else {
    $_SESSION['duplicateuser'] = 1;
    header("location: " . $_SERVER['REQUEST_URI']);
}
}

if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            $delete_query = mysqli_query($con, "DELETE from tbl_employee where oid = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}

if (isset($_POST['btn_deleterange'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            $delete_query = mysqli_query($con, "DELETE from tbl_range where oid = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}


if (isset($_POST['btn_deletepayslip']) && isset($_POST['chk_delete'])) {
    foreach ($_POST['chk_delete'] as $value) {
        // Sanitize the input to prevent SQL injection
        $safe_value = mysqli_real_escape_string($con, $value);

        $delete_query = mysqli_query($con, "DELETE from tbl_payroll where oid = '$safe_value' ") or die('Error: ' . mysqli_error($con));

        if ($delete_query) {
            $_SESSION['delete'] = 1;
        } else {
            $_SESSION['delete'] = 0;
        }
    }
    header("location: " . $_SERVER['REQUEST_URI']);
}

// add function for Casual employee

if (isset($_POST['btn_casualemp'])) {
    $txt_employee = $_POST['txt_employee'];
    $txt_dob = $_POST['txt_dob'];
    $txt_sex = $_POST['txt_sex'];
    $txt_cs_eligibility = $_POST['txt_cs_eligibility'];
    $txt_work_status = $_POST['txt_work_status'];
    $txt_years_of_service = $_POST['txt_years_of_service'];
    $txt_nature_of_work = $_POST['txt_nature_of_work'];
    $txt_status = $_POST['txt_status'];

    // Prepare the query using prepared statements
    $query = "INSERT INTO tbl_casual (employee, dob, sex, level_cs, work_status, year_service, nature_work, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);

    // Check if the statement preparation was successful
    if ($stmt) {
        // Bind parameters to the prepared statement
        mysqli_stmt_bind_param($stmt, "ssssssss", $txt_employee, $txt_dob, $txt_sex, $txt_cs_eligibility, $txt_work_status, $txt_years_of_service, $txt_nature_of_work, $txt_status);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $_SESSION['added'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        } else {
            $_SESSION['duplicateuser'] = 1;
            header("location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    } else {
        die("Statement preparation failed: " . mysqli_error($con));
    }
}
