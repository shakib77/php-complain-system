<?php include_once "database.php";?>
<?php include_once "header.php";?>

<?php
    $all_c = "SELECT * FROM `complain`";

    $result = mysqli_query($conn, $all_c);
    $total = mysqli_num_rows($result);

    $hr = mysqli_query($conn,"SELECT * FROM `complain` WHERE type='hr'");
    $hr = mysqli_num_rows($hr);

    $logistics = mysqli_query($conn, "SELECT * FROM `complain` WHERE type='logistics'");
    $logistics = mysqli_num_rows($logistics);


    $it = mysqli_query($conn, "SELECT * FROM `complain` WHERE type='it'");
    $it = mysqli_num_rows($it);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/styles.css">

    <title>Complain Dashboard</title>
</head>
    <body>
        <?php include_once "header.php";?>
        <div class="dashboard">
            <h1 class="cm">Complain Dashboard</h1>
            <div class="box-main">
                <div class="box-total">
                    <h3 class="hr">Total</h3>
                    <h4 class="hr"><?=$total?></h4>
                </div>
                <a href="hr.php">
                <div class="box-hr">
                    <h3 class="hr">HR</h3>
                    <h4 class="hr"><?=$hr?></h4>
                </div>
                </a>
                <a href="logistics.php">
                <div class="box-log">
                    <h3 class="hr">Logistics</h3>
                    <h4 class="hr"><?=$logistics?></h4>
                </div>
                </a>
                <a href="itt.php">
                <div class="box-it">
                    <h3 class="hr">IT</h3>
                    <h4 class="hr"><?=$it?></h4>
                </div>
                </a>
            </div>
        </div>
    </body>
</html>