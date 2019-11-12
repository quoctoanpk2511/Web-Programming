<?php
    include("config.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $telephone = $_POST['phone'];
        $url = $_POST['url'];

        $query  = mysqli_query($conn, "SELECT MAX(BusinessID) from Businesses;");
        $max_id = mysqli_fetch_row($query)[0];
        $biz_id = $max_id + 1;

        $addBusiness = mysqli_query($conn, "INSERT INTO Businesses (BusinessID, Name, Address, City, Telephone, URL) VALUES ('$biz_id', '$name', '$address', '$city', '$telephone', '$url');");

        foreach ($_POST['selectCate'] as $selected) {
            $addcate = mysqli_query($conn, "INSERT INTO Biz_Categories (BusinessID, CategoryID) VALUES ('$biz_id', '$selected');");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Business Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
<div class="container" style="width: 80%; padding-top: 50px;">
    <h2>Business Registration</h2>
    <form class="col-md-12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <span>Choose category: </span>
                    <select name="selectCate[]" multiple>
                        <?php
                            $get_from_db = mysqli_query($conn, "SELECT * FROM Categories;");
                            echo "<option value='' disabled>Choose your option</option>";
                            while ($category = mysqli_fetch_array($get_from_db, MYSQLI_ASSOC)) {
                                echo "<option value='".$category['CategoryID']."'>".$category['Title']."</option>";
                            }
                        ?>
                    </select>
                </div>
                
            </div>
            <div class="col-md-6">
                <div>
                    <span>Business Name</span>
                    <input placeholder="Business Name" name="name" id="name" type="text" class="validate">
                </div>
                <div>
                    <span>Address</span>
                    <input placeholder="Address" name="address" id="address" type="text" class="validate">
                </div>
                <div>
                    <span>City</span>
                    <input placeholder="City" name="city" id="city" type="text" class="validate">
                </div>
                <div>
                    <span>Telephone</span>
                    <input placeholder="Telephone" name="phone" id="phone" type="text" class="validate">
                </div>
                <div>
                    <span>URL</span>
                    <input placeholder="URL" name="url" id="url" type="text" class="validate">
                </div>
            </div>
        </div>
        <input type="submit" name="Submit" value="Add Business">
    </form>
</div>
</body>
</html>