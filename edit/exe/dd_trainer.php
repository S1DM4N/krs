<?php 

require_once '../../classes/connect.php';

if(isset($_POST['surname']) & isset($_POST['name']) & isset($_POST['middle_name']) & isset($_POST['rank']) & isset($_POST['vid']) & isset($_POST['date'])){
$surname = $_POST['surname'];
$name = $_POST['name'];
$middle_name = $_POST['middle_name'];
$rank = $_POST['rank'];
$vid = $_POST['vid'];
$date = $_POST['date'];



$sql = mysqli_query($connect, "INSERT INTO `trainer` (`id_trainer`, `surname_trainer`, `name_trainer`, `patronymic_trainer`, `date_of_employment_trainier`, `id_rank`, `id_kind_of_sport`) VALUES (NULL, '$surname', '$name', '$middle_name', '$date', '$rank', '$vid')");
header('Location: ../../admin.php');
};