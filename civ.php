<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');
    $usname = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$usname'";
    $charuuid1 = rand(1,99999999999999);

    $randid1 = rand(1, 999999999);
    $result = mysqli_query($con, $sql) or die(mysql_error());
    while($rows = mysqli_fetch_array($result)){
        $banned = $rows['BANNED'];
        $uid = $rows['ID'];
    }
    if($banned == "1"){
        echo('
            <h1 class="white center"> You have been banned from the cad system</h1>
        ');
    }else{
    if (isset($_REQUEST['FirstName'])) {
        // removes backslashes
        $charFirstname = stripslashes($_REQUEST['FirstName']);
        
        $charLastname = stripslashes($_REQUEST['LastName']);
        $charGender = $_REQUEST['gender'];
        $charAdress = stripslashes($_REQUEST['adress']);
        $charDOB = date('DD-MM-YYYY', strtotime($_REQUEST['DOB']));
        $charRace = $_REQUEST['race'];
        
        $charquery    = "INSERT into `civilians` (UUID, userid, FirstName, LastName, DOB, Residence, gender, Origen)
                    VALUES ('$randid1', '$uid', '$charFirstname','$charLastname', '$charDOB', '$charAdress', '$charGender', '$charRace')";
        $charresult   = mysqli_query($con, $charquery);
                    
        if ($charresult) {
            header("Location: civ.php");
        } else {
            header("Location: Pages/logregSystem/IncorrectPassword.html");
        }
    } else {
?>

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
            <h1>My Characters (x/1000) 
                <?php 
                    echo $uid;
                    echo '<br>   test  ';
                    echo $randid1;
                    echo '<br>';
                    echo $uid;

                ?>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <select class="form-cntrl full-width down" name="civ" required="">
                            <option selected="true">Select Civilian</option>
                                <?php 
                                    $selectchar_sql = "SELECT * FROM civilians WHERE userid='$uid'";
                                    $selectchar_result = mysqli_query($con, $selectchar_sql) or die(mysql_error());
                                    while($selectchar_rows = mysqli_fetch_array($selectchar_result)){
                                        echo"
                                            <option>" . $selectchar_rows['FirstName'] . " " .  $selectchar_rows['LastName']; "</option>
                                        ";
                                    }
                                ?>
                            </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="register-civ">
        <div class="register-civ-header">    
        <h1>Create a civilian character</h1>
        </div>
        <form method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input class="form-cntrl" type="text" required="" name="FirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input class="form-cntrl reglastname" type="text" required="" name="LastName" placeholder="Last Name">                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <select class="form-cntrl full-width" name="gender" required="">
                            <option selected="true">Select Gender</option>
                            <?php 
                                $selectgenders_sql = "SELECT * FROM genders";
                                $genders_result = mysqli_query($con, $selectgenders_sql) or die(mysql_error());
                                while($gender_rows = mysqli_fetch_array($genders_result)){
                                    echo"
                                        <option>" . $gender_rows['Name']; "</option>
                                    ";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                    <select class="form-cntrl reglastname full-width" name="race" required="">
                            <option selected="true">Select Race</option>
                                <?php 
                                    $selectgenders_sql = "SELECT * FROM race";
                                    $genders_result = mysqli_query($con, $selectgenders_sql) or die(mysql_error());
                                    while($gender_rows = mysqli_fetch_array($genders_result)){
                                        echo"
                                            <option>" . $gender_rows['name']; "</option>
                                        ";
                                    }
                                ?>
                        </select>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input class="form-cntrl " type="text" required="" name="adress" placeholder="Adress (may be made up)">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                         <input class="form-cntrl reglastname" type="date" id="DOB" name="Date Of Birth">                      
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Create Account" name="create" class="btn btn-primary btn-block btn-full-width"/>
            </div>
        </form>
    </div>
</div>
<?php
    }
}
?>