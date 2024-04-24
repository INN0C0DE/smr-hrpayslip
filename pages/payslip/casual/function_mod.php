<?php

include('../connection.php');

function fetch_top_five_data($connect)
{
    $query = "SELECT p.*, t.lname, t.fname, t.mname, n.nof
      FROM tbl_casual p
        INNER JOIN tbl_employee t ON p.employee = t.oid 
      INNER JOIN tbl_naturework n ON p.nature_work = n.oid
      ORDER BY oid DESC 
      LIMIT 10";

    $result = $connect->query($query);

    $output = '';

    foreach ($result as $row) {
        // Format date of birth
        $dob = date("m/d/Y", strtotime($row['dob']));

        $output .= '
        <tr>
            <td>' . $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'] . '</td>
            <td>' . $dob . '</td>
            <td>' . $row['sex'] . '</td>
            <td>' . $row['level_cs'] . '</td>
            <td>' . $row['work_status'] . '</td>
            <td>' . $row['year_service'] . '</td>
            <td>' . $row['nof'] . '</td>
            <td>' . $row['specified_work'] . '</td>
            <td>' . $row['active_status'] . '</td>
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
    $query = "SELECT * FROM tbl_casual";

    $statement = $connect->prepare($query);

    $statement->execute();

    return $statement->rowCount();
}