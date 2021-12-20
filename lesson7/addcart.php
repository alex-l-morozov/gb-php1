<?php
include_once (__DIR__ . "/connect.php");

if(intval($_GET['product_id']) > 0) {
    $sql = "SELECT id FROM cart WHERE product_id=". intval($_GET['product_id']) . " AND session_id='" . session_id() . "'";
    $rsData = mysqli_query($connect, $sql);
    if ($arData = mysqli_fetch_assoc($rsData)){
        mysqli_query($connect, "UPDATE cart SET count=count+1 WHERE id='". $arData['id'] . "'");
    } else {
        mysqli_query($connect, "INSERT INTO `cart` (`product_id`, `session_id`, `count`) VALUES ('" . intval($_GET['product_id']) . "', '" . session_id()  . "', 1)");
    }
} else {
    header("Location: ./index.php");
}