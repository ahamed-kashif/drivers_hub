<?php

if(count($_POST) > 0){
    session_start();
    try{
        unset($_SESSION["id"]);
        unset($_SESSION["name"]);
        header("Location: ../../../../../user_pages/auth/login.php?success=You%20are%20successfully%20Logged%20out!");
    }catch(\Exception $e){
        header("Location: ../../../../user_pages/dashboard.php?error=".$e->getMessage());
    }
}else{
    header("Location: ../../../../user_pages/profile.php?error=Something%20went%20wrong!");
}