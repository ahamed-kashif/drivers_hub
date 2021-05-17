<?php
session_start();

if(!isset($_SESSION['name'])){
    if(!isset($_COOKIE['rememberme'])){
        header("Location:../user_pages/auth/login.php?error=Login%20First");
    }else{
        $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_COOKIE["rememberme"] . "'  LIMIT 1");
        if(!$result){
            printf("Error: %s\n", mysqli_error($conn));
        }else {
            $row = mysqli_fetch_array($result);
            if (is_array($row)) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['name'];
            }
        }
    }
}
if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
    header("Location: ../../user_pages/applications.php?error="."Something went wrong!");
}
if(!isset($_POST['id']) || !isset($_POST['status'])){
    header("Location: ../../user_pages/applications.php?error="."Something went wrong!");
}

try {
    $sql = "UPDATE applications SET status='".$_POST['status']."', updated_at='".date('y-m-d h:i:sa')."' WHERE id=".$_POST['app_id'];
    if(mysqli_query($conn, $sql)){
        header("Location: ../../../../user_pages/applications.php?success="."Application Processed!");
    }else{
        header("Location: ../../../../user_pages/applications.php?error="."Something went wrong");
    }

} catch (\Exception $e) {
    header("Location: ../../../../user_pages/dashboard.php?error=" . $e->getMessage());
}