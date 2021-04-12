<?php
if(!isset($_GET['id'])){
    header('Location: ../../../../admin_pages/car/list.php?error="Wrong Url!"');
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


$result = mysqli_query($conn, "SELECT * FROM cars WHERE id='" . $_GET["id"] . "' LIMIT 1");
if (!$result) {
    header('Location: ../../../../admin_pages/car/list.php?error=Wrong%20Url!'.mysqli_error($conn));
}
$row = mysqli_fetch_array($result);
$car = [];
if (is_array($row)){
    $car = $row;
}