<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['Email']))
{
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
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
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
        <?php include('includes/topbar.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-sm-6">
                                <h2 class="title">Results</h2>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <form method="post">
                            <div class="form-group">
                                <label for="batch" class="col-sm-2 control-label">Batch</label>
                                <div class="col-sm-10">
                                    <select name="batch" class="form-control" id="batch" required="required">
                                        <option value="">Select Batch</option>
                                        <?php
                                        $sql = "SELECT * FROM tblclasses";
                                        $query = mysqli_query($dbh, $sql);
                                        echo mysqli_error($dbh);
                                        while ($rscourse = mysqli_fetch_array($query)) {
                                            $batch = $rscourse['Batch'];
                                            $semester = $rscourse['Semester'];
                                            echo "<option value='$batch'>$batch</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                <label for="semester" class="col-sm-2 control-label">Semester</label>
                                <div class="col-sm-10">
                                    <input type="text" name="semester" class="form-control" id="semester" value="" readonly>
                                </div>
                            </div>

                            <script>
                                // Create an array to hold the batch-semester mappings
                                var semesters = [
                                    <?php
                                    $sql = "SELECT Batch, Semester FROM tblclasses";
                                    $query = mysqli_query($dbh, $sql);
                                    while ($rscourse = mysqli_fetch_array($query)) {
                                        $batch = $rscourse['Batch'];
                                        $semester = $rscourse['Semester'];
                                        echo "{ batch: '$batch', semester: '$semester' },";
                                    }
                                    ?>
                                ];

                                // Event listener for the batch selection change
                                document.getElementById('batch').addEventListener('change', function() {
                                    var selectedBatch = this.value; // Get the selected batch

                                    // Find the corresponding semester based on the selected batch
                                    var selectedSemester = "";
                                    for (var i = 0; i < semesters.length; i++) {
                                        if (semesters[i].batch === selectedBatch) {
                                            selectedSemester = semesters[i].semester;
                                            break;
                                        }
                                    }

                                    // Update the semester input value
                                    document.getElementById('semester').value = selectedSemester;

                                    // Clear the existing subject options
                                    var subjectDropdown = document.getElementById('subject');
                                    subjectDropdown.innerHTML = '<option value="">Select Subject</option>';

                                    // Fetch the subjects for the selected semester from tblsubjects
                                    var subjects = [
                                        <?php
                                        $sqlSubjects = "SELECT SubjectName, SubjectCode, Semester FROM tblsubjects";
                                        $querySubjects = mysqli_query($dbh, $sqlSubjects);
                                        while ($rowSubject = mysqli_fetch_array($querySubjects)) {
                                            $subjectName = $rowSubject['SubjectName'];
                                            $subjectCode = $rowSubject['SubjectCode'];
                                            $subjectSemester = $rowSubject['Semester'];
                                            echo "{ name: '$subjectName', code: '$subjectCode', semester: '$subjectSemester' },";
                                        }
                                        ?>
                                    ];

                                    // Add the subjects for the selected semester to the dropdown
                                    for (var i = 0; i < subjects.length; i++) {
                                        if (subjects[i].semester === selectedSemester) {
                                            var option = document.createElement('option');
                                            option.value = subjects[i].code;
                                            option.textContent = subjects[i].name;
                                            subjectDropdown.appendChild(option);
                                        }
                                    }
                                });
                            </script>
                            <br><br>
                            <div class="form-group">
                                <label for="subject" class="col-sm-2 control-label">Subject</label>
                                <div class="col-sm-10">
                                    <select name="subject" class="form-control" id="subject" required>
                                        <option value="">Select Subject</option>
                                    </select>
                                </div>
                            </div>
                            <br><br>
                            <div class="form-group">
                                    <label for="mentor" class="col-sm-2 control-label">Mentor</label>
                                    <div class="col-sm-10">
                                        <?php
                                        $mentorName = "";
                                        $mentorEmail = $_SESSION['Email'];
                                        $sql = "SELECT Name FROM mentors WHERE Email='$mentorEmail'";
                                        $query = mysqli_query($dbh, $sql);
                                        if ($row = mysqli_fetch_array($query)) {
                                            $mentorName = $row['Name'];
                                        }
                                        ?>
                                        <input type="text" name="mentor" class="form-control" id="mentor" value="<?php echo $mentorName; ?>" readonly>
                                    </div>
                                </div>
                                
                                <br><br><br>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Column 2</th>
                                            <th>Column 3</th>
                                            <th>Column 4</th>
                                            <th>Column 5</th>
                                            <th>Column 6</th>
                                            <th>Column 7</th>
                                            <th>Column 8</th>
                                            <th>Column 9</th>
                                            <th>Column 10</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$mentorEmail = $_SESSION['Email'];
$mentorQuery = "SELECT Name FROM mentors WHERE Email='$mentorEmail'";
$qmentor = mysqli_query($dbh, $mentorQuery);
$mentorRow = mysqli_fetch_array($qmentor);
$mentor = $mentorRow['Name'];

$sql = "SELECT * FROM tblstudents WHERE Mentor='$mentor'";
$query = mysqli_query($dbh, $sql);
if (mysqli_num_rows($query) > 0) {
    $i = 0;
    while ($row = mysqli_fetch_array($query)) {
        $studentName = $row['StudentName'];
        ?>
        <tr>
            <td><input type="text" name="cell[<?php echo $i; ?>][1]" value="<?php echo $studentName; ?>" readonly></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][2]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][3]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][4]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][5]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][6]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][7]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][8]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][9]" value=""></td>
            <td><input type="text" name="cell[<?php echo $i; ?>][10]" value=""></td>
        </tr>
        <?php
        $i++;
    }
} else {
    echo "<tr><td colspan='10'>No students</td></tr>";
}
?>

                                    </tbody>
                                </table>
                                <input type="submit" name="submit" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>