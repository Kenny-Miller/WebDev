<?php
    session_start();
    require_once dirname(__FILE__). '/../handlers/Dao.php';
        
    $dao = new Dao();

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
        <div class="container">
            <form class="task-form" method="POST" action="/pages/addTaskHandler.php">
                <h1 class="heading">Add Task</h1>
                <div class="task-form-row">
                    <label>User</label>
                    <select>
                        <option value="none">Unnassigned</option>
                        <?php
                            $users = $dao->getUsers($wid);
                            foreach($users as $user){
                                echo "<option value=\"{$user['email']}\">{$user['first_name']} {$user['last_name']}</option>";
                            }
                        
                        ?>
                    </select>
                </div>
                <div class="task-form-row">
                    <label>Status</label>
                    <select>
                        <?php
                            
                        
                        ?>
                    </select>
                </div>
                <div class="task-form-row">
                    <label>Description</label>
                    <input type="textarea">
                </div>
                <div class="task-form-row">
                    <input id="task-submit"  type="submit" value="AddTask">
                </div>
            </form>
        </div>
        <div class="footer">@Copyright 2020 Kenny Miller</div>
    </body>
</html>