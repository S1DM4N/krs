<?php
require_once 'core.php';
if (!$_SESSION['id_yamas_user']) {
    header('Location: registration.php');
}
$Database = new Database();
if (isset($_POST['sport'])) {
    $parm = ['id_sport' => $_POST['sport'], 'id' => $_SESSION['id_user']];
    $Database->executeSQL('UPDATE user_yamas SET id_sport = :id_sport WHERE id_user = :id', $parm);
    header('Location: account.php');
}

if (isset($_POST['section'])) {
    $parm = ['id_section' => $_POST['section'], 'id' => $_SESSION['id_user']];
    $Database->executeSQL('UPDATE user_yamas SET id_section = :id_section WHERE id_user = :id', $parm);
    $parm = ['id' => $_SESSION['id_user']];
    $Database->executeSQL('UPDATE user_yamas SET id_sport = 5 WHERE id_user = :id', $parm);
    header('Location: account.php');
}

if (isset($_POST['coach'])) {
    $parm = ['id_coach' => $_POST['coach'], 'id' => $_SESSION['id_user']];
    $Database->executeSQL('UPDATE user_yamas SET id_coach = :id_coach WHERE id_user = :id', $parm);
    header('Location: account.php');
}

if (isset($_POST['trans_submit'])) {
    $parm = ['id_transaction_status' => 2, 'id' => $_SESSION['id_user']];
    $Database->executeSQL('UPDATE transaction SET id_transaction_status = :id_transaction_status WHERE id_user = :id', $parm);
    header('Location: account.php');
}