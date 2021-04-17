<?php
if (isset($_SESSION['name']) || isset($_SESSION['id'])){
    echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">User</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/user_pages/profile.php">Profile</a>
                <a class="dropdown-item" href="/user_pages/applications.php">Applications</a>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </li>';
}else{
    echo '<li class="nav-item mr-2">
            <a class="nav-link" href="/user_pages/auth/login.php">Login</a>
        </li>';
}
?>


