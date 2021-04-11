<?php
include "../Connection.php";

session_start();
$message="";
if(count($_POST)>0) {
    $result = mysqli_query($conn,"SELECT * FROM users WHERE email='" . $_POST["username"] . "' and password = '". $_POST["password"]."' LIMIT 1");
    if(!$result){
        printf("Error: %s\n", mysqli_error($conn));
    }else{
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['name'];
            $message="you are logged in";
        } else {
            $message = "Invalid Username or Password!";

        }
    }
}
if(isset($_SESSION["id"])) {
    header("Location:index.php?message=".$message);
}else{
    header("Location:../../../user_pages/auth/login.php?message=".$message);
}