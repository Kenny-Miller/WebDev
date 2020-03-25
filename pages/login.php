<?php
  session_start();

  $username = "";
  if(isset($_SESSION['form'])){
      $username = $_SESSION['form']['username'];
  }
?>
<html>
    <head>
        <title>Incident Manager</title>
        <link rel="icon" href="/resources/images/favicon.ico" type="image/x=icon"/>
        <link rel="stylesheet" href="/resources/style.css" type="text/css"/>
    </head>
    <body>
        <div class="header">
            <img src="/resources/images/logo.png" alt="Logo">
        </div>
        <div class="container">
            <form id="login-form" method="POST" action="/handlers/loginHandler.php">
                <h1 class="heading">Login</h1>
                <?php
                    
                    if (isset($_SESSION['message'])) {
                        echo "<div id='error'>{$_SESSION['message']}</div>";
                        unset($_SESSION['messsage']);
                    }
                ?>
                <div class="login-form-row">
                    <label class="login-label" for="username">Please enter your username</label>
                    <input id="username" type="text"  name="username"  value="<?php echo $username; ?>" placeholder="Username">
                </div>
                <div class="login-form-row">
                    <label class="login-label" for="password">Please enter your password</label>
                    <input id="password" type="password"  name="password" placeholder="Password">
                </div>
                <div class="login-form-row">
                    <input id="login-submit"  type="submit" value="Login">
                </div>
            </form>
        </div>
        <div class="footer">@Copyright 2020 Kenny Miller</div>
    </body>
</html>