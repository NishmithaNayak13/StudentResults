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
        $sql = "UPDATE tblclasses SET Batch='$_POST[batch]', Semester='$_POST[semester]', Section='$_POST[section]' WHERE Batch='$_GET[editid]'";
        $qsql = mysqli_query($dbh,$sql);
        echo mysqli_error($dbh);
        if(mysqli_affected_rows($dbh) == 1)
        {
            echo "<script>alert('Class Record Updated Successfully..');</script>";
			echo "<script>window.location='manage-classes.php';</script>";

        }
    }
}
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM tblclasses where Batch='$_GET[editid]'";
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
        <title>Update Class</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
       
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
         <style>
        .errorWrap {
                    padding: 10px;
                    margin: 0 0 20px 0;
                    background: #fff;
                    border-left: 4px solid #dd3d36;
                    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                    }
        .succWrap{
                  padding: 10px;
                  margin: 0 0 20px 0;
                  background: #fff;
                  border-left: 4px solid #5cb85c;
                  -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                  box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
                }
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!--End Top bar-->
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
                                    <h2 class="title">Update Student Class</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">Classes</a></li>
            							<li class="active">Update Class</li>
            						</ul>
                                </div>
                               
                            </div>
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
                                                <h5>Update Student Class</h5>
                                            </div>
                                        </div>
    
                                            <div class="panel-body">
                                                <form method="post">
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Batch</label>
                                                		<div class="">
                                                			<input type="text" name="batch" class="form-control" required="required" id="batch" value="<?php echo $rsedit['Batch']; ?>">                                                           
                                                		</div>
                                                	</div>
                                                    <div class="form-group has-success">
                                                        <label for="success" class="control-label">Semester</label>
                                                		<div class="">
                                                			<input type="text" name="semester" class="form-control" required="required" id="semester" value="<?php echo $rsedit['Semester']; ?>">                                                           
                                                		</div>
                                                	</div>
                                                    <div class="form-group has-success">
                                                        <div class="">
                                                           <button type="submit" name="submit" class="btn btn-success btn-labeled">Submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                        </div>
                                                    </div>  
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-8 col-md-offset-2 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>              
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
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
    </body>
</html>


