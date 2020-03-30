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

    
    
    $wid = $_POST['wid'];
    $sid = $_POST['status'];
    
    if(!is_numeric($sid) || ($sid != 1 && $sid != 2 && $sid != 3)){
        $_SESSION['message'] = "Error occured trying to add task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?wid={$wid}");
        exit;
    }
    
    $email = filter_var($_POST['user'], FILTER_SANITIZE_EMAIL);
    
    if(!$dao->validUser($wid, $email) && $email != 'none'){
        $_SESSION['message'] = "Error occured trying to add task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?wid={$wid}");
        exit;
    }
    
   /* $text = filter_var($_Post['text'], FILTER_SANITIZE_SPECIAL_CHARS);
    
    if($email == 'none'){
       // dao->addTask($wid,$sid,$text);
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?wid={$wid}");
        exit;
    } else{
        $uid = dao->getUid($email);
        //dao->addTask2($wid,$sid,$text, $uid);
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?wid={$wid}");
        exit;
    }    */   
?>