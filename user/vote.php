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
            $sqluser = "SELECT * FROM tbl_users WHERE user_email LIKE '%$search%'";
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
$conn = mysqli_connect("localhost", "root", "", "web-polling_system");
if(isset($_POST['submit'])){
    $sqlstatus = "SELECT user_status FROM tbl_users WHERE user_email LIKE '$user_email'";
    // $result = $conn -> query($sqlstatus);
    // while ($row =  $result->fetch_array()) {
    //     echo $row['user_status'];
    

    $result = mysqli_query($conn, $sqlstatus);
while ($row = mysqli_fetch_array($result)) 
{
    $text = $row['user_status'];  
    if( $text=='Voted'){
        echo '<script>alert("You are already voted!")</script>';
        }else{
    echo "<script>confirm('Are you sure?');</script>";
    if(!empty($_POST['sbm'])&& $_POST['ibs']&& $_POST['scimpa']&& $_POST['soe']&& $_POST['sog']&& $_POST['sois']&& $_POST['sol']) {
    $candidatesbmid=$_POST['sbm'];
    $candidateibsid=$_POST['ibs'];
    $candidatescimpaid=$_POST['scimpa'];
    $candidatesoeid=$_POST['soe'];
    $candidatesogid=$_POST['sog'];
    $candidatesoisid=$_POST['sois'];
    $candidatesolid=$_POST['sol'];
    $sqlupdatecandidateList1 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesbmid";
    $sqlupdatecandidateList2 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidateibsid";
    $sqlupdatecandidateList3 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatescimpaid";
    $sqlupdatecandidateList4 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesoeid";
    $sqlupdatecandidateList5 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesogid";
    $sqlupdatecandidateList6 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesoisid";
    $sqlupdatecandidateList7 = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesolid";
    $sqlupdatesbm = "UPDATE tbl_sbmcandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesbmid";
    $sqlupdateibs = "UPDATE tbl_ibscandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidateibsid";
    $sqlupdatescimpa = "UPDATE tbl_scimpacandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatescimpaid";
    $sqlupdatesoe = "UPDATE tbl_soecandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesoeid";
    $sqlupdatesog = "UPDATE tbl_sogcandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesogid";
    $sqlupdatesois = "UPDATE tbl_soiscandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesoisid";
    $sqlupdatesol = "UPDATE tbl_solcandidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesolid";
    $sqlupdatestatus = "UPDATE tbl_users set user_status = 'Voted' where user_email='$user_email'";
    mysqli_query($conn, $sqlupdatecandidateList1);
    mysqli_query($conn, $sqlupdatecandidateList2);
    mysqli_query($conn, $sqlupdatecandidateList3);
    mysqli_query($conn, $sqlupdatecandidateList4);
    mysqli_query($conn, $sqlupdatecandidateList5);
    mysqli_query($conn, $sqlupdatecandidateList6);
    mysqli_query($conn, $sqlupdatecandidateList7);
    mysqli_query($conn, $sqlupdatesbm);
    mysqli_query($conn, $sqlupdateibs);
    mysqli_query($conn, $sqlupdatescimpa);
    mysqli_query($conn, $sqlupdatesoe);
    mysqli_query($conn, $sqlupdatesog);
    mysqli_query($conn, $sqlupdatesois);
    mysqli_query($conn, $sqlupdatesol);
    mysqli_query($conn, $sqlupdatestatus);
    echo $_POST[$user_email];
    echo "<script>alert('Vote Successful')</script>";
}else {
    echo "<script>alert('Please vote the candidate for each school.')</script>";

}}
}
}
// if(isset($_POST['submit'])){
//     echo "<script>confirm('Are you sure?');</script>";
// if(!empty($_POST['sbm'])&& $_POST['ibs']) {
//     $candidatesbmid=$_POST['sbm'];
//     $candidateibsid=$_POST['ibs'];
//     $sqlupdatesbm = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesbmid";
//     $sqlupdateibs = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidateibsid";
//     $sqlupdatestatus = "UPDATE tbl_users set user_status = 'Voted' where user_email='$user_email'";
//     $conn->exec($sqlupdatesbm);
//     $conn->exec($sqlupdateibs);
//     $conn->exec($sqlupdatestatus);
//     echo "<script>alert('Vote Successful')</script>";
// } else {
//     echo 'Please select the value.';
// }
// }
// }

// if(isset($_POST[submit.disabled = true])){
//     echo "<script>alert('You're voted');</script>";
// if(!empty($_POST['sbm'])&& $_POST['ibs']) {
//     $candidatesbmid=$_POST['sbm'];
//     $candidateibsid=$_POST['ibs'];
//     $sqlupdatesbm = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidatesbmid";
//     $sqlupdateibs = "UPDATE tbl_candidates SET candidate_vote = candidate_vote+1 WHERE candidate_id = $candidateibsid";
//     $sqlupdatestatus = "UPDATE tbl_users set user_status = 'Voted' where user_email='$user_email'";
//     $conn->exec($sqlupdatesbm);
//     $conn->exec($sqlupdateibs);
//     $conn->exec($sqlupdatestatus);
//     echo $_POST[$user_email];
//     echo "<script>alert('Vote Successful')</script>";
// } else {
//     echo 'Please select the value.';
// }
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
// $results_per_page = 10;
// if (isset($_GET['pageno'])) {
//     $pageno = (int)$_GET['pageno'];
//     $page_first_result = ($pageno - 1) * $results_per_page;
// } else {
//     $pageno = 1;
//     $page_first_result = 0;
// }


// $stmt = $conn->prepare($sqlcandidate);
// $stmt->execute();
// $number_of_result = $stmt->rowCount();
// $number_of_page = ceil($number_of_result / $results_per_page);
// $sqlcandidate = $sqlcandidate . " LIMIT $page_first_result , $results_per_page";
// $stmt = $conn->prepare($sqlcandidate);
// $stmt->execute();
// $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// $rows = $stmt->fetchAll();

// $conn= null;

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
    <link rel="stylesheet" href="../user/css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-base/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-buttons/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-popups/styles/material.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/ej2/21.2.3/ej2-splitbuttons/styles/material.css" rel="stylesheet" />
    <script src="/user/js/login.js" defer></script>
    <script src="/user/js/vote.js" defer></script>
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
        <a href="voteSBM.php" class="w3-bar-item w3-button w3-left">Vote</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Profile</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>

    <div class="w3-theme-2">
        <button onclick="w3_open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div>

   
    
        
    <form action="" method="post"  id="vote" >
    <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>School of Business Management</h4>
    </div>
        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/1/1.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sbm" value="1">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/1/2.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sbm" value="2">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/1/3.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sbm" value="3">Vote
        </label>
        </div>
        </div>
        </div>
        </div>

        <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>Islamic Business School</h4>
        </div>

        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/2/4.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="ibs" value="4">Vote
        </label>
        </div>
        </div>
        </div>
        

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/2/5.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="ibs" value="5">Vote
        </label>
        </div>
        </div>
        </div>
        

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/2/6.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="ibs" value="6">Vote
        </label>
        </div>
        </div>
        </div>
        </div>

        <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>School of Creative Industry Management and Performing Arts</h4>
        </div>
        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/3/7.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="scimpa" value="7">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/3/8.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="scimpa" value="8">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/3/9.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="scimpa" value="9">Vote
        </label>
        </div>
        </div>
        </div>
        </div>

        <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>School of Education</h4>
        </div>
        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/4/10.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="soe" value="9">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/4/11.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="soe" value="11">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/4/12.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="soe" value="12">Vote
        </label>
        </div>
        </div>
        </div>
        </div>
        
        <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>School of Government</h4>
        </div>
        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/5/13.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sog" value="13">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/5/14.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sog" value="14">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/5/15.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sog" value="15">Vote
        </label>
        </div>
        </div>
        </div>
        </div>
        
        <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>School of International Studies</h4>
        </div>
        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/6/16.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sois" value="16">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/6/17.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sois" value="17">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/6/18.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sois" value="18">Vote
        </label>
        </div>
        </div>
        </div>
        </div>
        
        <div class="w3-card w3-container w3-padding w3-margin w3-round">
        <h4>School of Law</h4>
        </div>
        <div class="w3-grid-template">
        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/7/19.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sol" value="19">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/7/20.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sol" value="20">Vote
        </label>
        </div>
        </div>
        </div>

        <div>
        <div>
        <div style='padding:10px'>
        <img class="photo " src="images/candidates/7/21.png" style='height:250px ;width:250px'>
        </div>
        </div>
        <div>
        <div class='e-btn-group'> 
        <label class="e-btn">
        <input type="radio" name="sol" value="21">Vote
        </label>
        </div>
        </div>
        </div>
        </div>

        <div class="w3-margin " style="display: flex; justify-content:flex-end; " >
            <input id="confirm" class="w3-theme-2" type="submit" name="submit" value="Confirm">
        </div>

    </form>
    
    

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

    <div class="w3-center w3-bottom w3-theme" style="max-width:1500px;margin:0 auto;">U-Vote</div>
</body>
</html>