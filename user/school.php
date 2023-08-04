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
            $sqlschool = "SELECT * FROM tbl_schools WHERE school_name LIKE '%$search%'";

    }
} else {
    $sqlschool = "SELECT * FROM tbl_schools";
}

$results_per_page = 10;
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];
    $page_first_result = ($pageno - 1) * $results_per_page;
} else {
    $pageno = 1;
    $page_first_result = 0;
}


$stmt = $conn->prepare($sqlschool);
$stmt->execute();
$number_of_result = $stmt->rowCount();
$number_of_page = ceil($number_of_result / $results_per_page);
$sqlschool = $sqlschool . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqlschool);
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
    <link rel="stylesheet" href="../admin/css/style2.css">
    <link rel="stylesheet" href="../user/css/slideshow.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/index1.js" defer></script>
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
        <a href="#" class="w3-bar-item w3-button w3-left">Candidate List</a>
        <a href="#" class="w3-bar-item w3-button w3-left">School</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Use Help Center</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Profile</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>
    <!-- <div class="w3-theme-2">
        <button onclick="w3-open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div> -->
   
    <!-- <header class="w3-header w3-container w3-padding-32 w3-center">
        <img src="images/mpp_banner.png" class="responsive"> -->
    </header>
    <!--Header-->

    

    <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h3>School Search</h3>
        <form>
            <div class="w3-row">
                <div style="padding-right:4px">
                    <p><input class="w3-input w3-block w3-round w3-border" type="search" name="search" placeholder="Enter search term" /></p>
                </div>

            </div>
            <button class="w3-button w3-theme w3-round w3-right" type="submit" name="submit" value="search">search</button>
        </form>

    </div>
    
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

    

    <div class="w3-grid-template ">
        <?php
        $i = 0;
        foreach ($rows as $schools) {
            $i++;
                $school_id = $schools['school_id'];
                $school_name = $schools['school_name'];
            echo "<div class='w3-card-4 w3-round' style='margin:4px'>
            <header class='w3-container w3-theme' style='height:100px'><h5><b>$school_name</b></h5></header>";
            echo "<a style='text-decoration: none;'> <img class='w3-image' src=images/schools/$school_id.png" .
                " onerror=this.onerror=null;this.src='../../admin/users/user.jpg'"
                . " style='width:100%;height:250px'></a><hr>";
            // echo "<div class='w3-container '><p>Manifesto: $candidate_manifesto</p></div>";
            echo "<button class=' w3-theme-2 w3-round w3-block' ><a href='$school_id.php?school_id=$school_id'>View Candidate Lists</a></button>
            </div>";
        }
        ?>
    </div>
    <br>
    <?php
    $num = 1;
    if ($pageno == 1) {
        $num = 1;
    } else if ($pageno == 2) {
        $num = ($num) + 10;
    } else {
        $num = $pageno * 10 - 9;
    }
    echo "<div class='w3-container w3-row'>";
    echo "<center>";
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a href = "index.php?pageno=' . $page . '" style=
            "text-decoration: none">&nbsp&nbsp' . $page . ' </a>';
    }
    echo " ( " . $pageno . " )";
    echo "</center>";
    echo "</div>";
    ?>
    <br>

    <div class="w3-center w3-bottom w3-theme" style="max-width:1500px;margin:0 auto;">U-Vote</div>
</body>
</html>