<?php
/**
 * Created by IntelliJ IDEA.
 * User: ryotakei
 * Date: 10/16/17
 * Time: 12:53 PM
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BunnyBots_Scouting";

$conn = mysqli_connect('localhost', 'root', '1234', 'BunnyBots_Scouting');

if ($conn) {
    echo "connection success<br>";
} else {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}