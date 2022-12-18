<?php
session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_edit'])) {
    $id_edit = $_GET['id_edit'];
}

if(isset($_POST['user'])) {
    $user = $_POST['user']; 
    if($user === '') {
        unset($user);
    }
}

if(isset($_POST['trainer'])) {
    $trainer = $_POST['trainer'];
    if($trainer === '') {
        unset($trainer);
    }
}

if(isset($_POST['date_start'])) {
    $date_start = $_POST['date_start'];
    if($date_start === '') {
        unset($date_start);
    }
}

if(isset($_POST['date_end'])) {
    $date_end = $_POST['date_end'];
    if($date_end === '') {
        unset($date_end);
    }
}

$user = trim($_POST['user']);
$trainer = trim($_POST['trainer']);
$date_start = trim($_POST['date_start']);
$date_end = trim($_POST['date_end']);


$sql = mysqli_query($connect, "UPDATE `training` SET `id_yamas_user` = '$user', `id_trainer` = '$trainer', `date_time_start` = '$date_start', `date_time_end` = '$date_end' WHERE `training`.`id_training` = '$id_edit' ");

header("location: ../../admin.php");