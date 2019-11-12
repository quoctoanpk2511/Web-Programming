<?php
    include("config.php");
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $categoryId = $_POST['categoryId'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $addCate = mysqli_query($conn, "INSERT INTO Categories (CategoryID, Title, Description) VALUES ('$categoryId', '$title', '$description');");
        header("location:admin.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Category  Administration</h2>
                    </div>
                    <form class="col-md-12" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $showCate = mysqli_query($conn, "SELECT * FROM Categories;");
                                    while($row = mysqli_fetch_array($showCate)){
                                        echo "<tr>";
                                                echo "<td>" . $row['CategoryID'] . "</td>";
                                                echo "<td>" . $row['Title'] . "</td>";
                                                echo "<td>" . $row['Description'] . "</td>";
                                        echo "</tr>";
                                        // mysqli_free_result($result);
                                    }
                                ?>
                                <tr>
                                    <td><input type="text" name="categoryId" /></td>
                                    <td><input type="text" name="title"></td>
                                    <td><input type="text" name="description"></td>
                                </tr>
                            </tbody>
                        </table>
                        <input class="btn waves-effect waves-light" type="submit" name="submit">
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>