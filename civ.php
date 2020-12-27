<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');
    $usname = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$usname'";
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
        $charDOB = date('Y-m-d', strtotime($_REQUEST['DOB']));
        $charRace = $_REQUEST['race'];
        $charuuid = hexdec(uniqid());
        $charquery    = "INSERT into `civilians` (UUID, userid, FirstName, LastName, DOB, Residence, gender, Origen)
                    VALUES ('$charuuid','$uid', '$charFirstname','$charLastname', '$charDOB', '$charAdress', '$charGender', '$charRace')";
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
                $result = mysqli_query($con, $sql) or die(mysql_error());
                while($rows = mysqli_fetch_assoc($result)){
                    $uid = $rows['ID'];
                    echo "UID= " .$uid;
                }
                
            ?></h1>
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