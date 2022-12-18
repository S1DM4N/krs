<?php 

session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_delete'])) {
    $delete = $_GET['id_delete'];
    $trainer = mysqli_query($connect, "DELETE FROM `trainer` WHERE id_trainer = '$delete'");
    $training = mysqli_query($connect, "DELETE FROM `training` WHERE id_trainer = '$delete'");
    header('Location: ../../admin.php');
}