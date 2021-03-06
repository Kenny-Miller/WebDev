<?php
  session_start();
  
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
            <?php 
                if (isset($_SESSION["message"])) {
                    echo "<div id='error'>{$_SESSION['message']}</div>";
                    unset($_SESSION["message"]);
                }
            ?>
            <ol id="workspace-list">
                <?php
                    $uid = $_SESSION['uid'];
                    $workspaces = $dao->getWorkspaces($uid);
                
                    foreach ($workspaces as $workspace){
                        
                        $numUsers = $dao->getNumUsers($workspace["workspace_id"]);
                        $uI = $dao->getNumUI($workspace["workspace_id"]);
                        
                        $numUsersCount = 0;
                        $numUI = 0;
                        
                        if($numUsers){
                            $numUsersCount = $numUsers["count"];
                        }
                        if($uI){
                            $numUI= $uI["count"];
                        }
                        $wkColor = "";
                        if($numUI < 5){
                            $wkColor = 'completed';
                        } else if ($numUI >= 5 && $numUI < 10){
                            $wkColor = 'incomplete';
                        } else{
                            $wkColor = 'unassigned';
                        }
                        
                        echo "<li class=\"workspace-item {$wkColor}\">
                                <a class=\"workspace-link\" href=\"dashboard.php?wid={$workspace["workspace_id"]}&o=status\">
                                    <p>{$workspace["workspace_name"]}</p>
                                    <p>Number of Users: {$numUsersCount}</p>
                                    <p>Unnassigned Incidents:  {$numUI} </p>
                                </a>
                            </li>";
                    }                
                ?>
            </ol>
        <div class="footer">@Copyright 2020 Kenny Miller</div>
        </div>
    </body>
</html>
