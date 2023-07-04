<?php
include('includes/config.php');
if(isset($_SESSION['UserName']))
{
	echo "<script>window.location='index.php';</script>";
}
//Approve or Suspend Staff Account starts here
if(isset($_GET['acid']))
{
	$sqlas ="UPDATE mentors SET Status='$_GET[st]' WHERE Email='$_GET[acid]'";
	$qsqlas = mysqli_query($dbh,$sqlas);
	echo mysqli_error($dbh);
	if(mysqli_affected_rows($dbh) == 1)
	{
		echo "<script>alert('Mentor account status updated to $_GET[st]');</script>";
		echo "<script>window.location='manage-mentors.php';</script>";
	}
}
if(isset($_GET['delid']))
{
	$sqldel ="DELETE FROM mentors where Email='$_GET[delid]'";
	$qsqldel = mysqli_query($dbh,$sqldel);
	if(mysqli_affected_rows($dbh) == 1)
	{
		echo "<script>alert('Mentor Record deleted successfully..');</script>";
		echo "<script>window.location='manage-mentors.php';</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Manage Mentors</title>
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

            <!-- ========== TOP NAVBAR ========== -->
   <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">
<?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Manage Mentors</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                        <li> Mentors</li>
            							<li class="active">Manage Mentors</li>
            						</ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>View Mentors Info</h5>
                                                </div>
                                            </div>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Department</th>
                                                            <th>Designation</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                           <!-- <th>Creation Date</th>-->
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                  <!--  <tfoot>
                                                        <tr>
                                                          <th>#</th>
                                                            <th>Class Name</th>
                                                            <th>Class Name Numeric</th>
                                                            <th>Section</th>
                                                            <th>Creation Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>-->
                                                    <tbody>
                                                    <?php 
                                                    $sqlview = "SELECT * from mentors";
                                                    $qsqlview = mysqli_query($dbh,$sqlview);
                                                    while($rsview = mysqli_fetch_array($qsqlview))
                                                    {
                                                        echo "<tr>
                                                            <td>$rsview[MentorId]</td>
                                                            <td>$rsview[Name]</td>
                                                            <td>$rsview[Department]</td>
                                                            <td>$rsview[Designation]</td>
                                                            <td>$rsview[Email]</td>
                                                            <td>$rsview[Status] <br>";
                                                            if($rsview['Status'] == "Active")
                                                            {
                                                                echo "<a href='manage-mentors.php?st=Inactive&acid=$rsview[Email]' class='btn btn-danger' onclick='return confirmst()' >Inactive</a>";
                                                            }
                                                            else
                                                            {
                                                                echo "<a href='manage-mentors.php?st=Active&acid=$rsview[Email]' class='btn btn-primary' onclick='return confirmst()'  >Approve</a>";
                                                            }
                                                            echo"</td>
                                                                            <td>
                                                                            <a href='add-mentors.php?editid=$rsview[Email]' class='btn btn-info'>Edit</a>
                                                                            <a href='manage-mentors.php?delid=$rsview[Email]' class='btn btn-danger' onclick='return confirmdel()' >Delete</a>
                                                                        </td></tr>";
                                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                                </div>
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

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
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
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
        <script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
    </body>
</html>

