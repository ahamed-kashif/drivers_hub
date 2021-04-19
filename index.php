<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Driver's Hub</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body class="body-1">
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
                <li class="nav-item active mr-2">
                    <a class="nav-link" href="javascript:void(0)">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="user_pages/car/list.php">Cars</a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link" href="/user_pages/about-us.php">About us!</a>
                </li>
                <?php
                include "./user_pages/component/auth.php"
                ?>

            </ul>
            <!-- Links -->

            <form class="form-inline">
                <div class="md-form my-0">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" id="search">
                    <button type="submit" class="btn btn-md btn-outline-light">search</button>
                </div>
            </form>
        </div>
        <!-- Collapsible content -->

    </nav>
    <div class="result"></div>
    <!--/.Navbar-->
    <!-- hero -->
    <div class="jumbotron-hero jumbotron-fluid">
        <div class="container">
            <h1 class="display-3 font-weight-bold text-warning">Driver's Hub</h1>
            <p class="h4">Welcome to Driver's Hub!<br> <span><u><a href="/user_pages/auth/register.html" class="text-warning" style="text-decoration: none;">Register</a></u></span> as Driver and find<br> your desired vehicle now ......</p>
        </div>
    </div>
    <!--/. hero -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            loadData();
            function loadData(query){
                $.ajax({
                    url : "/user_pages/ajax_search.php",
                    type: "get",
                    data:{query:query},
                    success:function(response){
                        $(".result").html(response);
                    }
                });
            }
            $("#search").keyup(function(){
                var search = $(this).val();
                if (search !="") {
                    loadData(search);
                }else{
                    loadData();
                }
            });
        });
    </script>
</body>
</html>