<?php
if(empty($_GET['id'])){
    header("Location: ./list.php?error=Wrong%20Url!!");
}
$id = $_GET['id'];

//connection
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$car = "";
try{
    $result = mysqli_query($conn, "SELECT * FROM cars where id=".$id);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $car = $row;
        }
    }
}catch (\Exception $e){
    header("Location: ../../../../../user_pages/profile.php?error=".$e->getMessage());
}