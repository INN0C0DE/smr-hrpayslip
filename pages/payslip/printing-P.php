<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="path/to/s2.min.js"></script>
</head>
<style>
    .box .box-body{
        padding:0px !important;
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
                           For Printing
                        </h1>
                    </section>
                    <!-- left column -->
                    <div class="box">
                        <div class="box-header">
                            <div style="padding:10px;">
                                

                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sprint"><i class="fa fa-print" aria-hidden="true"></i> Print Monthly</button>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sprintyear"><i class="fa fa-print" aria-hidden="true"></i> Print Year</button>
                                <!-- Button to print sed checkboxes -->
                                <!-- Button to trigger the printing of sed payslips -->

                            </div>                    
                                        <?php include "selectyear-P.php"; ?>
                        </div>

                        <!-- /.box-header -->
                     
                      
                            <script>
                                function printCertificate(permitId) {
                                    var printContent = document.getElementById('print-content-certificate-' + permitId).innerHTML;
                                    var originalContent = document.body.innerHTML;
                                    document.body.innerHTML = printContent;
                                    window.print();
                                    document.body.innerHTML = originalContent;
                                }

                                function printFiling(permitId) {
                                    var printContent = document.getElementById('print-content-filing-' + permitId).innerHTML;
                                    var originalContent = document.body.innerHTML;
                                    document.body.innerHTML = printContent;
                                    window.print();
                                    document.body.innerHTML = originalContent;
                                }
                                <?php
                                while ($row = mysqli_fetch_array($squery)) {
                                    echo 'document.getElementById("print-btn-certificate-' . $row['oid'] . '").addEventListener("click", function() { printCertificate(' . $row['oid'] . '); });';
                                    echo 'document.getElementById("print-btn-filing-' . $row['oid'] . '").addEventListener("click", function() { printFiling(' . $row['oid'] . '); });';
                                }
                                ?>
                            </script>

                    
                    </div><!-- /.box -->
                        <?php include "select-P.php"; ?>

                   <!-- /.box -->

                </section><!-- /.content -->
                


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