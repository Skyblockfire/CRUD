<?php
    session_start();
    unset($_SESSION['teste']);
    unset($_SESSION['']);

    header("index.php");
    exit();
?>