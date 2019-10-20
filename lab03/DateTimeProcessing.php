<!DOCTYPE html>
<html>
<head>
	<title>Date Time Processing</title>
	<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body >
	<div class="container">
		<h3>Date Time Processing</h3>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" name="formInput" method="POST">
			<div class="row">
				<div class="col-12">
					Your name:<br>
					<input type="text" name="name"><br>
				</div>
			</div>

		 	<div class="row">
		    	<div class="col-12">
		    		Date:<br>
					<select name="day">
						<?php for($i=1;$i<=31;$i++) {
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select>
					<select name="month">
						<?php for($i=1;$i<=12;$i++) {
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select><select name="year">
						<?php for($i=1998;$i<=2020;$i++) {
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select>
				</div>
			</div>

			<div class="row">
		    	<div class="col-12">
		    		Time:<br>
					<select name="hour">
						<?php for($i=0;$i<=23;$i++) {
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select>
					<select name="minute">
						<?php for($i=0;$i<=59;$i++) {
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select><select name="second">
						<?php for($i=0;$i<=59;$i++) {
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select>
				</div>
			</div>

			<div class="row">
				<br>
  				<input type="submit" value="Submit">
			</div>
		</form>

		<div class="row">
			<br>
			<?php
				$name = $_POST['name'];
				$hour = $_POST['hour'];
				$minute = $_POST['minute'];
				$second = $_POST['second'];
				$day = $_POST['day'];
				$month = $_POST['month'];
				$year = $_POST['year'];
				echo "<p>Hi ".$_POST['name']."!</p>";
				echo "<p>You have choose to have an appointment on ".$hour.":".$minute.":".$second.", ".$day."/".$month."/".$year;;	
				echo "<p>More information</p>";
				if ($hour>12) {
					$hour = $hour - 12;
					echo "<p>In 12 hours, the time and date is ".$hour.":".$minute.":".$second." PM, ".$day."/".$month."/".$year;
				}

				if (($month == 2) && ($year % 100 == 0)) {
					if ($year % 400 == 0) {
						echo "<p>This month has 29 days</p>";
					} else {
						echo "<p>This month has 28 days</p>";
					} 	
				} else if (($month == 2) && ($year % 4 == 0)) {
		            echo "<p>This month has 29 days</p>";
		        } else if (($month == 2) && ($year % 4 != 0)) {
		            echo "<p>This month has 28 days</p>";
		        }
		        if (($month == 1) || ($month == 3) || ($month == 5) || ($month == 7) || ($month == 8) || ($month == 10) || ($month == 12)) {
		            echo "<p>This month has 31 days</p>";
		        } else {
		            echo "<p>This month has 30 days</p>";
		        }
			?>
		</div>
	</div>
	
</body>
</html>