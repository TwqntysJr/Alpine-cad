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
    include('db.php');
?>
<head>
    <link rel="stylesheet" href="includes/css/sidebar.css">
    <link rel="stylesheet" href="includes/css/dashboard.css">
</head>
<main class="main">
  <aside class="sidebar">
  <label class="logo-name">Alpine RP</label>
  
    <nav class="nav">
      <ul>
        <li><a href="#">Discord</a></li>
        <li><a href="#">Civilian Officer</a></li>
        <li><a href="civ.php">Civilian</a></li>
        <?php 
            
            $usname = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE username='$usname'";
            $result = mysqli_query($con, $sql) or die(mysql_error());
            while($rows = mysqli_fetch_array($result)){
                $rank = $rows['ROLE'];
              }

            if($rank == "1"){
                echo('
                    <br>
                    <li><a href="#">Mod Panel</a></li>
                ');
            }else if($rank == "2"){
                echo('
                    <br>
                    <li><a href="#">Staff Panel</a></li>
                ');
            }
        ?>
      </ul>
    </nav>
  </aside>
