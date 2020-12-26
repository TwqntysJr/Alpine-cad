<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
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
<head>
<link rel="stylesheet" href="bootstrap-dark.css">
</head>
<div class="dashboard-body">
    <div class="welcome-msg">
        <h1> Welcome
        <?php
            echo($_SESSION['username']);
        ?>
        </h1>
        <h2>Who are you going to be today?</h2>
    </div>
    <div class="select-civ">
        <div class="select-civ-header">
            <h1>My Characters (x/1000) </h1>
        </div>
    </div>
</div>
<?php
}
?>