<?php

//function.php

include ('../payslip/connection.php');

function fetch_top_five_data($connect)
{
	$query = "SELECT p.*, t.lname, t.fname, t.mname, n.nof
	  FROM tbl_casual p
		INNER JOIN tbl_employee t ON p.employee = t.oid 
	  INNER JOIN tbl_naturework n ON p.nature_work = n.oid 
	ORDER BY OID DESC ";

	$result = $connect->query($query);

	$output = '';

	foreach ($result as $row) {
		// Format date of birth
		$dob = date("F j, Y", strtotime($row["dob"]));
	
		$output .= '
		<tr>
			<td><input type="checkbox" name="chk_delete[]" class="chk_delete" value="' . $row['oid'] . '"  /></td>
			<td>' . $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'] . '</td>
			<td>' . $dob . '</td>
			<td>' . $row["sex"] . '</td>
			<td>' . $row["level_cs"] . '</td>
			<td>' . $row["work_status"] . '</td>
			<td>' . $row["year_service"] . '</td>
			<td>' . $row["nof"] . '</td>
			<td>' . $row["specified_work"] . '</td>
			<td>' . $row["active_status"] . '</td>
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
