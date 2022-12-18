<?php
session_start();
require_once 'classes/connect.php';



$user = $_SESSION['id_yamas_user'];


$training = mysqli_query($connect,"SELECT * FROM `training` WHERE id_yamas_user = '$user'");
print_r($training);

if (!$_SESSION['id_yamas_user']) {
    header('Location: registration.php');
}

if (isset($_POST['vid'])) {
    $_SESSION['vid'] = $_POST['vid'];
    $vid = $_SESSION['vid'];
}
if (isset($_POST['vid2'])) {
    $_SESSION['vid2'] = $_POST['vid2'];
    $vid2 = $_SESSION['vid2'];
}
if (isset($_POST['trainer'])) {
    $_SESSION['trainer'] = $_POST['trainer'];
    $trainer = $_SESSION['trainer'];
}

if (isset($_POST['trainer2'])) {
    $_SESSION['trainer2'] = $_POST['trainer2'];
    $trainer2 = $_SESSION['trainer2'];
}
$vid ='';
if (isset($_SESSION['vid'])) {
    $vid = $_SESSION['vid'];
}
$vid2 ='';
if (isset($_SESSION['vid2'])) {
    $vid2 = $_SESSION['vid2'];
}
$trainer ='';
if (isset($_SESSION['trainer'])) {
    $trainer = $_SESSION['trainer'];;
}
$trainer2 ='';
if (isset($_SESSION['trainer2'])) {
    $trainer2 = $_SESSION['trainer2'];;
}


    if (isset($_POST['trainer']) && $trainer > 0 && $vid > 0 && $training->num_rows != 1) {
        $sql = mysqli_query($connect, "INSERT INTO `training` (`id_training`, `id_yamas_user`, `id_trainer`, `date_time_start`, `date_time_end`) VALUES (NULL, '$user', '$trainer', NULL, NULL) ");
        while($tr = mysqli_fetch_object($training)){
            $id_tr = $tr->id_training;
            $_SESSION['id_tr'] = $tr->id_training;
            $id_tr = $_SESSION['id_tr'];
        }
    }
    elseif(isset($id_tr) && $trainer > 0 && $vid > 0 && $training->num_rows == 1) {
        $trainer = $_SESSION['trainer'];
        $id_tr = $_SESSION['id_tr'];
        $sql = mysqli_query($connect, "UPDATE `training` SET `id_trainer` = '$trainer' WHERE `training`.`id_training` = '$id_tr';");
    }
    elseif(isset($id_tr, $vid) && $trainer == -1 || $vid == -1 && $training->num_rows == 1) {
        $id_tr = $_SESSION['id_tr'];
        $sql = mysqli_query($connect, "DELETE FROM `training` WHERE `training`.`id_training` = '$id_tr'");
    }

    
    if (isset($_POST['trainer2']) && $trainer2 > 0 && $vid2 > 0 && $training->num_rows != 2) {
        $sql = mysqli_query($connect, "INSERT INTO `training` (`id_training`, `id_yamas_user`, `id_trainer`, `date_time_start`, `date_time_end`) VALUES (NULL, '$user', '$trainer2', NULL, NULL) ");
        $vid2 = $_SESSION['vid2'];
        $trainer2 = $_SESSION['trainer2'];
        while($tr = mysqli_fetch_object($training)){
            $_SESSION['id_tr2'] = $tr->id_training;
            $id_tr2 = $_SESSION['id_tr2'];
        }
    }
    elseif(isset($_POST['trainer2']) && $trainer2 > 0 && $vid2 > 0 && $training->num_rows == 2) {
        if(isset($_POST['trainer2'])){
            $trainer2 = $_POST['trainer2'];
            $id_tr2 = $_SESSION['id_tr2'];
                $sql = mysqli_query($connect, "UPDATE `training` SET `id_trainer` = '$trainer2' WHERE `training`.`id_training` = '$id_tr2';");
        }
    }
    elseif(isset($id_tr2, $vid2) && $trainer2 == -1 || $vid2 == -1 && $training->num_rows == 2) {
        $id_tr2 = $_SESSION['id_tr2'];
        print_r($id_tr2);
        $sql = mysqli_query($connect, "DELETE FROM `training` WHERE `training`.`id_training` = '$id_tr2'");
    }
// header('Location: account2.php');
