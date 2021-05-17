<?php

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