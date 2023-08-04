<?php
session_start();
// if (isset($_SESSION['sessionid'])) {
//     $user_email = $_SESSION['email'];
//     $user_name = $_SESSION['name'];
// }else{
//     $user_email = "sookqichow00@gmail.com";
// }
if (!isset($_SESSION['sessionid'])) {
    echo "<script>alert('Session not available. Please login');</script>";
    echo "<script> window.location.replace('login.php')</script>";
}else{
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
}
include_once("dbconnect.php");
if (isset($_GET['submit'])) {
    $operation = $_GET['submit'];
    if ($operation == 'search') {
        $search = $_GET['search'];
            $sqlsubject = "SELECT * FROM tbl_subjects WHERE subject_name LIKE '%$search%'";

    }
} else {
    $sqlsubject = "SELECT * FROM tbl_subjects";
}

// $results_per_page = 10;
// if (isset($_GET['pageno'])) {
//     $pageno = (int)$_GET['pageno'];
//     $page_first_result = ($pageno - 1) * $results_per_page;
// } else {
//     $pageno = 1;
//     $page_first_result = 0;
// }


// $stmt = $conn->prepare($sqlsubject);
// $stmt->execute();
// $number_of_result = $stmt->rowCount();
// $number_of_page = ceil($number_of_result / $results_per_page);
// $sqlsubject = $sqlsubject . " LIMIT $page_first_result , $results_per_page";
// $stmt = $conn->prepare($sqlsubject);
// $stmt->execute();
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $rows = $stmt->fetchAll();

// $conn= null;

// function subString($str)
// {
//     if (strlen($str) > 15) {
//         return $substr = substr($str, 0, 15) . '...';
//     } else {
//         return $str;
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
    <!-- <style>
        /* Slideshow container */
.slideshow-container {
    position: relative;
    background: #f1f1f1f1;
  }
  
  /* Slides */
  .mySlides {
    display: none;
    padding: 80px;
    text-align: center;
  }
  
  /* Next & previous buttons */
  .prev, .next {
    cursor: pointer;
    position: absolute;
    top: 50%;
    width: auto;
    margin-top: -30px;
    padding: 16px;
    color: rgb(146, 27, 27);
    font-weight: bold;
    font-size: 20px;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }
  
  /* Position the "next button" to the right */
  .next {
    position: absolute;
    right: 0;
    border-radius: 3px 0 0 3px;
  }
  
  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
    color: white;
  }
  
  /* The dot/bullet/indicator container */
  .dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
  }
  
  /* The dots/bullets/indicators */
  .dot {
    cursor: pointer;
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }
  
  /* Add a background color to the active dot/circle */
  .active, .dot:hover {
    background-color: #717171;
  }
  
  /* Add an italic font style to all quotes */
  q {font-style: italic;}
  
  /* Add a blue color to the author */
  .author {color: cornflowerblue;}
    </style> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../user/css/style1.css">
    <link rel="stylesheet" href="../admin/css/slideshow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/index.js" defer></script>
    <title>Welcome to Web-Polling System UUM MPP</title>
</head>
<body>
    <div class="topnav w3-row">
  <div class="w3-col w3-container" style="width:150px;margin-left:10px;">
  <img src="images/mpp_logo.jpeg" alt="logo" style="margin-top:10px;margin-left:10px;width:70px;height:70px"/>
        <h2>U-Vote</h2></div>
  <div class="w3-rest w3-container"style="padding:50px">
    <div class="topnav-right" >
            <a href="landingpage.php" class="w3-bar-item w3-button w3-left fa fa-home"style="font-size:20px"> Homepage</a>
            <a href="aboutUs.php" class="w3-hide-small fa fa-group" style="font-size:20px"> About Us</a>
            <a href="login.php" class="w3-hide-small fa fa-sign-in "style="font-size:20px"> Login</a>
        </div></div>
</div>

   
        <div class="w3-theme-3">
        <button onclick="w3-open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div>
    </div>
    <div id="mySidebar" class="w3-sidebar w3-bar-block w3-theme  w3-hide-large w3-hide-medium" style="display:none">
        <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="index.php" class="w3-bar-item w3-button w3-left">Homepage</a>
        <a href="candidateList.php" class="w3-bar-item w3-button w3-left">About Us</a>
        <a href="school.php" class="w3-bar-item w3-button w3-left">Contact</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Login</a>
    </div>
    <!-- <div class="w3-theme-2">
        <button onclick="w3-open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div> -->
   
    <!-- <header class="w3-header w3-container w3-padding-32 w3-left w3-third" >
        <img src="images/landingpage2.jpeg" class="responsive" style="width:800px;height:600px" >
    </header> -->
    <!--Header-->

    <!-- <div class="w3-container w3-onethird">
            <p>Attentive, diligent person. Second year information technology student at University Utara Malaysia
                (UUM). Seeking a chance to internship on the field related to my course during my semester break to
                equip myself with more professional knowledge in IT. I will always provide fully commitment on
                accomplish the task with my passion.</p>
        </div> -->
        <div class="w3-container w3-center"style="padding:10px">
        <img src="images/mppuum.png" style="height:350px;width:800px;margin:20px;">
        <Header >
        <h6 style="font-size:20px;margin:20px">Barisan kepimpinan Majlis Perwakilan Pelajar Universiti Utara Malaysia Sesi 2022/2023.</h6>
        </Header>
            <p style="font-size:15px;margin:20px">
Selamat menjalankan amanah dan tanggungjawab yang diberikan oleh seluruh warga UUM Universiti Utara Malaysia

<br>“For A Better UUM”</p>
        </div>
        <div class="w3-container w3-center">
        <a href="https://www.facebook.com/mppuumrasmi"><img src="images/facebook.png" alt="Facebook" style="height:60px;width:60px;margin:20px;"></a>
        <a href="https://www.instagram.com/officialmppuum/"><img src="images/instagram.png" alt="Instagram" style="height:60px;width:60px;margin:20px;"></a>
        <a href="https://www.tiktok.com/@mppuumofficial"><img src="images/tiktok.png" alt="Tik Tok" style="height:60px;width:60px;margin:20px;"></a>
        <a href="https://www.youtube.com/channel/UCNbu1kt8KsoXJge48a0gB-w"><img src="images/youtube.png" alt="Youtube" style="height:60px;width:60px;margin:20px;"></a>
        <a href="https://t.me/mppuumofficial"><img src="images/telegram.png" alt="Telegram" style="height:60px;width:60px;margin:20px;"></a>
        </div>
        
    <!-- <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h3>Candidate Search</h3>
        <form>
            <div class="w3-row">
                <div style="padding-right:4px">
                    <p><input class="w3-input w3-block w3-round w3-border" type="search" name="search" placeholder="Enter search term" /></p>
                </div>

            </div>
            <button class="w3-button w3-theme w3-round w3-right" type="submit" name="submit" value="search">search</button>
        </form>

    </div>
     -->
    <!-- <div id="profile" class="w3-container w3-row w3-light-grey w3-padding-32">
        <div class="w3-container w3-third w3-center">
            <img src="sookqi.jpg" style="height:250px;background-size: cover;border: 1px solid indigo;">
        </div>
        <div class="w3-container w3-twothird">
            <p>Attentive, diligent person. Second year information technology student at University Utara Malaysia
                (UUM). Seeking a chance to internship on the field related to my course during my semester break to
                equip myself with more professional knowledge in IT. I will always provide fully commitment on
                accomplish the task with my passion.</p>
        </div>
    </div> -->
    <!--profile-->

    <!-- Slideshow container -->
    
    <br>

    <div class="w3-center w3-bottom w3-theme" style="max-width:1800px;margin:0 auto;">U-Vote</div>
</body>
</html>