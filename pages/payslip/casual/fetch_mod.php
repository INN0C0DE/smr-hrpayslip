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

$column = array("employee", "dob", "sex", "level_cs", "work_status", "year_service", "nof", "specified_work", "active_status");

$query = "SELECT p.*, t.lname, t.fname, t.mname, n.nof
          FROM tbl_casual p
          INNER JOIN tbl_employee t ON p.employee = t.oid 
          INNER JOIN tbl_naturework n ON p.nature_work = n.oid
          WHERE 
            p.employee LIKE '%" . $search . "%' 
            OR p.dob LIKE '%" . $search . "%' 
            OR p.sex LIKE '%" . $search . "%' 
            OR p.level_cs LIKE '%" . $search . "%' 
            OR p.work_status LIKE '%" . $search . "%' 
            OR p.year_service LIKE '%" . $search . "%' 
            OR n.nof LIKE '%" . $search . "%' 
            OR p.specified_work LIKE '%" . $search . "%' 
            OR p.active_status LIKE '%" . $search . "%' ";

if ($sortColumnIndex != '') {
    $query .= 'ORDER BY ' . $column[$sortColumnIndex] . ' ' . $sortDirection . ' ';
} else {
    $query .= 'ORDER BY p.oid DESC ';
}

$query .= 'LIMIT ' . $start . ', ' . $length;

$statement = $connect->prepare($query);
$statement->execute();

$number_filter_row = $statement->rowCount();

$data = array();

foreach ($statement as $row) {
    $dob = date("F j, Y", strtotime($row['dob']));

    $sub_array = array();
    $sub_array[] = $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'];
    $sub_array[] = $dob;
    $sub_array[] = $row['sex'];
    $sub_array[] = $row['level_cs'];
    $sub_array[] = $row['work_status'];
    $sub_array[] = $row['year_service'];
    $sub_array[] = $row['nof'];
    $sub_array[] = $row['specified_work'];
    $sub_array[] = $row['active_status'];

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
