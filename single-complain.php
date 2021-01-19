<?php require_once('database.php')?>
<?php

if(isset($_GET['single-complain-id'])){
    $id = $_GET['single-complain-id'];
    $sql = "SELECT * FROM `complain` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Complain System</title>
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>
<div class="main_dashboard">
    <?php include_once "header.php";?>
    <div>
        <h2>Total Complain List</h2>
    </div>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th><?= $row['name'] ?></th>
            </tr>
            <tr>
                <th>Email</th>
                <th><?= $row['email'] ?></th>
            </tr>
            <tr>
                <th>Phone</th>
                <th><?= $row['phone'] ?></th>
            </tr>
            <tr>
                <th>Complain</th>
                <th><?= $row['complain'] ?></th>
            </tr>
<!--            <tr>-->
<!--                <th>Complain For</th>-->
<!--                <th>--><?//= $row['type'] ?><!--</th>-->
<!--            </tr>-->
            <tr>
                <th>Photo</th>
                <th><img src="img/<?= $row['photo'] ?>" width="50px" height="50px"> </th>
            </tr>


        </table>
    </div>
</div>
</body>
</html>