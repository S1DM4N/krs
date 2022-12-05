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
if (isset($_POST['reg_submit'])) {
    $errors = [];
    $parm = [
        'login' => trim($_POST['login']),
        'surname' => trim($_POST['surname']),
        'name' => trim($_POST['name']),
        'middle_name' => trim($_POST['middle_name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
    ];

    // Проверка на существующий аккаунт по логину
    $qry = "SELECT * FROM yamas_user WHERE login_yamas_user = :login";
    $login= array("login" => $parm['login']);
    $check_login = $Database->getRow($qry, $login);
    if (!empty($check_login) > 0){
        $errors['login_error'] = "Аккаунт с данным логином существует";
    }

    // Проверка на существующий аккаунт по эл. почте
    $qry = "SELECT * FROM yamas_user WHERE email_yamas_user = :email";
    $email = array("email" => $parm['email']);
    $check_login = $Database->getRow($qry, $email);
    if (!empty($check_login) > 0){
        $errors['email_error'] = "Аккаунт с данной эл. почтой уже зарегестрирован";
    }
    $letter = "/([a-zA-Z])/";
    $digit = "/(?=.*\d)/";

    //Проверка пароля
    if ($parm['password'] < 8) {
        $errors['password_error'] = 'Пароль должен содержать минимум 8 символов';
    }
    if (!preg_match($letter, $parm['password'])) {
        $errors['password_error'] = 'Пароль должен содержать минимум 1 букву латинского алфавита';
    }
    if (!preg_match($digit, $parm['password'])) {
        $errors['password_error'] = 'Пароль должен содержать минимум 1 цифру';
    }


    // Шифрование пароля
    $parm['password'] = md5($parm['password'] . "fidbuaoiu53iu2iqfabi1u2iuasbf");
    if (empty($errors)) {
        // Запись данных в БД

        $qry = "INSERT INTO yamas_user (login_yamas_user, surname_yamas_user, name_yamas_user, patronymic_yamas_user, email_yamas_user, password_yamas_user) VALUES (:login, :surname, :name, :middle_name, :email, :password)";
        $Database->insert($qry, $parm);
        header('Location: account.php');

        $qry = "SELECT * FROM yamas_user WHERE email_yamas_user = :email";
        $parm = array("email" => $parm['email']);
        $check_login = $Database->getRow($qry, $parm);

        if (!empty($check_login)) {
            $_SESSION = [];
            $_SESSION['id_yamas_user'] = $check_login['id_yamas_user'];
            $_SESSION['name_yamas_user'] = $check_login['name_yamas_user'];
            $_SESSION['surname_yamas_user'] = $check_login['surname_yamas_user'];
            $_SESSION['patronymic_yamas_user'] = $check_login['patronymic_yamas_user'];
            $_SESSION['login_yamas_user'] = $check_login['login_yamas_user'];
            $_SESSION['id_section'] = $check_login['id_section'];
            $_SESSION['email_yamas_user'] = $check_login['email_yamas_user'];
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('Location: registration.php');
    }
} else {
    header('Location: registration.php');
}
