<?php

include('includes/config.php');
if(isset($_SESSION['UserName']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
 
$status=1;
$sql="INSERT INTO  tblsubjectcombination(Semester,SubjectName,SubjectCode,status) VALUES('$_POST[semester],'$_POST[subjectname]','$_POST[subjectcode]','$_POST[status]')";
$qsql = mysqli_query($dbh,$sql);
echo mysqli_error($dbh);
    if(mysqli_affected_rows($dbh)==1)
    {
        echo "<script>alert('Subject combination successfully...');</script>";
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
        <title>Subject Combination< </title>
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
                                            <h2 class="title">Add Subject Combination</h2>                                
                                        </div>
                                    </div>
                                    <div class="row breadcrumb-div">
                                        <div class="col-md-6">
                                            <ul class="breadcrumb">
                                                <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                                <li> Subjects</li>
                                                <li class="active">Add Subject Combination</li>
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
                                                        <h5>Add Subject Combination</h5>
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <form class="form-horizontal" method="post">
                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Class</label>
                                                            <div class="col-sm-10">
                                                                <select name="class" class="form-control" id="default" required="required">
                                                                    <option value="">Select Class</option>
                                                                        <?php $sql = "SELECT * from tblclasses";
                                                                            $query = $dbh->prepare($sql);
                                                                            $query->execute();
                                                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                            if($query->rowCount() > 0)
                                                                            {
                                                                                foreach($results as $result)
                                                                                {   ?>
                                                                                    <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->Batch);?></option>
                                                                                <?php }} ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="default" class="col-sm-2 control-label">Subject</label>
                                                            <div class="col-sm-10">
                                                            <select name="subject" class="form-control" id="default" required="required">
                                                            <option value="">Select Subject</option>
                                                                <?php $sql = "SELECT * from tblsubjects";
                                                                    $query = $dbh->prepare($sql);
                                                                    $query->execute();
                                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                    if($query->rowCount() > 0)
                                                                    {
                                                                        foreach($results as $result)
                                                                        {   ?>
                                                                            <option value="<?php echo htmlentities($result->id); ?>"><?php echo htmlentities($result->SubjectName); ?></option>
                                                                            <?php }} ?>
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

