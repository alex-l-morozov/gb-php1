<?php
/*
 * 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
 * если $a и $b положительные, вывести их разность;
 * если $а и $b отрицательные, вывести их произведение;
 * если $а и $b разных знаков, вывести их сумму;
 * Ноль можно считать положительным числом.
 */
$a = -5;
$b = -2;

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} elseif (($a >= 0 && $b < 0) || ($a < 0 && $b >= 0)) {
    echo $a + $b;
}

/*
 * Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.
 *
 * переменную $a заменил на $c
 */
$c = 5;

switch ($c) {
    case 0:
        echo $c++ . "<br>";
    case 1: echo $c++ . "<br>";
    case 2: echo $c++ . "<br>";
    case 3: echo $c++ . "<br>";
    case 4: echo $c++ . "<br>";
    case 5: echo $c++ . "<br>";
    case 6: echo $c++ . "<br>";
    case 7: echo $c++ . "<br>";
    case 8: echo $c++ . "<br>";
    case 9: echo $c++ . "<br>";
    case 10: echo $c++ . "<br>";
    case 11: echo $c++ . "<br>";
    case 12: echo $c++ . "<br>";
    case 13: echo $c++ . "<br>";
    case 14: echo $c++ . "<br>";
    case 15: echo $c++ . "<br>";
}

/*
 * 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.
 */
function opertionSum($arg1 = 0 , $arg2 = 0) {
    return $arg1 + $arg2;
}
function opertionSubtract($arg1 = 0 , $arg2 = 0)  {
    return $arg1 - $arg2;
}
function opertionIncrease($arg1 = 0 , $arg2 = 0)  {
    return $arg1 * $arg2;
}
function opertionDivision($arg1 = 0 , $arg2 = 0)  {
    return $arg1 / $arg2;
}
/*
 * Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
 */
function mathOperation($arg1 = 0, $arg2 = 0, $operation = "сложение") {
    switch ($operation) {
        case "сложение":
            $result = opertionSum($arg1, $arg2);
            break;
        case "вычитание":
            $result = opertionSubtract($arg1, $arg2);
            break;
        case "умножение":
            $result = opertionIncrease($arg1, $arg2);
            break;
        case "деление":
            $result = opertionDivision($arg1, $arg2);
            break;
        default:
            $result = "error";
    }
    return $result;
}
/*
 * 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
 */
function power($val, $pow) {
    return $pow ? $val * power($val, $pow - 1) : 1;
}