<?php
session_start();
if (isset($_SESSION['sessionid'])) {
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
}else{
    $user_email = "sookqichow00@gmail.com";
}
include_once("dbconnect.php");
if (isset($_GET['submit'])) {
    $operation = $_GET['submit'];
    if ($operation == 'search') {
        $search = $_GET['search'];
            $sqlcandidate = "SELECT * FROM tbl_candidates WHERE candidate_name LIKE '%$search%'";

    }
} else {
    $sqlcandidate = "SELECT * FROM tbl_candidates";
}
if (isset($_POST['submit'])) {
    if(isset($_GET['subscribe'])) {
    $candidate_id = $_POST['candidate_id'];
    // if ($user_email == "sookqichow00@gmail.com") {
    //     echo "<script>alert('Please register an account first.');</script>";
        echo "<script> window.location.replace('school.php')</script>";
        echo "document.getElementById('viewbutton').disabled = true";
        echo "<script>alert('OK.');</script>";
    } else {
        echo "<script> window.location.replace('candidatedetails.php?candidate_id=$candidate_id')</script>";
        echo "<script>alert('OK.');</script>";
    }
}
if (isset($_POST['submit'])) {
    $tutor_id = $_POST['tutor_id'];
    if ($user_email == "sookqichow00@gmail.com") {
        echo "<script>alert('Please register an account first.');</script>";
        echo "<script> window.location.replace('registration.php')</script>";
    } else {
        echo "<script> window.location.replace('tutordetails.php?tutor_id=$tutor_id')</script>";
        echo "<script>alert('OK.');</script>";
    }
}
$results_per_page = 10;
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];
    $page_first_result = ($pageno - 1) * $results_per_page;
} else {
    $pageno = 1;
    $page_first_result = 0;
}


$stmt = $conn->prepare($sqlcandidate);
$stmt->execute();
$number_of_result = $stmt->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);
$sqlcandidate = $sqlcandidate . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqlcandidate);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();

$conn= null;

function subString($str)
{
    if (strlen($str) > 15) {
        return $substr = substr($str, 0, 15) . '...';
    } else {
        return $str;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/admin/scripts/login.js" defer></script>
    <title>Welcome to Web-Polling System UUM MPP</title>
</head>
<body onload="loadCookies()">
    <header class="w3-header w3-theme w3-center w3-padding-32">
        <h3>Web-polling System UUM MPP</h3>
        <!-- <p>User Login Page</p> -->
    </header>
    <div style="display:flex; justify-content: center">
        <div class="w3-container w3-card w3-padding w3-margin" style="width:600px;Height:500px;margin:auto;text-align:left;">
            <form name="loginForm" action="login.php" method="post">
                <!-- <p>
                    <label><b>Email</b></label>
                    <input class="w3-input w3-round w3-border" type="email" name="email" id="idemail" placeholder="Your email" required>
                </p>
                <p>
                    <label><b>Password</b></label>
                    <input class="w3-input w3-round w3-border" type="password" name="password" id="idpass" placeholder="Your password" required>
                </p>
                <p>
                    <input class="w3-check" name="rememberme" type="checkbox" id="idremember" onclick="rememberMe()">
                    <label>Remember Me</label>
                </p>
                <p>
                    <input class="w3-button w3-round w3-border w3-theme" type="submit" name="submit" id="idsubmit">
                </p>
                <a href="register.php" class="w3-bar-item w3-button">Haven't register? Register now</a> -->
                <h3 style='text-align:center;padding-top:250px'>Thank you for your voting.</h3>
            </form>
        </div>
    </div>
    <div id="cookieNotice" class="w3-right w3-block" style="display: none;">
        <div class="w3-blue">
            <h4>Cookie Consent</h4>
            <p>This website uses cookies or similar technologies, to enhance your
                browsing experience and provide personalized recommendations.
                By continuing to use our website, you agree to our
                <a style="color:#115cfa;" href="/privacy-policy">Privacy Policy</a>
            </p>
            <div class="w3-button">
                <button onclick="acceptCookieConsent();">Accept</button>
            </div>
        </div>
    </div>
    <footer class="w3-footer w3-center w3-theme">
        <p>Web-Polling System UUM MPP</p>
    </footer>

</body>
</html>