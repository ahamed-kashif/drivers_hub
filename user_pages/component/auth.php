<?php
// $fb = new Facebook\Facebook([
//     'app_id' => '1373208343040789',
//     'app_secret' => '72c287bbeecbb55c3e6a37f11dac68b3',
//     'default_graph_version' => 'v2.10',
//       ]);
    
//     $helper = $fb->getRedirectLoginHelper();
    
//     try {
//       $accessToken = $helper->getAccessToken();
//     } catch(Facebook\Exception\ResponseException $e) {
//       // When Graph returns an error
//       echo 'Graph returned an error: ' . $e->getMessage();
//       exit;
//     } catch(Facebook\Exception\SDKException $e) {
//       // When validation fails or other local issues
//       echo 'Facebook SDK returned an error: ' . $e->getMessage();
//       exit;
//     }
    
//     if (! isset($accessToken)) {
//       if ($helper->getError()) {
//         header('HTTP/1.0 401 Unauthorized');
//         echo "Error: " . $helper->getError() . "\n";
//         echo "Error Code: " . $helper->getErrorCode() . "\n";
//         echo "Error Reason: " . $helper->getErrorReason() . "\n";
//         echo "Error Description: " . $helper->getErrorDescription() . "\n";
//       } else {
//         header('HTTP/1.0 400 Bad Request');
//         echo 'Bad request';
//       }
//       exit;
//     }
//     try {
//         // Returns a `Facebook\Response` object
//         $response = $fb->get('/me?fields=id,name', $accessToken);
//       } catch(Facebook\Exception\ResponseException $e) {
//         echo 'Graph returned an error: ' . $e->getMessage();
//         exit;
//       } catch(Facebook\Exception\SDKException $e) {
//         echo 'Facebook SDK returned an error: ' . $e->getMessage();
//         exit;
//       }
      
//       $user = $response->getGraphUser();
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
if(!isset($_SESSION['name'])){
    if(isset($_COOKIE['rememberme'])){
        $result = mysqli_query($conn,"SELECT * FROM users WHERE id=" . $_COOKIE["rememberme"] . "  LIMIT 1");
        if(!$result){
            printf("Error: %s\n", mysqli_error($conn));
        }else {
            $row = mysqli_fetch_array($result);
            if (is_array($row)) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['name'];
            }
        }
    }
}
if (isset($_SESSION['name']) && (isset($_SESSION['id']) || isset($_SESSION['fb_access_token']) || isset($_COOKIE['rememberme']))){
    echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">User</a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/user_pages/profile.php">Profile</a>
                <a class="dropdown-item" href="/user_pages/applications.php">Applications</a>
                <form action="../../app/includes/user/auth/logout.inc.php" method="post">
                <input type="hidden" name="logout" value="1">
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </li>';
}else{
    echo '<li class="nav-item mr-2">
            <a class="nav-link" href="/user_pages/auth/login.php">Login</a>
        </li>';
}
?>


