<!DOCTYPE html>
<html>
<head>
	<title>Convert</title>
</head>
<body>
	<div class="container">
		<h3>Convert Radian & Degree</h3><br>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<div>
				<div>
					<label for="sel">Choose: </label>
		      		<select class="sel" name="sel">
			            <option value="1">Radian To Degree</option>
			            <option value="2">Degree To Radian</option>
			        </select>
		      	</div>
		  	</div>
		  	<br>
			<div>
				<span>Input radian or degree: </span>
				<div>
		      		<input name="input" type="text">
		      	</div>
		  	</div>
		  	<br>
		  	<div>
		  		<input class="btn" type="submit" name="Submit">
		  	</div>
		</form>

		<div>
			<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				function convert($input) {
					if ($_POST['sel'] == 1) {
						echo "<p>Input: ".$input." radians</p>";
						$convert = $input*(180/M_PI);
						echo $input." radians -> ".$convert." degrees</p>";
					} else {
						echo "<p>Input: ".$input." degrees</p>";
						$convert = $input*(M_PI/180);
						echo $input." -> ".$convert." radians</p>";	
					}
				}

				convert($_POST['input']);
			} ?>
		</div>
    </div>
</body>
</html>