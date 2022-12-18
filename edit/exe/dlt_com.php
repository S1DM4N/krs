<?php 

session_start();
require_once "../../classes/connect.php";

if (isset($_GET['id_delete'])) {
    $delete = $_GET['id_delete'];
    $activity = mysqli_query($connect, "DELETE FROM `activity` WHERE id_competition = '$delete'");
    $competition = mysqli_query($connect, "DELETE FROM `competition` WHERE id_competition = '$delete'");
    header('Location: ../../admin.php');
}