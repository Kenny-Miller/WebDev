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
            <form class="dashboard-tile-form">
                <label for="sort-option">Sort By:</label>
                <select id="sort-option" name="sort-option">
                <option value="newset">Newest</option>
                <option value="users">Users</option>
                <option value="completed">Completed</option>
                </select>
                <input type="submit">
            </form>
            <ol class="dashboard-tile-list">
                <li class="dashboard-tile">
                    <img class=dashboard-tile-image src="/styles/images/incomplete.png">
                    <div class="dashboard-tile-label"> Status: Incomplete</div>
                    <div class="dashboard-tile-label"> User: user1</div>
                    <div class="dashboard-tile-label"> Description: There was an issue</div>
                    <form class="task-tile-form">
                            <input class="task-tile-button" type="submit" value="Update">
                    </form>
                </li>
                <li class="dashboard-tile">
                    <img class=dashboard-tile-image src="/styles/images/incomplete.png">
                    <div class="dashboard-tile-label"> Status: Incomplete</div>
                    <div class="dashboard-tile-label"> User: user1</div>
                    <div class="dashboard-tile-label"> Description: There was an issue</div>
                    <form class="task-tile-form">
                            <input class="task-tile-button" type="submit" value="Update">
                    </form>
                </li>
                <li class="dashboard-tile">
                    <img class=dashboard-tile-image src="/styles/images/incomplete.png">
                    <div class="dashboard-tile-label"> Status: Incomplete</div>
                    <div class="dashboard-tile-label"> User: user1</div>
                    <div class="dashboard-tile-label"> Description: There was an issue</div>
                    <form class="task-tile-form">
                            <input class="task-tile-button" type="submit" value="Update">
                    </form>
                </li>
                <li class="dashboard-tile">
                    <img class=dashboard-tile-image src="/styles/images/incomplete.png">
                    <div class="dashboard-tile-label"> Status: Incomplete</div>
                    <div class="dashboard-tile-label"> User: user1</div>
                    <div class="dashboard-tile-label"> Description: There was an issue</div>
                    <form class="task-tile-form">
                            <input class="task-tile-button" type="submit" value="Update">
                    </form>
                </li>
            </ol>
        </div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/shared/footer.php'); ?>