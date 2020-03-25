<?php
  session_start();

  if (!isset($_SESSION['auth']) || !$_SESSION['auth'] ||!isset($_SESSION['uid']))  {
    header("Location: https://frozen-ravine-42740.herokuapp.com/pages/login.php");
    exit;
  }

  require_once 'Dao.php';
  $dao = new Dao();
?>
<html>
    <head>
        <title>Incident Manager</title>
        <link rel="icon" href="/resources/images/favicon.ico" type="image/x=icon"/>
        <link rel="stylesheet" href="/resources/style.css" type="text/css"/>
    </head>
    <body>
        <?php echo $_SESSION['uid']; ?>
        <div class="header">
            <img src="/resources/images/logo.png" alt="Logo">
        </div>
        <div class="workspace-content">
            <h1 class="heading">Your Workspaces</h1>
            <ol id="workspace-list">
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
