<!-- 
            
        Alpine RP California County.
        Copyright (C) 2020 Oliver Wake
        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.
        This program comes with ABSOLUTELY NO WARRANTY; Use at your own risk.

-->
<?php 
include('includes/header.php');
$usname = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$usname'";
$result = mysqli_query($con, $sql) or die(mysql_error());
while($rows = mysqli_fetch_array($result)){
    $banned = $rows['BANNED'];
}
if($banned == "1"){
    echo('
        <h1 class="white center"> You have been banned from the cad system</h1>
    ');
}else{
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
<!--
    <div class="announcements">
        <div class="anouncements-header">
            <h1 class="white">Global announcements</h1>
        </div>
    </div>
-->
</div>
<?php
}
?>

