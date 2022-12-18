<?php 

require_once '../../classes/connect.php';

if(isset($_POST['name']) & isset($_POST['vid']) & isset($_POST['date'])){
$name = $_POST['name'];
$vid = $_POST['vid'];
$date = $_POST['date'];



$sql = mysqli_query($connect, "INSERT INTO `competition` (`id_competition`, `name_competition`, `date_competition`, `id_kind_of_sport`) VALUES (NULL, '$name', '$date', '$vid')");
header('Location: ../../admin.php');
};