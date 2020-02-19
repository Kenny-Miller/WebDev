<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/head.php'); ?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/header.php'); ?>
    <div class="sidebar">
            <h1 class="sidebar-label"> Workspace </h1>
            <h1 class="sidebar-label"> Username </h1>
            <a href="/users/dashboard.php" class="sidebar-tile">
                <img class="sidebar-image-icon" src="/styles/images/home.png">
                <h2 class="sidebar-text">Home</h2>
                <img class="sidebar-image-arrow" src="/styles/images/arrow.png">
                
            </a>
            <a href="/users/users.php" class="sidebar-tile">
                <img class="sidebar-image-icon" src="/styles/images/users.png">
                <h2 class="sidebar-text">Users</h2>                
                <img class="sidebar-image-arrow" src="/styles/images/arrow.png">
            </a>
            <a href="/admin/admin-dashboard.php" class="sidebar-tile">
                <img class="sidebar-image-icon" src="/styles/images/admin.png">
                <h2 class="sidebar-text">Admin</h2>
                <img class="sidebar-image-arrow" src="/styles/images/arrow.png">
            </a>
            <a href="/users/settings.php" class="sidebar-tile">
                <img class="sidebar-image-icon" src="/styles/images/cog.png">
                <h2 class="sidebar-text">Settings</h2>
                <img class="sidebar-image-arrow" src="/styles/images/arrow.png">
            </a>
        </div>
        <div class="dashboard-content">
            
        </div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>