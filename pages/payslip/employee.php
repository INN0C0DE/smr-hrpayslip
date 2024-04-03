<!DOCTYPE html>
<html>
<link rel="icon" href="../../assets/Images/seal.png">
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
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

            <style>
                .sider {
                    top: 70px;
                    margin: 0;
                    padding: 0;
                    width: 200px;
                    background-color: #f1f1f1;
                    position: fixed;
                    height: 100%;
                    overflow: auto;
                    background-color: white;
                    position: fixed;
                    background: rgb(0, 72, 171);
                    background: linear-gradient(180deg, rgba(0, 72, 171, 1) 0%, rgba(0, 174, 239, 1) 65%, rgba(255, 255, 255, 1) 97%);
                    z-index: 999;

                }

                .glyphicon {
                    margin-right: 8px;
                }

                .admin__nav {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    background: #0048ab;
                    height: 70px;
                    position: fixed;
                    width: 100%;
                    z-index: 999;

                }


                .admin__nav .dropdown {
                    display: none;
                    position: absolute;
                    z-index: 1;
                    color: #0048ab;
                    background-color: white;
                    width: 140px;

                }

                .admin__nav li:hover .dropdown {
                    display: block;
                }

                .admin__nav .dropdown li {
                    display: block;
                }

                .logout {
                    font-weight: bold;
                }

                .admin__img--wrapper {
                    margin-left: 24px;
                }

                .admin__img {
                    width: 300px;
                }

                .admin__lists {
                    margin-right: 48px;
                }

                .admin__list {
                    list-style-type: none;
                    color: #fff;
                    font-size: 20px;
                }

                .sider a {
                    display: block;
                    color: black;
                    padding: 16px;
                    text-decoration: none;
                    font-size: 18px;
                    font-weight: bold;
                    color: white;
                }

                .sider a.active {
                    background-color: #04AA6D;
                    color: white;
                }

                .sider a:hover:not(.active) {
                    background-color: #f9ea5f;
                    color: #0048ab;
                }

                div.content {
                    margin-left: 200px;
                    padding: 1px 16px;
                    height: 1920px;
                    padding-top: 60px;

                }

                @media screen and (max-width: 700px) {
                    .sider {
                        width: 100%;
                        height: auto;
                        position: relative;
                    }

                    .sider a {
                        float: left;
                    }

                    div.content {
                        margin-left: 0;
                    }
                }

                @media screen and (max-width: 400px) {
                    .sider a {
                        text-align: center;
                        float: none;
                    }
                }
            </style>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
            <link rel="stylesheet" href="styles.css" />


            <!-- <div class="sider">
                    <a class="sidetop" href="home.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> ENCODE</a>
                    <a href="views.php"><i class="fa fa-eye" aria-hidden="true"></i> VIEWED</a>
                </div> -->
            <?php include "sidebar.php"; ?>

            <div class="content">


                <!-- encoder content -->
                <section class="content">
                    <br>
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Employees
                        </h1>
                    </section>

                    <!-- left column -->
                    <div class="box">
                        <div class="box-header">
                        <div style="padding:10px;">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-square" aria-hidden="true"></i> Add Employee</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                        </div>

                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <form method="post">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px !important;"><input type="checkbox" name="chk_delete[]" class="cbxMain" onchange="checkMain(this)" /></th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Details</th>
                                    </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $squery = mysqli_query($con, "SELECT oid,fname,mname,lname,suffix,image, bdate, pbirth, sex, cstatus, height, weight, 
                                        btype, cship, raddress, gsisno, pagibigno, philhealthno, sssno, tinno, mobileno, email, spouselname, spousefname, spousemname, child1, child2, child3, 
                                        child4, child5, empno, empstatus, emeaddress, emecontact, editdate FROM tbl_employee");
                                        while ($row = mysqli_fetch_array($squery)) {
                                            $originalDate = $row['editdate'];
                                                    if ($originalDate !== null) {
                                                        $newDateFormat = date('F j, Y g:ia', strtotime($originalDate));
                                                    } else {
                                                        $newDateFormat = 'N/A';
                                                    }    
                                            echo '
                                                <tr>
                                                
                                                <td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['oid'] . '" /></td>

                                                <td style="width:70px;">
                                                <a href="#" class="image-preview-link" data-image="' . ($row['image'] ? basename($row['image']) : 'default.jpg') . '">
                                                    <img src="picture/' . ($row['image'] ? basename($row['image']) : 'default.jpg') . '" style="width:2.1in;height:3in;" />
                                                </a>
                                            </td>
                                                    <td>' . $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'] . ' ' . $row['suffix'] . '</td>
                                                    <td>                                                    
                                                    <button class="btn btn-primary btn-sm" data-target="#detailsemployee' . $row['oid'] . '" data-toggle="modal"><i class="fa fa-plus-square" aria-hidden="true"></i> Details</button>                                                     </td>


                                                </tr>
                                                ';
                                            //     include "editpicture.php";

                                            // include "editemployee.php";

                                            include "detailsemployee.php";
                                        }
                                        ?>
                                    <!-- </tbody> -->
                                </table>

                                <?php include "deleteModal.php"; ?>

                            </form>
                        </div><!-- /.box-body -->

                    </div><!-- /.box -->

                    <?php include "add_employee.php"; ?>

                    <?php include "function2.php"; ?>

                </section><!-- /.content -->

            </div> <!-- /.row -->

            <!-- HTML structure for the modal -->
            <div id="imageModal" class="modal">
                <span class="close" id="closeModal">&times;</span>
                <img class="modal-content" id="modalImage">
            </div>

        <?php } ?>

    <?php }
include "../footer.php"; ?>
    <script type="text/javascript">
        $(function() {
            $("#table").dataTable({
                "aoColumnDefs": [{
                    "bSortable": false,
                    "aTargets": [0]
                }],
                "aaSorting": []
            });
        });

        // JavaScript for modal behavior
        const modal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");
        const previewLinks = document.querySelectorAll(".image-preview-link");
        const closeModal = document.getElementById("closeModal");

        previewLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                const imageSrc = link.getAttribute("data-image");
                modalImage.src = "picture/" + imageSrc;
                modal.style.display = "flex"; // Use flex to center the modal
            });
        });

        closeModal.addEventListener("click", () => {
            modal.style.display = "none";
        });

        window.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                modal.style.display = "none";
            }
        });
    </script>
    </body>

</html>