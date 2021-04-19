<?php
if(!empty($_GET['query'])){
    define('DB_SERVER', '127.0.0.1');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'drivers_hub');
    define('DB_PORT', '8000');

    //connection
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $cars = [];
    $output = "";
    try{
        $result = mysqli_query($conn, "SELECT * FROM cars where brand like '%".$_GET['query']."%' order by updated_at DESC");
        if (mysqli_num_rows($result) > 0) {
            $output = "<div class='list-group'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $car['name'] = $row['brand'];
                $car['id'] = $row['id'];
                $output .= '<a href="show.php?id='.$car['id'].'" class="list-group-item list-group-item-action">'.$car['name'].'</a>';
            }
            $output .= "</div>";

        }else{
            $output = '<h5>No result found!</h5>';
        }
        echo $output;
    }catch (\Exception $e){
        echo $e->getMessage();
    }
}