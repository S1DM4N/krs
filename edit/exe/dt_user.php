<?php
session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_edit'])) {
    $id_edit = $_GET['id_edit'];
    $sql = mysqli_query($connect, "SELECT * FROM `yamas_user` WHERE id_yamas_user = '$id_user'");
}

if(isset($_POST['login'])) {
    $login = $_POST['login'];
    if($login === '') {
        unset($login);
    }
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

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    if($email === '') {
        unset($email);
    }
}

if(isset($_POST['password'])) {
    $password = $_POST['password'];
    while ($user = mysqli_fetch_object($sql)){
        if($password === '') {
            unset($password);
        }
        elseif($password == $user->password_yamas_user){
            $password = md5($_POST['password']);
        }
    }
}

$login = trim($_POST['login']);
$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$middle_name = trim($_POST['middle_name']);
$email = trim($_POST['email']);


$sql = mysqli_query($connect, "UPDATE `yamas_user` SET `surname_yamas_user` = '$surname', `name_yamas_user` = '$name', `patronymic_yamas_user` = '$middle_name', `login_yamas_user` = '$login', `email_yamas_user` = '$email', `password_yamas_user` = '$password' WHERE `yamas_user`.`id_yamas_user` = '$id_edit' ");
header("location: ../../admin.php");