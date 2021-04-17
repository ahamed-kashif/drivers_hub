<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: ../../user_pages/auth/login.php?error="."Login First");
}
if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
    header("Location: ../../user_pages/applications.php?error="."Something went wrong!");
}
if(!isset($_POST['id']) || !isset($_POST['status'])){
    header("Location: ../../user_pages/applications.php?error="."Something went wrong!");
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