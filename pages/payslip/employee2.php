<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="path/to/select2.min.js"></script>
</head>
<style>
    .box .box-body {
        padding: 0px !important;
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
                            Edit Employee
                        </h1>
                    </section>
                    <!-- left column -->
                    <div class="box">
                        <div class="box-header">
                            <div style="padding:10px;">

                                <form method="post" action="editemployee2.php"> <!-- Updated the action attribute -->

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="form-group">
                                                    <label>Employee:</label>
                                                    <select name="txt_employee" id="txt_employee" class="form-control input-sm select2">
                                                        <option value="" disabled selected> Select Employee</option>
                                                        <?php
                                                        // Assuming $con is the MySQLi database connection variable
                                                        $result = mysqli_query($con, "SELECT oid, fname, mname, lname, suffix FROM tbl_employee ORDER by lname");
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            $fullName = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['suffix'] . ' ' . $row['mname'];
                                                            echo '<option value="' . $row['oid'] . '">' . $fullName . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
                                    </div>

                                </form>
                            </div>

                        </div>



                        <!-- /.box-header -->

                    </div><!-- /.box -->

                    <!-- /.box -->


                </section><!-- /.content -->



            <?php } ?>
        <?php }
    include "../footer.php"; ?>

        <script type="text/javascript">
                        //search
                        $(document).ready(function() {
                $('.select2').select2();
            });

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