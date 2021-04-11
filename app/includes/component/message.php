<div>
    <?php
    if(count($_GET) > 0){
        if(isset($_GET['success'])){
            echo '<span class="text-success">'.$_GET['success'].'</span>';
        }
        if(isset($_GET['error'])){
            echo '<span class="text-danger">'.$_GET['error'].'</span>';
        }
    }
    ?>
</div>
