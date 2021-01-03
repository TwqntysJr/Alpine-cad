<?php 
    include('includes/header.php');
    include('includes/sidebar.php');
    include('includes/db.php');

    $id = $_GET['civid'];
    $sqlciv = "SELECT * FROM civilians WHERE UUID='$id'";
    $civresult = mysqli_query($con, $sqlciv) or die(mysql_error());

    $licensequery1 = "SELECT * FROM licenses WHERE CIVID='$id'";
    $licenseresult1 = mysqli_query($con, $licensequery1) or die(mysql_error());

    while($licenserows = mysqli_fetch_array($licenseresult1)){
        $licensetype1 = $licenserows['LicenseType'];
        $licenseStatus1 = $licenserows['LicenseStatus'];
        $insurancestatus1 = $licenserows['InsuranceStatus'];
    }

    $civUUID;
    while($civrows = mysqli_fetch_array($civresult)){
        $civUUID = $civrows['UUID'];
        $civFirstName = $civrows['FirstName'];
        $civLastName = $civrows['LastName'];
        $civDOB = $civrows['DOB'];
        $civResidence = $civrows['Residence'];
        $civGender = $civrows['gender'];
        $civOrigen = $civrows['Origen'];
    }

    if (isset($_REQUEST['licensetype'])) {
        $licensetype = $_REQUEST['licensetype'];
        
        $licensestatus = $_REQUEST['licenseStatus'];
        
        $insurancestatus = $_REQUEST['InsuranceStatus'];

        $licensequery   = "UPDATE `licenses` SET LicenseType='$licensetype', LicenseStatus='$licensestatus', InsuranceStatus='$insurancestatus' WHERE CIVID='$id';";
        $licenseresult   = mysqli_query($con, $licensequery);
                    
        if ($licenseresult) {
            header("Location: mdt.php?civid=$id");
        } else {
            header("Location: Pages/logregSystem/IncorrectPassword.html");
        }
    } else {
?>

<div class="dashboard-body">

    <div class="longheader">
        <h2 class="left-10">Hello, <?php echo $civFirstName . ' ' . $civLastName?></h2>
        <div class="tab-wrapper">
            <div class="tab-button-wrapper">
                <ul>
                    <li><a class="tab-button-first"
                        id="tab-button1"
                        href="javascript:void(0)"
                        onclick="loadTab(1)">Information</a></li>
                        <li><a class="tab-button-hidden" 
                        id="tab-button2"
                        href="javascript:void(0)"
                        onclick="loadTab(2)">Licenses</a></li>
                        <li><a class="tab-button-hidden" 
                        id="tab-button3"
                        href="javascript:void(0)"
                        onclick="loadTab(3)">Vehicles</a></li>
                        <li><a class="tab-button-hidden tab-button-last" 
                        id="tab-button4"
                        href="javascript:void(0)"
                        onclick="loadTab(4)">Firearms</a></li>
                        
                        
                </ul>
            </div>
            <div class="tab-body-wrapper">
                <div class="tab-body" id="tab1">
                    <p>Name: <?php echo $civFirstName . ' ' . $civLastName; ?></p>
                    <p>Date Of Birth: <?php echo $civDOB ?></p>
                    <p>Residence: <?php echo $civResidence?></p>
                    <p>Gender: <?php echo $civGender?></p>
                    <p>Origen: <?php echo $civOrigen?></p>
                    <hr>
                    <p>License type: <?php echo $licensetype1?></p>
                    <p>License status: <?php echo $licenseStatus1 ?></p>
                    <p>Insurance status: <?php echo $insurancestatus1?></p>
                </div>
                <div class="tab-body tab-body-hidden" id="tab2">
                    <H2>Setup your license</H2>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col">
                            <h2>License Type</h2>
                                <select class="form-cntrl width-250" name="licensetype" required="">
                                    <option selected="true" value="None">None</option>
                                    <!--===============================================================================================-->
                                    <option value="Class A">Class A</option>
                                    <option value="Class B">Class B</option>
                                    <option value="Class C">Class C</option>
                                    <!--===============================================================================================-->
                                    <option value="Class M1">Class M1</option>
                                    <option value="Class M2">Class M2</option>
                                    <!--===============================================================================================-->
                                    <option value="CDL Class A">CDL Class A</option>
                                    <option value="CDL Class B">CDL Class B</option>
                                    <option value="CDL Class C">CDL Class C</option>
                                    <!--===============================================================================================-->
                                    <option value="Learners Permit">Learners Permit</option>
                                    <!--===============================================================================================-->
                                    <option value="Instructors Class A">Instructor Class A Permit</option>
                                    <option value="Instructors Class B">Instructor Class B Permit</option>
                                    <option value="Instructors Class C">Instructor Class C Permit</option>
                                    <!--===============================================================================================-->
                                    <option value="Instructors Class M1">Instructor Class M1 Permit</option>
                                    <option value="Instructors Class M2">Instructor Class M2 Permit</option>
                                    <!--===============================================================================================-->
                                    <option value="Instructors CDL A">Instructor CDL Class A Permit</option>
                                    <option value="Instructors CDL B">Instructor CDL Class B Permit</option>
                                    <option value="Instructors CDL C">Instructor CDL Class C Permit</option>
                                    <!--===============================================================================================-->
                                            
                                </select>
                            </div>
                            <div class="col"></div>
                            <div class="row">
                                <div class="col">
                                <h2>License Status</h2>
                                <select class="form-cntrl width-250" name="licenseStatus" required="">
                                    <option selected="true" value="None">None</option>
                                    <!--===============================================================================================-->
                                    <option value="Valid">Valid</option>
                                    <option value="Invalid">Invalid</option>
                                    <option value="Expired">Expired</option>
                                    <option value="Fake">Fake</option>
                                </select>
                            </div>
                            <div class="col"></div>
                            <div class="row">
                                <div class="col">
                                <h2>Insurance Status</h2>
                                <select class="form-cntrl width-250" name="InsuranceStatus" required="">
                                    <option selected="true" value="None">None</option>
                                    <!--===============================================================================================-->
                                    <option value="Valid">Valid</option>
                                    <option value="Invalid">Invalid</option>
                                    <option value="Expired">Expired</option>
                                    <option value="Fake">Fake</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col5">
                                    <input type="submit" value="Update License" name="licensesubmit" class="btn btn-primary btn-block btn-full-width down-10"/>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="tab-body tab-body-hidden" id="tab3"><p>Body 3</p></div>
                <div class="tab-body tab-body-hidden" id="tab4"><p>Body 4</p></div>
            </div>
        </div>
    </div>
</div>
<script>
    var last_tab = 1;

function loadTab(tab_number)
{
	if (tab_number === last_tab) return;
	
	document.getElementById("tab" + last_tab).style.display = "none";
	document.getElementById("tab" + tab_number).style.display = "block";
	document.getElementById("tab-button" + last_tab).style.opacity = "0.5";
	document.getElementById("tab-button" + tab_number).style.opacity = "1.0";

	last_tab = tab_number;
}
</script>
<?php }?>