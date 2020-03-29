<?php
    session_start();
    session_destroy();
    header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
    exit;
?>