<?php
    include('includes/header.php');
    include('includes/sidebar.php');
?>
<div class="dashboard-body">
    <div class="welcome-msg">
    <h1> Welcome
            <?php
                echo($_SESSION['username']);
            ?>
        </h1>
    </div>
    <div class="announcements">
        <div class="anouncements-header">
            <h1 class="white">Global announcements</h1>
        </div>
    </div>
</div>

