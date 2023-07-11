<?php
// Include the PhpSpreadsheet library
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create a new Spreadsheet object
$spreadsheet = new Spreadsheet();

// Set the active sheet to the first sheet
$sheet = $spreadsheet->getActiveSheet();

// Set the column headers
sheet->setCellValue('A1', 'StudentName');
$sheet->setCellValue('B1', 'USN');
$sheet->setCellValue('C1', 'Batch');
$sheet->setCellValue('D1', 'Section');
$sheet->setCellValue('E1', 'Mentor');
$sheet->setCellValue('F1', 'Status');
// Get the student data from the database (assuming you have a MySQL connection established)
$conn = new mysqli('localhost', 'username', 'password', 'student');
$query = "SELECT * FROM tblstudents";
$result = $conn->query($query);

// Set row counter
$row = 2;

// Loop through the student data and populate the Excel sheet
while ($student = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $student['name']);
    $sheet->setCellValue('B' . $row, $student['usn']);
    $sheet->setCellValue('C' . $row, $student['batch']);
    $sheet->setCellValue('D' . $row, $student['section']);
    $sheet->setCellValue('E' . $row, $student['mentor']);
    $sheet->setCellValue('F' . $row, $student['status'])
    $row++;
}

// Save the Excel file
$filename = 'students.xlsx';
$writer = new Xlsx($spreadsheet);
$writer->save($filename);


// Read the Excel file
$excelData = \PhpOffice\PhpSpreadsheet\IOFactory::load($filename)->getActiveSheet();
$rows = $excelData->toArray();

// Skip the first row (header)
array_shift($rows);

// Insert each student record into the database
foreach ($rows as $row) {
    $name = $row[0];
    $age = $row[1];
    $grade = $row[2];
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':grade', $grade);
    
    $stmt->execute();
}

// Close the database connection
$db = null;

// Delete the temporary Excel file
unlink($filename);

echo 'Excel file uploaded and data inserted into the database successfully.';
?>