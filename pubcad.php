<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');
    $usname = $_SESSION['username'];
    
?>
 <div class="longheader">
        <div class="left-10">
            <h2>Welcome, <?php echo $usname?></h2>

            <div class="col">
                <div class="row">
                    <h3>Status: </h3>
                </div>
            </div>
        </div>
    </div>
</div>