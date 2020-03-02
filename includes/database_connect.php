<?php 
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','widget');

    $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if(mysqli_connect_error()){
        die('<h5>Database Connection Error</h5>'.' The Error : '.mysqli_connect_error().'<br> Error No : '.mysqli_connect_errno());
    }
?>