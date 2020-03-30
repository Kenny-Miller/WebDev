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
    
    if(!$dao->hasAccess($_SESSION['uid'], $_GET['wid'])){
        $_SESSION['message'] = "Invalid workspace access";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }

    //We need to validate $_POST['user'] $_Post['text'] 
    
    $wid = $_POST['wid'];
    $sid = $_POST['status'];
    
    if(!is_numeric($sid) || $sid != 1 || $sid != 2 || $sid != 3){
        $_SESSION['message'] = "Error occured trying to add task. Please try again.";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php?wid={$wid}");
        exit;
    }
    echo $_POST['user'];
   // $user = filter_var(($_POST['user'], FILTER_SAITIZE_EMAIL));
   // echo $user;
        
?>