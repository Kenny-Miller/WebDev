<html>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
    <body class="login">
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
        <div class="login">
            <form class="login" method="POST" action="/users/dashboard.php">
                <div class="form-heading"><h3 class="formTitle">Login</h3></div>
                <div class="loginRow"><input class="form-input" type="text" class="login" name="username" value="username"></div>
                <div class="loginRow"><input class="form-input" type="password" class="login" name="password" value="password"></div>
                <div class="loginRow"><input class="submitbtn form-input"  type="submit" value="Login"></div>
            </form>
        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>
    </body>
</html>
