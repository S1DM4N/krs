<?php

session_start();
require_once "../classes/connect.php";

if (isset($_GET['id_delete'])) {
    $delete = $_GET['id_delete'];
    $sql = mysqli_query($connect, "SELECT name_competition AS name FROM `competition` WHERE id_competition = '$delete'");
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
                <?php while($competition = mysqli_fetch_object($sql)): ?>
                <h1>Удалить соревнования <?= $competition->name?>?</h1>
                <?php endwhile; ?>
                <div class="a_dlt">
                    <a href="exe/dlt_com.php?id_delete=<?= $delete?>">
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