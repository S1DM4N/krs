<?php

session_start();
require_once "classes/connect.php";

if($_POST['st'] > 0){
    $_SESSION['st'] = $_POST['st'];
    $a=1;
}
else {
    $a='';
    unset($_SESSION['st']);
}
if($_POST['rank'] > 0){
    $_SESSION['rank'] = $_POST['rank'];
    $b=2;
}
else {
    $b='';
    unset($_SESSION['rank']);
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

header('Location: trainers.php');