<?php

include('function_mod.php');
include('../connection.php');

$startGET = filter_input(INPUT_GET, "start", FILTER_SANITIZE_NUMBER_INT);
$start = $startGET ? intval($startGET) : 0;

$lengthGET = filter_input(INPUT_GET, "length", FILTER_SANITIZE_NUMBER_INT);
$length = $lengthGET ? intval($lengthGET) : 10;

$searchQuery = filter_input(INPUT_GET, "searchQuery", FILTER_SANITIZE_STRING);
$search = empty($searchQuery) || $searchQuery === "null" ? "" : $searchQuery;

$sortColumnIndex = filter_input(INPUT_GET, "sortColumn", FILTER_SANITIZE_NUMBER_INT);
$sortDirection = filter_input(INPUT_GET, "sortDirection", FILTER_SANITIZE_STRING);

$column = array("t.lname","t.fname", "t.mname", "organizational_unit", "item_number", "position_title", "salary_grade", "authorized_annual_salary", "actual_annual_salary", "step", "area_code", "level", "employee_name" , "permanent_sex", "permanent_dob", "tin", "date_original_appointment", "date_last_promotion", "permanent_status", "cs_eligibility", "permanent_comment");

$query = "SELECT p.*, t.lname, t.fname, t.mname
          FROM tbl_permanent p
          INNER JOIN tbl_employee t ON p.employee = t.oid 
          WHERE 
            t.lname LIKE '%" . $search . "%' 
            OR t.lname LIKE '%" . $search . "%' 
            OR t.fname LIKE '%" . $search . "%' 
            OR t.mname LIKE '%" . $search . "%' 
            OR p.organizational_unit LIKE '%" . $search . "%' 
            OR p.item_number = '" . $search . "' 
            OR p.position_title LIKE '%" . $search . "%' 
            OR p.salary_grade LIKE '%" . $search . "%' 
            OR p.authorized_annual_salary LIKE '%" . $search . "%' 
            OR p.actual_annual_salary LIKE '%" . $search . "%' 
            OR p.step LIKE '%" . $search . "%' 
            OR p.area_code LIKE '%" . $search . "%' 
            OR p.area_type LIKE '%" . $search . "%' 
            OR p.level LIKE '%" . $search . "%' 
            OR p.employee_name LIKE '%" . $search . "%'
            OR p.permanent_sex LIKE '%" . $search . "%'
            OR p.permanent_dob LIKE '%" . $search . "%'
            OR p.date_original_appointment LIKE '%" . $search . "%'
            OR p.date_last_promotion LIKE '%" . $search . "%'
            OR p.tin LIKE '%" . $search . "%' 
            OR p.permanent_status LIKE '%" . $search . "%'
            OR p.cs_eligibility LIKE '%" . $search . "%'
            OR p.permanent_comment LIKE '%" . $search . "%' ";

if ($sortColumnIndex != '') {
    $query .= 'ORDER BY ' . $column[$sortColumnIndex] . ' ' . $sortDirection . ' ';
} else {
    $query .= 'ORDER BY p.oid DESC ';
}

$query .= 'LIMIT ' . $start . ', ' . $length;

$statement = $connect->prepare($query);
$statement->execute();

// Check if the query executed successfully
if (!$statement) {
    die("Query failed: " . $connect->errorInfo());
}

$number_filter_row = $statement->rowCount();

$data = array();

foreach ($statement as $row) {
    $doa = date("m/d/Y", strtotime($row['date_original_appointment']));
    $dlp = date("m/d/Y", strtotime($row['date_last_promotion']));
    $pdob = date("m/d/Y", strtotime($row['permanent_dob']));

    $sub_array = array();
    $sub_array[] = $row['organizational_unit'];
    $sub_array[] = $row['item_number'];
    $sub_array[] = $row['position_title'];
    $sub_array[] = $row['salary_grade'];
    $sub_array[] = $row['authorized_annual_salary'];
    $sub_array[] = $row['actual_annual_salary'];
    $sub_array[] = $row['step'];
    $sub_array[] = $row['area_code'];
    $sub_array[] = $row['area_type'];
    $sub_array[] = $row['level'];
    $sub_array[] = $row['employee_name'];
    $sub_array[] = $row['permanent_sex'];
    $sub_array[] = $pdob;
    $sub_array[] = $row['tin'];
    $sub_array[] = $doa;
    $sub_array[] = $dlp;
    $sub_array[] = $row['permanent_status'];
    $sub_array[] = $row['cs_eligibility'];
    $sub_array[] = $row['permanent_comment'];

    $sub_array[] = '<button type="button" onclick="fetch_data(' . $row["oid"] . ')" class="btn btn-success btn-sm"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button>
                    &nbsp;<button type="button" class="btn btn-danger btn-sm" onclick="delete_data(' . $row["oid"] . ')"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>';

    $data[] = $sub_array;
}

$output = array(
    "recordsTotal"      =>  count_all_data($connect),
    "recordsFiltered"   =>  $number_filter_row,
    "data"              =>  $data
);

echo json_encode($output);

?>
