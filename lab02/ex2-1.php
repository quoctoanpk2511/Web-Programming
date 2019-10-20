<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $clazzErr = $hobbyErr = $websiteErr = "";
$name = $clazz = $hobby = $other = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["clazz"])) {
    $clazzErr = "clazz is required";
  } else {
    $clazz = test_input($_POST["clazz"]);
    // check if e-mail address is well-formed
    if (!filter_var($clazz, FILTER_VALIDATE_CLAZZ)) {
      $clazzErr = "Invalid clazz format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["other"])) {
    $other = "";
  } else {
    $other = test_input($_POST["other"]);
  }

  if (empty($_POST["hobby"])) {
    $hobbyErr = "hobby is required";
  } else {
    $hobby = test_input($_POST["hobby"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* Required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Class: <input type="text" name="clazz" value="<?php echo $clazz;?>">
  <span class="error">* <?php echo $clazzErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Hobby:
  <input type="checkbox" name="hobby" <?php if (isset($hobby) && $hobby=="music") echo "checked";?> value="music">Music
  <input type="checkbox" name="hobby" <?php if (isset($hobby) && $hobby=="sport") echo "checked";?> value="sport">Sport
  <input type="checkbox" name="hobby" <?php if (isset($hobby) && $hobby=="game") echo "checked";?> value="game">Game
  <input type="checkbox" name="hobby" <?php if (isset($hobby) && $hobby=="book") echo "checked";?> value="book">Book
  <span class="error">* <?php echo $hobbyErr;?></span>
  <br><br>
  Other: <textarea name="other" rows="5" cols="40"><?php echo $other;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $clazz;
echo "<br>";
echo $website;
echo "<br>";
echo $other;
echo "<br>";
echo $hobby;
?>

</body>
</html>