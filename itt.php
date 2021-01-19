<?php require_once "database.php";?>
<?php require_once "header.php";?>

<!DOCTYPE html>
<html>
<head>
    <title>Complain System</title>
    <link rel="stylesheet" type="text/css" href="style/styles.css">
</head>
<body>
<div class="main_dashboard">
    <div>
        <h2>Total Complain List for IT</h2>
        <table>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Complain Type</th>
                <th>Complain</th>
                <th>Photo</th>
                <th class="action_area">Action</th>
            </tr>
            <?php
            $complain_all = "SELECT * FROM `complain` WHERE `type`='it'";
            $result = mysqli_query($conn, $complain_all);
            $sl = 0;

            while ($rows = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?= ++$sl ?></td>
                    <td><?= $rows['name'] ?></td>
                    <td><?= $rows['email'] ?></td>
                    <td><?= $rows['phone'] ?></td>
                    <td><?= $rows['complain'] ?></td>
                    <td>
                        <?php
                        if($rows['type']=='it'){
                            echo 'it';
                        }
                        ?>
                    </td>
                    <td><img src="img/<?= $rows['photo'] ?>" width="50px" height="50px"> </td>
                    <td><a href="single-complain.php?single-complain-id=<?= $rows['id'] ?>">View Complain</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
</body>
</html>