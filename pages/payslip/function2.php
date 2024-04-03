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

    $txt_edit_empno = mysqli_real_escape_string($con, $_POST['txt_edit_empno']);
    $txt_edit_empstatus = mysqli_real_escape_string($con, $_POST['txt_edit_empstatus']);
    $txt_edit_emeaddress = mysqli_real_escape_string($con, $_POST['txt_edit_emeaddress']);
    $txt_edit_emecontact = mysqli_real_escape_string($con, $_POST['txt_edit_emecontact']);
        // Check if civil status is "Others"
        if ($txt_edit_cstatus === 'Others') {
            // Use the value from the text input for civil status
            $txt_edit_cstatus = mysqli_real_escape_string($con, $_POST['txt_edit_other_cstatus']);
        }
    // Update the record in the database using prepared statements
    $query = "UPDATE tbl_employee SET fname=?, mname=?, lname=?, suffix=?, bdate=?, pbirth=?, sex=?, cstatus=?, height=?, weight=?, btype=?, cship=?, 
    raddress=?, gsisno=?, pagibigno=?, philhealthno=?, sssno=?, tinno=?, mobileno=?, email=?, spouselname=?, spousefname=?, spousemname=?, child1=?,
    child2=?, child3=?, child4=?, child5=?, empno=?, empstatus=?, emeaddress=?, emecontact=?, editdate=NOW() WHERE oid=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssi", $txt_edit_fname, $txt_edit_mname, $txt_edit_lname, $txt_edit_suffix, $txt_edit_bdate,
     $txt_edit_pbirth, $txt_edit_sex, $txt_edit_cstatus,  $txt_edit_height,  $txt_edit_weight, $txt_edit_btype, $txt_edit_cship, $txt_edit_raddress, $txt_edit_gsisno,
     $txt_edit_pagibigno, $txt_edit_philhealthno, $txt_edit_sssno, $txt_edit_tinno, $txt_edit_mobileno, $txt_edit_email,  $txt_edit_spouselname, 
     $txt_edit_spousefname, $txt_edit_spousemname, $txt_edit_child1, $txt_edit_child2, $txt_edit_child3, $txt_edit_child4, $txt_edit_child5, $txt_edit_empno,
     $txt_edit_empstatus, $txt_edit_emeaddress, $txt_edit_emecontact, $id);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<script>alert("Successfully updated the employee\'s information");';
        echo 'window.location.href = "employee2.php";</script>';
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
