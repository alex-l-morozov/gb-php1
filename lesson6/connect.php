<?php
require_once(__DIR__ . '/config.inc.php');

$connect = mysqli_connect(MYSQL_HOST,
                             MYSQL_USER,
                             MYSQL_PASSWORD,
                             MYSQL_DB
);

if (!$connect) {
    echo "Ошибка: Невозможно установить соединение с MySQL<br>";
    echo "<br>Код ошибки errno: " . mysqli_connect_errno();
    echo "<br>Текст ошибки error: " . mysqli_connect_error();
    exit;
}