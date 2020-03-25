<?php
    require_once dirname(__FILE__). '/../handlers/Dao.php';

    session_start();
    
    $dao = new Dao();

    $results = $dao->userExists($_POST['username'], $_POST['password']);
   
    unset($_SESSION['form']);
    if($results){
        $_SESSION['auth'] = true;
        $_SESSION['uid'] = $results['user_id'];
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    } else{
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
        $_SESSION['form'] = $_POST;
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
        exit;
    }
?>