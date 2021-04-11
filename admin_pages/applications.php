<?php
session_start();
if(!isset($_SESSION['admin_name'])){
    header("Location:../admin_pages/auth/login.php?error=Login%20First");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us! | Driver's Hub</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-warning">

    <!-- Navbar brand -->
    <a class="navbar-brand mr-5 ml-2 font-monospace " href="/index.html">Driver's Hub</a>

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
                <a class="nav-link active" href="dashboard.php">Admin Dashboard
                </a>
                <span class="sr-only">(current)</span>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link" href="car/list.html">Cars</a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link" href="drivers.php">Drivers</a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link" href="/admin_pages/car/add.html">Add Car</a>
            </li>
            <!-- Dropdown -->
            <?php
                include "./component/auth.php"
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
<div class="container">
    <div class="card mt-5">
        <div class="card-body">
            <div class="col-md-12 col-lg-12">
                <div class="row bordered">
                    <div class="col-md-9 col-lg-9">
                        <a href="javascript:void(0)"><h4>Application One</h4></a>
                        <small class="text-muted">3 mins ago</small>
                    </div>
                    <div class="col-md-3 text-align-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">Accept</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="col-md-12 col-lg-12">
                <div class="row bordered">
                    <div class="col-md-9 col-lg-9">
                        <a href="javascript:void(0)"><h4>Application One</h4></a>
                        <small class="text-muted">3 mins ago</small>
                    </div>
                    <div class="col-md-3 text-align-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">Accept</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="col-md-12 col-lg-12">
                <div class="row bordered">
                    <div class="col-md-9 col-lg-9">
                        <a href="javascript:void(0)"><h4>Application One</h4></a>
                        <small class="text-muted">3 mins ago</small>
                    </div>
                    <div class="col-md-3 text-align-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">Accept</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="col-md-12 col-lg-12">
                <div class="row bordered">
                    <div class="col-md-9 col-lg-9">
                        <a href="javascript:void(0)"><h4>Application One</h4></a>
                        <small class="text-muted">3 mins ago</small>
                    </div>
                    <div class="col-md-3 text-align-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">Accept</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="col-md-12 col-lg-12">
                <div class="row bordered">
                    <div class="col-md-9 col-lg-9">
                        <a href="javascript:void(0)"><h4>Application One</h4></a>
                        <small class="text-muted">3 mins ago</small>
                    </div>
                    <div class="col-md-3 text-align-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">Accept</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-body">
            <div class="col-md-12 col-lg-12">
                <div class="row bordered">
                    <div class="col-md-9 col-lg-9">
                        <a href="javascript:void(0)"><h4>Application One</h4></a>
                        <small class="text-muted">3 mins ago</small>
                    </div>
                    <div class="col-md-3 text-align-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-success">Accept</button>
                            <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/plugins/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>