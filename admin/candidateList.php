<?php
session_start();
if (isset($_SESSION['sessionid'])) {
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
}else{
    $user_email = "sookqichow00@gmail.com";
}
// include_once("dbconnect.php");
$conn = mysqli_connect("localhost", "root", "", "web-polling_system");
if (isset($_GET['submit'])) {
    $operation = $_GET['submit'];
    if ($operation == 'delete') {
        $candidate_id = $_GET['candidate_id'];
        $sqldeletecandidate = "DELETE FROM tbl_candidates WHERE candidate_id = '$candidate_id'";
        $sqlgetschoolid = "SELECT school_id FROM tbl_candidates WHERE candidate_id = '$candidate_id'";
        $result = mysqli_query($conn, $sqlgetschoolid);
while ($row = mysqli_fetch_array($result)) 
{
    $text = $row['school_id'];  
    if( $text=="1"){
        $sqldeletesbmcandidate = "DELETE FROM `tbl_sbmcandidates` WHERE candidate_id = '$candidate_id'";
        mysqli_query($conn, $sqldeletesbmcandidate);
        }else if($text=="2"){
            $sqldeleteibscandidate = "DELETE FROM `tbl_ibscandidates` WHERE candidate_id = '$candidate_id'";
            mysqli_query($conn, $sqldeleteibscandidate);
            }else if($text=="3"){
                $sqldeletescimpacandidate = "DELETE FROM `tbl_scimpacandidates` WHERE candidate_id = '$candidate_id'";
                mysqli_query($conn, $sqldeletescimpacandidate);
                }else if($text=="4"){
                    $sqldeletesoecandidate = "DELETE FROM `tbl_soecandidates` WHERE candidate_id = '$candidate_id'";
                    mysqli_query($conn, $sqldeletesoecandidate);
                    }else if($text=="5"){
                        $sqldeletesogcandidate = "DELETE FROM `tbl_sogcandidates` WHERE candidate_id = '$candidate_id'";
                        mysqli_query($conn, $sqldeletesogcandidate);
                        }else if($text=="6"){
                            $sqldeletesoiscandidate = "DELETE FROM `tbl_soiscandidates` WHERE candidate_id = '$candidate_id'";
                            mysqli_query($conn, $sqldeletesoiscandidate);
                            }else if($text=="7"){
                                $sqldeletesolcandidate = "DELETE FROM `tbl_solcandidates` WHERE candidate_id = '$candidate_id'";
                                mysqli_query($conn, $sqldeletesolcandidate);
                                }
    }
        mysqli_query($conn, $sqldeletecandidate);
        // $conn->exec($sqldeletecandidate);
        echo "<script>alert('Candidate deleted')</script>";
        echo "<script>window.location.replace('candidateList.php')</script>";
    }else {
        echo "<script>alert('Delete candidate unsuccessful.')</script>";
    
    }
    if ($operation == 'search') {
        $search = $_GET['search'];
            $sqlcandidate = "SELECT * FROM tbl_candidates WHERE candidate_name LIKE '%$search%'";

    }
} else {
    $sqlcandidate = "SELECT * FROM tbl_candidates";
}

$results_per_page = 12;
if (isset($_GET['pageno'])) {
    $pageno = (int)$_GET['pageno'];
    $page_first_result = ($pageno - 1) * $results_per_page;
} else {
    $pageno = 1;
    $page_first_result = 0;
}


$stmt = $conn->prepare($sqlcandidate);
$stmt->execute();
$stmt->store_result();
$number_of_result = $stmt->num_rows;
$number_of_page = ceil($number_of_result / $results_per_page);
$sqlcandidate = $sqlcandidate . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqlcandidate);
$stmt->execute();
$result = $stmt->get_result();
$rows = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();

function subString($str)
{
    if (strlen($str) > 17) {
        return $substr = substr($str, 0, 21) . '...';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="/user/js/login.js" defer></script>
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
            <a href="userList.php" class="w3-hide-small fa fa-users"style="font-size:20px"> User List</a>
            <a href="vote.php" class="w3-hide-small fa fa-check-square "style="font-size:20px"> Vote</a>
            <!-- <a href="#" class="w3-hide-small ">Profile</a> -->
            <a href="login.php" class="w3-hide-small fa fa-sign-out "style="font-size:20px"> Log Out</a>
        </div>
    </div>
    <div id="mySidebar" class="w3-sidebar w3-bar-block w3-theme-2 w3-hide-large w3-hide-medium" style="display:none">
        <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="#" class="w3-bar-item w3-button w3-left">Candidate List</a>
        <a href="#" class="w3-bar-item w3-button w3-left">School</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Use Help Center</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Profile</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>

    <div class="w3-theme-2">
        <button onclick="w3_open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div>

   
    <div class="w3-card w3-container w3-padding w3-margin w3-round">
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

    <div class="w3-bar ">
        <a href="newcandidate.php" class="w3-bar-item w3-button w3-right w3-theme">New Candidate</a>
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
    <div class="w3-grid-template">
        <?php
        $i = 0;
        foreach ($rows as $candidates) {
            $i++;
            $candidate_id = $candidates['candidate_id'];
                $candidate_name = subString($candidates['candidate_name']);
                $candidate_manifesto = subString($candidates['candidate_manifesto']);
                $school_id = $candidates['school_id'];
                $school_name = $candidates['school_name'];
            echo "<div class='w3-card-4 w3-round' style='margin:4px'>
            <header class='w3-container w3-theme'><h5><b>$candidate_name</b></h5></header>";
            echo "<a style='text-decoration: none;'> <img class='w3-image' src=images/candidates/$school_id/$candidate_id.png" .
                " onerror=this.onerror=null;this.src='../../admin/users/user.jpg'"
                . " style='width:100%;height:250px'></a><hr>";
            echo "<div class='w3-container '><p>Manifesto: <br>$candidate_manifesto</p></div>";
            echo "<button class=' w3-theme-2 w3-round w3-block' style='width:90%;height:30px;display:inline-block' id='viewbutton'><a href='candidatedetails.php?candidate_id=$candidate_id'>View Details</a></button>";
            echo "<button class='btn w3-theme-2' style='width:10%;height:30px;display:inline-block;margin-top:0'><a href='candidateList.php?submit=delete&candidate_id=$candidate_id' class='fa fa-trash' onclick=\"return confirm('Are you sure?')\"></a></button>
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
        echo '<a href = "candidatelist.php?pageno=' . $page . '" style=
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