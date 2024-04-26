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
        $requiredFields = array(
            "organizational_unit",
            "item_number",
            "position_title",
            "salary_grade",
            "authorized_annual_salary",
            "actual_annual_salary",
            "step",
            "area_code",
            "area_type",
            "level",
            "employee_name",
            "permanent_sex",
            "permanent_dob",
            "tin",
            "date_original_appointment",
            "date_last_promotion",
            "permanent_status",
            "cs_eligibility",
            "permanent_comment"
        );
        foreach($requiredFields as $field) {
            if(empty($_POST[$field])) {
                $output['error'] = 'Please fill in all required fields.';
                echo json_encode($output);
                exit; // Stop further processing
            }
        }

        // Proceed with processing the form data if all required fields are filled

        $organizational_unit = $_POST["organizational_unit"];
        $item_number = $_POST["item_number"];
        $position_title = $_POST["position_title"];
        $salary_grade = $_POST["salary_grade"];
        $authorized_annual_salary = $_POST["authorized_annual_salary"];
        $actual_annual_salary = $_POST["actual_annual_salary"];
        $step = $_POST["step"];
        $area_code = $_POST["area_code"];
        $area_type = $_POST["area_type"];
        $level = $_POST["level"];
        $employee_name = $_POST["employee_name"];
        $permanent_sex = $_POST["permanent_sex"];
        $permanent_dob = $_POST["permanent_dob"];
        $tin = $_POST["tin"];
        $date_original_appointment = $_POST["date_original_appointment"];
        $date_last_promotion = $_POST["date_last_promotion"];
        $permanent_status = $_POST["permanent_status"];
        $cs_eligibility = $_POST["cs_eligibility"];
        $permanent_comment = $_POST["permanent_comment"];

        $data = array(
            ':organizational_unit' => $organizational_unit,
            ':item_number' => $item_number,
            ':position_title' => $position_title,
            ':salary_grade' => $salary_grade,
            ':authorized_annual_salary' => $authorized_annual_salary,
            ':actual_annual_salary' => $actual_annual_salary,
            ':step' => $step,
            ':area_code' => $area_code,
            ':area_type' => $area_type,
            ':level' => $level,
            ':employee_name' => $employee_name,
            ':permanent_sex' => $permanent_sex,
            ':permanent_dob' => $permanent_dob,
            ':tin' => $tin,
            ':date_original_appointment' => $date_original_appointment,
            ':date_last_promotion' => $date_last_promotion,
            ':permanent_status' => $permanent_status,
            ':cs_eligibility' => $cs_eligibility,
            ':permanent_comment' => $permanent_comment
        );

        if($_POST['action'] == 'Add')
        {
            $query = "INSERT INTO tbl_permanent
                        (organizational_unit, item_number, position_title, salary_grade, authorized_annual_salary, actual_annual_salary, step, area_code, area_type, level, employee_name, permanent_sex, permanent_dob, tin, date_original_appointment, date_last_promotion, permanent_status, cs_eligibility, permanent_comment) 
                      VALUES 
                        (:organizational_unit, :item_number, :position_title, :salary_grade, :authorized_annual_salary, :actual_annual_salary, :step, :area_code, :area_type, :level, :employee_name, :permanent_sex, :permanent_dob, :tin, :date_original_appointment, :date_last_promotion, :permanent_status, :cs_eligibility, :permanent_comment)";

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
            $query = "UPDATE tbl_permanent
                      SET 
                        organizational_unit = :organizational_unit,
                        item_number = :item_number,
                        position_title = :position_title,
                        salary_grade = :salary_grade,
                        authorized_annual_salary = :authorized_annual_salary,
                        actual_annual_salary = :actual_annual_salary,
                        step = :step,
                        area_code = :area_code,
                        area_type = :area_type,
                        level = :level,
                        employee_name = :employee_name,
                        permanent_sex = :permanent_sex,
                        permanent_dob = :permanent_dob,
                        tin = :tin,
                        date_original_appointment = :date_original_appointment,
                        date_last_promotion = :date_last_promotion,
                        permanent_status = :permanent_status,
                        cs_eligibility = :cs_eligibility,
                        permanent_comment = :permanent_comment
                      WHERE OID = '".$_POST["oid"]."'";

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
        $query = "SELECT * FROM tbl_permanent
                  WHERE OID = '".$_POST["id"]."'";

        $result = $connect->query($query);

        $data = array();

        foreach($result as $row)
        {
            $data['organizational_unit'] = $row['organizational_unit'];
            $data['item_number'] = $row['item_number'];
            $data['position_title'] = $row['position_title'];
            $data['salary_grade'] = $row['salary_grade'];
            $data['authorized_annual_salary'] = $row['authorized_annual_salary'];
            $data['actual_annual_salary'] = $row['actual_annual_salary'];
            $data['step'] = $row['step'];
            $data['area_code'] = $row['area_code'];
            $data['level'] = $row['level'];
            $data['employee_name'] = $row['employee_name'];
            $data['permanent_sex'] = $row['permanent_sex'];
            $data['permanent_dob'] = $row['permanent_dob'];
            $data['tin'] = $row['tin'];
            $data['date_original_appointment'] = $row['date_original_appointment'];
            $data['date_last_promotion'] = $row['date_last_promotion'];
            $data['permanent_status'] = $row['permanent_status'];
            $data['cs_eligibility'] = $row['cs_eligibility'];
            $data['permanent_comment'] = $row['permanent_comment'];
        }

        echo json_encode($data);
    }

    if($_POST['action'] == 'delete')
    {
        $query = "SELECT * FROM tbl_permanent WHERE oid = '".$_POST["id"]."'";
        $result = $connect->query($query);
        $data = array();

        $query = "DELETE FROM tbl_permanent WHERE oid = '".$_POST["id"]."'";

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
