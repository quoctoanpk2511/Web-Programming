<!DOCTYPE html>
<html>
<head>
	<title>Convert</title>
</head>
<body>
	<div class="container">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="row">
				<span class="active">Choose: </span>
				<div class="input-field">
		      		<select class="selector" name="selector">
			            <option value="1">Radian to Degree</option>
			            <option value="2">Degree to Radian</option>
			        </select>
		      	</div>
		  	</div>
			<div class="row">
				<span class="active">Input radian or degree: </span>
				<div class="input-field">
		      		<input placeholder="Radian or Degree" name="input" type="text" class="validate">
		      	</div>
		  	</div>
		  	<div class="row">
		  		<input class="btn" type="submit" name="Submit">
		  	</div>
		</form>

		<div class="row">
			<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				function convert($input) {
					if ($_POST['selector'] == 1) {
						echo "<p>Your input: ".$input." radians</p>";
						$convert = (180/M_PI)*$input;
						echo $input." radians is equal to ".$convert." degrees</p>";
					} else {
						echo "<p>Your input: ".$input." degrees</p>";
						$convert = (M_PI/180)*$input;
						echo $input." degrees is equal to ".$convert." radians</p>";	
					}
				}

				convert($_POST['input']);
			} ?>
		</div>
    </div>
</body>
</html>

<script type="text/javascript">
  var elems = document.querySelectorAll('.selector');
  M.FormSelect.init(elems,{});
</script>