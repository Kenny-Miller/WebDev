<?php
    session_start();
    
    
    if ($username == $_POST['username'] && $password == $_POST['password']) {
        $_SESSION['auth'] = true;
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspace.html");
        exit;
    } else {
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/pages/login.php");
    }
?>