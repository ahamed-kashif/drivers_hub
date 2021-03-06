<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Cars | Driver's Hub</title>
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
                    <a class="nav-link" href="/index.php">Home
                    </a>
                </li>
                <li class="nav-item mr-2">
                    <a class="nav-link active" href="javascript:void(0)">Cars</a>
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
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" id="search">
                    <button type="submit" class="btn btn-md btn-outline-light">search</button>
                </div>
            </form>
        </div>
        <div class="result"></div>
        <!-- Collapsible content -->

    </nav>
    <?php
    include "../../app/includes/user/car/list.inc.php";
    ?>
    <!--/.Navbar-->
    <div class="album py-5">
        <div class="container">
            <div class="row">
                <?php
                include "../../app/includes/component/message.php"
                ?>
            </div>
            <div class="row">
                <?php
                foreach ($cars as $car){
                    echo '<div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="/assets/images/uploads/'.$car['img'].'" alt="Card image cap" height="250" width="200">
                    <div class="card-body">
                        <p class="card-text">'.$car['job_des'].'</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="show.php?id='.$car['id'].'" class="btn btn-sm btn-outline-warning">see more</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // fetch data from table without reload/refresh page
            loadData();
            function loadData(query){
                $.ajax({
                    url : "../ajax_search.php",
                    type: "get",
                    data:{query:query},
                    success:function(response){
                        $(".result").html(response);
                    }
                });
            }

            // live search data from table without reload/refresh page
            $("#search").keyup(function(){
                var search = $(this).val();
                console.log(search);
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