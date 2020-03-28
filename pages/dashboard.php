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
    
    if(!is_numeric($_GET['wid']) || $_GET['wid'] <= 0){
        $_SESSION['message'] = "Workspace does not exist";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }
    
    if(!$dao->hasAccess($_SESSION['uid'], $_GET['wid'])){
        $_SESSION['message'] = "Invalid workspace access";
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/workspaces.php");
        exit;
    }

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
            <form id="dashboard-sort" action="/pages/dashboard.php" method="get">
                <h1>Home</h1>
                <label for="dashboard-sortby">Sort By</label>
                <input type="hidden" name="wid" value="<?=$_GET['wid']?>">
                <select id="dashboard-sortby" name="o">
                    <option value="status">Status</option>
                    <option value="user">User</option>
                    <option value="date">Date</option>
                </select>
                <input type="submit">
             </form>
            <ol id="dashboard-itemlist">
                <?php
                    $tasks;
                    if($_GET['o'] == 'user'){
                        $tasks = $dao->homeSortByUser($_GET['wid']);
                    } else if($_GET['o'] == 'date'){
                        $tasks = $dao->homeSortByDate($_GET['wid']);
                    } else{
                        $tasks = $dao->homeSortByStatus($_GET['wid']);
                    }
                    
                   
                
                    foreach ($tasks as $task){
                        $class = strtolower($task['status_desc']);
                        echo "<li class=\"dashboard-item {$class}\">";
                        //echo "<img class=\"dashboard-item-img\" src=\"/resources/images/{$task['status_desc']}.png\">";
                        echo "<p class=\"dashboard-item-text\">Status: {$task['status_desc']}</p>";
                        echo "<p class=\"dashboard-item-text\">User: {$task['first_name']} {$task['last_name']}</p>";
                        echo "<p class=\"dashboard-item-text\">{$task['task_name']}</p>";
                        echo "<button class=\"dashboard-item-btn\">Update</button>";     
                        echo"</li>";
                    }
                ?>    
            </ol>  
            <div class="footer">@Copyright 2020 Kenny Miller</div>
        </div> 
    </body>
</html>
