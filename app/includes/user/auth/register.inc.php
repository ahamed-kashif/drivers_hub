<?php
include "../../../config/Connection.php";

session_start();
$message="";
if(count($_POST)>0) {
    $result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and email = '". $_POST["email"]."' LIMIT 1");
    if($result){
        printf("Error: %s\n", mysqli_error($conn));
    }else{
        $sql = "INSERT INTO users (username, email, password, name) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."', '".$_POST['username']."')";
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn,"SELECT * FROM users WHERE username='" . $_POST["username"] . "' and email = '". $_POST["email"]."' LIMIT 1");
            $row  = mysqli_fetch_array($result);
            if(is_array($row)) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['name'];
                $message="you are logged in";
            } 
            header("Location: ../../../../user_pages/applications.php?success=Application%20sent%20successfully!");
        } else {
            header("Location:".$_SERVER['HTTP_REFERER'].'&error='.mysqli_error($conn));
        }
    }
}
// if(isset($_SESSION["id"])) {
//     header("Location: ../../../../user_pages/profile.php?success=".$message);
// }else{
//     header("Location:../../../../user_pages/auth/login.php?error=".$message);
// }