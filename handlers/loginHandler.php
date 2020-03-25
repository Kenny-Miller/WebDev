<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    require_once dirname(__FILE__). '/../handlers/Dao.php';

    session_start();
    
    $dao = new Dao();

    $results = $dao->userExists($_POST['username'], $_POST['password']);
   
    if($results){
        $_SESSION['auth'] = true;
        $_SESSION['uid'] = $results['user_id'];
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspace.html");
        exit;
    } else{
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
        exit;
    }
?>