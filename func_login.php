<?php
// Подключение БД
require "core.php";
if ($_SESSION['id_yamas_user']) {
    header('Location: account.php');
}

// Проверка на наличие объекта
if(!isset($Database)){
    $Database = new Database();
}
if (isset($_POST['login_submit'])) {
    $errors = [];
    $parm = [
        'login' => trim($_POST['login']),
        'password' => trim($_POST['password']),
        'email' => trim($_POST['email'])
    ];

    // Проверка на существующий аккаунт по логину
    $qry = "SELECT * FROM yamas_user WHERE login_yamas_user = :login";
    $login = array("login" => $parm['login']);
    $check_login = $Database->getRow($qry, $login);


    // Проверка на существующий аккаунт по эл. почта
    $qry = "SELECT * FROM yamas_user WHERE email_yamas_user = :email";
    $email = array("email" => $parm['email']);
    $check_email = $Database->getRow($qry, $email);


    if (empty($check_login) && empty($_POST['email'])){
        $errors['login_error'] = "Аккаунт с данным логином не существует";
    }
    if (empty($check_email) && empty($_POST['login'])){
        $errors['login_error'] = "Аккаунт с данной эл. почтой не существует";
    }

    if (empty($check_login) && empty($check_email)) {
        $errors['login_error'] = "Аккаунт с данным логином или эл. почтой не существует";
    }


    //Проверка на совпадение эл. почты и логина
    if ($check_email != $check_login && empty($errors) && !empty($check_email) && !empty($check_login)) {
        $errors['login_error'] = 'Логин и эл. почта не сопадают';
    }

    //Шифрование пароля
    $parm['password'] = md5($parm['password'] . "fidbuaoiu53iu2iqfabi1u2iuasbf");

    //Проверка пароля
    if ($parm['password'] != $check_login['password_yamas_user'] && empty($errors)) {
        $errors['password_error'] = "Неправильный пароль";
    }

    if (empty($errors)) {
        // Запись данных в БД
        $_SESSION = [];
        $_SESSION['id_yamas_user'] = $check_login['id_yamas_user'];
        $_SESSION['name_yamas_user'] = $check_login['name_yamas_user'];
        $_SESSION['surname_yamas_user'] = $check_login['surname_yamas_user'];
        $_SESSION['patronymic_yamas_user'] = $check_login['patronymic_yamas_user'];
        $_SESSION['login_yamas_user'] = $check_login['login_yamas_user'];
        $_SESSION['id_section'] = $check_login['id_section'];
        $_SESSION['email_yamas_user'] = $check_login['email_yamas_user'];
        header('Location: account.php');
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}
