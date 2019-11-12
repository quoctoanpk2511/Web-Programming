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
    $emailErr = $phoneErr = $websiteErr = "";
    $email = $phone = $website = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }

        if (empty($_POST["phone"])) {
            $phone = "";
        } else {
            $phone = test_input($_POST["phone"]);
            // check if phone syntax is valid
            if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$phone)) {
                $phoneErr = "Invalid phone";
            }
        }
            
        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website = test_input($_POST["website"]);
            // check if URL address syntax is valid
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL";
            }    
        }
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    ?>

    <h2>Form Validation</h2>
    <p><span class="error">* required field</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        E-mail: <input type="text" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Website: <input type="text" name="website">
        <span class="error"><?php echo $websiteErr;?></span>
        <br><br>
        Phone: <input type="text" name="phone">
        <span class="error"><?php echo $phoneErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
    </form>

    <?php
        echo "<h2>Your Input:</h2>";
        echo "Email: ".$email;
        echo "<br>";
        echo "Website: ".$website;
        echo "<br>";
        echo "Phone: ".$phone;
    ?>

</body>
</html>