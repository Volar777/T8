<?php
require "lib.php"; //Библиотека функций
require "in.php"; //Авторизация
require "cont.php"; //Cоздание сонтакта
require "sdel.php"; //Cоздание сделки
require "comp.php"; //Cоздание компании
require "Muliy.php"; // Добавляет кастомное поле типа мультисписок
require "Refresh500.php"; //Cписок сделок по $i*500 со смещением 500 (для sdelRevVarr.php)
require "sdelRevVarr.php"; //Установка значения у мультисписок

ini_set('max_execution_time', 1500); //Изменение времени работы php файла

echo Authorization(); //Авторизация

$count_cont = 1000; //Число записей (Компаний, сделок, контактов)
$n = floor($count_cont / 200); //Разбиение общего числа на партии по 200

for ($i = 0; $i < $n; $i++) { //колличество полных циклов по 200
    comp(); //Создание компаний
    sdel(); //Создание сделки
    cont(); //Создание контакта
}

$n1 = $count_cont%200; // Остаток от деления на 200
if($n1) {
    comp($n1); //Создание компаний
    sdel($n1); //Создание сделки
    cont($n1); //Создание контакта
}

$id_fields = mull(); // Добавляет кастомное поле типа мультисписок ($id_fields id добавленного поля)

$n2 = ceil($count_cont/500);
$arr = [];
for ($i = 0; $i < $n2; $i++) {
    $arr[$i] = ref500($i);
}

for($i = 0; $i < $n2; $i++) {
    echo sdelRevArr($arr,$i,$id_fields); // обновление записи мульти Массива
}
echo "Все сделано!!!";