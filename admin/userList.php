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
    if($operation == 'verify') {
        $matric_no = $_GET['matric_no'];
            $sqlverifyuser = "UPDATE tbl_users SET user_status = 'Verified' WHERE matric_no = '$matric_no'";
            mysqli_query($conn, $sqlverifyuser);
        // $conn->exec($sqldeletecandidate);
        echo "<script>alert('User is verified')</script>";
        echo "<script>window.location.replace('userList.php')</script>";
    }else {
        echo "<script>alert('Verify user unsuccessful.')</script>";
    
    }
    if ($operation == 'delete') {
        $matric_no = $_GET['matric_no'];
        $sqldeleteuser = "DELETE FROM tbl_users WHERE matric_no = '$matric_no'";
        mysqli_query($conn, $sqldeleteuser);
        // $conn->exec($sqldeletecandidate);
        echo "<script>alert('User deleted')</script>";
        echo "<script>window.location.replace('userList.php')</script>";
    }else {
        echo "<script>alert('Delete user unsuccessful.')</script>";
    
    }
    
    if ($operation == 'search') {
        $search = $_GET['search'];
            $sqluser = "SELECT * FROM tbl_users WHERE user_name LIKE '%$search%'";

    }
    
} else {
    $sqluser = "SELECT * FROM tbl_users";
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


$stmt = $conn->prepare($sqluser);
$stmt->execute();
$stmt->store_result();
$number_of_result = $stmt->num_rows;
$number_of_page = ceil($number_of_result / $results_per_page);
$sqluser = $sqluser . " LIMIT $page_first_result , $results_per_page";
$stmt = $conn->prepare($sqluser);
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
    <script src="scripts/login.js" defer></script>
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
        <a href="vote.php" class="w3-bar-item w3-button w3-left">Vote</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Profile</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>

    <div class="w3-theme-2">
        <button onclick="w3_open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
    

    <div class="w3-margin w3-border" style="overflow-x:auto;">
        <?php
        $i = 0;
        echo "<table class='w3-table w3-striped w3-bordered' style='width:100%'>
         <tr><th style='width:8%'>Matric No</th><th style='width:15%'>User Email</th><th style='width:30%'>User Password</th><th style='width:15%'>User Name</th><th style='width:8%'>User School</th><th>User Phone</th><th>User Status</th></tr>";
         
        foreach ($rows as $users) {
            $i++;
            $matric_no = $users['matric_no'];
            $user_email = $users['user_email'];
            $user_pass = $users['user_pass'];
            $user_name = $users['user_name'];
            $user_school = $users['user_school'];
            $user_phone = $users['user_phone'];
            $user_status = $users['user_status'];

            // echo "<tr>";
            // echo "<td>";
            // echo $matric_no;
            // echo "</td><td>";
            // echo $user_email;
            //  echo "</td><td>";
            // echo $user_pass;
            // echo "</td><td>";
            // echo $user_name;
            // echo "</td><td>";
            // echo $user_school;
            // echo "</td><td>";
            // echo $user_phone;
            // echo "</td><td>";            
            // echo $user_status;
            // echo "</td><td>";    

            // if($user_status == 'Unverified'){
            // echo "<button class=' w3-theme-2 w3-round w3-block' style='width:60%;height:30px;display:inline-block' id='verify'><a href='userList.php?submit=verify&matric_no=$matric_no'>Verify </a></button> ";
            // }
            // echo "<button class='btn'><a href='userList.php?submit=delete&cmatric_no=$matric_no' class='fa fa-trash' onclick=\"return confirm('Are you sure?')\"></a></button>";
            // echo "</td>";
            // echo "</tr>";
            echo "<tr><td>$matric_no</td><td>$user_email</td><td>$user_pass</td><td>$user_name</td><td>$user_school</td><td>$user_phone</td><td>$user_status</td>
            <td><button class='btn'><a href='userList.php?submit=delete&cmatric_no=$matric_no' class='fa fa-trash' onclick=\"return confirm('Are you sure?')\"></a></button>
            </td>";
            if($user_status == 'Unverified'){
                echo "<td><button class=' w3-theme-2 w3-round w3-block' style='width:90%;height:30px;display:inline-block' id='verify'><a href='userList.php?submit=verify&matric_no=$matric_no'>Verify </a></button></td> ";
            }
            echo "</tr>";
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

    <div class="w3-center w3-bottom w3-theme" style="max-width:1800px;margin:0 auto;">U-Vote</div>
</body>
</html>