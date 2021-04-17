<?php
session_start();
if (!isset($_SESSION['admin_name'])){
    header("Location:../../../../admin_pages/auth/login.php?error=Login%20First");
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //die(isset($_POST['model']));
    if(empty($_POST['model'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Model%20of%20car");
    }
    if(empty($_POST['id'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Model%20of%20car");
    }
    if(empty($_POST['brand'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Brand");
    }
    if(empty($_POST['owner_name'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Owner%20name");
    }
    if(empty($_POST['job_des'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Job%20description");
    }

    //inserting data
    include "../../../config/Connection.php";
    $sql = "UPDATE cars SET brand='".$_POST['brand']."', model='".$_POST['model']."', owner_name='".$_POST['owner_name']."', job_des='".$_POST['job_des']."', updated_at='".date('y-m-d h:i:sa')."' WHERE id=".$_POST['id'];
    if (mysqli_query($conn, $sql)) {
        header('Location: ../../../../admin_pages/car/list.php?success=Car%20updated');
    } else {
        header("Location: ../../../../admin_pages/car/list.php?error=".mysqli_error($conn));
    }

}else{
    header("Location: ../../../../admin_pages/car/list.php?error=Fill%20up%20the%20form");
}
