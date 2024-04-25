<?php

include('../connection.php');

function fetch_top_five_data($connect)
{
    $query = "SELECT p.*, t.lname, t.fname, t.mname
      FROM tbl_permanent p
        INNER JOIN tbl_employee t ON p.employee_name = t.oid 
        ORDER BY oid DESC 
        LIMIT 10";

    $result = $connect->query($query);

    $output = '';

    foreach ($result as $row) {
        // Format date of birth
        $doa = date("m/d/Y", strtotime($row['date_original_appointment']));
        $dlp = date("m/d/Y", strtotime($row['date_last_promotion']));
        $pdob = date("m/d/Y", strtotime($row['permanent_dob']));
        $output .= '
        <tr>
            <td>' . $row['organizational_unit'] . '</td>
            <td>' . $row['item_number'] . '</td>
            <td>' . $row['position_title'] . '</td>
            <td>' . $row['salary_grade'] . '</td>
            <td>' . $row['authorized_annual_salary'] . '</td>
            <td>' . $row['actual_annual_salary'] . '</td>
            <td>' . $row['step'] . '</td>
            <td>' . $row['area_code'] . '</td>
            <td>' . $row['area_type'] . '</td>
            <td>' . $row['level'] . '</td>
            <td>' . $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'] . '</td>
            <td>' . $row['permanent_sex'] . '</td>
            <td>' . $pdob . '</td>
            <td>' . $row['tin'] . '</td>
            <td>' . $doa . '</td>
            <td>' . $dlp . '</td>
            <td>' . $row['permanent_status'] . '</td>
            <td>' . $row['cs_eligibility'] . '</td>
            <td>' . $row['permanent_comment'] . '</td>

            <td>
                <button type="button" onclick="fetch_edit_data(' . $row["oid"] . ')" class="btn btn-success btn-sm"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button>
                &nbsp;
                <button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["oid"] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </td>
        </tr>
        ';
    }
    return $output;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tbl_permanent";

    $statement = $connect->prepare($query);

    $statement->execute();

    return $statement->rowCount();
}