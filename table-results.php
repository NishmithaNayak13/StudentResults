<?php
include('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Results</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        input {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        <?php include('includes/topbar.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-sm-6">
                                <h2 class="title">Dashboard</h2>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="form-group">
                                <label for="batch" class="col-sm-2 control-label">Batch</label>
                                <div class="col-sm-10">
                                    <select name="batch" class="form-control" id="batch" required="required">
                                        <option value="">Select Batch</option>
                                        <?php
                                        $sql = "SELECT * from tblclasses";
                                        $query = mysqli_query($dbh, $sql);
                                        echo mysqli_error($dbh);
                                        while ($rscourse = mysqli_fetch_array($query)) {
                                            echo "<option value='$rscourse[Batch]'>$rscourse[Batch]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Column 1</th>
                                        <th>Column 2</th>
                                        <th>Column 3</th>
                                        <th>Column 4</th>
                                        <th>Column 5</th>
                                        <th>Column 6</th>
                                        <th>Column 7</th>
                                        <th>Column 8</th>
                                        <th>Column 9</th>
                                        <th>Column 10</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                                        <tr>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][1]" value="<?php echo $row['column1']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][2]" value="<?php echo $row['column2']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][3]" value="<?php echo $row['column3']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][4]" value="<?php echo $row['column4']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][5]" value="<?php echo $row['column5']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][6]" value="<?php echo $row['column6']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][7]" value="<?php echo $row['column7']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][8]" value="<?php echo $row['column8']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][9]" value="<?php echo $row['column9']; ?>"></td>
                                            <td><input type="text" name="cell[<?php echo $i; ?>][10]" value="<?php echo $row['column10']; ?>"></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
