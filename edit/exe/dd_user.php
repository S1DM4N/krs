<?php 

require_once '../../classes/connect.php';

if(isset($_POST['surname']) & isset($_POST['name']) & isset($_POST['middle_name']) & isset($_POST['login']) & isset($_POST['email']) & isset($_POST['password'])){
$surname = $_POST['surname'];
$name = $_POST['name'];
$middle_name = $_POST['middle_name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);



$sql = mysqli_query($connect, "INSERT INTO `yamas_user` (`id_yamas_user`, `surname_yamas_user`, `name_yamas_user`, `patronymic_yamas_user`, `login_yamas_user`, `email_yamas_user`, `password_yamas_user`) VALUES (NULL, '$surname', '$name', '$middle_name', '$login', '$email', '$password')");
header('Location: ../../admin.php');
}