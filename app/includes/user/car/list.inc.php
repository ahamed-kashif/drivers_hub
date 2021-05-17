<?php
session_start();
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