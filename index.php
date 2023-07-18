    <?php
    session_start();
    include('includes/config.php');
    if(isset($_SESSION['UserName']))
    {
        echo "<script>window.location='dashboard.php';</script>";
    }
    if(isset($_SESSION['Email']))
    {
        echo "<script>window.location='dashboard-mentor.php';</script>";
    }
    if(isset($_POST['login']))
    {
        if(isset($_POST['username']))
        {
            $password = $_POST['password'];
            $sql = "SELECT * FROM admin where UserName='$_POST[username]' AND Password='$password'";
            $qsql = mysqli_query($dbh,$sql);
            echo mysqli_error($dbh);
            if(mysqli_num_rows($qsql) == 1)
            {
                $rslogin = mysqli_fetch_array($qsql);
                $_SESSION['UserName'] = $rslogin['UserName'];
                echo "<script>window.location='dashboard.php';</script>";
            }
            $password = $_POST['password'];
            $sql = "SELECT * FROM mentors where Email='$_POST[username]' AND Password='$password' AND Status='Active'";
            $qsql = mysqli_query($dbh,$sql);
            echo mysqli_error($dbh);
            if(mysqli_num_rows($qsql) == 1)
            {
                $rslogin = mysqli_fetch_array($qsql);
                $_SESSION['Email'] = $rslogin['Email'];
                echo "<script>window.location='dashboard-mentor.php';</script>";
            }
            else
            {
                echo "<script>alert('Wrong Credentials. Please try again');</script>";
            }
        }
    }
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
            
            <link rel="stylesheet" href="css/main.css" media="screen" >
            <script src="js/modernizr/modernizr.min.js"></script>
        </head>
        <body class="">
            <div class="main-wrapper">

                <div class="">
                    <div class="row">
    <h1 align="center">Student Progress Review</h1>
                        <div class="col-lg-6 visible-lg-block">

    <section class="section">
                                <div class="row mt-40">
                                    <div class="col-md-10 col-md-offset-1 pt-50">

                                        <div class="row mt-30 ">
                                            <div class="col-md-11">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <div class="panel-title text-center">
                                                            <h4>For Students</h4>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body p-20">
                                                        <form class="form-horizontal" method="post">
                                                            <div class="form-group">
                                                                <label for="inputEmail3" class="col-sm-6 control-label">Results</label>
                                                                <div class="col-sm-6">
                                                                <i><b><a href="find-result.php">CLICK HERE</a></b></i>
                                                                </div>
                                                            </div>

                                                        </form>




                                                    </div>
                                                </div>
                                                <!-- /.panel -->

                                            </div>
                                            <!-- /.col-md-11 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                                <!-- /.row -->
                            </section>
                        </div>
                        <div class="col-lg-6">
                            <section class="section">
                                <div class="row mt-40">
                                    <div class="col-md-10 col-md-offset-1 pt-50">

                                        <div class="row mt-30 ">
                                            <div class="col-md-11">
                                                <div class="panel">
                                                    <div class="panel-heading">
                                                        <div class="panel-title text-center">
                                                            <h4>Admin/Mentor Login</h4>
                                                        </div>
                                                    </div>
                                                    <div class="panel-body p-20">
                                                        <form class="form-horizontal" method="post">
                                                            <div class="form-group">
                                                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="UserName">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                                <div class="col-sm-10">
                                                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                                                </div>
                                                            </div>

                                                            <div class="form-group mt-20">
                                                                <div class="col-sm-offset-2 col-sm-10">

                                                                    <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                                </div>
                                                            </div>
                                                        </form>




                                                    </div>
                                                </div>
                                                <!-- /.panel -->
                                            </div>
                                            <!-- /.col-md-11 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                                <!-- /.row -->
                            </section>

                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /. -->

            </div>
            <!-- /.main-wrapper -->
            <!-- ========== THEME JS ========== -->
            <script src="js/main.js"></script>
            <script>
                $(function(){

                });
            </script>
        </body>
    </html>
