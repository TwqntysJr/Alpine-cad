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
?>
<div class="longheader">
    <div class="left-10">
        <h2>Welcome, <?php echo $usname?></h2>
    </div>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <form method="post">
                <select class="form-cntrl full-width down" name="identifierselection" required="">
                    <option name="nza" disabled selected="true" value="0">Select Identifier</option>
                        <?php 
                            $Identifier_sql = "SELECT * FROM identifiers WHERE UUID='$uid'";
                            $Identifier_result = mysqli_query($con, $Identifier_sql) or die(mysql_error());
                            while($Identifier_rows = mysqli_fetch_array($Identifier_result)){
                                echo"
                                    <option id='identifierselection' name='identifierselection' value=" .$Identifier_rows['Identifier'] . ">" . $Identifier_rows['Identifier'] . "[" . $Identifier_rows['Department'] . "] </option>
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