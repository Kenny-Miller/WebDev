<?php
    session_start();
    require_once dirname(__FILE__). '/../handlers/Dao.php';

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

        
    $dao = new Dao();

    if (!isset($_SESSION['auth']) || !$_SESSION['auth'] ||!isset($_SESSION['uid']))  {
       header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
       exit;
    }
    
    if(!is_numeric($_POST['wid']) || $_POST['wid'] <= 0){
        $_SESSION['message'] = "Workspace does not exist";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }
    
    if(!$dao->hasAccess($_SESSION['uid'], $_POST['wid'])){
        $_SESSION['message'] = "Invalid workspace access";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }

    if(!is_numeric($_POST['tid']) || $_POST['tid'] <= 0 || !$dao->validateTask($_POST['tid'],$_POST['wid'])){
        $_SESSION['message'] = "Task does not exist";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$_POST['wid']}&o=status");
       exit;
    }
    $tid = $_POST['tid'];
    $wid = $_POST['wid'];
    $sid = $_POST['status'];
    
    if(!is_numeric($sid) || ($sid != 1 && $sid != 2 && $sid != 3)){
        $_SESSION['message'] = "Error occured trying to update task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}&o=status");
        exit;
    }
    
    $email = filter_var($_POST['user'], FILTER_SANITIZE_EMAIL);
    
    $user = $dao->validUser($wid, $email);
    if(!$user && $email != 'none'){
        $_SESSION['message'] = "Error occured trying to add task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?");
        exit;
    }
    
    
    $text = filter_var($_POST['text'], FILTER_SANITIZE_SPECIAL_CHARS);
    
        
    
    
    if($email == 'none'){
        $dao->updateTask($tid, $text, $sid);
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}&o=status");
        exit;
    } else{
       
        $dao->updateTaskU($tid, $user['user_id'], $text, $sid);
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}&o=status");
        exit;
    } 
?>