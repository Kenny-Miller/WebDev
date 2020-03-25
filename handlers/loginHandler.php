<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once dirname(__FILE__). '/../handlers/Dao.php';

    session_start();
    
    $dao = new Dao();
    
    $result = $dao->userExists($_POST['username'], $_POST['password']);
    
    if ($dao->userExists($_POST['username'], $_POST['password'])) {
        $_SESSION['auth'] = true;
        /*header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspace.html");
        exit;*/
    } else {
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
       /* header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.html");
        exit;*/
    }
    echo "Username {$_POST['username']}";
    echo "Password {$_POST['password']}";
    echo print_r($result, false);
?>