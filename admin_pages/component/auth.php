<?php
if (isset($_SESSION['admin_name'])){
    echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">Admin</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <form action="../../app/includes/admin/auth/logout.inc.php" method="post">
                <input type="hidden" name="logout" value="1">
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>';
}else{
    echo '<li class="nav-item mr-2">
            <a class="nav-link" href="/admin_pages/auth/login.php">Login</a>
        </li>';
}
?>


