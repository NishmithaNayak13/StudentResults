<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Result</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/select2/select2.min.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
        }

        input {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('includes/topbar-mentors.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar-mentors.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-sm-6">
                                <h2 class="title">Results</h2>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="batch" class="col-sm-2 control-label">Batch</label>
                                    <div class="col-sm-10">
                                        <select name="batch" class="form-control" id="batch" required="required" onchange="this.form.submit()">
                                            <option value="">Select Batch</option>
                                            <?php
                                            $sql = "SELECT * FROM tblclasses";
                                            $query = mysqli_query($dbh, $sql);
                                            echo mysqli_error($dbh);
                                            while ($rscourse = mysqli_fetch_array($query)) {
                                                $batch = $rscourse['Batch'];
                                                $semester = $rscourse['Semester'];
                                                $selected = isset($_POST['batch']) && $_POST['batch'] == $batch ? 'selected' : '';
                                                echo "<option value='$batch' $selected>$batch</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                    <?php
                                    if (isset($_POST['batch'])) {
                                        $selectedBatch = $_POST['batch'];
                                        $selectedSemester = '';

                                        // Retrieve the selected batch's semester
                                        $sqlSemester = "SELECT Semester FROM tblclasses WHERE Batch='$selectedBatch'";
                                        $querySemester = mysqli_query($dbh, $sqlSemester);
                                        if ($rowSemester = mysqli_fetch_assoc($querySemester)) {
                                            $selectedSemester = $rowSemester['Semester'];
                                        }

                                        if ($selectedSemester !== '') {
                                            echo '<br><br>';
                                            echo '<div class="form-group">';
                                            echo '<label for="semester" class="col-sm-2 control-label">Semester</label>';
                                            echo '<div class="col-sm-10">';
                                            echo '<input type="text" name="semester" class="form-control" id="semester" value="' . $selectedSemester . '" readonly>';
                                            echo '</div>';
                                            echo '</div>';

                                            echo '<br><br>';
                                            echo '<div class="form-group">';
                                            echo '<label for="subject" class="col-sm-2 control-label">Subject</label>';
                                            echo '<div class="col-sm-10">';
                                            echo '<select name="subject" class="form-control" id="subject" required>';
                                            echo '<option value="">Select Subject</option>';

                                            // Retrieve the subjects for the selected semester
                                            $sqlSubjects = "SELECT SubjectName, SubjectCode FROM tblsubjects WHERE Semester='$selectedSemester'";
                                            $querySubjects = mysqli_query($dbh, $sqlSubjects);
                                            while ($rowSubject = mysqli_fetch_assoc($querySubjects)) {
                                                $subjectName = $rowSubject['SubjectName'];
                                                $subjectCode = $rowSubject['SubjectCode'];
                                                $selected = isset($_POST['subject']) && $_POST['subject'] == $subjectCode ? 'selected' : '';
                                                echo "<option value='$subjectCode' $selected>$subjectName</option>";
                                            }

                                            echo '</select>';
                                            echo '</div>';
                                            echo '</div>';

                                            echo '<br><br>';
                                            echo '<div class="form-group">';
                                            echo '<label for="mentor" class="col-sm-2 control-label">Mentor</label>';
                                            echo '<div class="col-sm-10">';
                                            $mentorName = "";
                                            $mentorEmail = $_SESSION['Email'];
                                            $sqlMentor = "SELECT Name FROM mentors WHERE Email='$mentorEmail'";
                                            $queryMentor = mysqli_query($dbh, $sqlMentor);
                                            if ($rowMentor = mysqli_fetch_assoc($queryMentor)) {
                                                $mentorName = $rowMentor['Name'];
                                            }
                                            echo '<input type="text" name="mentor" class="form-control" id="mentor" value="' . $mentorName . '" readonly>';
                                            echo '</div>';
                                            echo '</div>';

                                            echo '<br><br><br>';
                                            echo '<table>';
                                            echo '<thead>';
                                            echo '<tr>';
                                            echo '<th>Student Name</th>';
                                            echo '<th>USN</th>';
                                            echo '<th>MSE 1</th>';
                                            echo '<th>MSE 2</th>';
                                            echo '<th>Task 1</th>';
                                            echo '<th>Task 2</th>';
                                            echo '<th>CIE</th>';
                                            echo '<th>SEE</th>';
                                            echo '<th>SGPA</th>';
                                            echo '<th>CGPA</th>';
                                            echo '</tr>';
                                            echo '</thead>';
                                            echo '<tbody>';

                                            $mentorEmail = $_SESSION['Email'];
                                            $mentorQuery = "SELECT Name FROM mentors WHERE Email='$mentorEmail'";
                                            $qmentor = mysqli_query($dbh, $mentorQuery);
                                            $mentorRow = mysqli_fetch_array($qmentor);
                                            $mentor = $mentorRow['Name'];

                                            $sqlStudents = "SELECT * FROM tblstudents WHERE Batch='$selectedBatch' AND Mentor='$mentor'";
                                            $queryStudents = mysqli_query($dbh, $sqlStudents);
                                            if (mysqli_num_rows($queryStudents) > 0) {
                                                $i = 0;
                                                while ($rowStudent = mysqli_fetch_assoc($queryStudents)) {
                                                    $studentName = $rowStudent['StudentName'];
                                                    $usn = $rowStudent['USN'];
                                                    echo '<tr>';
                                                    echo '<td><input type="text" name="cell[' . $i . '][1]" value="' . $studentName . '" readonly></td>';
                                                    echo '<td><input type="text" name="cell[' . $i . '][2]" value="' . $usn . '" readonly></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][3]" min="0" max="15" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][4]" min="0" max="15" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][5]" min="0" max="10" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][6]" min="0" max="10" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][7]" min="0" max="50" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][8]" min="0" max="50" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][9]" min="0" max="10" value=""></td>';
                                                    echo '<td><input type="number" name="cell[' . $i . '][10]" min="0" max="10" value=""></td>';
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            } else {
                                                echo '<tr><td colspan="10">No students</td></tr>';
                                            }

                                            echo '</tbody>';
                                            echo '</table>';

                                            echo '<div class="form-group">';
                                            echo '<div class="col-sm-offset-2 col-sm-10">';
                                            echo '<button type="submit" name="submit" class="btn btn-primary">Add</button>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    }
                            if (isset($_POST['submit'])) {
                                $batch = $_POST['batch'];
                                $subject = $_POST['subject'];
                                $mentor = $_POST['mentor'];
                                $resultData = $_POST['cell'];

                                foreach ($resultData as $row) {
                                    $usn = $row[2];
                                    $mse1 = $row[3];
                                    $mse2 = $row[4];
                                    $task1 = $row[5];
                                    $task2 = $row[6];
                                    $cie = $row[7];
                                    $see = $row[8];
                                    $sgpa = $row[9];
                                    $cgpa = $row[10];

                                    // Insert the result into the database
                                    $insertQuery = "INSERT INTO results (USN, Subject, MSE1, MSE2, Task1, Task2, CIE, SEE, SGPA, CGPA) VALUES ('$usn', '$subject', '$mse1', '$mse2', '$task1', '$task2', '$cie', '$see', '$sgpa', '$cgpa')";
                                    mysqli_query($dbh, $insertQuery);
                                }

                                // Redirect to a success page or perform other actions
                                header("Location: dashboard-mentor.php");
                                exit;
                            }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>