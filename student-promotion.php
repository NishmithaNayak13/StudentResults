<?php
session_start();
include('includes/config.php');
if (!isset($_SESSION['Email'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['promote'])) {
    // Assuming you have a 'batch' column in the student table
    $currentBatch = $_GET['promote']; // The current batch to promote (e.g., 'Third Year')

    // Check the current batch and promote students accordingly
    switch ($currentBatch) {
        case '4':
            // Move Third Year students to Passed Out status
            $sql = "UPDATE tblclasses SET Semester='Passed Out', student_status='Inactive' WHERE Batch='$currentBatch'";
            $qsql = mysqli_query($dbh, $sql);
            if (mysqli_affected_rows($dbh) > 0) {
                echo "<script>alert('Students Promoted to Passed Out');</script>";
                echo "<script>window.location='student-promotion.php';</script>";
            }
            break;
        case '3':
            // Move Second Year students to Third Year
            $sql = "UPDATE tblclasses SET Semester='4' WHERE Batch='$currentBatch'";
            $qsql = mysqli_query($dbh, $sql);
            if (mysqli_affected_rows($dbh) > 0) {
                echo "<script>alert('Students Promoted to fourth sem');</script>";
                echo "<script>window.location='student_promotion.php';</script>";
            }
            break;
        case '2':
            // Move First Year students to Second Year
            $sql = "UPDATE tblclasses SET Semester='3' WHERE Batch='$currentBatch'";
            $qsql = mysqli_query($dbh, $sql);
            if (mysqli_affected_rows($dbh) > 0) {
                echo "<script>alert('Students Promoted to third sem');</script>";
                echo "<script>window.location='student_promotion.php';</script>";
            }
		case '1':
			// Move First Year students to Second Year
			$sql = "UPDATE tblclasses SET Semester='2' WHERE Batch='$currentBatch'";
			$qsql = mysqli_query($dbh, $sql);
			if (mysqli_affected_rows($dbh) > 0) {
			echo "<script>alert('Students Promoted to second sem');</script>";
			echo "<script>window.location='student_promotion.php';</script>";
			}
            break;
        default:
            echo "Invalid batch selected for promotion";
    }
}
?>

  <!-- event section 
  <section class="event_section layout_padding">
  <form method="">
    <div class="container">
      <div class="heading_container">
        <h3>
          3rd Year Students
        </h3>
        <p>
          Student Records
        </p>
      </div>
      <div class="event_container">
        <div class="">-->
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Student Name</th>
			<th>USN</th>
			<th>Batch</th>
			<th>Sem</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sqlview = "SELECT tblstudents.*,tblclasses.* FROM  tblstudents LEFT JOIN tblclasses ON course.course_id=student.course_id WHERE Semester='4'";
		$qsqlview = mysqli_query($dbh,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			echo "<tr>
				
				<td>$rsview[StudentName]</td>
				<td>$rsview[USN]</td>
				<td>$rsview[Batch]</td>
				<td>$rsview[Semester]</td>
				</tr>";
		}
	?>
	</tbody>
</table>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
	   <button type="submit" name="promote" id="promote" class="btn btn-success">Promote</button>
      </div>
    </div>
	</form>
  </section>

  <!-- end event section -->
    <section class="event_section layout_padding">
	<form method="">
    <div class="container">
      <div class="heading_container">
        <h3>
          2nd Year Students
        </h3>
        <p>
          Student Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Image</th>
			<th>Student Name</th>
			<th>Course</th>
			<th>Roll No.</th>
			<th>Class</th>
			<th>Gender</th>
			<th>More</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sqlview = "SELECT student.*,course.course_title FROM  student LEFT JOIN course ON course.course_id=student.course_id WHERE st_class='Second Year'";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			$rsjsonarr = json_encode($rsview);
			if($rsview['student_image'] == "")
			{
				$filename= "images/defaultimage.png";
			}
			else if(file_exists("studentimg/" .$rsview['student_image']))
			{
				$filename= "studentimg/" .$rsview['student_image'];
			}
			else
			{
				$filename= "images/defaultimage.png";
			}
			echo "<tr>
				<td><img src='$filename' style='width: 75px;height:90px;' ></td>
				<td>$rsview[student_name]</td>
				<td>$rsview[course_title]</td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[st_class]</td>
				<td>$rsview[gender]</td>
				<td>";
echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#loadStudentDetailedModal' onclick='funloadstudentprofile($rsjsonarr)'>View<br> More</button>";				
				echo "</td>
				<td>$rsview[student_status] <br>
				</tr>";
		}
	?>
	</tbody>
</table>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		<button type="submit" name="submit2" id="submit2" class="btn btn-success" onclick>Promote</button>
      </div>
    </div>
	</form>
  </section>
  
  <section class="event_section layout_padding">
  <form method="">
  <div class="container">
      <div class="heading_container">
        <h3>
          1st Year Students
        </h3>
        <p>
          Student Records
        </p>
      </div>
      <div class="event_container">
        <div class="">
<!-- ####################VIEW TABLE STARTS HERE ######### ---->
<table id="datatableplugin" class="table table-bordered">
	<thead>
		<tr>
			<th>Image</th>
			<th>Student Name</th>
			<th>Course</th>
			<th>Roll No.</th>
			<th>Class</th>
			<th>Gender</th>
			<th>More</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sqlview = "SELECT student.*,course.course_title FROM  student LEFT JOIN course ON course.course_id=student.course_id WHERE st_class='First Year'";
		$qsqlview = mysqli_query($con,$sqlview);
		while($rsview = mysqli_fetch_array($qsqlview))
		{
			$rsjsonarr = json_encode($rsview);
			if($rsview['student_image'] == "")
			{
				$filename= "images/defaultimage.png";
			}
			else if(file_exists("studentimg/" .$rsview['student_image']))
			{
				$filename= "studentimg/" .$rsview['student_image'];
			}
			else
			{
				$filename= "images/defaultimage.png";
			}
			echo "<tr>
				<td><img src='$filename' style='width: 75px;height:90px;' ></td>
				<td>$rsview[student_name]</td>
				<td>$rsview[course_title]</td>
				<td>$rsview[student_rollno]</td>
				<td>$rsview[st_class]</td>
				<td>$rsview[gender]</td>
				<td>";
echo "<button type='button' class='btn btn-warning' data-toggle='modal' data-target='#loadStudentDetailedModal' onclick='funloadstudentprofile($rsjsonarr)'>View<br> More</button>";				
				echo "</td>
				<td>$rsview[student_status] <br>
				</tr>";
		}
	?>
	</tbody>
</table>
<!-- ####################VIEW TABLE ENDS HERE ######### ---->
        </div>
		<button type="submit" name="submit3" id="submit3" class="btn btn-success">Promote</button>
      </div>
    </div>
	</form>
  </section>
<?php
include "footer.php";
?>
<!-- Modal -->
<div id="loadStudentDetailedModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Student Profile</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="loadstudentprofile"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
function funloadstudentprofile(jsonarr)
{
	var tbl = "";
	var tbl = "<table class='table table-bordered'>"
    tbl += "<tr><th>Name</th><td>" + jsonarr.student_name +"</td></tr>";
    tbl += "<tr><th>Roll No.</th><td>" + jsonarr.student_rollno +"</td></tr>";
    tbl += "<tr><th>Course</th><td>" + jsonarr.course_title +"</td></tr>";
    tbl += "<tr><th>Class</th><td>" + jsonarr.st_class +"</td></tr>";
    tbl += "<tr><th>Course</th><td>" + jsonarr.course_title +"</td></tr>";
    tbl += "<tr><th>Gender</th><td>" + jsonarr.gender +"</td></tr>";
    tbl += "<tr><th>Date of Birth</th><td>" + jsonarr.dob +"</td></tr>";
    tbl += "<tr><th>Language</th><td>" + jsonarr.language +"</td></tr>";
    tbl += "<tr><th>Course</th><td>" + jsonarr.course_title +"</td></tr>";
    tbl += "<tr><th>Elective Paper</th><td>" + jsonarr.elective_paper +"</td></tr>";
    tbl += "<tr><th>Extension Activities</th><td>" + jsonarr.extension_activities +"</td></tr>";
    tbl += "<tr><th>Account Status</th><td>" + jsonarr.student_status +"</td></tr>";
	tbl += "</table>"
	$('#loadstudentprofile').html(tbl)
}
</script>