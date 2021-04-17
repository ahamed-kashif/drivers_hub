<?php
if(!isset($_SESSION['name'])){
    header("Location: ../../user_pages/auth/login.php");
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
$applications = [];
try{
    $result = mysqli_query($conn, "SELECT * FROM applications where user_id='".$_SESSION['id']."' order by updated_at DESC");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $car = mysqli_query($conn, "SELECT * FROM cars where id='".$row['car_id']."'");
            if($car){
                $row['car'] = mysqli_fetch_array($car);
            }else{
                header("Location: ../../../../user_pages/profile.php?error="."Something went wrong!");
            }
            array_push($applications, $row);
        }
    }
}catch (\Exception $e){
    header("Location: ../../../../user_pages/profile.php?error=".$e->getMessage());
}

function status(int $code){
    switch ($code){
        case 1: return '<div class="mb-2"><span class="bg-success p-3 font-weight-bold text-light">Application Accepted</span></div>'; break;
        case 0: return '<div class="mb-2"><span class="bg-warning p-3 font-weight-bold text-light">Application Pending</span></div>'; break;
        case 3: return '<div class="mb-2"><span class="bg-danger p-3 font-weight-bold text-light">Application Denied</span></div>'; break;
        case 4: return '<div class="mb-2"><span class="bg-danger p-3 font-weight-bold text-light">Application Cancelled</span></div>';
            break;
    }
}