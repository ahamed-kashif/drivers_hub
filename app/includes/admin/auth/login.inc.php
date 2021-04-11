<?php

include "../../../config/Connection.php";

session_start();
$message = "";
if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username='" . $_POST["username"] . "' and password = '" . $_POST["password"] . "' LIMIT 1");
    if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
    } else {
        $row = mysqli_fetch_array($result);
        if (is_array($row)) {
            $_SESSION["admin_id"] = $row['id'];
            $_SESSION["admin_name"] = $row['username'];
            $message = "you are logged in";
        } else {
            $message = "Invalid Username or Password!";

        }
    }
}
if (isset($_SESSION["admin_name"])) {
    header("Location:../../../../admin_pages/dashboard.php?success=" . $message);
} else {
    header("Location:../../../../admin_pages/auth/login.php?error=" . $message);
}