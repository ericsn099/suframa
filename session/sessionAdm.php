<?php
if (!isset($_SESSION))
    session_start() or die();
    if ((!isset($_SESSION['login'])) || $_SESSION['usuario'] == 2) {
        header('location: /');
        session_destroy();
        exit;
    }
