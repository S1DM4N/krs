<?php

session_start();
require_once "../classes/connect.php";

if (isset($_GET['id_delete'])) {
    $delete_user = $_GET['id_delete'];
    $user = mysqli_query($connect, "SELECT CONCAT(surname_yamas_user, ' ', name_yamas_user) AS user FROM `yamas_user` WHERE id_yamas_user = '$delete_user'");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Удаление</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/jquery-3.4.1.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <main class="reg">
            <div class="delete_form">
                <?php while($users = mysqli_fetch_object($user)): ?>
                <h1>Удалить пользователя <?= $users->user?>?</h1>
                <?php endwhile; ?>
                <div class="a_dlt">
                    <a href="exe/dlt_user.php?id_delete=<?= $delete_user?>">
                        Да
                    </a>
                    <a href="../admin.php">
                        Нет
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>