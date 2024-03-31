<?php
$mysqli = new mysqli('localhost', 'phpmyadmin_user', 'phpadmin', 'mysql');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connected successfully';
}
?>
