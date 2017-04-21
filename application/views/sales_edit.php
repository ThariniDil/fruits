<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	</style>
</head>
<body>

<div id="container" class="container">

<div class="row">
 <div class="col-md-8 col-md-offset-2">
		<h2 class="text-center">Edit Sales form here </h2>
		<br><br>
	<?php

      foreach ($edit_data as $key => $data) { 
    ?>
	<form method="post" action="<?php echo site_url('Sales/update_data/'.$data['id'].''); ?>" name="data_register">
		<label for="Name">Enter Sales Person Name</label>
		<input type="text" class="form-control" name="sname" value="<?php echo $data['sname']; ?>" required >
		<br>
		<label for="tel">Enter Sales Person Tel</label>
		<input type="text" class="form-control" name="stel" value="<?php echo $data['stel']; ?>" required>
		<br>
                <label for="tel">Enter Date</label>
		<input type="text" class="form-control" name="date" value="<?php echo $data['date']; ?>" required>
		<br>
                <label>Customer:</label><br />

                        <select class="turnintodropdown" name="cid" style="height: 40px; width: 195px; ">
                            <option value="">-Select Customer-</option>
                            <?php
//$sql = "SELECT * FROM passenger";
                            $result = mysqli_query($con, "SELECT * FROM customer");

                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['cname']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                <br><br>
                        <label>Fruit:</label><br />

                        <select class="turnintodropdown" name="cid" style="height: 40px; width: 195px; ">
                            <option value="">-Select Fruit-</option>
                            <?php
//$sql = "SELECT * FROM passenger";
                            $result = mysqli_query($con, "SELECT * FROM fruits");

                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['fname']; ?></option>
                                <?php
                            }
                            ?>
                        </select><br>
		<button type="submit" class="btn btn-primary pull-right">Submit</button>
		<br><br>
	</form>
	 <?php
      }
     ?>
	<br><br>
 </div>
</div>
  
</div>

</body>
</html>