<?php
// Step 1: Include PHPExcel and configuration file
require_once '../connection.php';
require_once 'function_mod.php';
require_once '../../../PHPExcel/Classes/PHPExcel.php';

// Step 2: Check if the generate_report button is clicked
if (isset($_POST["generate_report"])) {
    // Step 2.1: Fetch data from the database with inner joins
    $query = "SELECT p.*, t.lname, t.fname, t.mname
              FROM tbl_permanent p
              INNER JOIN tbl_employee t ON p.employee_name = t.oid 
              WHERE p.permanent_status = 'Active'
              ORDER BY p.oid DESC";

    $result = mysqli_query($con, $query);

    // Check if there are any results
    if (!$result || mysqli_num_rows($result) === 0) {
        die("No data found.");
    }

    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Your Name")
                                 ->setLastModifiedBy("Your Name")
                                 ->setTitle("Permanent Employees Report")
                                 ->setSubject("Permanent Employees Report")
                                 ->setDescription("Report of active permanent employees")
                                 ->setKeywords("permanent employees report")
                                 ->setCategory("Report");

    // Add title
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'San Mateo, Rizal')
                ->mergeCells('A1:S1');

    // Center align and bold title
    $titleStyle = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
        'font' => array(
            'bold' => true,
        ),
    );

    $objPHPExcel->getActiveSheet()->getStyle('A1:S1')->applyFromArray($titleStyle);

    // Add "Permanent" name
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A2', 'Permanent Employees')
                ->mergeCells('A2:S2');

    // Center align and bold "Permanent" name
    $objPHPExcel->getActiveSheet()->getStyle('A2:S2')->applyFromArray($titleStyle);

    // Leave blank
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A3', '');

    // Add header
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Organizational Unit')
                ->setCellValue('B4', 'Item Number')
                ->setCellValue('C4', 'Position Title')
                ->setCellValue('D4', 'Salary Grade')
                ->setCellValue('E4', 'Authorized Annual Salary')
                ->setCellValue('F4', 'Actual Annual Salary')
                ->setCellValue('G4', 'Step')
                ->setCellValue('H4', 'Area Code')
                ->setCellValue('I4', 'Area Type')
                ->setCellValue('J4', 'Level')
                ->setCellValue('K4', 'Employee')
                ->setCellValue('L4', 'Sex')
                ->setCellValue('M4', 'Date of Birth')
                ->setCellValue('N4', 'TIN')
                ->setCellValue('O4', 'Date of Original Appointment')
                ->setCellValue('P4', 'Date of Last Promotion/ Appointment')
                ->setCellValue('Q4', 'Status')
                ->setCellValue('R4', 'CS Eligibility')
                ->setCellValue('S4', 'Comment/ Annotation');

    // Center align and bold header
    $headerStyle = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
        'font' => array(
            'bold' => true,
        ),
    );

    $objPHPExcel->getActiveSheet()->getStyle('A4:S4')->applyFromArray($headerStyle);

    // Add borders to header cells
    $objPHPExcel->getActiveSheet()->getStyle('A4:S4')->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        )
    );

    // Step 2.4: Write each row of the database result set to the Excel file
    $currentRow = 5; // Start from row 5 (after title, "Permanent" name, and blank row)
    while ($row = mysqli_fetch_assoc($result)) {
        // Format dates
        $pdob = date("m/d/Y", strtotime($row['permanent_dob']));
        $doa = date("m/d/Y", strtotime($row['date_original_appointment']));
        $dlp = date("m/d/Y", strtotime($row['date_last_promotion']));

        // Write row to Excel file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$currentRow, $row['organizational_unit'])
                    ->setCellValue('B'.$currentRow, $row['item_number'])
                    ->setCellValue('C'.$currentRow, $row['position_title'])
                    ->setCellValue('D'.$currentRow, $row['salary_grade'])
                    ->setCellValue('E'.$currentRow, $row['authorized_annual_salary'])
                    ->setCellValue('F'.$currentRow, $row['actual_annual_salary'])
                    ->setCellValue('G'.$currentRow, $row['step'])
                    ->setCellValue('H'.$currentRow, $row['area_code'])
                    ->setCellValue('I'.$currentRow, $row['area_type'])
                    ->setCellValue('J'.$currentRow, $row['level'])
                    ->setCellValue('K'.$currentRow, $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'])
                    ->setCellValue('L'.$currentRow, $row['permanent_sex'])
                    ->setCellValue('M'.$currentRow, $pdob)
                    ->setCellValue('N'.$currentRow, $row['tin'])
                    ->setCellValue('O'.$currentRow, $doa)
                    ->setCellValue('P'.$currentRow, $dlp)
                    ->setCellValue('Q'.$currentRow, $row['permanent_status'])
                    ->setCellValue('R'.$currentRow, $row['cs_eligibility'])
                    ->setCellValue('S'.$currentRow, $row['permanent_comment']);

        // Add borders to each cell in the row
        $objPHPExcel->getActiveSheet()->getStyle('A'.$currentRow.':S'.$currentRow)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
            )
        );

        // Set alignment to left for all cells in the row
        $objPHPExcel->getActiveSheet()->getStyle('A'.$currentRow.':S'.$currentRow)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        
        $currentRow++;
    }

    // Set column widths
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(35);
    $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);

    // Set borders for all cells
    $objPHPExcel->getActiveSheet()->getStyle('A1:S'.$currentRow)->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        )
    );

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Permanent Employees');

    // Save Excel 2007 file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $filename = 'permanent_employees_report.xlsx';
    $objWriter->save($filename);

    // Step 3: Download the generated Excel file
    if (file_exists($filename)) {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        readfile($filename);
        exit();
    } else {
        die("Error: File not found.");
    }
}
?>
