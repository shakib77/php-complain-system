<?php require_once 'header.php'; ?>
<?php require_once 'database.php'; ?>

<?php
if (isset($_POST['submit'])) {
    /* echo '<pre>';
     print_r($_FILES);
     exit();*/


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $complain = $_POST['complain'];
    $type = $_POST['type'];


    //echo $_FILES['photo']['name'];
    $photo = explode('.', $_FILES['photo']['name']);
    $photo_ext = end($photo);
    $photo_end = strtolower($photo_ext);
    if ($photo_end == 'png' or $photo_end == 'jpg') {
        $photo_name = $name . '_' . time() . '.' . $photo_end;
    }else{
        $photo_type_error = "Please upload your photo [.png or .jpg]";

    }

    $input_error = array();

    if (empty($name)) {
        $input_error['name'] = "Please enter your name";
    }
    if (empty($email)) {
        $input_error['email'] = "Please enter your email";
    }
    if (empty($phone)) {
        $input_error['phone'] = "Please enter your valid mobile number";
    }
    if (empty($complain)) {
        $input_error['complain'] = "Please type your complain";
    }
    if (empty($type)) {
        $input_error['type'] = "Please choose a type";
    }
    if (empty($photo_ext)) {
        $input_error['photo_ext'] = "Please select your photo";
    }

    $count_error = count($input_error);

    if ($count_error == 0) {
        $insert_complain = mysqli_query($conn, "INSERT INTO `complain`(`name`, `email`, `phone`, `type`, `complain`, `photo`) VALUES ('$name','$email','$phone','$type','$complain', '$photo_name')");


        if ($insert_complain) {
            $insert_success = "Your complain has been successfully submitted";
            move_uploaded_file($_FILES['photo']['tmp_name'], 'img/' . $photo_name);
        }
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="style/styles.css">

    <title>Complain System</title>
</head>
<body>
<div class="container" style="padding-top: 4rem">
    <form novalidate name="form" id="form" action="" method="POST" enctype="multipart/form-data"
          onsubmit="return validateForm();">
        <div id="form-div" class="form-div">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name..">
            <div class="error" style="color: red" id="nameErr"></div>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Your email address..">
            <div class="error" style="color: red" id="emailErr"></div>

            <label for="phone">Phone No.</label>
            <input type="tel" id="phone" name="phone" placeholder="Your phone number..">
            <div class="error" style="color: red" id="phoneErr"></div>

            <label for="type">Complain Type</label>
            <select id="type" name="type">
                <option value="">Please enter your complain type</option>
                <option value="hr">HR</option>
                <option value="logistics">Logistics</option>
                <option value="it">IT</option>
                <option value="food">Food</option>
            </select>
            <div class="error" style="color: red" id="typeErr"></div>

            <label for="complain">Complain</label>
            <textarea id="complain" name="complain" placeholder="Write something.." style="height:100px"></textarea>
            <div class="error" style="color: red" id="complainErr"></div>

            Select image to upload:
            <input type="file" name="photo" id="photo"><br>
            <div class="error" style="color: red" id="photoErr"></div>
            <input type="submit" name="submit" id="submit" value="Submit">
        </div>
    </form>
</div>
<div>
    <?php
    if (isset($insert_success)) {
        echo $insert_success;
    }
    ?>
</div>

<script>
    function validateForm() {
        let valid = true;
        var name = (document.getElementById("name").value).trim();
        if (name == '') {
            document.getElementById("nameErr").innerHTML = "Please enter your name";
            valid = false;
        } else {
            document.getElementById("nameErr").innerHTML = "";
        }
        var email = (document.getElementById("email").value).trim();
        if (email == "") {
            document.getElementById("emailErr").innerHTML = "Please insert a valid email";
        } else {
                if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*$/.test(email)) {
                document.getElementById("emailErr").innerHTML = "";
                } else {
                    document.getElementById("emailErr").innerHTML="Please insert a valid email";
                }
            }

        var phone = (document.getElementById("phone").value).trim();
        if (phone == "") {
            document.getElementById("phoneErr").innerHTML = "Please insert a valid phone number";
        } else {
            if(/01[3456789][0-9]{8}\b/.test(phone)) {
                document.getElementById("phoneErr").innerHTML = "";
            } else {
                document.getElementById("phoneErr").innerHTML="Please insert a phone number";
            }
        }
        var complain = (document.getElementById("complain").value).trim();
        if (complain == "") {
            document.getElementById("complainErr").innerHTML = "Please write a complain";
            valid = false;
        } else {
            document.getElementById("complainErr").innerHTML = "";
        }
        var type = (document.getElementById("type").value).trim();
        if (type == "" || type === "Please enter your complain type") {
            document.getElementById("typeErr").innerHTML = "Please enter your complain type";
            valid = false;
        } else {
            document.getElementById("typeErr").innerHTML = "";
        }

        document.getElementById("complain").value.replace(/\n/g, '<br />');

        var fileData = document.getElementById('photo');
        var fileUploadPath = fileData.value;
        if (fileUploadPath == '') {
            document.getElementById("photoErr").innerHTML = "Please upload a photo";
            valid = false;
        } else {
            var extension = fileUploadPath.substring(
                fileUploadPath.lastIndexOf('.') + 1).toLowerCase();
            if (extension == "png" || extension == "jpg") {
                document.getElementById("photoErr").innerHTML = "";
            } else {
                document.getElementById("photoErr").innerHTML = "Only png and jpg formats will support";
                valid = false;
            }
        }
        return valid;
    };

</script>

</body>
</html>
