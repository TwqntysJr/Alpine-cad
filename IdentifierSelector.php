<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');
    $usname = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE username='$usname'";
    $result = mysqli_query($con, $sql) or die(mysql_error());
    while($rows = mysqli_fetch_array($result)){
        $uid = $rows['ID'];
    }
    $randid1 = rand(1, 999999999);
    if(isset($_REQUEST['IdentifierTag'])){
        $createdidentifierforDep = $_REQUEST['department'];
        $createdIdentifier = $_REQUEST['IdentifierTag'];

        $checkdepacces = "SELECT * FROM deppartments WHERE depname='$createdidentifierforDep'";
        $checkdepaccesresult = mysqli_query($con, $checkdepacces) or die(mysqli_error());
        while ($checkdepaccesrows = mysqli_fetch_array($checkdepaccesresult)){
            $approved = $checkdepaccesrows['public'];

            if($approved == 1){
                $depuserquery    = "INSERT into `identifiers` (UUID, UID, Identifier, Department, Rank, approved)
                VALUES ('$randid1', '$uid', '$createdIdentifier', '$createdidentifierforDep', '0', '1')";
                $depuserresult   = mysqli_query($con, $depuserquery);
                
                $setstatusquery = "INSERT INTO `caduserstatuses` (uid, uuid, identifier, status) VALUES ('$randid1', '$uid', '$createdIdentifier', '10-42')";
                $setstatusresult = mysqli_query($con, $setstatusquery);
            }else{
                echo '<script language="javascript">';
                echo 'alert("The department is whitelisted")';
                echo '</script>';
                break;
            }
        }

        $depuserquery    = "INSERT into `identifiers` (UUID, UID, Identifier, Department, Rank, approved)
        VALUES ('$randid1', '$uid', '$createdIdentifier', '$createdidentifierforDep', '0', '0')";
        $depuserresult   = mysqli_query($con, $depuserquery);

        $setstatusquery = "INSERT INTO `caduserstatuses` (uid, uuid, identifier, status) VALUES ('$randid1', '$uid', '$createdIdentifier', '10-42')";
        $setstatusresult = mysqli_query($con, $setstatusquery);

                
        if ($depuserresult) {
        header("Location: IdentifierSelector.php");
        } else {
        }

    }
?>

<div class="dashboard-body">
    <div class="welcome-msg">
        <h1> Welcome
        <?php
            echo($_SESSION['username']);
        ?>
        </h1>
        <h2>Please select your identifier</h2>
    </div>
    <div class="row">
    <div class="select-civ">
        <div class="select-civ-header">
            <h1>My Identifiers  
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <form method="post">
                            <select class="form-cntrl full-width down" name="identifierselection" required="">
                                <option name="nza" disabled selected="true" value="0">Select Identifier</option>
                                <?php 
                                    $Identifier_sql = "SELECT * FROM identifiers WHERE uid='$uid'";
                                    $Identifier_result = mysqli_query($con, $Identifier_sql) or die(mysql_error());
                                    while($Identifier_rows = mysqli_fetch_array($Identifier_result)){
                                        echo"
                                            <option id='identifierselection' name='identifierselection' value=" . $Identifier_rows['UUID'] ." >" . $Identifier_rows['Identifier'] . " (" . $Identifier_rows['Department'] . ") </option>
                                            <br>
                                            ";
                                        }
                                ?>
                                <input type="submit" value="Select Identifier" name="identifiersubmit" class="btn btn-primary btn-block btn-full-width down-10"/>
                            </select>
                        </form>
                        <?php
                        if(isset($_POST['identifierselection'])){
                            $selected_val = $_POST['identifierselection'];  // Storing Selected Value In Variable
                            header('Location: pubcad.php?identifierselection=' .$selected_val);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="register-identifier">
        <div class="register-civ-header">    
        <h1>Create an Identifier</h1>
        <h4>note: some departments are whitelisted, use the Community Officer department if you want to be a CO</h4>
        </div>
        <form method="post">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <input class="form-cntrl" type="text" required="" name="IdentifierTag" placeholder="Identifier (eg. [SO-01])">
                    </div>
                </div>
                <div class="col">
                <div class="form-group">
                    <select class="form-cntrl reglastname full-width" name="department" required="">
                            <option selected="true">Select Department</option>
                                <?php 
                                    $departments_sql = "SELECT * FROM deppartments";
                                    $departments_result = mysqli_query($con, $departments_sql) or die(mysql_error());
                                    while($departments_rows = mysqli_fetch_array($departments_result)){
                                        echo"
                                        <option id='depid' name='department' value=" .$departments_rows['depname'] . ">" . $departments_rows['depname'] . "</option>
                                        <br>

                                        ";
                                    }
                                ?>
                        </select>                        
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Create Identifier" name="create" class="btn btn-primary btn-block btn-full-width"/>
            </div>
        </form>
    </div>
</div>
