<?php
$host = "localhost";
$user = "admin";
$pwd = "admin";
$db_name = "blog_native";

try {
    $con = new PDO("mysql:host=$host;dbname=$db_name", $user, $pwd);
} catch (PDOException $e) {
    echo $e->getMessage();
}
