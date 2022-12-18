<?php
session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_edit'])) {
    $id_edit = $_GET['id_edit'];
}

if(isset($_POST['surname'])) { 
    $surname = $_POST['surname']; 
    if($surname === '') {
        unset($surname);
    }
}

if(isset($_POST['name'])) {
    $name = $_POST['name']; 
    if($name === '') {
        unset($name);
    }
}


if(isset($_POST['middle_name'])) {
    $middle_name = $_POST['middle_name'];
    if($middle_name === '') {
        unset($middle_name);
    }
}

if(isset($_POST['rank'])) {
    $rank = $_POST['rank'];
    if($rank === '') {
        unset($rank);
    }
}

if(isset($_POST['date'])) {
    $date = $_POST['date'];
    if($date === '') {
        unset($date);
    }
}

if(isset($_POST['vid'])) {
    $vid = $_POST['vid'];
    if($vid === '') {
        unset($vid);
    }
}



$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$middle_name = trim($_POST['middle_name']);
$rank = trim($_POST['rank']);
$date = trim($_POST['date']);
$vid = trim($_POST['vid']);


$sql = mysqli_query($connect, "UPDATE `trainer` SET `surname_trainer` = '$surname', `name_trainer` = '$name', `patronymic_trainer` = '$middle_name', `date_of_employment_trainier` = '$date', `id_rank` = '$rank', `id_kind_of_sport` = '$vid' WHERE `trainer`.`id_trainer` = '$id_edit' ");

header("location: ../../admin.php");