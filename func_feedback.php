<?php
require_once 'core.php';
$Database = new Database();
if (isset($_POST['feedback_submit'])) {
    $parm = ['content' => trim($_POST['content']), 'id' => $_SESSION['id_user']];
    $Database->insert('INSERT INTO feedback (review_text, id_user) VALUES (:content, :id)', $parm);
    header('Location: feedback.php');

}