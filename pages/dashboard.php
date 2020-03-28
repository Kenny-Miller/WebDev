<?php
    session_start();
    require_once dirname(__FILE__). '/../handlers/Dao.php';
    $dao = new Dao();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_SESSION['auth']) || !$_SESSION['auth'] ||!isset($_SESSION['uid']))  {
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
        exit;
    }
    
    if(!is_numeric($_GET['wk']) && $_GET['wk'] > 0){
        $_Session['message'] = "Workspace does not exist";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }
    echo $dao->hasAccess($_SESSION['uid'], $_GET['wk']);
   /* if(!dao->hasAccess($_SESSION['uid'], $_GET['wk'])){
        $_Session['message'] = "Invalid workspace access";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }*/
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
        <div class="sidebar">
            <div class="sidebar-item">
                <p class="sidebar-item-text">Workplace</p>
            </div>
            <div class="sidebar-item sidebar-item-last">
                <p class="sidebar-item-text">Username</p>
            </div>
            <a class="sidebar-item-container  selected">
                <img class="sidebar-item-img" src="/resources/images/home.png">
                <p class="sidebar-item-text">Home</p>
                <img class="sidebar-item-arrow" src="/resources/images/arrow.png" >
            </a>
            <a class="sidebar-item-container sidebar-container-last">
                <img class="sidebar-item-img" src="/resources/images/users.png">
                <p class="sidebar-item-text">Users</p>
                <img class="sidebar-item-arrow" src="/resources/images/arrow.png">
            </a>
        </div>
        
        <div class="content">
            <form id="dashboard-sort">
                <h1>Home</h1>
                <label for="dashboard-sortby">Sort By</label>
                <select id="dashboard-sortby">
                    <option>Status</option>
                    <option>User</option>
                    <option>Date</option>
                </select>
                <input type="submit">
             </form>
            <ol id="dashboard-itemlist">
                <li class="dashboard-item">
                    <img class="dashboard-item-img" src="/resources/images/incomplete.png">
                    <p class="dashboard-item-text">Status: Incomplete</p>
                    <p class="dashboard-item-text">User: User1</p>
                    <p class="dashboard-item-text">Short Description</p>
                    <p class="dashboard-item-text">Theres an issue</p>
                    <button class="dashboard-item-btn">Update</button> 
                </li>
            </ol>  
            <div class="footer">@Copyright 2020 Kenny Miller</div>
        </div> 
    </body>
</html>
