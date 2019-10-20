<!DOCTYPE html>
<html>
<head>
	<title>Convert</title>
</head>
<body>
	<div class="container">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="row">
				<span class="active">Person 1: </span>
				<div>
                    <label for="name1">Name</label>
                    <input name="name1" type="text">
		      	</div>
		  	</div>

            <div class="row">
                <span>Birthday</span>
                <div class="col">
                <select class="sel" name="day1">
                    <?php for ($i=1; $i<=31; $i++) echo "<option value=".$i.">".$i."</option>"; ?>
                </select>
            
                <select class="sel" name="month1">
                    <?php for ($i=1; $i<=12; $i++) echo "<option value=".$i.">".$i."</option>"; ?>
                </select>
                
                <select class="sel" name="year1">
                    <?php for ($i=1900; $i<=2019; $i++) echo "<option value=".$i.">".$i."</option>"; ?>
                </select>
                </div>
            </div>            
            <br>
			<div class="row">
				<span class="active">Person 2: </span>
				<div>
                    <label for="name2">Name</label>
                    <input name="name2" type="text">
		      	</div>
		  	</div>

            <div class="row">
                <span>Birthday</span>
                <div class="col">
                <select class="sel" name="day2">
                    <?php for ($i=1; $i<=31; $i++) echo "<option value=".$i.">".$i."</option>"; ?>
                </select>
                
                <select class="sel" name="month2">
                    <?php for ($i=1; $i<=12; $i++) echo "<option value=".$i.">".$i."</option>"; ?>
                </select>
                
                <select class="sel" name="year2">
                    <?php for ($i=1900; $i<=2019; $i++) echo "<option value=".$i.">".$i."</option>"; ?>
                </select>
                </div>
            </div>
            <br>
		  	<div class="row">
		  		<input class="btn" type="submit" name="Submit">
		  	</div>
		</form>

		<div class="row">
			<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				function convert($day, $month, $year) {
                    $month_list = ["January", "February", "March", "April", "May", "June", "July", "August", "September",
                    "October", "November", "December"];
                    return $month_list[$month-1]." ".$day.", ".$year;
                }
                
                function days_diff($day1, $day2) { 
                    $diff = abs($day1 - $day2);
                    return $diff." days";
                }

                function years_diff($year1, $year2) { 
                    $diff = abs($year1 - $year2);
                    return $diff." years";
                }

                function age($year) {
                    $now = 2019;
                    return ($now - $year);
                }

                echo "<p>".$_POST['name1']."'s birthday: ".convert($_POST['day1'], $_POST['month1'], $_POST['year1'])."</p>";
                echo "<p>".$_POST['name2']."'s birthday: ".convert($_POST['day2'], $_POST['month2'], $_POST['year2'])."</p>";
                echo "<p>Difference days: ".days_diff($_POST['day1'], $_POST['day2'])."</p>";             
                echo "<p>".$_POST['name1']." is ".age($_POST['year1'])." years old</p>";
                echo "<p>".$_POST['name2']." is ".age($_POST['year2'])." years old</p>";
                echo "<p>Difference years: ".years_diff($_POST['year1'], $_POST['year2'])."</p>";
            } ?>
		</div>
    </div>
</body>
</html>