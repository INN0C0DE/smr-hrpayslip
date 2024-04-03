

<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">
<?php
session_start();
?>

<head>
    <meta charset="UTF-8">
    <title>Payslip</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="logincss.css">
    <!-- Index css -->
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <!-- <div class="panel-heading" style="text-align:center;">
        <h3>
            Login
        </h3>
    </div> -->
   

    <img src="../../assets/Images/hrmobg.png" class="banner"alt="">
    <div class="panel-body">
        <form role="form" method="post">
            <div class="form-group">
                <input type="text" class="form-control" style="border-radius:0px" name="txt_username" >
                <label for="txt_username">Username</label>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" style="border-radius:0px" name="txt_password" >
                <label for="txt_password" class="password__label">Password</label>
            </div>
            <center><button  type="submit" class="btn" name="btn_login">Login<span></span></button></center>
            <label id="error" class="label label-danger pull-right"></label>
        </form>
    </div>


    <?php
    include "connection.php";
    if (isset($_POST['btn_login'])) {
        $username = $_POST['txt_username'];
        $password = $_POST['txt_password'];


        $admin = mysqli_query($con, "SELECT * from tbl_account where user = '$username' and pass = '$password' and acctype = 'admin' ");
        $numrow_admin = mysqli_num_rows($admin);


        if ($numrow_admin > 0) {
            while ($row = mysqli_fetch_array($admin)) {
                $_SESSION['role'] = "Admin";
                $_SESSION['userid'] = $row['id'];
                $_SESSION['Username'] = $row['Username'];
            }
            header('location: employee.php');


        } elseif ($numrow_APPROVER > 0) {
            while ($row = mysqli_fetch_array($APPROVER)) {
                $_SESSION['role'] = "APPROVER";
                $_SESSION['userid'] = $row['id'];
                $_SESSION['Username'] = $row['Username'];
            }
            header('location: home.php');

        } elseif ($numrow_head > 0) {
            while ($row = mysqli_fetch_array($head)) {
                $_SESSION['role'] = "Head";
                $_SESSION['userid'] = $row['id'];
                $_SESSION['Username'] = $row['Username'];
                $_SESSION['department'] = $row['department'];
                //echo '<script type="text/javascript">document.getElementById("error").innerHTML = "Invalid burat";</script>';
            }
            header('location: home.php');

            
        } else {
            echo '<script type="text/javascript">document.getElementById("error").innerHTML = "Invalid Account";</script>';
        }
    }

    ?>

</body>
