<?php
session_start();
if (isset($_SESSION['sessionid'])) {
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
}else{
    $user_email = "sookqichow00@gmail.com";
}
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
        echo "<script>window.location.replace('vote.php')</script>";
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
// if (isset($_POST['submit'])) {
//     if(isset($_GET['subscribe'])) {
//     $candidate_id = $_POST['candidate_id'];
//     // if ($user_email == "sookqichow00@gmail.com") {
//     //     echo "<script>alert('Please register an account first.');</script>";
//         echo "<script> window.location.replace('school.php')</script>";
//         echo "document.getElementById('viewbutton').disabled = true";
//         echo "<script>alert('OK.');</script>";
//     } else {
//         echo "<script> window.location.replace('candidatedetails.php?candidate_id=$candidate_id')</script>";
//         echo "<script>alert('OK.');</script>";
//     }
// }
// if (isset($_POST['submit'])) {
//     $tutor_id = $_POST['tutor_id'];
//     if ($user_email == "sookqichow00@gmail.com") {
//         echo "<script>alert('Please register an account first.');</script>";
//         echo "<script> window.location.replace('registration.php')</script>";
//     } else {
//         echo "<script> window.location.replace('tutordetails.php?tutor_id=$tutor_id')</script>";
//         echo "<script>alert('OK.');</script>";
//     }
// }
// if (isset($_GET['submit'])) {
//     $operation = $_GET['submit'];
//     if ($operation == 'update') {
//         // if(!empty($_POST['sbm'])) {
//         $candidateid =$_POST["sbm"];
//         $sqlupdate = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidateid";
//         $conn->exec($sqlupdate);
//         echo "<script>alert('Vote Successful')</script>";
//     }

    // else{
    //     echo '<p class="error alert alert-danger mt-3">Please Select Any Radio.';
//     }
// }
    // if ($operation == 'search') {
    //     $search = $_GET['search'];
    //     $option = $_GET['option'];
    //     if ($option == "Select") {
    //         $sqlproduct = "SELECT * FROM tbl_products WHERE product_name LIKE '%$search%'";
    //     } else {
    //         $sqlproduct = "SELECT * FROM tbl_products WHERE product_type = '$option'";
    //     }
    // }
// } else {
//     $sqlcandidate = "SELECT * FROM tbl_candidates";
// }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-base/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-buttons/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-popups/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-splitbuttons/styles/material.css" rel="stylesheet" />
    <script src="/admin/scripts/login.js" defer></script>
    <script src="/admin/scripts/vote.js" defer></script>
    <title>Welcome to Web-Polling System UUM MPP</title>
</head>
<body>
    <div class="topnav">
        
    <div class="w3-container">
            <h2>U-Vote</h2>
        </div>
        
        <div class="topnav-right">
        <a href="index.php" class="w3-bar-item w3-button w3-left">Homepage</a>
            <a href="school.php" class="w3-hide-small ">School</a>
            <a href="candidateList.php" class="w3-hide-small ">Candidate List</a>
            <a href="vote.php" class="w3-hide-small ">Vote</a>
            <!-- <a href="#" class="w3-hide-small ">Profile</a> -->
            <a href="login.php" class="w3-hide-small ">Log Out</a>
        </div>
    </div>
    <div id="mySidebar" class="w3-sidebar w3-bar-block w3-theme-2 w3-hide-large w3-hide-medium" style="display:none">
        <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <a href="#" class="w3-bar-item w3-button w3-left">Candidate List</a>
        <a href="#" class="w3-bar-item w3-button w3-left">School</a>
        <a href="vote.php" class="w3-bar-item w3-button w3-left">Vote</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Profile</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>

    <div class="w3-theme-2">
        <button onclick="w3_open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div>

   
    <div class="w3-margin w3-border" style="overflow-x:auto;">
        <?php
        $i = 0;
        echo "<table class='w3-table w3-striped w3-bordered' style='width:100%'>
         <tr><th style='width:7%'>Candidate ID</th><th style='width:15%'>Candidate Name</th><th style='width:40%'>Candidate Manifesto</th><th style='width:7%'>School ID</th><th style='width:25%'>School Name</th><th>Total Votes</th></tr>";
        foreach ($rows as $candidates) {
            $i++;
            $candidate_id = $candidates['candidate_id'];
            $candidate_name = $candidates['candidate_name'];
            $candidate_manifesto = $candidates['candidate_manifesto'];
            $school_id = $candidates['school_id'];
            $school_name = $candidates['school_name'];
            $candidate_vote = $candidates['candidate_vote'];
            echo "<tr><td>$candidate_id</td><td>$candidate_name</td><td>$candidate_manifesto</td><td>$school_id</td><td>$school_name</td><td>$candidate_vote</td>
            <td><button class='btn'><a href='vote.php?submit=delete&candidate_id=$candidate_id' class='fa fa-trash' onclick=\"return confirm('Are you sure?')\"></a></button>
            </td></tr>";
        }
        echo "</table>";
        ?>
    </div>
    
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
        echo '<a href = "vote.php?pageno=' . $page . '" style=
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