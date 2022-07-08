<?php
define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DDB_NAME','prasaddb');

$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DDB_NAME);
if($con==false)
{
    die("Error.". mysqli_connect_error());
}
?>