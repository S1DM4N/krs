<?php
session_start();
require_once 'classes/connect.php';
$_SESSION['trainer'] = $_POST['trainer'];
$user = $_SESSION['id_yamas_user'];
$trainer = $_POST['trainer'];
$training = mysqli_query($connect,"SELECT * FROM `training` WHERE id_yamas_user = '$user'");

print_r($training);

if (!$_SESSION['id_yamas_user']) {
    header('Location: registration.php');
}

print_r($_POST['trainer']);

if (isset($_POST['vid'])) {
    $_SESSION['vid'] = $_POST['vid'];
}

    if (isset($_POST['trainer']) && $trainer > 0 && $training->num_rows != 1) {
        $sql = mysqli_query($connect, "INSERT INTO `training` (`id_training`, `id_yamas_user`, `id_trainer`, `date_time_start`, `date_time_end`) VALUES (NULL, '$user', '$trainer', NULL, NULL) ");
    }
    elseif(isset($_POST['trainer']) && $trainer > 0) {
        while($tr = mysqli_fetch_object($training)){
            $sql = mysqli_query($connect, "UPDATE `training` SET `id_trainer` = '$trainer' WHERE `training`.`id_training` = '$tr->id_training';");
        }
    }
    elseif(isset($_POST['trainer']) && $trainer == -1) {
        while($tr = mysqli_fetch_object($training)){
            $sql = mysqli_query($connect, "DELETE FROM `training` WHERE `training`.`id_training` = '$tr->id_training'");
        }
    }

// header('Location: account.php');
