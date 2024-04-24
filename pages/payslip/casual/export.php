<?php
// Step 1: Include PHPExcel and configuration file
require_once '../connection.php';
require_once 'function_mod.php';
require_once '../../../PHPExcel/Classes/PHPExcel.php';

// Step 2: Check if the generate_report button is clicked
if (isset($_POST["generate_report"])) {
    // Step 2.1: Fetch data from the database with inner joins
    $query = "SELECT p.*, t.lname, t.fname, t.mname, n.nof
              FROM tbl_casual p
              INNER JOIN tbl_employee t ON p.employee = t.oid 
              INNER JOIN tbl_naturework n ON p.nature_work = n.oid
              WHERE p.active_status = 'Active'
              ORDER BY p.oid DESC";

    $result = mysqli_query($con, $query);

    // Create a new PHPExcel object
    $objPHPExcel = new PHPExcel();

    // Set properties
    $objPHPExcel->getProperties()->setCreator("Your Name")
                                 ->setLastModifiedBy("Your Name")
                                 ->setTitle("Casual Employees Report")
                                 ->setSubject("Casual Employees Report")
                                 ->setDescription("Report of active casual employees")
                                 ->setKeywords("casual employees report")
                                 ->setCategory("Report");

    // Add title
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'San Mateo, Rizal')
                ->mergeCells('A1:I1');

    // Center align and bold title
    $titleStyle = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
        'font' => array(
            'bold' => true,
        ),
    );

    $objPHPExcel->getActiveSheet()->getStyle('A1:I1')->applyFromArray($titleStyle);

    // Add "Casual" name
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A2', 'Casual Employees')
                ->mergeCells('A2:I2');

    // Center align and bold "Casual" name
    $objPHPExcel->getActiveSheet()->getStyle('A2:I2')->applyFromArray($titleStyle);

    // Leave blank
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A3', '');

    // Add header
    $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A4', 'Employee')
                ->setCellValue('B4', 'Date of Birth')
                ->setCellValue('C4', 'Sex')
                ->setCellValue('D4', 'Level of CS Eligibility')
                ->setCellValue('E4', 'Work Status')
                ->setCellValue('F4', 'Years of Service')
                ->setCellValue('G4', 'Nature of Work')
                ->setCellValue('H4', 'Specified Work')
                ->setCellValue('I4', 'Status');

    // Center align and bold header
    $headerStyle = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
        'font' => array(
            'bold' => true,
        ),
    );

    $objPHPExcel->getActiveSheet()->getStyle('A4:I4')->applyFromArray($headerStyle);

    // Add borders to header cells
    $objPHPExcel->getActiveSheet()->getStyle('A4:I4')->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        )
    );

    // Step 2.4: Write each row of the database result set to the Excel file
    $rowIndex = 5; // Start from row 5 (after title, "Casual" name, and blank row)
    while ($row = mysqli_fetch_assoc($result)) {
        // Format date of birth
        $dob = date("m/d/Y", strtotime($row['dob']));

        // Write row to Excel file
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A'.$rowIndex, $row['lname'] . ', ' . $row['fname'] . ' ' . $row['mname'])
                    ->setCellValue('B'.$rowIndex, $dob)
                    ->setCellValue('C'.$rowIndex, $row['sex'])
                    ->setCellValue('D'.$rowIndex, $row['level_cs'])
                    ->setCellValue('E'.$rowIndex, $row['work_status'])
                    ->setCellValue('F'.$rowIndex, $row['year_service'])
                    ->setCellValue('G'.$rowIndex, $row['nof'])
                    ->setCellValue('H'.$rowIndex, $row['specified_work'])
                    ->setCellValue('I'.$rowIndex, $row['active_status']);

        // Add borders to each cell in the row
        $objPHPExcel->getActiveSheet()->getStyle('A'.$rowIndex.':I'.$rowIndex)->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                    ),
                ),
            )
        );
        
        $rowIndex++;
    }

    // Set column width
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(15);

    // Set borders for all cells
    $objPHPExcel->getActiveSheet()->getStyle('A1:I'.$rowIndex)->applyFromArray(
        array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
        )
    );

    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('Casual Employees');

    // Save Excel 2007 file
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('casual_employees_report.xlsx');

    // Step 3: Download the generated Excel file
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="casual_employees_report.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter->save('php://output');
    exit();
}
?>
