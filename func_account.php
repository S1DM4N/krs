<?php
// require_once 'classes/connect.php';
require_once 'core.php';
if (!$_SESSION['id_yamas_user']) {
    header('Location: registration.php');
}

if (isset($_POST['vid'])) {
    $_SESSION['vid'] = $_POST['vid'];
    print_r($_SESSION['vid'] );
    print_r($_POST['vid'] );
}
if (isset($_POST['trainer'])) {
    $_SESSION['trainer'] = $_POST['trainer'];
    print_r($_SESSION['trainer'] );
    print_r($_POST['trainer'] );
}

header('Location: account.php');
// $Database = new Database();
// if (isset($_POST['vid'])) {
    
//     // 'UPDATE user_yamas SET id_sport = :id_sport WHERE id_user = :id'
//     header('Location: account.php');
// }

// if (isset($_POST['coach'])) {
//     $parm = ['id_coach' => $_POST['coach'], 'id' => $_SESSION['id_user']];
//     $Database->executeSQL('UPDATE user_yamas SET id_coach = :id_coach WHERE id_user = :id', $parm);
//     header('Location: account.php');
// }