<?php

/*1.	Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
Затем написать скрипт, который работает по следующему принципу:
a.	Если $a и $b положительные, вывести их разность.
b.	Если $а и $b отрицательные, вывести их произведение.
c.	Если $а и $b разных знаков, вывести их сумму.
Ноль можно считать положительным числом.*/

$a = rand(1, 10);
$b = rand(1, 10);
if($a >= 0 && $b >= 0) {
    echo $a - $b;
} elseif ($a < 0 && $b < 0) {
    echo $a * $b;
} elseif ($a < 0 && $b >= 0 || $a >= 0 && $b < 0) {
    echo $a + $b;
}

/*
2.	Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
switch организовать вывод чисел от $a до 15.*/

echo '<br>';
$a = rand(0, 15);
switch ($a) {
    case 0:
        echo 0;
        break;
    
    case 1:
        echo 1;
        break;

    case 2:
        echo 1;
        break;
    
    case 3:
        echo 3;
        break;

    case 3:
        echo 3;
        break;

    case 4:
        echo 4;
        break;
    
    case 5:
        echo 5;
        break;
        
    case 6:
        echo 6;
        break;

    case 7:
        echo 7;
        break;

    case 8:
        echo 8;
        break;

    case 9:
        echo 9;
        break;
    
    case 10:
        echo 10;
        break;

    case 11:
        echo 11;
        break;

    case 12:
        echo 12;
        break;

    case 13:
        echo 13;
        break;

    case 14:
        echo 14;
        break;

    case 15:
        echo 15;
        break;
    }

// 3.Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.

function add($x, $y) {
    echo '<br>';
    echo "add: $x + $y = " . ($x + $y);
    return $x + $y;
}

function substract($x, $y) {
    echo '<br>';
    echo "substract: $x - $y = " . ($x - $y);
    return $x - $y;
}

function multiply($x, $y) {
    echo '<br>';
    echo "multiply: $x * $y = " . ($x * $y);
    return $x * $y;
}

function divide($x, $y) {
    echo '<br>';
    echo "divide: $x / $y = " . ($x / $y);
    return $x / $y;
}

add(6, 2);
substract(6, 2);
multiply(6, 2);
divide(6, 2);

/*4.	Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 –
значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить
одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).*/

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case 'add':
            echo '<br>';
            echo "multiply: $arg1 + $arg2 = " . ($arg1 + $arg2);
            return $arg1 + $arg2;
        
        case 'substract':
            echo '<br>';
            echo "substract: $arg - $arg2 = " . ($arg1 - $arg2);
            return $arg1 - $arg2;
        
        case 'multiply':
            echo '<br>';
            echo "multiply: $arg1 * $arg2 = " . ($arg1 * $arg2);
            return $arg1 * $arg2;

        case 'divide':    
            echo '<br>';
            echo "divide: $arg1 / $arg2 = " . ($arg1 / $arg2);
            return $arg1 / $arg2;
            
        default:
            echo '<br>';
            echo "wrong operator, use: add, substract, multiply or divide";
            return 0;
    }
}

mathOperation(6, 2, "plus");

/*5.	Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи
встроенных функций PHP.*/

echo '<br>';
echo "Текущий год: " .date("Y").".";

/*6.	*С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val –
заданное число, $pow – степень. */

function power($val, $pow) {
    if ($pow ==== 0) {
        $result = 1;
    } else {
        $result = $val * power($val, $pow - 1);
    }
    return $result;
}

$result = power(3, 5);
echo '<br>';
echo $result;

/*7.*Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут, 21 час 43 минуты.*/

$h = date("H");
$m = date("i");

switch ($h) {
    case ($h === 0 || $h >= 5 && $h <= 20):
        $hours = 'часов';
        break;
    
    case ($h === 1 || $h === 21):
        $hours = 'час';
        break;
    
    case ($h >= 2 && $h <= 4 || $h === 22 || $h === 23):
        $hours = 'часа';
        break;
}

switch ($m) {
    case ($m === 0 || $m >= 5 && $m <= 20 || $m >= 25 && $m <= 30 || $m >= 35 && $m <= 40 || $m >= 45 && $m <= 50 || $m >= 55):
        $minutes = 'минут';
        break;
    
    case ($m === 1 || $m === 21 || $m === 31 || $m === 41 || $m === 51):
        $minutes = 'минута';
        break;
    
    case ($m >= 3 && $m <= 4 || $m >= 22 && $m <= 24 || $m >= 32 && $m <= 34 || $m >= 42 && $m <= 44 || $m >= 52 && $m <= 54):
        $minutes = 'минуты';
        break;
}

echo '<br>';
echo "Текущее время: " . date("H ") . $hours . date(" i ") . $minutes . '.';

?>