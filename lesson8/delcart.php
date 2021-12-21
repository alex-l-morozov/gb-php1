<?php
include_once (__DIR__ . "/connect.php");

if(intval($_GET['product_id']) > 0) {
    $sql = "DELETE FROM cart WHERE product_id=". intval($_GET['product_id']) . " AND session_id='" . session_id() . "'";
    mysqli_query($connect, $sql);
} else {
    header("Location: ./index.php");
}