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
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?={$_POST['wid']}");
       exit;
    }
    $tid = $_POST['tid'];
    $wid = $_POST['wid'];
    $sid = $_POST['status'];
    
    if(!is_numeric($sid) || ($sid != 1 && $sid != 2 && $sid != 3)){
        $_SESSION['message'] = "Error occured trying to update task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}");
        exit;
    }
    
    $email = filter_var($_POST['user'], FILTER_SANITIZE_EMAIL);
    
    $uid = $dao->validUser($wid, $email);
    if(!$uid && $email != 'none'){
        $_SESSION['message'] = "Error occured trying to add task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?");
        exit;
    }
    
    $text = filter_var($_POST['text'], FILTER_SANITIZE_SPECIAL_CHARS);
    

    if($email == 'none'){
        //echo "made it noen";
        $dao->addTask($wid,$sid,$text);
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}");
        exit;
    } else{
       // echo "made it";
        $num = $uid['user_id'];
        $dao->addTask2($wid,$sid,$text, $num);
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}");
        exit;
    } 
?>