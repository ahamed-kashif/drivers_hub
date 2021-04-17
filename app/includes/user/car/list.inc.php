<?php
session_start();

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
$cars = [];
try{
    $result = mysqli_query($conn, "SELECT * FROM cars order by updated_at DESC");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($cars, $row);
        }
    }
}catch (\Exception $e){
    header("Location: ../../../../../admin_pages/dashboard.php?error=".$e->getMessage());
}