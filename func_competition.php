<?php

session_start();
require_once "classes/connect.php";

if($_POST['date_start'] > 0){
    $_SESSION['date_start'] = $_POST['date_start'];
    $a=1;
}
else {
    $a='';
    unset($_SESSION['date_start']);
}
if($_POST['date_end'] > 0){
    $_SESSION['date_end'] = $_POST['date_end'];
    $b=2;
}
else {
    $b='';
    unset($_SESSION['date_end']);
}
if($_POST['vid'] > 0){
    $_SESSION['vid'] = $_POST['vid'];
    $c=3;
}
else {
    $c='';
    unset($_SESSION['vid']);
}

$_SESSION['abc'] = $a.$b.$c;

header('Location: competition.php');