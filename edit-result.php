<?php
include('includes/config.php');
if(isset($_SESSION['UserName']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
    $sql="INSERT INTO results(Mentor,Batch,USN,Semester,Subject,MSE1,MSE2,Task1,Task2,CIE,SEE) VALUES('$_POST[mentor]','$_POST[batch]','$_POST[usn]','$_POST[semester]','$_POST[subject]','$_POST[mse1]','$_POST[mse2]','$_POST[task1]','$_POST[task2]','$_POST[cie]','$_POST[see]')";
    $qsql = mysqli_query($dbh,$sql);
    echo mysqli_error($dbh);
    if(mysqli_affected_rows($dbh)==1)
    {
        echo "<script>alert('Student result added successfully...');</script>";
        echo "<script>window.location='dashboard.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Result </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
  <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Edit Result</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Result</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                           
                                            <div class="panel-body">

                                         <form class="form-horizontal" method="post">

                                        
                                        <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Mentor</label>
                                        <div class="col-sm-10">
                                           <select name="mentor" class="form-control" id="mentor" required="required">
                                                <option value="">Select Mentor</option>
                                                <?php $sql = "SELECT * from mentors";
                                                 $query = mysqli_query($dbh,$sql);
                                                 echo mysqli_error($dbh);
                                                 while($rscourse = mysqli_fetch_array($query))
                                                     {  
                                                         echo "<option value='$rscourse[Name]'>$rscourse[Name]</option>";
                                                     } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Batch</label>
                                        <div class="col-sm-10">
                                            <select name="batch" class="form-control" id="batch" required="required">
                                                <option value="">Select Batch</option>
                                                <?php $sql = "SELECT * from tblclasses";
                                                $query = mysqli_query($dbh,$sql);
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
                                        <label for="default" class="col-sm-2 control-label">Student USN</label>
                                        <div class="col-sm-10">
                                            <select name="usn" class="form-control" id="usn" required="required">
                                                <option value="">Select USN</option>
                                                <?php $sql = "SELECT * from tblstudents";
                                                $query = mysqli_query($dbh,$sql);
                                                echo mysqli_error($dbh);
                                                while($rs = mysqli_fetch_array($query))
                                                    {  
                                                        echo "<option value='$rs[USN]'>$rs[USN]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Semester</label>
                                        <div class="col-sm-10">
                                            <select name="semester" class="form-control" id="semester" required="required">
                                                <option value="">Select Semester</option>
                                                <?php $sql = "SELECT DISTINCT(Semester) FROM tblsubjects";
                                                $query = mysqli_query($dbh,$sql);
                                                echo mysqli_error($dbh);
                                                while($rs = mysqli_fetch_array($query))
                                                    {  
                                                        echo "<option value='$rs[Semester]'>$rs[Semester]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Subject</label>
                                        <div class="col-sm-10">
                                            <select name="subject" class="form-control" id="subject" required="required">
                                                <option value="">Select Subject</option>
                                                <?php $sql = "SELECT * from tblsubjects";
                                                $query = mysqli_query($dbh,$sql);
                                                echo mysqli_error($dbh);
                                                while($rs = mysqli_fetch_array($query))
                                                    {  
                                                        echo "<option value='$rs[SubjectName]'>$rs[SubjectName]</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">MSE 1</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="mse1" class="form-control" id="mse1" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">MSE 2</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="mse2" class="form-control" id="mse2" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">TASK 1</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="task1" class="form-control" id="task1" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">TASK 2</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="task2" class="form-control" id="task2" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">CIE</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="cie" class="form-control" id="cie" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">SEE</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="see" class="form-control" id="see" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">SGPA</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="sgpa" class="form-control" id="sgpa" required="required" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">CGPA</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="cgpa" class="form-control" id="cgpa" required="required" autocomplete="off">
                                        </div>
                                    </div> -->
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" id="submit" class="btn btn-primary">Declare Result</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>