<?php
    require_once '../Dao.php';

    session_start();
    
    $dao = new Dao();
    
    echo $dao->userExists($_POST['username'], $_POST['password']);
    
    if ($dao->userExists($_POST['username'], $_POST['password'])) {
        $_SESSION['auth'] = true;
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspace.html");
        exit;
    } else {
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
    }
?>