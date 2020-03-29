<?php
    session_start();
    session_destory();
    header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
    exit;
?>