<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
    <form method="post" action="/users/dashboard.php">
        <input type="text" value="username">
        <input type="password" value="password">
        <input type="submit" value="Login">
    </form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>