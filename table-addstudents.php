<?php
include('includes/config.php');

if(isset($_POST['submit'])) {
    $numRows = $_POST['num_rows']; // Number of rows specified by the user
    $batch = $_POST['batch']; // Selected batch
    $section = $_POST['section']; // Selected section
    $mentor = $_POST['mentor']; // Selected mentor

    // Loop through the form inputs
    for ($i = 1; $i <= $numRows; $i++) {
        $name = $_POST['cell'][$i][1];
        $usn = $_POST['cell'][$i][2];
        $status = "Active"; // Set the status to "Active" by default

        // Perform the database insertion
        $sql = "INSERT INTO tblstudents (StudentName, USN, Batch, Section, Mentor, Status) VALUES ('$name', '$usn', '$batch', '$section', '$mentor', '$status')";
        $qsql = mysqli_query($dbh, $sql);

        // Check for errors and affected rows
        if($qsql && mysqli_affected_rows($dbh) == 1) {
            echo "<script>alert('Data saved successfully');</script>";
            echo "<script>window.location='dashboard.php';</script>";
        } else {
            echo "<script>alert('Error occurred while saving data');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Admission</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
    <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
    <link rel="stylesheet" href="css/select2/select2.min.css" >
    <link rel="stylesheet" href="css/main.css" media="screen" >
    <script src="js/modernizr/modernizr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to add a new row
            function addRow() {
                var rowCount = $('tbody tr').length + 1; // Get the current row count

                var newRow = `
                    <tr>
                        <td><input type="text" name="cell[${rowCount}][1]" class="form-control" id="name${rowCount}" required="required" autocomplete="off"></td>
                        <td><input type="text" name="cell[${rowCount}][2]" class="form-control" id="usn${rowCount}" required="required" autocomplete="off"></td>
                    </tr>
                `;
                $('tbody').append(newRow); // Append the new row to the table body
            }

            // Event listener for the "Number of Rows" input field change
            $('#num_rows').change(function() {
                var numRows = parseInt($(this).val()); // Get the selected number of rows
                var currentRows = $('tbody tr').length; // Get the current number of rows

                if (numRows > currentRows) {
                    // Add additional rows
                    for (var i = currentRows + 1; i <= numRows; i++) {
                        addRow();
                    }
                } else if (numRows < currentRows) {
                    // Remove excess rows
                    $('tbody tr:gt(' + (numRows - 1) + ')').remove();
                }
            });

            // Event listener for the batch selection change
            $('#batch').change(function() {
                var selectedBatch = $(this).val(); // Get the selected batch

                // Set the selected batch for all rows
                $('select[name^="cell"][name$="[3]"]').val(selectedBatch);
            });

            // Event listener for the mentor selection change
            $('#mentor').change(function() {
                var selectedMentor = $(this).val(); // Get the selected mentor

                // Set the selected mentor for all input fields
                $('select[name^="cell"]').val(selectedMentor);
            });
        });
    </script>
</head>
<body class="top-navbar-fixed">
    <div class="main-wrapper">
        <?php include('includes/topbar.php');?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php');?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Student Admission</h2>
                            </div>
                        </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">Student Admission</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <form class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="batch" class="col-sm-2 control-label">Batch</label>
                                <div class="col-sm-10">
                                    <select name="batch" class="form-control" id="batch" required="required">
                                        <option value="">Select Batch</option>
                                        <?php
                                            $sql = "SELECT * FROM tblclasses";
                                            $query = mysqli_query($dbh, $sql);
                                            echo mysqli_error($dbh);
                                            while($rscourse = mysqli_fetch_array($query))
                                            {  
                                                echo "<option value='$rscourse[Batch]'>$rscourse[Batch]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="section" class="col-sm-2 control-label">Section</label>
                                <div class="col-sm-10">
                                    <select name="section" class="form-control" id="section" required="required">
                                        <option value="">Select Section</option>
                                        <?php
                                            $sections = array("A", "B", "C", "D");
                                            foreach ($sections as $sectionOption) {
                                                echo "<option value='$sectionOption'>$sectionOption</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="mentor" class="col-sm-2 control-label">Mentor</label>
                                <div class="col-sm-10">
                                    <select name="mentor" class="form-control" id="mentor" required="required">
                                        <option value="">Select Mentor</option>
                                        <?php
                                            $sql = "SELECT * FROM mentors";
                                            $query = mysqli_query($dbh, $sql);
                                            echo mysqli_error($dbh);
                                            while($rscourse = mysqli_fetch_array($query))
                                            {  
                                                echo "<option value='$rscourse[Name]'>$rscourse[Name]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="num_rows" class="col-sm-2 control-label">Number of Rows</label>
                                <div class="col-sm-10">
                                    <input type="number" name="num_rows" class="form-control" id="num_rows" required="required" min="1">
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>USN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="cell[1][1]" class="form-control" id="name1" required="required" autocomplete="off"></td>
                                        <td><input type="text" name="cell[1][2]" class="form-control" id="usn1" required="required" autocomplete="off"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
