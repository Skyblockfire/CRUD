<?php
    session_start();
    unset($_SESSION['CPF']);
    unset($_SESSION['name']);
    unset($_SESSION['tipo']);

    echo'<script>location.href="../view/index.html"</script>';
    exit();
?>