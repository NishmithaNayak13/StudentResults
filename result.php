j<?php
session_start();
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Progress Review</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-12">
                                    <h2 class="title" align="center">Result Review System</h2>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th rowspan="2">USN</th>
                                                        <th rowspan="2">Name</th>
                                                        <th colspan="8" class="text-center">Subjects</th>
                                                        <th rowspan="2">SGPA</th>
                                                        <th rowspan="2">CGPA</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Sub 1</th>
                                                        <th>Sub 2</th>
                                                        <th>Sub 3</th>
                                                        <th>Sub 4</th>
                                                        <th>Sub 5</th>
                                                        <th>Sub 6</th>
                                                        <th>Sub 7</th>
                                                        <th>Sub 8</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                                <!-- <th scope="row" colspan="2">Download Result</th>           
                                                                        <td><b><a href="download-result.php">Download </a> </b></td>
                                                            </tr>     
                                                        <div class="alert alert-warning left-icon-alert" role="alert">
                                                            <strong>Notice!</strong> Your result not declare yet
                                                        </div>
                                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                                            strong>Oh snap!</strong>
                                                        </div> -->
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
