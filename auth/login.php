<html>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
    <body>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
        <div class="login-tile">
            <form class="login-form" method="POST" action="/users/dashboard.php">
                <div class="login-form-heading"><h1>Login</h1></div>
                <div class="login-form-row">
                    <h3>Username</h3>
                    <input class="login-form-input" type="text"  name="username" value="username">
                </div>
                <div class="login-form-row">
                    <h3>Password</h3>
                    <input class="login-form-input" type="password"  name="password" value="password">
                </div>
                <div class="login-form-row"><input class="login-submitbtn login-form-input"  type="submit" value="Login"></div>
            </form>
        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>
    </body>
</html>
