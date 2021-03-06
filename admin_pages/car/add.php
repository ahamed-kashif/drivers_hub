<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header("Location:../../admin_pages/auth/login.php?error=Login%20First");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars | Admin | Driver's Hub</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">

    <!-- Navbar brand -->
    <a class="navbar-brand mr-5 ml-2 font-monospace " href="/index.php">Driver's Hub</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item mr-2">
                <a class="nav-link" href="#" onclick="alert('This page is not ready yet!')">Admin Dashboard
                </a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link active" href="javascript:void(0)">Cars</a>
                <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link" href="javascript:void(0)" onclick="alert('Page is not ready yet!')">Drivers</a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link" href="/admin_pages/car/add.php">Add Car</a>
            </li>
            <!-- Dropdown -->
            <?php
            include "../component/auth.php"
            ?>

        </ul>
        <!-- Links -->

        <form class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button type="submit" class="btn btn-md btn-outline-light">search</button>
            </div>
        </form>
    </div>
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
<div class="container m-5 p-5">
    <h2 class="text-warning">Add new car</h2>
    <form action="../../app/includes/admin/car/store.inc.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="car-brand">Car Brand</label>
            <input type="text" class="form-control" id="car-brand" name="brand"  placeholder="">
        </div>
        <div class="form-group">
            <label for="car-model">Car Model</label>
            <input type="text" class="form-control" id="car-model" name="model" placeholder="">
        </div>
        <div class="form-group">
            <label for="owner-name">Owner Name</label>
            <input type="text" class="form-control" id="owner-name" name="owner_name" placeholder="">
        </div>
        <div class="form-group">
            <label for="job-description">Job Description</label>
            <textarea class="form-control" id="job-description" name="job_des" ></textarea>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input class="form-control" id="image" name="image" type="file"/>
        </div>
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
    <?php
    include "../../app/includes/component/message.php"
    ?>
</div>
<script src="/assets/js/plugins/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>