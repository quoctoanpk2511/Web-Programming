<?php 
    include("config.php");    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Business Listings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
<div class="container" style="width: 80%; padding-top: 50px;">
    <h2>Business Listings</h2>
    <form class="col s12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="row">
            <div class="col s4">
                <div class="input-field">
                    <span>Choose category to show all businesses:</span>
                    <select class="selector" name="select-category">
                        <?php
                            $get_from_db = mysqli_query($conn, "SELECT * FROM Categories;");
                            echo "<option value='' disabled selected>Choose your option</option>";
                            while ($category = mysqli_fetch_array($get_from_db, MYSQLI_ASSOC)) {
                                echo "<option value='" . $category['CategoryID'] . "'>" . $category['Title'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <br>
                <input type="submit" name="Submit" value="Show">
                <br>
                <br>
            </div>
            <div class="col s8">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Business ID</th>
                            <th>Business Name</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Telephone</th>
                            <th>URL</th>
                            <th>Category ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $select_category = $_POST['select-category'];
                                $get_from_db = mysqli_query($conn, "SELECT * from Businesses as B, Biz_Categories as BC WHERE CategoryID = '$select_category' AND B.BusinessID = BC.BusinessID;");
                                while ($biz_list = mysqli_fetch_array($get_from_db, MYSQLI_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>".$biz_list['BusinessID']."</td>";
                                    echo "<td>".$biz_list['Name']."</td>";
                                    echo "<td>".$biz_list['Address']."</td>";
                                    echo "<td>".$biz_list['City']."</td>";
                                    echo "<td>".$biz_list['Telephone']."</td>";
                                    echo "<td>".$biz_list['URL']."</td>";
                                    echo "<td>".$biz_list['CategoryID']."</td>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
</body>
</html>
