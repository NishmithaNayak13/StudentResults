<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

// Initialize variables
$sgpa_data = [];
$cgpa_data = [];

// Check if the charid parameter is provided
if (isset($_GET['charid'])) {
    $usn = $_GET['charid'];

    // Assuming the "results" table structure, retrieve the results based on the provided USN
    $sqlview = "SELECT SGPA, CGPA FROM results WHERE USN='$usn' AND SGPA > 0 AND CGPA > 0";
    $result = mysqli_query($dbh, $sqlview);

    // Check for database errors
    if (!$result) {
        die('Database Error: ' . mysqli_error($dbh));
    }

    // Fetch SGPA and CGPA data
    while ($row = mysqli_fetch_assoc($result)) {
        $sgpa_data[] = $row['SGPA'];
        $cgpa_data[] = $row['CGPA'];
    }

    if (empty($sgpa_data) && empty($cgpa_data)) {
        echo "No data found for the provided USN: $usn";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... Other meta tags, CSS, and head content ... -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Review</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body>
    <!-- ... Your HTML content ... -->

    <?php if (!empty($sgpa_data)) { ?>
        <div>
            <canvas id="sgpaChart" width="400" height="200"></canvas>
        </div>
        <script>
            var sgpaData = {
                label: 'SGPA',
                data: <?php echo json_encode($sgpa_data); ?>,
                borderColor: 'blue',
                fill: false,
            };

            var ctx1 = document.getElementById('sgpaChart').getContext('2d');
            new Chart(ctx1, {
                type: 'line', // Update the type to 'line'
                data: {
                    labels: <?php echo json_encode(array_map(function($index) { return 'Data ' . ($index + 1); }, array_keys($sgpa_data))); ?>,
                    datasets: [sgpaData],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 10, // Set the maximum value of 10 for X-axis
                            display: true,
                            title: {
                                display: true,
                                text: 'Data Points',
                            },
                        },
                        y: {
                            beginAtZero: true,
                            max: 10,
                            display: true,
                            title: {
                                display: true,
                                text: 'SGPA',
                            },
                        },
                    },
                },
            });
        </script>
    <?php } ?>

    <?php if (!empty($cgpa_data)) { ?>
        <div>
            <canvas id="cgpaChart" width="400" height="200"></canvas>
        </div>
        <script>
            var cgpaData = {
                label: 'CGPA',
                data: <?php echo json_encode($cgpa_data); ?>,
                borderColor: 'green',
                fill: false,
            };

            var ctx2 = document.getElementById('cgpaChart').getContext('2d');
            new Chart(ctx2, {
                type: 'line', // Update the type to 'line'
                data: {
                    labels: <?php echo json_encode(array_map(function($index) { return 'Data ' . ($index + 1); }, array_keys($cgpa_data))); ?>,
                    datasets: [cgpaData],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 10, // Set the maximum value of 10 for X-axis
                            display: true,
                            title: {
                                display: true,
                                text: 'Data Points',
                            },
                        },
                        y: {
                            beginAtZero: true,
                            max: 10,
                            display: true,
                            title: {
                                display: true,
                                text: 'CGPA',
                            },
                        },
                    },
                },
            });
        </script>
    <?php } ?>
    <!-- ... Other JavaScript and body content ... -->
</body>
</html>
