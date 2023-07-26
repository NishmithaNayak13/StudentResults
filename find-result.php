<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Result Review System</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/icheck/skins/flat/blue.css">
    <link rel="stylesheet" href="css/main.css" media="screen">
    <script src="js/modernizr/modernizr.min.js"></script>
</head>
<body class="">
    <div class="main-wrapper">
        <div class="login-bg-color bg-black-300">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel login-box">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <h4>Student Result Management System</h4>
                            </div>
                        </div>
                        <div class="panel-body p-20">
                        <form action="result.php" method="post">
    <div class="form-group">
        <label for="usn">USN</label>
        <input type="text" class="form-control" id="usn" placeholder="Enter your USN" autocomplete="off" name="usn" required>
    </div>
    <div class="form-group mt-20">
        <div class="">
            <button type="submit" class="btn btn-success btn-labeled pull-right">Search<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="col-sm-6">
        <b><a href="index.php"><i class="fa fa-arrow-left"></i> Back to Home</a></b>
    </div>
</form>

                            <hr>

                        </div>
                    </div>
                    <!-- /.panel -->

                </div>
                <!-- /.col-md-6 col-md-offset-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->

    </div>
    
    <script src="js/main.js"></script>
    <script>
        $(function () {
            $('input.flat-blue-style').iCheck({
                checkboxClass: 'icheckbox_flat-blue'
            });
        });
    </script>
</body>
</html>
