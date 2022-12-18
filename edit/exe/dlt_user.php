<?php 

session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_delete'])) {
    $delete_user = $_GET['id_delete'];
    $traning = mysqli_query($connect, "DELETE FROM `activity` WHERE id_yamas_user = '$delete_user'");
    $activity = mysqli_query($connect, "DELETE FROM `training` WHERE id_yamas_user = '$delete_user'");
    $user = mysqli_query($connect, "DELETE FROM `yamas_user` WHERE `yamas_user`.`id_yamas_user` = '$delete_user'");
    header('Location: ../../admin.php');
}