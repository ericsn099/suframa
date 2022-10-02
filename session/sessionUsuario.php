<?php
session_start() or die;
if ((!isset($_SESSION['login'])) || $_SESSION['usuario'] == 1) {
    header('location: /');
    session_destroy();
    exit;
}
?>