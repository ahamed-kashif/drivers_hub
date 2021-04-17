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
    if(empty($_POST['brand'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Brand");
    }
    if(empty($_POST['owner_name'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Owner%20name");
    }
    if(empty($_POST['job_des'])){
        header("Location: ../../../../admin_pages/car/add.php?error=Enter%20Job%20description");
    }
    if(isset($_FILES['image'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
            $errors="extension not allowed, please choose a JPEG or PNG file.";
        }
        if(empty($errors)==true){
            $fileNewName = uniqid('',true).".".$file_ext;
            move_uploaded_file($file_tmp,"../../../../assets/images/uploads/".$fileNewName);

        }else{
            header("Location: ../../../../admin_pages/car/add.php?error=".$errors);
        }
    }else{
        header("Location: ../../../../admin_pages/car/add.php?error=Upload%20image");
    }
    //inserting data
    include "../../../config/Connection.php";
    $sql = "INSERT INTO cars (brand, model, owner_name, job_des, img, created_at, updated_at) VALUES ('".$_POST['brand']."', '".$_POST['model']."', '".$_POST['owner_name']."', '".$_POST['job_des']."', '".(empty($fileNewName) ? null : $fileNewName)."', '".date('y-m-d h:i:sa')."', '".date('y-m-d h:i:sa')."')";
    if (mysqli_query($conn, $sql)) {
        header("Location: ../../../../admin_pages/car/list.php?success=New%20car%20added");
    } else {
        header("Location: ../../../../admin_pages/car/add.php?error=".mysqli_error($conn));
    }

}else{
    header("Location: ../../../../admin_pages/car/add.php?error=Fill%20up%20the%20form");
}
