<?php
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
?>
