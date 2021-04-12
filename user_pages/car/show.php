<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUV-yz V8 | Driver's Hub</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body class="body-2" style="background-color: #f5eeab">
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
                    <a class="nav-link" href="/index.php">Home
                    </a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link active" href="/user_pages/car/list.php">Cars</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="/user_pages/about-us.php">About us!</a>
                </li>
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
    <div class="container">
        <div class="card mb-3 mt-5" >
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                        <img src="/assets/images/banner/banner.jpg" alt="..." class="img-fluid">
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h5 class="card-title">Porche SUV yz V8</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <form>
                                <button class="btn btn-lg btn-outline-warning">APPLY NOW!</button>
                            </form>
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