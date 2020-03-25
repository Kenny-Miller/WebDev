<?php
  session_start();
     error_reporting(E_ALL);
    ini_set('display_errors', 1);

  if (!isset($_SESSION['auth']) || !$_SESSION['auth'] ||!isset($_SESSION['uid']))  {
    header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
    exit;
  }

  require_once dirname(__FILE__). '/../handlers/Dao.php';
  $dao = new Dao();
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
        <div class="workspace-content">
            <h1 class="heading">Your Workspaces</h1>
            
            <ol id="workspace-list">
                <?php
                    $uid = $_SESSION['uid'];
                    
                    $workspaces = $dao->getWorkspaces($uid);
                    foreach ($workspaces as $workspace){
                        echo print_r($workspace, 1);
                    }                
                ?>
                <li class="workspace-item">
                    <a>
                        <p>Workspace Name</p>
                        <p>Unnassigned Incidents</p>
                        <p>Number of Users</p>
                    </a>
                </li>
                <li class="workspace-item">
                    <a href="dashboard.html">
                        <p>Workspace Name</p>
                        <p>Unnassigned Incidents</p>
                        <p>Number of Users</p>
                    </a>
                </li>
                <li class="workspace-item">
                    <a>
                        <p>Workspace Name</p>
                        <p>Unnassigned Incidents</p>
                        <p>Number of Users</p>
                    </a>
                </li>
                <li class="workspace-item">
                    <a>
                        <p>Workspace Name</p>
                        <p>Unnassigned Incidents</p>
                        <p>Number of Users</p>
                    </a>
                </li>
            </ol>
        <div class="footer">@Copyright 2020 Kenny Miller</div>
        </div>
    </body>
</html>
