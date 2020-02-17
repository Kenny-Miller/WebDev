<html>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
    <body class="login">
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
        <div class="login">
            <form class="login" method="POST" action="/users/dashboard.php">
                <div><h3>Login</h3></div>
                <div><input type="text" class="login" name="username" value="username"></div>
                <div><input type="password" class="login" name="password" value="password"></div>
                <div><input class="submitbtn" type="submit" value="Login"></div>
            </form>
        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>
    </body>
</html>
