<?php
session_start();
if(!isset($_SESSION['name'])){
    if(!isset($_COOKIE['rememberme'])){
        header("Location:../user_pages/auth/login.php?error=Login%20First");
    }
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
                <a class="nav-link" href="about-us.php">About us!</a>
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
<div class="result">

</div>
<?php
    include "../app/includes/component/message.php"
?>
<!--/.Navbar-->
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="image"> <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155"> </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0"><?php echo $_SESSION['name'] ?></span>
                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column"> <span class="followers">Applications</span> <span class="number2">980</span> </div>
                    <div class="d-flex flex-column"> <span class="rating">Experience</span> <span class="number3">8.9</span> </div>
                    <div class="d-flex flex-column"> <span class="rating">Rating</span> <span class="number3">8.9</span> </div>
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
        loadData();
        function loadData(query){
            $.ajax({
                url : "ajax_search.php",
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