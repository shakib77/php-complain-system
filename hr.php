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
        <h2>Customer Complains
<!--            --><?php
//            $type = mysqli_query($conn, "select type, count(id) as type_total from complain group by type");
//            while ($row = mysqli_fetch_assoc($type))
//            echo $row['type']
//            ?>
        </h2>
        <table id="pager" class="complain-table">
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


            if(isset($_GET['type'])){
                echo '<pre>';
                $type = $_GET['type'];

            }




            $complain_all = "SELECT * FROM `complain` WHERE `type`='$type'";
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
                        if($rows['type']=='$type'){
                            echo $rows['type']=='$type';
                        }
                        ?>
                    </td>
                    <td><img src="img/<?= $rows['photo'] ?>" width="50px" height="50px"> </td>
                    <td><a href="single-complain.php?single-complain-id=<?= $rows['id'] ?>">View Complain</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <br>
    <div id="pageNav" class="pageNav"></div>
    <script src="pageing.js"></script>
    <script>
        let pager = new Pager('pager', 3);

        pager.init();
        pager.showPageNav('pager', 'pageNav')
        pager.showPage(1);
    </script>
</div>
</body>
</html>