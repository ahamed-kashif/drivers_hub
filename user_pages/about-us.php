<?php
session_start();
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
                <a class="nav-link" href="/user_pages/car/list.php">Cars</a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link active" href="javascript:void(0)">About us!</a>
                <span class="sr-only">(current)</span>
            </li>
            <?php
                include "./component/auth.php"
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
<div class="container">
    <div class="card mt-3 mb-3 p-5">
        <div class="card-body">
            <div class="row">
                <?php
                include "../app/includes/component/message.php"
                ?>
            </div>
            <p class="text-warning text-right display-4">About Us!</p>
            <div class="row">
                <div class="col-md-5 col-sm-5 col-lg-5">
                    <div class="row">
                        <img class="img-fluid" src="/assets/images/banner/banner.jpg" alt="no image found!">
                    </div>
                    <div class="row">
                        <p class="display-1 font-weight-bold text-warning">Driver's Hub</p>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-lg-7">
                    <div class="container bg-warning text-light p-5">
                        <p class="text-justify">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                        <br>
                        <p class="text-justify">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                    </div>
                </div>
            </div>
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
                url : "ajax_search.php",
                type: "get",
                chache :false,
                data:{query:query},
                success:function(response){
                    $(".result").html(response);
                }
            });
        }

        // live search data from table without reload/refresh page
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