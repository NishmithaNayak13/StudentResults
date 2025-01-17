<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['UserName']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{

    if(isset($_GET['editid']))
    {
        $sql = "UPDATE tblstudents SET StudentName='$_POST[name]', USN='$_POST[usn]', Batch='$_POST[batch]', Section='$_POST[section]', Mentor='$_POST[mentor]', Status='$_POST[status]' WHERE USN='$_GET[editid]'";
        $qsql = mysqli_query($dbh,$sql);
        echo mysqli_error($dbh);
        if(mysqli_affected_rows($dbh) == 1)
        {
            echo "<script>alert('Student Record Updated Successfully..');</script>";
			echo "<script>window.location='manage-students.php';</script>";

        }
    }
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM tblstudents where USN='$_GET[editid]'";
	$qsqledit = mysqli_query($dbh,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Admission< </title>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Fill the Student info</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                    <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Full Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="name" required="required" autocomplete="off" value="<?php echo $rsedit['StudentName']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">USN</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="usn" class="form-control" id="usn" maxlength="" required="required" autocomplete="off" value="<?php echo $rsedit['USN']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Batch</label>
                                        <div class="col-sm-10">
                                            <select name="batch" class="form-control" id="batch" required="required" value="<?php echo $rsedit['Batch']; ?>">
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
                                        <label for="default" class="col-sm-2 control-label">Section</label>
                                        <div class="col-sm-10">
                                        <select name="section" id="section" class="form-control" value="<?php echo $rsedit['Section']; ?>">
                                                <option value="">Select Section</option>
                                                <?php
                                                $arr = array("A","B","C","D");
                                                foreach($arr as $val)
                                                {
                                                    if($val == $rsedit['section'])
                                                    {
                                                    echo "<option value='$val' selected >$val</option>";
                                                    }
                                                    else
                                                    {
                                                    echo "<option value='$val'>$val</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="default" class="col-sm-2 control-label">Mentor</label>
                                        <div class="col-sm-10">
                                           <select name="mentor" class="form-control" id="mentor" required="required" value="<?php echo $rsedit['Mentor']; ?>">
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
                                        <label for="deafult" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" id="status" class="form-control" value="<?php echo $rsedit['Status']; ?>">
                                                <option value="">Select Status</option>
                                                <?php
                                                $arr = array("Active","Inactive");
                                                foreach($arr as $val)
                                                {
                                                    if($val == $rsedit['status'])
                                                    {
                                                    echo "<option value='$val' selected >$val</option>";
                                                    }
                                                    else
                                                    {
                                                    echo "<option value='$val'>$val</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
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