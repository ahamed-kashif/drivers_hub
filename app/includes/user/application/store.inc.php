<?php
session_start();
if(empty($_SESSION['id'])){
    header("Location: ../../../../user_pages/auth/login.php");
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(empty($_POST['card_id'])){
        header('Location: ' . $_SERVER['HTTP_REFERER'].'?error=wrong%20request!!');
    }
    define('DB_SERVER', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'drivers_hub');
    define('DB_PORT', '8000');

//connection
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    try{
        $sql = "INSERT INTO applications (car_id, user_id, created_at, updated_at) VALUES ('".$_POST['car_id']."', '".$_SESSION['id']."', '".date('y-m-d h:i:sa')."', '".date('y-m-d h:i:sa')."')";
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../../../user_pages/applications.php?success=Application%20sent%20successfully!");
        } else {
            header("Location:".$_SERVER['HTTP_REFERER'].'&error='.mysqli_error($conn));
        }
    }catch (\Exception $e){
        header("Location:".$_SERVER['HTTP_REFERER'].'&error='.$e->getMessage());
    }
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=wrong%20request!!');
}