<?php 
	if (isset($_POST['formInput'])) {
		$name = $_POST['name'];
		$uni = $_POST['uni'];
		$class = $_POST['class'];

		echo "Your Information" . '<br>';
		if (isset($name)) {
			echo "Name: " . $name . '<br>';
		}
		if (isset($uni)) {
			echo "University: " . $uni . '<br>';
		}
		if (isset($class)) {
			echo "Class: " . $class . '<br>';
		}
		if (isset($_POST['hobby'])) {
			echo "Hobby: ";
	      	foreach($_POST['hobby'] as $hobby) {
	        	echo '<br>' . $hobby;
	    	}
	    }
	}
 ?>