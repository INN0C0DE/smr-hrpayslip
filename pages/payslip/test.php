<?php
// Include connection.php and any other necessary files for database connectivity and functions
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["chk_delete"])) {
    $selectedIDs = $_POST["chk_delete"];
    $selectedIDs = array_map('intval', $selectedIDs); // Ensure all IDs are integers

    // Fetch the selected rows from the database based on the provided IDs
    $selectedRows = array();
    $query = "SELECT * FROM tbl_payroll WHERE oid IN (" . implode(",", $selectedIDs) . ")";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($result)) {
        $selectedRows[] = $row;
    }

    // HTML/CSS layout for printable content
    $printableContent = '<html>
        <head>
            <!-- Add any necessary stylesheets or CSS -->
        </head>
        <body>
        <p style="font-size: 12px; border-spacing: 20px; margin: 0; margin-top: 10px;" class="fw-bold details"><strong>NET SALARY:</strong> <span style="float: right;border-bottom: 1px solid black; height: 17px;; width: 100px; text-align: right; font-weight: bold;"> <?php'.number_format($netsalary, 2, '.', ',').' </span></p>
        </body>
    </html>';

    // Echo the printable content
    echo $printableContent;
}
?>

<button onclick="printSelectedContent()">Print</button>

<!-- Place this JavaScript code at the end of your home page, just before the closing </body> tag -->
<script>
    // Handle form submission when "Print Selected" button is clicked
    document.getElementById("printSelectedForm").addEventListener("submit", function (event) {
        event.preventDefault();

        // Get all selected checkboxes
        const selectedCheckboxes = document.querySelectorAll("input.chk_delete:checked");
        if (selectedCheckboxes.length === 0) {
            alert("Please select at least one row to print.");
            return;
        }

        // Submit the form to print_selected.php
        this.submit();
    });
</script>
