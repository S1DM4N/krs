<?php
session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_edit'])) {
    $id_edit = $_GET['id_edit'];
}

if(isset($_POST['name'])) {
    $name = $_POST['name']; 
    if($name === '') {
        unset($name);
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

$name = trim($_POST['name']);
$date = trim($_POST['date']);
$vid = trim($_POST['vid']);


$sql = mysqli_query($connect, "UPDATE `competition` SET `name_competition` = '$name', `date_competition` = '$date', `id_kind_of_sport` = '$vid' WHERE `competition`.`id_competition` = '$id_edit' ");

header("location: ../../admin.php");