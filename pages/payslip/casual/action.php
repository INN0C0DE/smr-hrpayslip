<?php
session_start();
//action.php

include('function_mod.php');

if(isset($_POST["action"]))
{
    if($_POST["action"] == 'Add' || $_POST["action"] == 'Update')
    {
        $output = array();

        // Server-side validation to check if any required fields are empty
        $requiredFields = array("employee", "dob", "sex", "level_cs", "work_status", "year_service", "nature_work", "specified_work", "active_status");
        foreach($requiredFields as $field) {
            if(empty($_POST[$field])) {
                $output['error'] = 'Please fill in all required fields.';
                echo json_encode($output);
                exit; // Stop further processing
            }
        }

        // Proceed with processing the form data if all required fields are filled

        $employee = $_POST["employee"];
        $dob = $_POST["dob"];
        $sex = $_POST["sex"];
        $level_cs = $_POST["level_cs"];
        $work_status = $_POST["work_status"];
        $year_service = $_POST["year_service"];
        $nature_work = $_POST["nature_work"];
        $specified_work = $_POST["specified_work"];
        $active_status = $_POST["active_status"];

        $data = array(
            ':employee'        =>  $employee,
            ':dob'        =>  $dob,
            ':sex'        =>  $sex,
            ':level_cs'        =>  $level_cs,
            ':work_status'        =>  $work_status,
            ':year_service'        =>  $year_service,
            ':nature_work'        =>  $nature_work,
            ':specified_work'        =>  $specified_work,
            ':active_status'        =>  $active_status
        );

        if($_POST['action'] == 'Add')
        {
            $query = "INSERT INTO tbl_casual 
                    (employee, dob, sex, level_cs, work_status, year_service, nature_work, specified_work, active_status) 
            VALUES (:employee, :dob, :sex, :level_cs, :work_status, :year_service, :nature_work, :specified_work, :active_status )";

            $statement = $connect->prepare($query);

            if($statement->execute($data))
            {
                $output['success'] = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Item Added Successfully!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';

                echo json_encode($output);
            }
        }

        if($_POST['action'] == 'Update')
        {
            $query = "UPDATE tbl_casual 
            SET employee = :employee,
            dob = :dob,
            sex = :sex,
            level_cs = :level_cs,
            work_status = :work_status,
            year_service = :year_service,
            nature_work = :nature_work,
            specified_work = :specified_work,
            active_status = :active_status
            WHERE OID = '".$_POST["oid"]."'
            ";

            $statement = $connect->prepare($query);

            if($statement->execute($data))
            {
                $output['success'] = '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Updated Successfully!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';

                echo json_encode($output);
            }
        }
    }

    if($_POST['action'] == 'fetch')
    {
        $query = "SELECT * FROM tbl_casual 
        WHERE OID = '".$_POST["id"]."'
        ";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            $data['employee'] = $row['employee'];
            $data['dob'] = $row['dob'];
            $data['sex'] = $row['sex'];
            $data['level_cs'] = $row['level_cs'];
            $data['work_status'] = $row['work_status'];
            $data['year_service'] = $row['year_service'];
            $data['nature_work'] = $row['nature_work'];
            $data['specified_work'] = $row['specified_work'];
            $data['active_status'] = $row['active_status'];
        }

        echo json_encode($data);
    }

    if($_POST['action'] == 'delete')
    {
        $query = "SELECT * FROM tbl_casual WHERE OID = '".$_POST["id"]."'";
        $result = $connect->query($query);
        $data = array();

        $query = "DELETE FROM tbl_casual WHERE OID = '".$_POST["id"]."'";

        if($connect->query($query))
        {
            $output['success'] = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Deleted Successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>';

            echo json_encode($output);
        }
    }
}
?>
