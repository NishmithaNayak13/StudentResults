<?php
session_start();
if(!isset($_SESSION['UserName']))
{
	echo "<script>window.location='index.php';</script>";
}

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['import_file_btn']))
{
    $allowed_ext = ['xls', 'csv','xlsx'];
    $filename = $_FILES['import_file']['name'];
    $checking = explode(".",$filename);
    $file_ext=end($checking);

    if(in_array($file_ext,$allowed_ext))
    {
        $targetPath=$_FILES['import_file']['tmp_name'];
        $spreadsheet= \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach($data as $row)
        {
            $StudentId = $row['0'];
            $StudentName = $row['1'];
            $USN = $row['2'];
            $Batch = $row['3'];
            $Section = $row['4'];
            $Mentor = $row['5'];
            $Status = $row['6'];

            $checkStudent = "Select USN FROM tblstudents WHERE USN='$USN'";
            $checkStudent_result = mysqli_query($dbh,$checkStudent);

            if(mysqli_num_rows()>0)
            {
                //Already exist (update)
                $up_query="UPDATE tblstudents SET StudentName='$StudentName',USN='$USN',Batch='$Batch',Section='$Section',Mentor='$Mentor',Status='$Status' WHERE USN='$USN'"; 
                $up_result=mysqli_query($dbh,$up_query);
                $msg = 1;

            }
            else
            {
                //New Record(insert)
                $sql="INSERT INTO  tblstudents(StudentName,USN,Batch,Section,Mentor,Status) VALUES('$_POST[name]','$_POST[usn]','$_POST[batch]','$_POST[section]','$_POST[mentor]','$_POST[status]')";
                $qsql = mysqli_query($dbh,$sql);
                //echo mysqli_error($dbh);
                $msg = 1;

            }
        }
        if(isset($msg))
        {
            $_SESSION['Status']= "File Imported Succefully";
            header("Location: index.php");
        }
        else {
            $_SESSION['Status']= "File Importing Failed";
            header("Location: index.php");
        }
    }
}