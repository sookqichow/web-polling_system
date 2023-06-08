<?php
session_start();
if (isset($_SESSION['sessionid'])) {
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
}else{
    $user_email = "sookqichow00@gmail.com";
}

include_once("dbconnect.php");
if (isset($_POST['submit'])) {
    $candidate_id=$_POST['candidate_id'];
    $candidate_name = addslashes($_POST['candidate_name']);
    $candidate_manifesto = addslashes($_POST['candidate_manifesto']);
    $school_name = $_POST['school_name'];
    $candidate_vote = $_POST['candidate_vote'];
    if($_POST['school_name']=='School of Business Management'){
        $school_id="1";
        $sqlsbmupdate = "UPDATE `tbl_sbmcandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlsbmupdate);
    }else if ($_POST['school_name']=='Islamic Business School'){
        $school_id="2";
        $sqlibsupdate = "UPDATE `tbl_ibscandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlibsupdate);
    }else if ($_POST['school_name']=='School of Creative Industry Management and Performing Arts'){
        $school_id="3";
        $sqlscimpaupdate = "UPDATE `tbl_scimpacandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlscimpaupdate);
    }else if ($_POST['school_name']=='School of Education'){
        $school_id="4";
        $sqlsoeupdate = "UPDATE `tbl_soecandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlsoeupdate);
    }else if ($_POST['school_name']=='School of Government'){
        $school_id="5";
        $sqlsogupdate = "UPDATE `tbl_sogcandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlsogupdate);
    }else if ($_POST['school_name']=='School of International Studies'){
        $school_id="6";
        $sqlsoisupdate = "UPDATE `tbl_soiscandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlsoisupdate);
    }else if ($_POST['school_name']=='School of Law'){
        $school_id="7";
        $sqlsolupdate = "UPDATE `tbl_solcandidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
        $conn->exec($sqlsolupdate);
    }else{
        // $school_id="1";
    }
    // $school_id="1";
   
    $sqlupdate = "UPDATE `tbl_candidates` SET `candidate_id`='$candidate_id',`candidate_name`='$candidate_name',
    `candidate_manifesto`='$candidate_manifesto',`school_id`=$school_id,`school_name`=$school_name,`candidate_vote`='$candidate_vote' 
    WHERE 'candidate_id` = '$candidate_id'";
//    if($school_id="1"){
    
//     $sqlinsertsbmcandidate = "INSERT INTO `tbl_sbmcandidates`(`candidate_name`, `candidate_manifesto`,`school_id`, `school_name`, 
//     `candidate_vote`) VALUES ('$candidate_name','$candidate_manifesto','$school_id','$school_name',$candidate_vote)";
//     $conn->exec($sqlinsertsbmcandidate);
// }else if ($school_id="2"){
//     $sqlinsertibscandidate = "INSERT INTO `tbl_ibscandidates`(`candidate_name`, `candidate_manifesto`,`school_id`, `school_name`, 
//     `candidate_vote`) VALUES ('$candidate_name','$candidate_manifesto','$school_id','$school_name',$candidate_vote)";
//     $conn->exec($sqlinsertibscandidate);
// }
 try {
        $conn->exec($sqlupdate);
        // $last_id = $conn->lastInsertId();
        // if($school_id=="1"){
        //         $sqlupdatesbmcandidateid = "UPDATE tbl_sbmcandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdatesbmcandidateid);
        //     }else if ($school_id=="2"){
        //         $sqlupdateibscandidateid = "UPDATE tbl_ibscandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdateibscandidateid);
        //     }else if ($school_id=="3"){
        //         $sqlupdatescimpacandidateid = "UPDATE tbl_scimpacandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdatescimpacandidateid);
        //     }else if ($school_id=="4"){
        //         $sqlupdatesoecandidateid = "UPDATE tbl_soecandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdatesoecandidateid);
        //     }else if ($school_id=="5"){
        //         $sqlupdatesogcandidateid = "UPDATE tbl_sogcandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdatesogcandidateid);
        //     }else if ($school_id=="6"){
        //         $sqlupdatesoiscandidateid = "UPDATE tbl_soiscandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdatesoiscandidateid);
        //     }else if ($school_id=="7"){
        //         $sqlupdatesolcandidateid = "UPDATE tbl_solcandidates SET candidate_id = $last_id WHERE candidate_id = '0'";
        //         $conn->exec($sqlupdatesolcandidateid);
        //     }
        $allowTypes=array('jpg','png','jpeg','gif','pdf');
        $destination_path = getcwd().DIRECTORY_SEPARATOR;
        $targetDir = $destination_path . 'images/candidates/'.$school_id.'/'.$last_id. ".png";
        // $targetDir='images/';
        
        // $filename=basename($_FILES["fileToUpload"]["name"]);
        // $targetFilePath=$targetDir.$filename;
        $fileType=pathinfo($targetDir, PATHINFO_EXTENSION);
        if (!file_exists($targetFilePath) ) {
            if(in_array($fileType,$allowTypes)) {
                // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFilePath);
                if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetDir)) {
            // $last_id = $conn->lastInsertId();
            // uploadImage($last_id);
            echo "<script>alert('Success')</script>";
            echo "<script>window.location.replace('vote.php')</script>";
        }else{echo "<script>alert('Sorry , there was an error uploading your file')</script>";}
    }else{
        echo "<script>alert('Sorry, only JPG,JPEG,GIF & PDF files are allowed to upload')</script>";
    }}else{
        echo "<script>alert('The file <b>".$filename."</b> is already exist.')</script>";
    }} catch (PDOException $e) {
        echo "<script>alert('Failed')</script>";
        echo "<script>window.location.replace('vote.php')</script>";
    }
}

if (isset($_GET['submit'])) {
    $operation = $_GET['submit'];
    if ($operation == 'details') {
        $candidate_id = $_GET['candidate_id'];
        $sqlcandidates = "SELECT * FROM tbl_candidates WHERE candidate_id = '$candidate_id'";
        $stmt = $conn->prepare($sqlcandidates);
        $stmt->execute();
        $rows = $stmt->fetchAll();
        $number_of_rows = $stmt->rowCount();
        if ($number_of_rows > 0) {
            foreach ($rows as $candidates) {
            $candidate_id = $candidates['candidate_id'];
            $candidate_name = $candidates['candidate_name'];
            $candidate_manifesto = $candidates['candidate_manifesto'];
            $school_id = $candidates['school_id'];
            $school_name = $candidates['school_name'];
            $candidate_vote = $candidates['candidate_vote'];
            }
        }else{
            echo "<script>alert('No candidate found')</script>";
            echo "<script>window.location.replace('vote.php')</script>";
        }
    }
}else{
    echo "<script>alert('Error')</script>";
    echo "<script>window.location.replace('vote.php')</script>";
}
// function uploadImage($filename)
// {
//     if(!empty($school_id)) {
//         $target_dir = "images/candidates/1/";
//     $target_file = $target_dir . $filename . ".png";
//     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//     } else {
//         echo "school_id is empty";
//     }
    
// }


// if (isset($_SESSION['sessionid'])) {
//     $user_email = $_SESSION['email'];
//     $user_name = $_SESSION['name'];
// }else{
//     $user_email = "sookqichow00@gmail.com";
// }
// if (isset($_POST['submit'])&&!empty($_FILES["fileToUpload"]["name"])) {
//     include_once("dbconnect.php");
//     $candidate_name = addslashes($_POST['candidate_name']);
//     $candidate_manifesto = addslashes($_POST['candidate_manifesto']);
//     $school_name = $_POST['school_name'];
//     if($_POST['school_name']=='School of Business Management'){
//         $school_id="1";
//     }else if ($_POST['school_name']=='Islamic Business School'){
//         $school_id="2";
//     }else if ($_POST['school_name']=='School of Creative Industry Management and Performing Arts'){
//         $school_id="3";
//     }else if ($_POST['school_name']=='School of Education'){
//         $school_id="4";
//     }else if ($_POST['school_name']=='School of Government'){
//         $school_id="5";
//     }else if ($_POST['school_name']=='School of International Studies'){
//         $school_id="6";
//     }else if ($_POST['school_name']=='School of Law'){
//         $school_id="7";
//     }else{
//         $school_id="1";
//     }
//     // $school_id="1";
//     $candidate_vote = "0";
//     $sqlinsertcandidate = "INSERT INTO `tbl_candidates`(`candidate_name`, `candidate_manifesto`,`school_id`, `school_name`, 
//     `candidate_vote`) VALUES 
//     ('$candidate_name','$candidate_manifesto','$school_id','$school_name',$candidate_vote)";
//     try {
//         $conn->exec($sqlinsertcandidate);
//         $allowTypes=array('jpg','png','jpeg','gif','pdf');
//         $last_id = $conn->lastInsertId();
//         $destination_path = getcwd().DIRECTORY_SEPARATOR;
// $targetDir = $destination_path . 'images/candidates/'.$last_id;
//         // $targetDir="images/candidates/$school_id/";
        
//         // $filename=$last_id;
//         // $targetFilePath=$targetDir.$filename;
//         // $fileType=pathinfo($targetDir, PATHINFO_EXTENSION);
//         if (!file_exists($targetFilePath) ) {
//             if(in_array($fileType,$allowTypes)) {
//                 // move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetFilePath);
//                 if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$targetDir)) {
//                     // if(uploadImage($last_id)) { 
//             // $last_id = $conn->lastInsertId();
//             // uploadImage($last_id);
//             echo "<script>alert('Success')</script>";
//             echo "<script>window.location.replace('candidateList.php')</script>";
//         }else{echo "<script>alert('Sorry , there was an error uploading your file')</script>";}
//     }else{
//         echo "<script>alert('Sorry, only JPG,JPEG,GIF & PDF files are allowed to upload')</script>";
//     }}else{
//         echo "<script>alert('The file <b>".$filename."</b> is already exist.')</script>";
//     }} catch (PDOException $e) {
//         echo "<script>alert('Failed')</script>";
//         echo "<script>window.location.replace('newcandidate.php')</script>";
//     }
// }

// function uploadImage($filename)
// {
//     if(!empty($school_id)) {
//         $target_dir = "images/candidates/$school_id/";
//     $target_file = $target_dir . $filename . ".png";
//     move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
//     } else {
//         echo "school_id is empty";
//     }
    
// }
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
    <script src="/user/js/login.js" defer></script>
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
        <a href="#" class="w3-bar-item w3-button w3-left">Use Help Center</a>
        <a href="#" class="w3-bar-item w3-button w3-left">Profile</a>
        <a href="login.php" class="w3-bar-item w3-button w3-left">Log Out</a>
    </div>

    <div class="w3-theme-2">
        <button onclick="w3_open()" class="w3-button w3-right w3-hide-large w3-hide-medium">☰</button>
        
    </div>

   
    <div class="w3-bar ">
        <a href="vote.php" class="w3-bar-item w3-button w3-right w3-theme">Back</a>
    </div>
    <div class="w3-content w3-padding-30">
        <form class="w3-card w3-padding" action="newcandidate.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Are you sure?')">
            <div class="w3-container w3-theme">
                <h3>Update Candidate</h3>
            </div>
            <div class="w3-container w3-center">
                <img class="w3-image w3-margin" src="images/candidates/<?php echo $school_id. '/'.$candidate_id.'.png'?>" style="height:50%;width:200px"><br>
                <input type="file" name="fileToUpload" onchange="previewFile()">
            </div>
            <hr>
            <input type="hidden" name="candidate_id" value="<?php echo $candidate_id ?>">
            <div class="w3-row">
                <div class="w3-half" style="padding-right:4px">
                    <p>
                        <label><b>Candidate Name</b></label>
                        <input class="w3-input w3-border w3-round" width="100%" name="candidate_name" type="text" value="<?php echo $candidate_name ?>"required>
                    </p>
                </div>
                <div class="w3-row">
                    
                <p>
                <label><b>Manifesto</b></label>
                <textarea class="w3-input w3-border w3-round" rows="4" width="100%" name="candidate_manifesto" required><?php echo $candidate_manifesto ?></textarea>
                </p>
                </div>
                
                <div class="w3-half" style="padding-right:4px">
                    <p>
                        <label><b>School</b></label>
                        <select class="w3-select w3-border w3-round" name="school_name">
                            <option value="School of Business Management"<?php if ($school_name == "School of Business Management") echo ' selected="selected"'; ?>>School of Business Management</option>
                            <option value="Islamic Business School"<?php if ($school_name == "Islamic Business School") echo ' selected="selected"'; ?>>Islamic Business School</option>
                            <option value="School of Creative Industry Management and Performing Arts"<?php if ($school_name == "School of Creative Industry Management and Performing Arts") echo ' selected="selected"'; ?>>School of Creative Industry Management and Performing Arts</option>
                            <option value="School of Education"<?php if ($school_name == "School of Education") echo ' selected="selected"'; ?>>School of Education</option>
                            <option value="School of Government"<?php if ($school_name == "School of Government") echo ' selected="selected"'; ?>>School of Government</option>
                            <option value="School of International Studies"<?php if ($school_name == "School of International Studies") echo ' selected="selected"'; ?>>School of International Studies</option>
                            <option value="School of Law"<?php if ($school_name == "School of Law") echo ' selected="selected"'; ?>>School of Law</option>
                        </select>
                    </p>
                </div>
                <p>
                <input type="hidden" name="candidate_vote" value="<?php echo $candidate_vote ?>">
                </p>
                <p>
                    <input class="w3-button w3-theme w3-round w3-block w3-border" type="submit" name="submit" value="Update">
                </p>
            </div>
            
        
        </form>
    </div>

    <div class="w3-center w3-bottom w3-theme" style="max-width:1500px;margin:0 auto;">U-Vote</div>
</body>
</html>