<?php
session_start();
include('includes/config.php');
if(!isset($_SESSION['Email']))
{
	echo "<script>window.location='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
            <?php include('includes/topbar-mentors.php');?> 
            <div class="content-wrapper">
                <div class="content-container">
                    <?php include('includes/leftbar-mentors.php');?>  
                        <div class="main-page">
                            <div class="container-fluid">
                                <div class="row page-title-div">
                                    <div class="col-md-6">
                                        <h2 class="title">Manage Students</h2>
                                    </div>
                                </div>
                                <div class="row breadcrumb-div">
                                    <div class="col-md-6">
                                        <ul class="breadcrumb">
            							    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                            <li> Students</li>
            							    <li class="active">Manage Students</li>
            						    </ul>
                                    </div>
                                </div>
                            </div>

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Students Info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Student Name</th>
                                                            <th>USN</th>
                                                            <th>Batch</th>
                                                            <th>Section</th>
                                                            <th>Mentor</th>
                                                           <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    <?php 
                                                    $mentorEmail = $_SESSION['Email'];
                                                    $mentorQuery = "SELECT Name FROM mentors WHERE Email='$mentorEmail'";
                                                    $qmentor = mysqli_query($dbh, $mentorQuery);
                                                    $mentorRow = mysqli_fetch_array($qmentor);
                                                    $mentor = $mentorRow['Name'];
                                                        $sql = "SELECT * from tblstudents WHERE Mentor='$mentor'";
                                                        $query = mysqli_query($dbh,$sql);
                                                        while($rsview = mysqli_fetch_array($query))
                                                        {
                                                            echo "<tr>
                                                                <td>$rsview[StudentId]</td>                                                               
                                                                <td>$rsview[StudentName]</td>
                                                                <td>$rsview[USN]</td>
                                                                <td>$rsview[Batch]</td>
                                                                <td>$rsview[Section]</td>
                                                                <td>$rsview[Mentor]</td>
                                                                <td>$rsview[Status] <br>";
                                                                echo"</td>
                                                                        <td>
                                                                            <a href='review.php?charid=$rsview[USN]' class='btn btn-info'>Review</a>
                                                                        </td>
                                                                </tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>            
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
        <script src="js/DataTables/datatables.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>