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
    <link rel="stylesheet" href="../admin/css/style2.css">
    <link rel="stylesheet" href="../admin/css/slideshow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/index.js" defer></script>
    <title>Welcome to Web-Polling System UUM MPP</title>
</head>
<body>
    <div class="topnav">
        <div class="w3-container">
        <h2>U-Vote</h2>
        </div>
        
        <div class="topnav-right">
        <a href="index.php" class="w3-bar-item w3-button w3-left fa fa-home"style="font-size:20px"> Homepage</a>
            <a href="school.php" class="w3-hide-small fa fa-institution"style="font-size:20px"> School</a>
            <a href="candidateList.php" class="w3-hide-small fa fa-users"style="font-size:20px"> Candidate List</a>
            <a href="vote.php" class="w3-hide-small fa fa-check-square "style="font-size:20px"> Vote</a>
            <!-- <a href="#" class="w3-hide-small ">Profile</a> -->
            <a href="login.php" class="w3-hide-small fa fa-sign-out "style="font-size:20px"> Log Out</a>
        </div>
        <div class="w3-theme-3">
        <button onclick="w3-open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div>
    </div>
    <div id="mySidebar" class="w3-sidebar w3-bar-block w3-theme  w3-hide-large w3-hide-medium" style="display:none">
        <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="index.php" class="w3-bar-item w3-button w3-left">Homepage</a>
        <a href="candidateList.php" class="w3-bar-item w3-button w3-left">Candidate List</a>
        <a href="school.php" class="w3-bar-item w3-button w3-left">School</a>
        <a href="vote.php" class="w3-bar-item w3-button w3-left">Vote</a>
        <!-- <a href="#" class="w3-bar-item w3-button w3-left">Profile</a> -->
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>
    <!-- <div class="w3-theme-2">
        <button onclick="w3-open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div> -->
   
    <header class="w3-header w3-container w3-padding-32 w3-center">
        <img src="images/mpp_banner.png" class="responsive" >
    </header>
    <!--Header-->

    

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
    <div>

    </div>
    <div>
    <h2 style='text-align:center'>School of Business Management</h2>
    </div>
    
    <div class="slideshow-container">
<!-- Prev buttons -->
<a class="prev" onclick="plusSlides(-1,0)">&#10094;</a>

<!-- Full-width slides/quotes -->
<div class="mySlides" name="slider0">
        <img class="photo" src="images/candidate03.jpeg">
        <div >
        <p class="author">Manifesto</p>
        <ol class="manifesto">
            <li>
            Memperjuangkan dasar dan polisi pengangkutan yang mesra mahasiswa melalui <br>penyusunan semula laluan bas, menegaskan waktu kehadiran bas seperti yang <br>dijadualkan oleh pihak pengurusan dan percepatkan pelaksanaan sistem track and <br>trace bas secara berkala. 
            </li>
        </ol>
        </div>
</div>

<div class="mySlides" name="slider0">
        <img class="photo" src="images/candidate04.jpeg">
        <div >
        <p class="author">Manifesto</p>
        <ol class="manifesto">
            <li>
            Memperjuangkan hak dan kebajikan mahasiswa Universiti Utara Malaysia.                
            </li>
            <li>
            Menggesa UUM untuk melanjutkan pembukaan pintu pagar utama sehingga jam 2 pagi. 
            </li>
        </ol>
        </div>
</div>

<div class="mySlides" name="slider0">
        <img class="photo" src="images/candidate05.jpeg">
        <div >
        <p class="author">Manifesto</p>
        <ol class="manifesto">
            <li>
            Menggesa UUM untuk melanjutkan pembukaan pintu pagar utama sehingga jam 2 pagi. 
            </li>
        </ol>
        </div>
</div>

<!-- Next buttons -->
<a class="next" onclick="plusSlides(1,0)">&#10095;</a>
</div>

<script> currentSlide(1,0)</script>

<!-- Dots/bullets/indicators -->
<div class="dot-container">
<span class="dot" name="dot0" onclick="currentSlide(1,0)"></span>
<span class="dot" name="dot0" onclick="currentSlide(2,0)"></span>
<span class="dot" name="dot0" onclick="currentSlide(3,0)"></span>
</div>

<h2 style='text-align:center'>Islamic Business Management</h2>
<!-- Slideshow container -->
<div class="slideshow-container">
<!-- Prev buttons -->
<a class="prev" onclick="plusSlides(-1,1)">&#10094;</a>

<!-- Full-width slides/quotes -->
<div class="mySlides" name="slider1">
        <img class="photo" src="images/candidate08.jpeg">
        <div >
        <p class="author">Manifesto</p>
        <ol class="manifesto">
            <li>
            Memperjuangkan penambahan laluan bas UUM dari dalam kampus ke Changlun pada <br>hari-hari yang tertentu.
            </li>
        </ol>
        </div>
</div>

<div class="mySlides" name="slider1">
        <img class="photo" src="images/candidate04.jpeg">
        <div >
        <p class="author">Manifesto</p>
        <ol class="manifesto">
            <li>
            Memperjuangkan hak dan kebajikan mahasiswa Universiti Utara Malaysia.
            </li>
            <li>
            Menggesa UUM untuk melanjutkan pembukaan pintu pagar utama sehingga jam 2 pagi. 
            </li>
        </ol>
        </div>
</div>

<div class="mySlides" name="slider1">
        <img class="photo" src="images/candidate05.jpeg">
        <div >
        <p class="author">Manifesto</p>
        <ol class="manifesto">
            <li>
            Menggesa UUM untuk melanjutkan pembukaan pintu pagar utama sehingga jam 2 pagi. 
            </li>
        </ol>
        </div>
</div>

<!-- Next buttons -->
<a class="next" onclick="plusSlides(1,1)">&#10095;</a>
</div>

<script> currentSlide(1,1)</script>

<!-- Dots/bullets/indicators -->
<div class="dot-container">
<span class="dot" name="dot1" onclick="currentSlide(1,1)"></span>
<span class="dot" name="dot1" onclick="currentSlide(2,1)"></span>
<span class="dot" name="dot1" onclick="currentSlide(2,1)"></span>
</div>

    <div class="w3-grid-template">
        <?php
        // $i = 0;
        // foreach ($rows as $subjects) {
        //     $i++;
        //     $subject_id = $subjects['subject_id'];
        //         $subject_name = subString($subjects['subject_name']);
        //         $subject_description = subString($subjects['subject_description']);
        //         $subject_price = $subjects['subject_price'];
        //         $tutor_id = $subjects['tutor_id'];
        //         $subject_sessions = $subjects['subject_sessions'];
        //         $subject_rating = $subjects['subject_rating'];
        //     echo "<div class='w3-card-4 w3-round' style='margin:4px'>
        //     <header class='w3-container w3-theme'><h5><b>$subject_name</b></h5></header>";
        //     echo "<a style='text-decoration: none;'> <img class='w3-image' src=/mytutor/admin/res/assets/courses/$subject_id.png" .
        //         " onerror=this.onerror=null;this.src='../../admin/users/user.jpg'"
        //         . " style='width:100%;height:250px'></a><hr>";
        //     echo "<div class='w3-container '><p>Price: RM $subject_price<br>Session: $subject_sessions<br>Rating: $subject_rating <i class='fa fa-star'></i><br>Description: $subject_description</p></div>";
        //     echo "<button class=' w3-theme-2 w3-round w3-block'><a href='coursedetails.php?subject_id=$subject_id'>View Details</a></button>
        //     </div>";
        // }
        ?>
    </div>
    <br>
    <?php
    // $num = 1;
    // if ($pageno == 1) {
    //     $num = 1;
    // } else if ($pageno == 2) {
    //     $num = ($num) + 10;
    // } else {
    //     $num = $pageno * 10 - 9;
    // }
    // echo "<div class='w3-container w3-row'>";
    // echo "<center>";
    // for ($page = 1; $page <= $number_of_page; $page++) {
    //     echo '<a href = "index.php?pageno=' . $page . '" style=
    //         "text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    // }
    // echo " ( " . $pageno . " )";
    // echo "</center>";
    // echo "</div>";
    ?>
    <br>

    <div class="w3-center w3-bottom w3-theme" style="max-width:1800px;margin:0 auto;">U-Vote</div>
</body>
</html>