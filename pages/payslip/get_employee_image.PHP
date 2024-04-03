<?php
        include "connection.php";
        // Assuming $con is the MySQLi database connection variable
if (isset($_POST['oid'])) {
    $oid = $_POST['oid'];
    $result = mysqli_query($con, "SELECT image FROM tbl_employee WHERE oid = '$oid'");
    $row = mysqli_fetch_array($result);

    if ($row) {
        $imagePath = $row['image'] ? 'picture/' . basename($row['image']) : 'picture/default.jpg';
        echo '<img src="' . $imagePath . '" style="width:2.5in;height:4in;" />';
    } else {
        echo 'No image available.';
    }
}
?>
