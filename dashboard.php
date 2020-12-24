<?php
    include('includes/header.php');
    include('includes/sidebar.php');
?>
<div class="welcome-msg">
<h1> Welcome
        <?php
            echo($_SESSION['username']);
        ?>
    </h1>
</div>