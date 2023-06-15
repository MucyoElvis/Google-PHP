<?php
$dbname='google';
$dbserver='localhost';
$dbuser='root';
$dbpassword='';
$db_connection=mysqli_connect($dbserver , $dbuser , $dbpassword, $dbname);
if(!$db_connection){
 die('COULD NOT CONNECT TO DB');
}

?>