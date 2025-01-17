<?php
include('includes/config.php');
session_start();
if(!isset($_SESSION['UserName']))
{
	header("Location: index.php");
	exit;
}

if(isset($_POST['submit']))
{
    $sql = "INSERT INTO mentors(Name,Department,Designation,Email,Password,Status) VALUES('$_POST[name]','$_POST[dept]','$_POST[desig]','$_POST[email]','$_POST[password]','$_POST[status]')";
    $qsql = mysqli_query($dbh,$sql);
    echo mysqli_error($dbh);
    if(mysqli_affected_rows($dbh)==1)
    {
        echo "<script>alert('Registered successfully...');</script>";
        echo "<script>window.location='dashboard.php';</script>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mentor</title>
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
                            <h2 class="title">Mentorship</h2>
                        </div>
                    </div>
                    <div class="row breadcrumb-div">
                        <div class="col-md-6">
                            <ul class="breadcrumb">
                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                <li class="active">Mentorship</li>
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
                                        <h5>Fill the Mentor info</h5>
                                    </div>
                                </div>
                                <form class="form-horizontal" method="post">
                                    <div class="col-md-6">
                                        <label for="default" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" class="form-control" id="name" required="" autocomplete="off">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-6">
                                        <label for="default" class="col-sm-2 control-label">Department</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="dept" class="form-control" id="dept" required="" autocomplete="off">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-6">
                                        <label for="default" class="col-sm-2 control-label">Designation</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="desig" class="form-control" id="desig" required="" autocomplete="off">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-6">
                                        <label for="default" class="col-sm-2 control-label">Email ID</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="email" required="" autocomplete="off">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-6">
                                        <label for="default" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="password" class="form-control" id="password" required="" autocomplete="off">
                                        </div>
                                    </div><br><br>
                                    <div class="col-md-6">
                                        <label for="default" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Select Status</option>
                                                <?php
                                                $arr = array("Active","Inactive");
                                                foreach($arr as $val)
                                                {
                                                    if($val == $rsedit['status'])
                                                    {
                                                        echo "<option value='$val' selected>$val</option>";
                                                    }
                                                    else
                                                    {
                                                        echo "<option value='$val'>$val</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div><br><br>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-primary" style="position:relative;height: 100px">Add Mentor</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
