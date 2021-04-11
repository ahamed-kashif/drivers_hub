<?php

if(count($_POST) > 0){
    session_start();
    try{
        unset($_SESSION["admin_id"]);
        unset($_SESSION["admin_name"]);
        header("Location: ../../../../../admin_pages/auth/login.php?success=You%20are%20successfully%20Logged%20out!");
    }catch(\Exception $e){
        header("Location: ../../../../admin_pages/dashboard.php?error=".$e->getMessage());
    }
}else{
    header("Location: ../../../../admin_pages/dashboard.php?error=Something%20went%20wrong!");
}