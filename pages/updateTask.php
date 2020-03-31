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

    //check tid
    if(!dao->taskExists($_POST['wid'],$_POST['tid'])){
        header("Location: https://frozen-ravine-42740.herokuapp.com/pages/dashboard.php?wid={$wid}");
        exit;
    }
    //Get current tid values: user id status id, and task text;
    $task = dao->getTask($_POST['tid']);
    echo $task['email'];
    echo $task['status_id'];
    echo $task['task_name'];

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
            <form id="addTaskForm" class="task-form" method="POST" action="/handlers/addTaskHandler.php">
                <h1 class="heading task-header">Add Task</h1>
                <div class="task-input-container">
                    <label class="task-label" for="task-user">Select a User</label>
                    <select id="task-user" name="user">
                        <option value="none">Unnassigned</option>
                        <?php
                            $users = $dao->getUsers($_GET['wid']);
                            foreach($users as $user){
                                echo "<option name=\"user\" value=\"{$user['email']}\">{$user['first_name']} {$user['last_name']}</option>";
                            }
                        
                        ?>
                    </select>
                </div>
                <div class="task-input-container">
                    <label class="task-label" for="task-status">Select a Status</label>
                    <select id="task-status" name="status">
                        <?php
                            $statuses = $dao->getStatuses();
                            foreach($statuses as $status){
                                echo "<option name=\"status\" value=\"{$status['status_id']}\">{$status['status_desc']}</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="task-text">
                    <label class="task-label" for="task-text" >Enter a Description</label>
                    <textarea name="text" id="task-text" rows="8" maxlength="250" form="addTaskForm"></textarea>
                </div>
                <input type="hidden" name="wid" value="<?=$_GET['wid']?>">
                <div class="task-submit">
                    <input id="task-submit"  type="submit" value="AddTask">
                </div>
            </form>
        </div>
        <div class="footer">@Copyright 2020 Kenny Miller</div>
    </body>
</html>