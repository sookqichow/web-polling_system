<?php

include_once("dbconnect.php");

if (isset($_POST['submit'])) {
    if (!(isset($_POST["name"]) ||isset($_POST["type"]) || isset($_POST["email"]) ||isset($_POST["pass"]))) {
        echo "<script> alert('Please fill in all required information')</script>";
        echo "<script> window.location.replace('register.php')</script>";
    } 
    // else {
    //     if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
    //         $name = $_POST['name'];
    //         $email = $_POST['email'];
    //         $type = $_POST['type'];
    //         $pass = sha1($_POST['password']);
    //         $sqlregister = "INSERT INTO `tbl_admins`(`admin_name`, `admin_email`, `admin_pass`, 
    //             `admin_type`) VALUES ('$name','$email','$pass','$type')";
    //         try {
    //             $conn->exec($sqlregister);
    //             uploadImage($icno);
    //             echo "<script>alert('Registration successful')</script>";
    //             echo "<script>window.location.replace('index.php')</script>";
    //         } catch (PDOException $e) {
    //             echo "<script>alert('Registration failed')</script>";
    //             echo "<script>window.location.replace('register.php')</script>";
    //         }
    //     } 
        else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            $pass = sha1($_POST['password']);
            $sqlregisteradmin = "INSERT INTO `tbl_admins`(`admin_name`, `admin_email`, `admin_pass`, 
                `admin_type`) VALUES ('$name','$email','$pass','$type')";
            try {
                $conn->exec($sqlregisteradmin);
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.location.replace('index.php')</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Registration failed')</script>";
                echo "<script>window.location.replace('register.php')</script>";
            }
        }
    }


// function uploadImage($email)
// {
//     $target_dir = "../res/images/users/";
//     $target_file = $target_dir . $email . ".png";
//     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
// }
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin Registration </title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../admin/js/register.js"></script>

</head>

<body>
    <div class="w3-container  w3-margin:auto form-container-reg" style="padding-top:180px">
        <div class="w3-card">
            <div class="w3-conatiner w3-theme-2">
                <p>New Admin Registration</p>
            </div>
            <form class="w3-container w3-padding formco" name="registerForm" action="register.php" method="post" onsubmit="return confimrDialog()" enctype="multipart/form-data">
                <!-- <p>
                <div class="w3-container w3-border w3-center w3-padding">
                    <img class="w3-image w3-round w3-margin" src="../res/images/users/user.png" style="width:25%;
                        max-width:600px"><br>
                    <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
                </div>
                </p> -->
                <p>
                    <label>Name</label>
                    <Input class="w3-input w3-border w3-round" name="name" id="idname" type="text" required>
                </p>
                <!-- <p>
                    <label>IC/Passport Number</label>
                    <Input class="w3-input w3-border w3-round" name="idno" id="idid" type="text" required>
                </p> -->
                <p>
                    <label>Email</label>
                    <Input class="w3-input w3-border w3-round" name="email" id="idemail" type="email" required>
                </p>
                <p>
                    <label>Password</label>
                    <Input class="w3-input w3-border w3-round" name="pass" id="idpass" type="password" required>
                </p>
                <!-- <p>
                    <label>Phone</label>
                    <Input class="w3-input w3-border w3-round" name="phone" id="idphone" type="phone" required>
                </p> -->
                <p>
                    <label>Type</label>
                    <select class="w3-input w3-border w3-round" name="type" id="idtype">
                        <option value="Super Admin">Super admin</option>
                        <option value="Admin">Admin</option>
                        <option value="Editor">Editor</option>
                        <option value="Viewer">Viewer</option>
                        <!-- <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="Remove">Remove</option> -->
                    </select>


                </p>
                <!-- <p>
                    <label>Address</label>
                    <textarea class="w3-input w3-border " name="address" id="idaddress" rows="4" cols="50" width="100%" placeholedr="Please enter your address" required></textarea>
                </p> -->
                <div class="row"><input class="w3-input w3-border w3-block w3-theme-2 w3-round" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>


</body>

</html>