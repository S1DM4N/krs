<?php 

require_once '../../classes/connect.php';

if(isset($_POST['user']) & isset($_POST['trainer']) & isset($_POST['date_start']) & isset($_POST['date_end'])){
$user = $_POST['user'];
$trainer = $_POST['trainer'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];


$sql = mysqli_query($connect, "INSERT INTO `training` (`id_training`, `id_yamas_user`, `id_trainer`, `date_time_start`, `date_time_end`) VALUES (NULL, '$user', '$trainer', '$date_start', '$date_end')");
header('Location: ../../admin.php');
};