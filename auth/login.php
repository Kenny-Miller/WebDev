<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
    <form method="POST" action="/users/dashboard.php">
        <div><input type="text" id="username" value="username"></div>
        <div><input type="password" id="password" value="password"></div>
        <div><input type="submit" value="Login"></div>
    </form>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>