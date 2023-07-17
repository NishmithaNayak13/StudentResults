<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>...</title>
    <link href="">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <hr>
                <?php
                if(isset($_SESSION['status']))
                {
                    echo"<h5>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }
                ?>
                <form action="excel_student.php" method="POST" enctype="multipart/form-data">
                    <div class="card card-body shadow">
                        <div class="row">
                            <div class="col-md-2 my-auto">
                                <h5>Select a File</h5>
                            </div>
                            <div class="col-md-4">
                                <input type="file" name="import_file" class="form-control"/>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" name="import_file_btn" class="btn btn-primary">Upload</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>