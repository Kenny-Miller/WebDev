<html>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
    <body class="login">
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
        <div class="login">
            <form class="login" method="POST" action="/users/dashboard.php">
                <div><input type="text" id="username" value="username"></div>
                <div><input type="password" id="password" value="password"></div>
                <div><input type="submit" value="Login"></div>
            </form>
        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>
    </body>
</html>
