<?php
session_start();
header('location:product.php');
// creating the array
$products = array(
    array(
        "id" => 101,
        "name" => "football",
        "img" => "images/football.png",
        "price" => 150
    ),
    array(
        "id" => 102,
        "name" => "tennis",
        "img" => "images/tennis.png",
        "price" => 120
    ),
    array(
        "id" => 103,
        "name" => "basketball",
        "img" => "images/basketball.png",
        "price" => 90
    ),
    array(
        "id" => 104,
        "name" => "table-tennis",
        "img" => "images/table-tennis.png",
        "price" => 110
    ),
    array(
        "id" => 105,
        "name" => "soccer",
        "img" => "images/soccer.png",
        "price" => 80
    ),
);
?>