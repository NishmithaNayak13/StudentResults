<?php
include('includes/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the USN and Batch values from the form submission
    $usn = $_POST['usn'];

    // Assuming the "results" table structure, retrieve the results based on the provided USN and Batch
    $sqlview = "SELECT * FROM results WHERE USN='$usn'";
    $stmt = mysqli_prepare($dbh, $sqlview);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
}
?>

<!DOCTYPE html>
<!-- Rest of the HTML code remains the same -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Progress Review</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body>
    <div class="main-wrapper">
        <div class="content-wrapper">
            <div class="content-container">
                <!-- /.left-sidebar -->
                <div class="main-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-title"><center>
                                        <h4>Student Results</h4>
                                    </div>
                                    <div class="panel-body p-20">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>USN</th>
                                                    <th>Subject</th>
                                                    <th>Total</th>
                                                    <th>SGPA</th>
                                                    <th>CGPA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                    if (isset($result) && mysqli_num_rows($result) > 0) {
                        while ($rsview = mysqli_fetch_array($result)) {
                            // Calculate the total (CIE + SEE)
                            $total = $rsview['CIE'] + $rsview['SEE'];

                            echo "<tr>
                                <td>{$rsview['USN']}</td>
                                <td>{$rsview['Subject']}</td>
                                <td>{$total}</td>";

                            // Check if SGPA and CGPA are greater than 0 before displaying
                            if ($rsview['SGPA'] > 0 && $rsview['CGPA'] > 0) {
                                echo "<td>{$rsview['SGPA']}</td>
                                      <td>{$rsview['CGPA']}</td>";
                            } else {
                                echo "<td></td>
                                      <td></td>";
                            }

                            echo "</tr>";
                        }
                    }
                    ?>
                                            </tbody>
                                        </table>
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <a href="index.php">Back to Home</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->
                    </div>
                    <!-- /.main-page -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
            });
        </script>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
