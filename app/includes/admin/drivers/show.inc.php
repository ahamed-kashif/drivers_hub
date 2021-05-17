<?php
if(empty($_GET['id'])){
    header("Location: ./list.php?error=Wrong%20Url!!");
}
$id = $_GET['id'];
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
$driver = "";
try{
    $result = mysqli_query($conn, "SELECT * FROM users where id=".$id);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $driver = $row;
        }
    }
}catch (\Exception $e){
    header("Location: ../../../../../user_pages/profile.php?error=".$e->getMessage());
}